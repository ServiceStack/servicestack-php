<?php

namespace ServiceStack;

interface Convertible
{
    public function fromMap(mixed $o, TypeContext $ctx): void;
}
