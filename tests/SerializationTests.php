<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once 'Config.php';
require_once 'dtos.php';

use dtos\AllCollectionTypes;
use dtos\AllTypes;
use dtos\SubType;
use PHPUnit\Framework\TestCase;
use ServiceStack\ByteArray;
use ServiceStack\JsonConverters;

class SerializationTests extends TestCase
{
    const JSON_ALL_TYPES = '{"id":1,"byte":2,"short":3,"int":4,"long":5,"uShort":6,"uInt":7,"uLong":8,"float":1.1,"double":2.2,"decimal":3,"string":"string","dateTime":"\/Date(978307200000)\/","timeSpan":"PT1H","dateTimeOffset":"\/Date(978307200000)\/","guid":"ea762009b66c410b9bf5ce21ad519249","char":"c","stringList":["A","B","C"],"stringArray":["D","E","F"],"stringMap":{"A":"D","B":"E","C":"F"},"intStringMap":{"1":"A","2":"B","3":"C"},"subType":{"id":1,"name":"name"}}';
    const JSON_ALL_COLLECTION_TYPES = '{"intArray":[1,2,3],"intList":[4,5,6],"stringArray":["A","B","C"],"stringList":["D","E","F"],"byteArray":"QUJD","pocoArray":[{"name":"pocoArray"}],"pocoList":[{"name":"pocoList"}],"pocoLookup":{"A":[{"name":"B"},{"name":"C"}]},"pocoLookupMap":{"A":[{"B":{"name":"C"}},{"D":{"name":"E"}}]}}';

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
        $this->assertEquals([4, 5, 6], $dto->intList);
        $this->assertEquals(["A", "B", "C"], $dto->stringArray);
        $this->assertEquals(["D", "E", "F"], $dto->stringList);
        $this->assertEquals(ByteArray::fromRaw(b"ABC"), $dto->byteArray);
        $this->assertEquals([Config::createPoco("pocoArray")], $dto->pocoArray);
        $this->assertEquals([Config::createPoco("pocoList")], $dto->pocoList);
        $this->assertEquals(["A" => [Config::createPoco("B"), Config::createPoco("C")]], $dto->pocoLookup);
        $this->assertEquals(["A" => [["B" => Config::createPoco("C")], ["D" => Config::createPoco("E")]]], $dto->pocoLookupMap);
    }

    public function testDoesSerializeIntArray() {
        $intArray = JsonConverters::toArray('int', [1,2,3]);
        $this->assertEquals('[1,2,3]', json_encode($intArray));
    }

    public function testDoesSerializeAllTypes() {
        $dto = Config::createAllTypes();
        $json = json_encode($dto->jsonSerialize());
        $this->assertEquals(static::JSON_ALL_TYPES, $json);
        $fromJson = JsonConverters::from('AllTypes', json_decode($json, associative:true));
        $this->assertAllTypes($fromJson);
    }

    public function testDoesSerializeAllCollectionTypes() {
        $dto = Config::createAllCollectionTypes();
        $json = json_encode($dto->jsonSerialize());
        $this->assertEquals(static::JSON_ALL_COLLECTION_TYPES, $json);
        $fromJson = JsonConverters::from('AllCollectionTypes', json_decode($json, associative:true));
        $this->assertAllCollectionTypes($fromJson);
    }
}