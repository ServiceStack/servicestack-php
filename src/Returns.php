<?php

namespace Servicestack;

#[\Attribute]
class Returns
{
    public function __construct(public string $type){}
}

