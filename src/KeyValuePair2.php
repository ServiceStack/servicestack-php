<?php

namespace Servicestack;

use Exception;
use JsonSerializable;

/**
 * @template TKey
 * @template TValue
 */
class KeyValuePair2 implements JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): KeyValuePair2 {
        $to = new KeyValuePair2();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    public function __construct(
        /** @var TKey|null */
        public mixed $key=null,
        /** @var TValue|null */
        public mixed $value=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['key'])) $this->key = JsonConverters::from($this->genericArgs[0], $o['key']);
        if (isset($o['value'])) $this->value = JsonConverters::from($this->genericArgs[1], $o['value']);
    }

    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->key)) $o['key'] = JsonConverters::from($this->genericArgs[0], $this->key);
        if (isset($this->value)) $o['value'] = JsonConverters::from($this->genericArgs[1], $this->value);
        return empty($o) ? new class(){} : $o;
    }
}
