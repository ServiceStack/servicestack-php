<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once 'dtos.php';

use PHPUnit\Framework\TestCase;
use ServiceStack\JsonServiceClient;
use dtos\Hello;
use dtos\HelloResponse;
use dtos\AllCollectionTypes;
use dtos\AllTypes;
use dtos\EchoComplexTypes;
use dtos\Poco;
use dtos\SubType;

final class ClientTests extends TestCase
{
    public JsonServiceClient $client;
    protected function setUp(): void
    {
//        $this->client = new JsonServiceClient("https://localhost:5001");
        $this->client = new JsonServiceClient("https://test.servicestack.net");
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
            intlist: [1, 2, 3],
            stringArray: ["A", "B", "C"],
            stringList: ["D", "E", "F"],
            byteArray: b"ABC",  # base64(ABC)
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
        $this->assertEquals(b"ABC", $dto->byteArray);
        $this->assertEquals([$this->createPoco("pocoArray")], $dto->pocoArray);
        $this->assertEquals([$this->createPoco("pocoArray")], $dto->pocoList);
        $this->assertEquals(["A" => [$this->createPoco("B"), $this->createPoco("C")]], $dto->pocoLookup);
        $this->assertEquals(["A" => [["B" => $this->createPoco("C"), "D" => $this->createPoco("E")]]], $dto->pocoLookupMap);
    }

    public function testQsValue()
    {
        $this->assertEquals("a", $this->client->qsValue('a'));
        $this->assertEquals("1", $this->client->qsValue(1));
        $this->assertEquals("[1,2,3]", $this->client->qsValue([1,2,3]));
        $this->assertEquals("[a,b,c]", $this->client->qsValue(['a','b','c']));
        $this->assertEquals("{a:1,b:2}", $this->client->qsValue(['a' => 1, 'b' => 2]));
        $this->assertEquals("{id:1,name:foo}", $this->client->qsValue(new SubType(id:1,name:"foo")));
    }

    public function testCanGetHello()
    {
        /** @var HelloResponse $response */
        $response = $this->client->get(new Hello(name:"World"));
        $this->assertEquals("Hello, World!", $response->result);
    }
}