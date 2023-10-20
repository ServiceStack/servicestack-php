<?php

namespace ServiceStack;

use Exception;
use JsonSerializable;

// @DataContract
class GetNavItems implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $name=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['name'])) $this->name = $o['name'];
    }

    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->name)) $o['name'] = $this->name;
        return empty($o) ? new class(){} : $o;
    }
}
