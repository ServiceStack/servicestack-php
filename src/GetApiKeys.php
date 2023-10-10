<?php

namespace Servicestack;

use Exception;
use JsonSerializable;

// @Route("/apikeys")
// @Route("/apikeys/{Environment}")
// @DataContract
#[Returns('GetApiKeysResponse')]
class GetApiKeys implements IReturn, IGet, JsonSerializable
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
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->environment)) $o['environment'] = $this->environment;
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return $o;
    }
    public function getTypeName(): string { return 'GetApiKeys'; }
    public function getMethod(): string { return 'GET'; }
    public function createResponse(): mixed { return new GetApiKeysResponse(); }
}