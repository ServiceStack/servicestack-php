<?php

namespace ServiceStack;

use Exception;
use JsonSerializable;

// @Route("/apikeys/regenerate")
// @Route("/apikeys/regenerate/{Environment}")
// @DataContract
#[Returns('RegenerateApiKeysResponse')]
class RegenerateApiKeys implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $environment=null,

        // @DataMember(Order=2)
        /** @var array<string,string>|null */
        public ?array $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['environment'])) $this->environment = $o['environment'];
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }

    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->environment)) $o['environment'] = $this->environment;
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'RegenerateApiKeys'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new RegenerateApiKeysResponse(); }
}