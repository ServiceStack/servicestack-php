<?php

namespace Servicestack;

class TypeContext
{
    public function __construct(public ?string $class = null, public array $genericArgs = []) {}
    public function with(?string $class = null, array $genericArgs = null) {
        $to = new TypeContext($this->$class, $this->genericArgs);
        if ($class != null)
            $to->class = $class;
        if ($genericArgs != null)
            $to->genericArgs = $genericArgs;
        return $to;
    }
}

