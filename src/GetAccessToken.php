<?php

namespace ServiceStack;

use Exception;
use JsonSerializable;

// @Route("/access-token")
// @DataContract
#[Returns('GetAccessTokenResponse')]
class GetAccessToken implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $refreshToken=null,

        // @DataMember(Order=2)
        /** @var array<string,string>|null */
        public ?array $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['refreshToken'])) $this->refreshToken = $o['refreshToken'];
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }

    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->refreshToken)) $o['refreshToken'] = $this->refreshToken;
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'GetAccessToken'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new GetAccessTokenResponse(); }
}