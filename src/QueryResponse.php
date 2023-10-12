<?php

namespace Servicestack;

use Exception;
use JsonSerializable;

// @DataContract
/**
 * @template T
 */
class QueryResponse implements JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): QueryResponse {
        $to = new QueryResponse();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    public function __construct(
        // @DataMember(Order=1)
        /** @var int */
        public int $offset=0,

        // @DataMember(Order=2)
        /** @var int */
        public int $total=0,

        // @DataMember(Order=3)
        /** @var array<T>|null */
        public ?array $results=null,

        // @DataMember(Order=4)
        /** @var array<string,string>|null */
        public ?array $meta=null,

        // @DataMember(Order=5)
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['offset'])) $this->offset = $o['offset'];
        if (isset($o['total'])) $this->total = $o['total'];
        if (isset($o['results'])) $this->results = JsonConverters::fromArray($this->genericArgs[0], $o['results']);
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }

    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->offset)) $o['offset'] = $this->offset;
        if (isset($this->total)) $o['total'] = $this->total;
        if (isset($this->results)) $o['results'] = JsonConverters::toArray($this->genericArgs[0], $this->results);
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}
