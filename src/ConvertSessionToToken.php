<?php

namespace ServiceStack;

use Exception;
use JsonSerializable;

// @DataContract
class ConvertSessionToToken implements IPost, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var bool|null */
        public ?bool $preserveSession=null,

        // @DataMember(Order=2)
        /** @var array<string,string>|null */
        public ?array $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['preserveSession'])) $this->preserveSession = $o['preserveSession'];
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }

    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->preserveSession)) $o['preserveSession'] = $this->preserveSession;
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return empty($o) ? new class(){} : $o;
    }
}
