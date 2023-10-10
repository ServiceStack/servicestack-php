<?php

namespace Servicestack;

use Exception;
use JsonSerializable;

// @DataContract
class UnAssignRolesResponse implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var array<string>|null */
        public ?array $allRoles=null,

        // @DataMember(Order=2)
        /** @var array<string>|null */
        public ?array $allPermissions=null,

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
        if (isset($o['allRoles'])) $this->allRoles = JsonConverters::fromArray('string', $o['allRoles']);
        if (isset($o['allPermissions'])) $this->allPermissions = JsonConverters::fromArray('string', $o['allPermissions']);
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
    }

    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->allRoles)) $o['allRoles'] = JsonConverters::toArray('string', $this->allRoles);
        if (isset($this->allPermissions)) $o['allPermissions'] = JsonConverters::toArray('string', $this->allPermissions);
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        return $o;
    }
}
