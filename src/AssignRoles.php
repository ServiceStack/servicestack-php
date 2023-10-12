<?php

namespace Servicestack;

// @Route("/assignroles", "POST")
// @DataContract
use JsonSerializable;

#[Returns('AssignRolesResponse')]
class AssignRoles implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $userName=null,

        // @DataMember(Order=2)
        /** @var array<string>|null */
        public ?array $permissions=null,

        // @DataMember(Order=3)
        /** @var array<string>|null */
        public ?array $roles=null,

        // @DataMember(Order=4)
        /** @var array<string,string>|null */
        public ?array $meta=null
    ) {
    }

    public function fromMap($o): void {
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['permissions'])) $this->permissions = JsonConverters::fromArray('string', $o['permissions']);
        if (isset($o['roles'])) $this->roles = JsonConverters::fromArray('string', $o['roles']);
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }

    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->permissions)) $o['permissions'] = JsonConverters::toArray('string', $this->permissions);
        if (isset($this->roles)) $o['roles'] = JsonConverters::toArray('string', $this->roles);
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'AssignRoles'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new AssignRolesResponse(); }
}
