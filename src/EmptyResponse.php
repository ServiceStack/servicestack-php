<?php

namespace Servicestack;

use Exception;
use JsonSerializable;

// @DataContract
class EmptyResponse implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }

    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return $o;
    }
}