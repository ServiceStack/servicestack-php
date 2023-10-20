<?php

namespace ServiceStack;

use DateInterval;
use Exception;
use JsonSerializable;

// @DataContract
class CancelRequestResponse implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $tag=null,

        // @DataMember(Order=2)
        /** @var DateInterval|null */
        public ?DateInterval $elapsed=null,

        // @DataMember(Order=3)
        /** @var array<string,string>|null */
        public ?array $meta=null,

        // @DataMember(Order=4)
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['tag'])) $this->tag = $o['tag'];
        if (isset($o['elapsed'])) $this->elapsed = JsonConverters::from('DateInterval', $o['elapsed']);
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }

    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->tag)) $o['tag'] = $this->tag;
        if (isset($this->elapsed)) $o['elapsed'] = JsonConverters::to('DateInterval', $this->elapsed);
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}
