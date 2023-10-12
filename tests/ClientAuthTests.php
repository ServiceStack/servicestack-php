<?php declare(strict_types=1);

use dtos\CreateJwt;
use dtos\CreateJwtResponse;
use dtos\InvalidateLastAccessToken;
use dtos\Secured;
use dtos\SecuredResponse;
use dtos\TestAuth;
use dtos\TestAuthResponse;
use PHPUnit\Framework\TestCase;
use Servicestack\Authenticate;
use Servicestack\AuthenticateResponse;
use Servicestack\ConsoleLogger;
use Servicestack\JsonServiceClient;
use Servicestack\Log;
use Servicestack\LogLevel;
use Servicestack\Callback;
use Servicestack\RefreshTokenException;
use Servicestack\WebServiceException;

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once 'dtos.php';

function createJwt(?array $args = []): CreateJwt
{
    $to = new CreateJwt();
    $to->fromMap($args);
    if (!isset($to->userAuthId))
        $to->userAuthId = "1";
    if (!isset($to->displayName))
        $to->displayName = "test jwt";
    if (!isset($to->email))
        $to->email = "test@auth.com";
    return $to;
}

class State
{
    public $count = 0;

    public function incr(): void
    {
        $this->count += 1;
    }
}

class ClientAuthTests extends TestCase
{
    public JsonServiceClient $client;
    private $webServiceException;

    protected function setUp(): void
    {
        $this->client = $this->createTestClient();
        Log::$logger = new ConsoleLogger();
        Log::$levels[] = LogLevel::Debug;
    }

    public function createTestClient(): JsonServiceClient
    {
        return new JsonServiceClient("https://localhost:5001");
//        return new JsonServiceClient("https://test.servicestack.net");
    }

    public function testCanAuthWithJwt()
    {
        $client = $this->createTestClient();
        /** @var CreateJwtResponse $response */
        $response = $client->post(createJwt());

        $client->bearerToken = $response->token;

        /** @var TestAuthResponse $testAuth */
        $testAuth = $client->get(new TestAuth());
        $this->assertEquals("1", $testAuth->userId);
        $this->assertEquals("test jwt", $testAuth->displayName);
        $this->assertNotEmpty($testAuth->sessionId);
    }

    public function testDoesFireOnAuthenticationRequiredCallbackOn401()
    {
        $client = $this->createTestClient();
        $state = new State();

        $client->onAuthenticationRequired = new class($state) implements Callback {
            public function __construct(public State $state)
            {
            }

            public function call(): void
            {
                $this->state->incr();
            }
        };

        $this->webServiceException = '\Servicestack\WebServiceException';
        try {
            $client->get(new TestAuth());
            $this->fail("should throw");
        } catch (WebServiceException $ex) {
            $status = $ex->responseStatus;
            $this->assertEquals($status->errorCode, "401");
            $this->assertEquals($status->message, "Unauthorized");
            $this->assertEquals($state->count, 1);
        }
    }

    public function testCanUseOnAuthenticationRequiredToAuthClient()
    {
        $client = $this->createTestClient();
        $state = new State();

        $client->onAuthenticationRequired = new class($client, $state) implements Callback {
            public function __construct(public JsonServiceClient $client, public State $state)
            {
            }

            public function call(): void
            {
                $this->state->incr();
                $this->client->setCredentials("test", "test");
            }
        };

        $client->get(new TestAuth());
        $this->assertEquals($state->count, 1);
    }

    public function testCanUseOnAuthenticationRequiredToFetchToken()
    {
        $client = $this->createTestClient();
        $state = new State();

        $client->onAuthenticationRequired = new class($client, $state) implements Callback {
            public function __construct(public JsonServiceClient $client, public State $state)
            {
            }

            public function call(): void
            {
                $this->state->incr();
                $this->client->post(new Authenticate(provider: "credentials", userName: "test", password: "test"));
            }
        };

        $client->get(new TestAuth());
        $this->assertEquals($state->count, 1);
        $this->assertNotEmpty($client->cookies['ss-tok']);
    }

    public function testCanUseOnAuthenticationRequiredToFetchTokenAfterExpiredToken()
    {
        $client = $this->createTestClient();
        $state = new State();

        $client->onAuthenticationRequired = new class($client, $state) implements Callback {
            public function __construct(public JsonServiceClient $client, public State $state)
            {
            }

            public function call(): void
            {
                $this->state->incr();
                $this->client->post(new Authenticate(provider: "credentials", userName: "test", password: "test"));
            }
        };

        $createExpiredToken = createJwt();
        $createExpiredToken->jwtExpiry = new DateTime("2001-01-01");
        /** @var CreateJwtResponse $expiredJwt */
        $expiredJwt = $client->post($createExpiredToken);

        $client->bearerToken = $expiredJwt->token;

        $client->get(new TestAuth());
        $this->assertNotEmpty($client->cookies['ss-tok']);
        $this->assertNotEmpty($client->cookies['ss-reftok']);
        $this->assertNotEquals($client->cookies['ss-tok'], $client->bearerToken);
    }

    public function testCanReauthenticateAfterAnAutoRefreshAccessToken()
    {
        $client = $this->createTestClient();

        $auth = new Authenticate(provider: "credentials", userName: "test", password: "test");
        /** @var AuthenticateResponse $authResponse */
        $authResponse = $client->post($auth);

        $createExpiredToken = createJwt();
        $createExpiredToken->jwtExpiry = new DateTime("2001-01-01");
        /** @var CreateJwtResponse $expiredJwt */
        $expiredJwt = $client->post($createExpiredToken);

        $client->post(new Authenticate(provider: "logout"));

        $client = $this->createTestClient();
        $client->bearerToken = $expiredJwt->token;
        $client->refreshToken = $authResponse->refreshToken;

        $auth->password = "notvalid";

        try {
            $client->post($auth);
            $this->fail("should throw");
        } catch (WebServiceException $ex) {
            $status = $ex->responseStatus;
            $this->assertEquals("Unauthorized", $status->errorCode);
            $this->assertEquals("Invalid Username or Password", $status->message);
        }
    }

    public function testDoesFetchAccessTokenUsingRefreshTokenCookies() {
        $client = $this->createTestClient();

        $auth = new Authenticate(provider: "credentials", userName: "test", password: "test");
        $client->post($auth);

        $initialAccessToken = $client->getTokenCookie();
        $initialRefreshToken = $client->getRefreshTokenCookie();

        $this->assertNotEmpty($initialAccessToken);
        $this->assertNotEmpty($initialRefreshToken);

        $request = new Secured(name:"test");
        /** @var SecuredResponse $response */
        $response = $client->send($request);

        $client->post(new InvalidateLastAccessToken());

        /** @var SecuredResponse $response */
        $response = $client->send($request);

        $this->assertEquals($response->result, $request->name);
        $lastAccessToken = $client->getTokenCookie();
        $this->assertNotEquals($initialAccessToken, $lastAccessToken);
    }

    public function testInvalidRefreshTokenThrowsRefreshTokenExceptionErrorResponse() {
        $client = $this->createTestClient();

        $client->refreshToken = "Invalid.Refresh.Token";

        try {
            $client->get(new TestAuth());
            $this->fail("should throw");
        } catch (RefreshTokenException $ex) {
            $this->assertEquals($ex->responseStatus->errorCode, "ArgumentException");
            $this->assertEquals($ex->responseStatus->message, "Illegal base64url string!");
        }
    }

    public function testExpiredRefreshTokenThrowsRefreshTokenException() {
        $client = $this->createTestClient();

        $createExpiredToken = createJwt();
        $createExpiredToken->jwtExpiry = new DateTime("2001-01-01");
        /** @var CreateJwtResponse $expiredJwt */
        $expiredJwt = $client->post($createExpiredToken);

        $client->refreshToken = $expiredJwt->token;

        try {
            $client->get(new TestAuth());
            $this->fail("should throw");
        } catch (RefreshTokenException $ex) {
            $this->assertEquals($ex->responseStatus->errorCode, "TokenException");
            $this->assertEquals($ex->responseStatus->message, "Token has expired");
        }
    }

}