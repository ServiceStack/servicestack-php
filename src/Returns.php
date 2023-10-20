<?php

namespace ServiceStack;

#[\Attribute]
class Returns
{
    public function __construct(public string $type){}
}

