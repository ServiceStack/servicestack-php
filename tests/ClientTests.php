<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once 'dtos.php';

use dtos\AltQueryItems;
use dtos\EchoTypes;
use dtos\GetItems;
use dtos\GetNakedItems;
use dtos\HelloAllTypes;
use dtos\HelloAllTypesResponse;
use dtos\HelloList;
use dtos\HelloReturnVoid;
use dtos\HelloString;
use dtos\Item;
use dtos\Items;
use dtos\QueryResponseAlt;
use dtos\RequiresAdmin;
use dtos\ReturnString;
use dtos\SendJson;
use dtos\SendReturnVoid;
use dtos\SendText;
use dtos\ThrowType;
use dtos\ThrowValidation;
use PHPUnit\Framework\TestCase;
use Servicestack\ArrayList;
use Servicestack\ByteArray;
use Servicestack\ConsoleLogger;
use ServiceStack\JsonServiceClient;
use dtos\Hello;
use dtos\HelloResponse;
use dtos\AllCollectionTypes;
use dtos\AllTypes;
use dtos\EchoComplexTypes;
use dtos\Poco;
use dtos\SubType;
use Servicestack\Log;
use Servicestack\LogLevel;
use Servicestack\RequestFilter;
use Servicestack\ResponseFilter;
use Servicestack\ResponseStatus;
use Servicestack\SendContext;
use Servicestack\WebServiceException;
use function Servicestack\qsValue;

final class ClientTests extends TestCase
{
    public JsonServiceClient $client;

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

    public function createHelloAllTypes()
    {
        return new HelloAllTypes(name:"name",
            allTypes: $this->createAllTypes(),
            allCollectionTypes: $this->createAllCollectionTypes());
    }

    public function createAllTypes(): AllTypes
    {
        return new AllTypes(
            id: 1,
            byte: 2,
            short: 3,
            int: 4,
            long: 5,
            uShort: 6,
            uInt: 7,
            uLong: 8,
            float: 1.1,
            double: 2.2,
            decimal: 3.0,
            string: 'string',
            dateTime: new DateTime("2001-01-01"),
            timeSpan: new DateInterval("PT1H"),
            dateTimeOffset: new DateTime("2001-01-01"),
            guid: "ea762009b66c410b9bf5ce21ad519249",
            char: 'c',
            stringList: ["A", "B", "C"],
            stringArray: ["D", "E", "F"],
            stringMap: ["A" => "D", "B" => "E", "C" => "F"],
            intStringMap: [1 => "A", 2 => "B", 3 => "C"],
            subType: new SubType(id: 1, name: "name"));
    }

    public function createAllCollectionTypes(): AllCollectionTypes
    {
        return new AllCollectionTypes(
            intArray: [1, 2, 3],
            intList: [1, 2, 3],
            stringArray: ["A", "B", "C"],
            stringList: ["D", "E", "F"],
            byteArray: new ByteArray(b"ABC"),  # base64(ABC)
            pocoArray: [$this->createPoco("pocoArray")],
            pocoList: [$this->createPoco("pocoArray")],
            pocoLookup: ["A" => [$this->createPoco("B"), $this->createPoco("C")]],
            pocoLookupMap: ["A" => [["B" => $this->createPoco("C"), "D" => $this->createPoco("E")]]]
        );
    }

    public function createPoco(string $name): Poco
    {
        return new Poco(name: $name);
    }

    public function createEchoComplexTypes(): EchoComplexTypes
    {
        return new EchoComplexTypes(
            subType: new SubType(id: 1, name: "foo"),
            subTypes: [new SubType(id: 2, name: "bar"), new SubType(id: 3, name: "baz")],
            subTypeMap: ["a" => new SubType(id: 4, name: "qux")],
            stringMap: ["a" => "b"],
            intStringMap: [1 => "A"]);
    }

    public function testHello()
    {
        $this->assertTrue(true);
    }

    public function assertAllTypes(AllTypes $dto): void
    {
        $this->assertEquals(1, $dto->id);
        $this->assertEquals(2, $dto->byte);
        $this->assertEquals(3, $dto->short);
        $this->assertEquals(4, $dto->int);
        $this->assertEquals(5, $dto->long);
        $this->assertEquals(6, $dto->uShort);
        $this->assertEquals(7, $dto->uInt);
        $this->assertEquals(8, $dto->uLong);
        $this->assertEquals(1.1, $dto->float);
        $this->assertEquals(2.2, $dto->double);
        $this->assertEquals(3.0, $dto->decimal);
        $this->assertEquals('string', $dto->string);
        $this->assertEquals(new DateTime("2001-01-01"), $dto->dateTime);
        $this->assertEquals(new DateTime("2001-01-01"), $dto->dateTimeOffset);
        $this->assertEquals(new DateInterval("PT1H"), $dto->timeSpan);
        $this->assertEquals("ea762009b66c410b9bf5ce21ad519249", $dto->guid);
        $this->assertEquals(["A", "B", "C"], $dto->stringList);
        $this->assertEquals(["D", "E", "F"], $dto->stringArray);
        $this->assertEquals(["A" => "D", "B" => "E", "C" => "F"], $dto->stringMap);
        $this->assertEquals([1 => "A", 2 => "B", 3 => "C"], $dto->intStringMap);
        $this->assertEquals(new SubType(id: 1, name: "name"), $dto->subType);
    }

    public function assertAllCollectionTypes(AllCollectionTypes $dto): void
    {
        $this->assertEquals([1, 2, 3], $dto->intArray);
        $this->assertEquals([1, 2, 3], $dto->intList);
        $this->assertEquals(["A", "B", "C"], $dto->stringArray);
        $this->assertEquals(["D", "E", "F"], $dto->stringList);
        $this->assertEquals(new ByteArray(b"ABC"), $dto->byteArray);
        $this->assertEquals([$this->createPoco("pocoArray")], $dto->pocoArray);
        $this->assertEquals([$this->createPoco("pocoArray")], $dto->pocoList);
        $this->assertEquals(["A" => [$this->createPoco("B"), $this->createPoco("C")]], $dto->pocoLookup);
        $this->assertEquals(["A" => [["B" => $this->createPoco("C"), "D" => $this->createPoco("E")]]], $dto->pocoLookupMap);
    }

    public function assertHelloAllTypesResponse(HelloAllTypesResponse $dto): void
    {
        $this->assertEquals($dto->result, "name");
        $this->assertAllTypes($dto->allTypes);
        $this->assertAllCollectionTypes($dto->allCollectionTypes);
    }

    public function testQsValue()
    {
        $this->assertEquals("a", qsValue('a'));
        $this->assertEquals("1", qsValue(1));
        $this->assertEquals("[1,2,3]", qsValue([1, 2, 3]));
        $this->assertEquals("[a,b,c]", qsValue(['a', 'b', 'c']));
        $this->assertEquals("{a:1,b:2}", qsValue(['a' => 1, 'b' => 2]));
        $this->assertEquals("{id:1,name:foo}", qsValue(new SubType(id: 1, name: "foo")));
    }

    public function testCanGetHello()
    {
        /** @var HelloResponse $response */
        $response = $this->client->get(new Hello(name: "World"));
        $this->assertEquals("Hello, World!", $response->result);
    }

    public function testCanPostHello()
    {
        /** @var HelloResponse $response */
        $response = $this->client->post(new Hello(name: "World"));
        $this->assertEquals("Hello, World!", $response->result);
    }

    public function testCanSendUmlauts()
    {
        /** @var HelloResponse $response */
        $response = $this->client->post(new Hello(name: "üöäß"));
        $this->assertEquals("Hello, üöäß!", $response->result);
    }

    public function testDoesFireRequestAndResponseFilters()
    {
        $client = $this->createTestClient();
        $events = [];

        JsonServiceClient::$globalRequestFilter = new class($events) implements RequestFilter {
            public function __construct(public array &$events) {}
            public function call(SendContext $ctx) {
                $this->events[] = "globalRequestFilter";
            }
        };
        JsonServiceClient::$globalResponseFilter = new class($events) implements ResponseFilter {
            public function __construct(public array &$events) {}
            public function call(mixed $response, SendContext $ctx) {
                $this->events[] = "globalResponseFilter";
            }
        };
        $client->requestFilter = new class($events) implements RequestFilter {
            public function __construct(public array &$events) {}
            public function call(SendContext $ctx) {
                $this->events[] = "requestFilter";
            }
        };
        $client->responseFilter = new class($events) implements ResponseFilter {
            public function __construct(public array &$events) {}
            public function call(mixed $response, SendContext $ctx) {
                $this->events[] = "responseFilter";
            }
        };

        $response = $client->get(new Hello(name: "World"));
        $this->assertEquals("Hello, World!", $response->result);

        $this->assertEquals([
            "requestFilter",
            "globalRequestFilter",
            "responseFilter",
            "globalResponseFilter"
        ], $events);

        JsonServiceClient::$globalRequestFilter = null;
        JsonServiceClient::$globalResponseFilter = null;
    }

    public function testCanGetHelloWithCustomPath() {
        $response = $this->client->getUrl("/hello/World", responseAs: new HelloResponse());
        $this->assertEquals("Hello, World!", $response->result);
    }

    public function testCanGetHelloWithCustomPathAsRawTypes() {
        $json = $this->client->getUrl("/hello", responseAs: 'string', args: ["name" => "World"]);
        $this->assertEquals('{"result":"Hello, World!"}', $json);

        $response = $this->client->getUrl("/hello", responseAs: new HelloResponse(), args: ["name" => "World"]);
        $this->assertEquals("Hello, World!", $response->result);
    }

    public function testCanPostHelloWithCustomPath() {
        $response = $this->client->postUrl("/hello", body:new Hello(name:"World"));
        $this->assertEquals("Hello, World!", $response->result);
    }

    public function testCanPostHelloWithCustomPathJsonObject() {
        $response = $this->client->postUrl("/hello", body:json_encode(new Hello(name:"World")));
        $this->assertTrue(is_array($response));
        $this->assertEquals("Hello, World!", $response['result']);
    }

    public function testCanSerializeAllTypes() {
        $dto = $this->createAllTypes();
        $json = json_encode($dto->jsonSerialize());
        $this->assertNotEmpty($json);
    }

    public function testCanSerializeAllCollectionTypes() {
        $dto = $this->createAllCollectionTypes();
        $json = json_encode($dto->jsonSerialize());
        echo $json . "\n";
        $this->assertNotEmpty($json);
    }

    public function testCanPostHelloAllTypes() {
        $request = $this->createHelloAllTypes();
        /** @var HelloAllTypesResponse $response */
        $response  = $this->client->post($request);
        $this->assertHelloAllTypesResponse($response);
    }

    public function testCanPutHelloAllTypes() {
        $request = $this->createHelloAllTypes();
        /** @var HelloAllTypesResponse $response */
        $response  = $this->client->put($request);
        $this->assertHelloAllTypesResponse($response);
    }

    public function testDoesHandle404Error() {
        $request = new ThrowType(type:"NotFound", message:"not here");
        try {
            $this->client->put($request);
            $this->fail("should throw");
        } catch (WebServiceException $ex) {
            $status = $ex->responseStatus;
            $this->assertEquals("NotFound", $status->errorCode);
            $this->assertEquals("not here", $status->message);
        }
    }

    public function testDoesHandleValidationException() {
        $request = new ThrowValidation(email:"invalidemail");
        try {
            $this->client->post($request);
            $this->fail("should throw");
        } catch (WebServiceException $ex) {
            $status = $ex->responseStatus;
            $errors = $status->errors;
            $this->assertEquals(3, count($errors));
            $this->assertEquals($errors[0]->errorCode, $status->errorCode);
            $this->assertEquals($errors[0]->message, $status->message);

            $this->assertEquals("InclusiveBetween", $errors[0]->errorCode);
            $this->assertEquals("'Age' must be between 1 and 120. You entered 0.", $errors[0]->message);
            $this->assertEquals("Age", $errors[0]->fieldName);

            $this->assertEquals("NotEmpty", $errors[1]->errorCode);
            $this->assertEquals("'Required' must not be empty.", $errors[1]->message);
            $this->assertEquals("Required", $errors[1]->fieldName);

            $this->assertEquals("Email", $errors[2]->errorCode);
            $this->assertEquals("'Email' is not a valid email address.", $errors[2]->message);
            $this->assertEquals("Email", $errors[2]->fieldName);
        }
    }

    public function testDoesHandleAuthFailure() {
        $request = new RequiresAdmin();
        try {
            $this->client->post($request);
            $this->fail("should throw");
        } catch (WebServiceException $ex) {
            $this->assertEquals(401, $ex->statusCode);
        }
    }

    public function testCanSendReturnVoid() {
        $client = $this->createTestClient();
        $sentMethods = [];
        $client->requestFilter = new class($sentMethods) implements RequestFilter {
            public function __construct(public array &$sentMethods) {}
            public function call(SendContext $ctx) {
                $this->sentMethods[] = $ctx->method;
            }
        };

        $request = new SendReturnVoid(id:1);
        $client->send($request);
        $this->assertEquals("POST", end($sentMethods));

        $request->id = 2;
        $client->get($request);
        $this->assertEquals("GET", end($sentMethods));

        $request->id = 3;
        $client->post($request);
        $this->assertEquals("POST", end($sentMethods));

        $request->id = 4;
        $client->put($request);
        $this->assertEquals("PUT", end($sentMethods));

        $request->id = 5;
        $client->delete($request);
        $this->assertEquals("DELETE", end($sentMethods));
    }

    public function testCanGetResponseAsRawString() {
        $response = $this->client->get(new HelloString(name:"World"));
        $this->assertEquals("World", $response);
    }

    public function testShouldReturnRawText() {
        $response = $this->client->get(new ReturnString(data:"0x10"));
        $this->assertEquals("0x10", $response);
    }

    public function testCanSendRawJsonAsObject() {
        $client = $this->createTestClient();

        $request = new SendJson(id:1,name:"name");
        $xargs = '';
        $client->responseFilter = new class($xargs) implements ResponseFilter {
            public function __construct(public string &$xargs) {}
            public function call(mixed $response, SendContext $ctx) {
                $this->xargs = $ctx->responseHeaders['X-Args'];
            }
        };

        $body = ["foo" => "bar"];
        $jsonStr = $client->post($request, body:json_encode($body));
        $jsonObj = json_decode($jsonStr,associative:true);
        $this->assertEquals($xargs, "1,name");
        $this->assertEquals($jsonObj['foo'], "bar");
    }

    public function testCanSendRawString() {
        $client = $this->createTestClient();

        $body = "foo";
        $request = new SendText(id:1, name:"name", contentType:"text/plain");

        $xargs = '';
        $client->responseFilter = new class($xargs) implements ResponseFilter {
            public function __construct(public string &$xargs) {}
            public function call(mixed $response, SendContext $ctx) {
                $this->xargs = $ctx->responseHeaders['X-Args'];
            }
        };

        $str = $client->post($request, body:$body);
        $this->assertEquals($str, "foo");
    }

    public function testCanDeserializeNestedList() {
        /** @var Items $response */
        $response = $this->client->get(new GetItems());
        $this->assertEquals(count($response->results), 2);
    }

    public function testCanDeserializeNakedList() {
        /** @var ArrayList $response */
        $response = $this->client->get(new GetNakedItems());
        $this->assertEquals(count($response), 2);

        $allNames = array_map(fn($item):string => $item->name, $response->jsonSerialize());
        $this->assertEquals($allNames, ["item 1", "item 2"]);
    }

    public function testCanDeserializeCustomGenericResponseType() {
        /** @var QueryResponseAlt $response */
        $response = $this->client->get(new AltQueryItems());
        $this->assertEquals(count($response->results), 2);

        $allNames = array_map(fn($item):string => $item->name, $response->results);
        $this->assertEquals($allNames, ["item 1", "item 2"]);
    }

    public function testCanSendAllBatchRequest() {
        $client = $this->createTestClient();

        $header = '';
        $client->responseFilter = new class($header) implements ResponseFilter {
            public function __construct(public string &$header) {}
            public function call(mixed $response, SendContext $ctx) {
                $this->header = $ctx->responseHeaders['X-AutoBatch-Completed'];
            }
        };

        $requests = array_map(fn($name) => new Hello(name:$name), ["foo", "bar", "baz"]);
        $responses = $client->sendAll($requests);
        $this->assertEquals(array_map(fn($x) => $x->result, $responses),
            ['Hello, foo!', 'Hello, bar!', 'Hello, baz!']);
    }

    public function testCanSendAllOneWayIReturnBatchRequest() {
        $client = $this->createTestClient();

        $url = '';
        $client->requestFilter = new class($url) implements RequestFilter {
            public function __construct(public string &$url) {}
            public function call(SendContext $ctx) {
                $this->url = $ctx->url;
            }
        };

        $requests = array_map(fn($x) => new HelloReturnVoid(id:$x), [1, 2, 3]);
        $client->sendAllOneWay($requests);
        $this->assertStringEndsWith("/json/oneway/HelloReturnVoid[]", $url);
    }

    public function testCanPostToEchoTypes() {
        /** @var EchoTypes $response */
        $response = $this->client->post(new EchoTypes(int:1,string:"foo"));
        $this->assertEquals(1, $response->int);
        $this->assertEquals("foo", $response->string);
    }

    public function testCanGetIReturnVoidRequests() {
        $this->client->get(new HelloReturnVoid(id:1));
        $this->assertTrue(true);
    }

    public function testCanPostIReturnVoidRequests() {
        $this->client->post(new HelloReturnVoid(id:1));
        $this->assertTrue(true);
    }

    public function testCanGetUsingOnlyPathInfo() {
        /** @var HelloResponse $response */
        $response = $this->client->getUrl("/hello/World", responseAs:new HelloResponse());
        $this->assertEquals("Hello, World!", $response->result);
    }

    public function testCanGetUsingAbsoluteUrl() {
        /** @var HelloResponse $response */
        $response = $this->client->getUrl("http://test.servicestack.net/hello/World", responseAs:new HelloResponse());
        $this->assertEquals("Hello, World!", $response->result);
    }

    public function testCanGetUsingRouteAndQueryString() {
        /** @var HelloResponse $response */
        $response = $this->client->getUrl("/hello", args:["name" => "World"], responseAs:new HelloResponse());
        $this->assertEquals("Hello, World!", $response->result);
    }

    public function testCanEchoTypesUsingRoute() {
        $request = new EchoTypes(long:1, string:"foo");
        $args = $request->jsonSerialize();
        /** @var EchoTypes $response */
        $response = $this->client->getUrl("/echo/types", args:$args, responseAs:new EchoTypes());
        $this->assertEquals(1, $response->long);
        $this->assertEquals("foo", $response->string);
    }

    public function testCanHandleConnectionError() {
        $client = new JsonServiceClient("http://unknown-zzz.net");

        try {
            $client->get(new EchoTypes(int:1, string:"foo"));
            $this->fail("should throw");
        } catch (WebServiceException $ex) {
            $this->assertEquals(500, $ex->statusCode);
            $this->assertEquals("Request Failed", $ex->statusDescription);
        }
    }

    public function testCanHandleNakedList() {
        $request = new HelloList(names:['A', 'B', 'C']);
        /** @var ArrayList $response */
        $response = $this->client->get($request);
        $this->assertEquals(3, count($response));
    }

}
