<?php

namespace Servicestack;

use DateTime;
use Exception;
use JsonSerializable;

// @DataContract
class UserApiKey implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $key=null,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $keyType=null,

        // @DataMember(Order=3)
        /** @var DateTime|null */
        public ?DateTime $expiryDate=null,

        // @DataMember(Order=4)
        /** @var array<string,string>|null */
        public ?array $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['key'])) $this->key = $o['key'];
        if (isset($o['keyType'])) $this->keyType = $o['keyType'];
        if (isset($o['expiryDate'])) $this->expiryDate = $o['expiryDate'];
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }

    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->key)) $o['key'] = $this->key;
        if (isset($this->keyType)) $o['keyType'] = $this->keyType;
        if (isset($this->expiryDate)) $o['expiryDate'] = $this->expiryDate;
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return empty($o) ? new class(){} : $o;
    }
}