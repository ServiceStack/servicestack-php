<?php

namespace Servicestack;

use DateInterval;
use DateTime;
use Exception;
use ReflectionEnum;

interface Converter
{
    function fromJson($o, TypeContext $ctx): mixed;

    function toJson($value, TypeContext $ctx): mixed;
}

class ListConverter implements Converter
{
    function fromJson($o, TypeContext $ctx): mixed
    {
        return "$o";
    }

    function toJson($value, TypeContext $ctx): mixed
    {
        return "$value";
    }
}

class DictionaryConverter implements Converter
{
    function fromJson($o, TypeContext $ctx): mixed
    {
        return $o;
    }

    function toJson($value, TypeContext $ctx): mixed
    {
        return $value;
    }
}

class StringConverter implements Converter
{
    function fromJson($o, TypeContext $ctx): mixed
    {
        return $o;
    }

    function toJson($value, TypeContext $ctx): mixed
    {
        return $value;
    }
}

class ByteArrayConverter implements Converter
{
    function fromJson($o, TypeContext $ctx): mixed
    {
        return new ByteArray($o);
    }

    function toJson($value, TypeContext $ctx): mixed
    {
        return $value->jsonSerialize();
    }
}

class DateTimeConverter implements Converter
{
    function fromJson($o, TypeContext $ctx): mixed
    {
        $parts = preg_split("/[()-]/", $o);
        $unixTimeMs = intval($parts[1]);
        $d = new DateTime();
        $seconds = (int)($unixTimeMs / 1000.0);
        $d->setTimestamp($seconds);
        $ms = round((($unixTimeMs / 1000.0) - $seconds) * 1000);
        if ($ms > 0)
            $d->modify("+$ms ms");
        return $d;
    }

    function toJson($value, TypeContext $ctx): mixed
    {
        return "/Date(" . $value->format('Uv') . ")/";
    }
}

class DateIntervalConverter implements Converter
{
    /**
     * @throws Exception
     */
    function fromJson($o, TypeContext $ctx): mixed
    {
        return new DateInterval($o);
    }

    function toJson($value, TypeContext $ctx): mixed
    {
        $date = NULL;
        if ($value->y) $date .= $value->y . 'Y';
        if ($value->m) $date .= $value->m . 'M';
        if ($value->d) $date .= $value->d . 'D';

        $time = NULL;
        if ($value->h) $time .= $value->h . 'H';
        if ($value->i) $time .= $value->i . 'M';
        if ($value->s) $time .= $value->s . 'S';
        if ($time) $time = 'T' . $time;

        $text = 'P' . $date . $time;
        if ($text == 'P') return 'PT0S';
        return $text;
    }
}

class BoolConverter implements Converter
{
    function fromJson($o, TypeContext $ctx): mixed
    {
        $boolval = (is_string($o) ? filter_var($o, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) : (bool)$o);
        return $boolval === null ? false : $boolval;
    }

    function toJson($value, TypeContext $ctx): mixed
    {
        return (bool)$value;
    }
}

class IntConverter implements Converter
{
    function fromJson($o, TypeContext $ctx): mixed
    {
        return intval($o);
    }

    function toJson($value, TypeContext $ctx): mixed
    {
        return "$value";
    }
}

class FloatConverter implements Converter
{
    function fromJson($o, TypeContext $ctx): mixed
    {
        return floatval($o);
    }

    function toJson($value, TypeContext $ctx): mixed
    {
        return "$value";
    }
}

class EnumConverter implements Converter
{
    /**
     * @throws Exception
     */
    function fromJson($o, TypeContext $ctx): mixed
    {
        $r = null;
        if (enum_exists($ctx->class)) {
            $r = new ReflectionEnum($ctx->class);
        } else {
            foreach (JsonConverters::getInstance()->namespaces as $namespace) {
                $type = $namespace . "\\" . $ctx->class;
                if (enum_exists($type)) {
                    $r = new ReflectionEnum($type);
                    break;
                }
            }
        }
        if ($r == null)
            throw new Exception("Could not create $ctx->class Enum from $o");

        if ($r->hasCase($o)) {
            return $r->getCase($o)->getValue();
        }

        throw new Exception("Invalid $ctx->class Enum '$o'");
    }

    function toJson($value, TypeContext $ctx): mixed
    {
        return $value->value;
    }
}
