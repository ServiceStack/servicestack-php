<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once 'dtos.php';

use dtos\HelloAllTypes;
use dtos\HelloAllTypesResponse;
use PHPUnit\Framework\TestCase;
use Servicestack\ByteArray;
use ServiceStack\JsonServiceClient;
use dtos\Hello;
use dtos\HelloResponse;
use dtos\AllCollectionTypes;
use dtos\AllTypes;
use dtos\EchoComplexTypes;
use dtos\Poco;
use dtos\SubType;
use Servicestack\RequestFilter;
use Servicestack\ResponseFilter;
use Servicestack\SendContext;
use function Servicestack\isMultiByte;

final class ClientTests extends TestCase
{
    public JsonServiceClient $client;

    protected function setUp(): void
    {
        $this->client = $this->createTestClient();
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
        $this->assertEquals("a", $this->client->qsValue('a'));
        $this->assertEquals("1", $this->client->qsValue(1));
        $this->assertEquals("[1,2,3]", $this->client->qsValue([1, 2, 3]));
        $this->assertEquals("[a,b,c]", $this->client->qsValue(['a', 'b', 'c']));
        $this->assertEquals("{a:1,b:2}", $this->client->qsValue(['a' => 1, 'b' => 2]));
        $this->assertEquals("{id:1,name:foo}", $this->client->qsValue(new SubType(id: 1, name: "foo")));
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
            public function call(mixed $response) {
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
            public function call(mixed $response) {
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

}