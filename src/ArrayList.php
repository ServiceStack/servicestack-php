<?php

namespace ServiceStack;

use ArrayObject;
use Exception;
use JsonSerializable;

class ArrayList extends ArrayObject implements JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): ArrayList {
        $to = new ArrayList();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    public function __construct(mixed ...$items) {
        parent::__construct($items, \ArrayObject::STD_PROP_LIST);
    }

    /** @throws \Exception */
    public function append($value): void {
        $cls = JsonConverters::getClass($value);
        if (str_ends_with($cls, $this->genericArgs[0]))
            parent::append($value);
        else
            throw new Exception("Can not append a '$cls' to ArrayList<" . $this->genericArgs[0] . ">");
    }

    /** @throws Exception */
    public function fromMap($o): void {
        foreach ($o as $item) {
            $el = JsonConverters::createInstance($this->genericArgs[0]);
            $el->fromMap($item);
            $this->append($el);
        }
    }

    /** @throws Exception */
    public function jsonSerialize(): array {
        return parent::getArrayCopy();
    }
}