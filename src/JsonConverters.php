<?php

namespace ServiceStack;

use Exception;
use ReflectionClass;
use ReflectionEnum;
use UnitEnum;

class JsonConverters
{
    private static $instance;

    private function __construct()
    {
    }

    public array $converters = [];
    public array $namespaces = ["ServiceStack", "dtos"];

    public static function getInstance(): JsonConverters
    {
        if (!isset(self::$instance)) {
            self::$instance = new self();
            self::$instance->converters = [
                'string' => new StringConverter(),
                'String' => new StringConverter(),
                'int' => new IntConverter(),
                'float' => new FloatConverter(),
                'bool' => new BoolConverter(),
                'DateTime' => new DateTimeConverter(),
                'DateInterval' => new DateIntervalConverter(),
                'List' => new ListConverter(),
                'Dictionary' => new DictionaryConverter(),
                'ByteArray' => new ByteArrayConverter(),
                UnitEnum::class => new EnumConverter(),
            ];
        }
        return self::$instance;
    }

    public static function registerConverter(string $class, Converter $converter): void
    {
        JsonConverters::getInstance()->converters[$class] = $converter;
    }

    public static function getConverter(string $class): Converter|null
    {
        if (isset(JsonConverters::getInstance()->converters[$class]))
            return JsonConverters::getInstance()->converters[$class];
        return null;
    }

    public static function registerNamespace(string $namespace)
    {
        if (!in_array($namespace, JsonConverters::getInstance()->namespaces)) {
            JsonConverters::getInstance()->namespaces[] = $namespace;
        }
    }

    /**
     * @throws Exception
     */
    public static function convert(TypeContext|string $class, $from) {
        $ctx = is_string($class)
            ? new TypeContext(class: $class)
            : $class;

        $converter = JsonConverters::getConverter($ctx->class);
        if ($converter != null) {
            $to = $converter->fromJson($from, $ctx);
            return $to;
        }

        $el = JsonConverters::createInstance($ctx->class, $ctx->genericArgs);
        if ($el instanceof UnitEnum)
        {
            $converter = JsonConverters::getInstance()->converters[UnitEnum::class];
            return $converter->fromJson($from, $ctx);
        }

        if (str_starts_with($ctx->class, "List<")) {
            $argType = substr($ctx->class,5,-1);
            $to = JsonConverters::fromArray($argType, $from);
            return $to;
        }

        if (str_starts_with($ctx->class, "Dictionary<")) {
            $argTypes = explode(",", substr($ctx->class,11,-1));
            $to = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:$argTypes), $from);
            return $to;
        }

        if (!is_object($el) || !method_exists($el, 'fromMap')) {
            throw new Exception("fromMap does not exist on $ctx->class");
        }
        $el->fromMap($from);

        return $el;
    }

    /**
     * @throws Exception
     */
    public static function from(TypeContext|string $class, $val): mixed
    {
        if (!isset($val)) return null;
        $ctx = is_string($class)
            ? new TypeContext(class: $class)
            : $class;

        $to = JsonConverters::convert($ctx, $val);
        return $to;
    }

    /**
     * @throws Exception
     */
    public static function fromArray(TypeContext|string $itemClass, $val): mixed
    {
        if (!isset($val)) return null;
        $ctx = is_string($itemClass)
            ? new TypeContext(class: $itemClass)
            : $itemClass;
        if (count($val) > 0 && (!is_object($val[0]) || get_class($val[0]) != $itemClass)) {
            $to = [];
            foreach ($val as $item) {
                $el = JsonConverters::convert($ctx, $item);
                $to[] = $el;
            }
            return $to;
        }
        return $val;
    }

    /**
     * @throws Exception
     */
    public static function to(TypeContext|string $class, $val): mixed
    {
        $ctx = is_string($class)
            ? new TypeContext(class: $class)
            : $class;

        $converter = JsonConverters::getConverter($ctx->class);
        if ($converter == null && $val instanceof UnitEnum)
        {
            $converter = JsonConverters::getConverter(UnitEnum::class);
        }
        
        if ($converter != null) {
            $to = $converter->toJson($val, $ctx);
            return $to;
        }

        return $val;
    }

    /**
     * @throws Exception
     */
    public static function toArray(TypeContext|string $itemClass, $val): mixed
    {
        if (!isset($val)) return null;
        $to = [];

        $ctx = is_string($itemClass)
            ? new TypeContext(class: $itemClass)
            : $itemClass;

        if (!is_array($val))
            throw new Exception("$ctx->class is not an array");

        foreach ($val as $item)
        {
            $to[] = JsonConverters::to($ctx, $item);
        }

        return $to;
    }

    public static function context(?string $class = null, array $genericArgs = []): TypeContext
    {
        $to = new TypeContext(class: $class, genericArgs: $genericArgs);
        return $to;
    }

    public static function getClass(mixed $value) {
        if (!isset($value))
            return null;
        if (is_object($value))
            return nameof($value);
        if (is_string($value))
            return 'string';
        if (is_bool($value))
            return 'bool';
        if (is_int($value))
            return 'int';
        if (is_float($value))
            return 'float';
        if (is_array($value))
            return 'array';
        throw new Exception("Could not find class name of " . $value);
    }

    /**
     * @throws Exception
     */
    public static function createInstance(string $name, ?array $genericArgs = null): mixed
    {
        if (class_exists($name)) {
            $to = new $name();
            if (property_exists($to, 'genericArgs')) {
                $to->genericArgs = $genericArgs;
            }
            return $to;
        }
        foreach (JsonConverters::getInstance()->namespaces as $namespace) {
            $type = $namespace . "\\" . $name;
            if (class_exists($type)) {
                $r = new ReflectionClass($type);
                if ($r->isEnum())
                {
                    $r = new ReflectionEnum($type);
                    $case = $r->getCases()[0];
                    return $case->getValue();
                }
                $to = new $type();
                if (property_exists($to, 'genericArgs')) {
                    $to->genericArgs = $genericArgs;
                }
                return $to;
            }
        }
        if (str_starts_with($name, "List<"))
            return [];
        if (str_starts_with($name, "Dictionary<"))
            return [];

        throw new Exception("Could not create instance of $name, namespaces: " . implode(",", JsonConverters::getInstance()->namespaces));
    }

}
