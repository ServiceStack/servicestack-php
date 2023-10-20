<?php

namespace ServiceStack;

use JsonSerializable;

class ByteArray implements JsonSerializable
{
    public ?string $data;

    public function __construct(?string $data=null)
    {
        $this->data = isset($data) ? base64_decode($data) : null;
    }

    public static function fromRaw(string $data) {
        $to = new ByteArray();
        $to->data = $data;
        return $to;
    }

    public function jsonSerialize(): mixed
    {
        return base64_encode($this->data);
    }
}