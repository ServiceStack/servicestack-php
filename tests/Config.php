<?php

use dtos\AllCollectionTypes;
use dtos\AllTypes;
use dtos\EchoComplexTypes;
use dtos\HelloAllTypes;
use dtos\Poco;
use dtos\SubType;
use Servicestack\ByteArray;
use Servicestack\JsonServiceClient;

class Config
{
    public static function createTestClient(): JsonServiceClient
    {
//        return new JsonServiceClient("https://localhost:5001");
        return new JsonServiceClient("https://test.servicestack.net");
    }

    public static function createHelloAllTypes()
    {
        return new HelloAllTypes(name:"name",
            allTypes: static::createAllTypes(),
            allCollectionTypes: static::createAllCollectionTypes());
    }

    public static function createAllTypes(): AllTypes
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

    public static function createAllCollectionTypes(): AllCollectionTypes
    {
        return new AllCollectionTypes(
            intArray: [1, 2, 3],
            intList: [4, 5, 6],
            stringArray: ["A", "B", "C"],
            stringList: ["D", "E", "F"],
            byteArray: ByteArray::fromRaw(b"ABC"),
            pocoArray: [static::createPoco("pocoArray")],
            pocoList: [static::createPoco("pocoList")],
            pocoLookup: ["A" => [static::createPoco("B"), static::createPoco("C")]],
            pocoLookupMap: ["A" => [["B" => static::createPoco("C")], ["D" => static::createPoco("E")]]]
        );
    }

    public static function createPoco(string $name): Poco
    {
        return new Poco(name: $name);
    }

    public static function createEchoComplexTypes(): EchoComplexTypes
    {
        return new EchoComplexTypes(
            subType: new SubType(id: 1, name: "foo"),
            subTypes: [new SubType(id: 2, name: "bar"), new SubType(id: 3, name: "baz")],
            subTypeMap: ["a" => new SubType(id: 4, name: "qux")],
            stringMap: ["a" => "b"],
            intStringMap: [1 => "A"]);
    }

}