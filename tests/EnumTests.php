<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once 'dtos.php';

use dtos\EnumFlags;
use dtos\EnumStyle;
use dtos\EnumType;
use dtos\EnumWithValues;
use dtos\HelloWithEnum;
use dtos\HelloWithEnumMap;
use PHPUnit\Framework\TestCase;
use Servicestack\JsonConverters;

class EnumTests extends TestCase
{

    public function setUp(): void
    {
        JsonConverters::registerNamespace('dtos');
    }

    public function assertHelloWithEnum(HelloWithEnum $actual, HelloWithEnum $expected) {
        $this->assertEquals($expected->enumProp, $actual->enumProp);
        $this->assertEquals($expected->enumWithValues, $actual->enumWithValues);
        $this->assertEquals($expected->nullableEnumProp, $actual->nullableEnumProp);
        $this->assertEquals($expected->enumFlags, $actual->enumFlags);
        $this->assertEquals($expected->enumStyle, $actual->enumStyle);
    }

    public function testDoesSerializeHelloWithEnumEmpty() {
        $dto = new HelloWithEnum();
        $json = json_encode($dto->jsonSerialize());
        $fromJson = JsonConverters::from('HelloWithEnum', json_decode($json, associative:true));
        $this->assertHelloWithEnum($dto, $fromJson);
    }

    public function testDoesSerializeHelloWithEnumEnumFlags() {
        $dto = new HelloWithEnum(enumFlags: EnumFlags::Value1);
        $json = json_encode($dto->jsonSerialize());
        $fromJson = JsonConverters::from('HelloWithEnum', json_decode($json, associative:true));
        $this->assertHelloWithEnum($dto, $fromJson);
    }

    public function testDoesSerializeHelloWithEnumAll() {
        $dto = new HelloWithEnum(
            enumProp: EnumType::Value2,
            enumWithValues: EnumWithValues::Value1,
            enumFlags: EnumFlags::Value2,
            enumStyle: EnumStyle::UPPER);
        $json = json_encode($dto->jsonSerialize());
        $fromJson = JsonConverters::from('HelloWithEnum', json_decode($json, associative:true));
        $this->assertHelloWithEnum($dto, $fromJson);
    }

    public function assertHelloWithEnumMap(HelloWithEnumMap $actual, HelloWithEnumMap $expected) {
        $this->assertEquals($expected->enumProp, $actual->enumProp);
        $this->assertEquals($expected->enumWithValues, $actual->enumWithValues);
        $this->assertEquals($expected->nullableEnumProp, $actual->nullableEnumProp);
        $this->assertEquals($expected->enumFlags, $actual->enumFlags);
        $this->assertEquals($expected->enumStyle, $actual->enumStyle);
    }

    public function testDoesSerializeHelloWithEnumMapEmpty() {
        $dto = new HelloWithEnumMap();
        $json = json_encode($dto->jsonSerialize());
        $fromJson = JsonConverters::from('HelloWithEnumMap', json_decode($json, associative:true));
        $this->assertHelloWithEnumMap($dto, $fromJson);
    }

    public function testDoesSerializeHelloWithEnumMapAll() {
        $dto = new HelloWithEnumMap(
            enumProp: [EnumType::Value2->name => EnumType::Value2],
            enumWithValues: [EnumWithValues::Value1->name => EnumWithValues::Value1],
            enumFlags: [EnumFlags::Value2->name => EnumFlags::Value2],
            enumStyle: [EnumStyle::UPPER->name => EnumStyle::UPPER]);
        $json = json_encode($dto->jsonSerialize());
        echo $json . PHP_EOL;
        $fromJson = JsonConverters::from('HelloWithEnumMap', json_decode($json, associative:true));
        $this->assertHelloWithEnumMap($dto, $fromJson);
    }
}
