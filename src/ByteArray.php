<?php

namespace Servicestack;

use JsonSerializable;

class ByteArray implements JsonSerializable
{
    public string $data;

    public function __construct(string $data)
    {
        $this->data = base64_decode($data);
    }

    public function jsonSerialize(): mixed
    {
        return base64_encode($this->data);
    }
}