<?php

namespace Servicestack;

use Exception;
use JsonSerializable;

// @DataContract
class StringsResponse implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var array<string>|null */
        public ?array $results=null,

        // @DataMember(Order=2)
        /** @var array<string,string>|null */
        public ?array $meta=null,

        // @DataMember(Order=3)
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('string', $o['results']);
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }

    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('string', $this->results);
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}
