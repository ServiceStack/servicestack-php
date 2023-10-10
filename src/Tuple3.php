<?php

namespace Servicestack;

use Exception;
use JsonSerializable;

/**
 * @template T1
 * @template T2
 * @template T3
 */
class Tuple3 implements JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): Tuple3 {
        $to = new Tuple3();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    public function __construct(
        /** @var T1|null */
        public mixed $item1=null,
        /** @var T2|null */
        public mixed $item2=null,
        /** @var T3|null */
        public mixed $item3=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['item1'])) $this->item1 = JsonConverters::from($this->genericArgs[0], $o['item1']);
        if (isset($o['item2'])) $this->item2 = JsonConverters::from($this->genericArgs[1], $o['item2']);
        if (isset($o['item3'])) $this->item3 = JsonConverters::from($this->genericArgs[2], $o['item3']);
    }

    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->item1)) $o['item1'] = JsonConverters::from($this->genericArgs[0], $this->item1);
        if (isset($this->item2)) $o['item2'] = JsonConverters::from($this->genericArgs[1], $this->item2);
        if (isset($this->item3)) $o['item3'] = JsonConverters::from($this->genericArgs[2], $this->item3);
        return $o;
    }
}