<?php

namespace Servicestack;

use Exception;
use JsonSerializable;

// @DataContract
class GetNavItemsResponse implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $baseUrl=null,

        // @DataMember(Order=2)
        /** @var array<NavItem>|null */
        public ?array $results=null,

        // @DataMember(Order=3)
        /** @var array<string,NavItem[]>|null */
        public ?array $navItemsMap=null,

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
        if (isset($o['baseUrl'])) $this->baseUrl = $o['baseUrl'];
        if (isset($o['results'])) $this->results = JsonConverters::fromArray('NavItem', $o['results']);
        if (isset($o['navItemsMap'])) $this->navItemsMap = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','List<NavItem>']), $o['navItemsMap']);
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }

    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->baseUrl)) $o['baseUrl'] = $this->baseUrl;
        if (isset($this->results)) $o['results'] = JsonConverters::toArray('NavItem', $this->results);
        if (isset($this->navItemsMap)) $o['navItemsMap'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','List<NavItem>']), $this->navItemsMap);
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return empty($o) ? new class(){} : $o;
    }
}
