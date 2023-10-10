<?php

namespace Servicestack;

interface Convertible
{
    public function fromMap(mixed $o, TypeContext $ctx): void;
}
