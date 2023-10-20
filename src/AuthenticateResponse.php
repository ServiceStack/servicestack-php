<?php

namespace ServiceStack;

use JsonSerializable;

// @DataContract
class AuthenticateResponse implements IHasSessionId, IHasBearerToken, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $userId=null,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $sessionId=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $userName=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $displayName=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $referrerUrl=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $bearerToken=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $refreshToken=null,

        // @DataMember(Order=8)
        /** @var string|null */
        public ?string $profileUrl=null,

        // @DataMember(Order=9)
        /** @var array<string>|null */
        public ?array $roles=null,

        // @DataMember(Order=10)
        /** @var array<string>|null */
        public ?array $permissions=null,

        // @DataMember(Order=11)
        /** @var ResponseStatus|null */
        public ?ResponseStatus $responseStatus=null,

        // @DataMember(Order=12)
        /** @var array<string,string>|null */
        public ?array $meta=null
    ) {
    }

    public function fromMap($o): void {
        if (isset($o['userId'])) $this->userId = $o['userId'];
        if (isset($o['sessionId'])) $this->sessionId = $o['sessionId'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['displayName'])) $this->displayName = $o['displayName'];
        if (isset($o['referrerUrl'])) $this->referrerUrl = $o['referrerUrl'];
        if (isset($o['bearerToken'])) $this->bearerToken = $o['bearerToken'];
        if (isset($o['refreshToken'])) $this->refreshToken = $o['refreshToken'];
        if (isset($o['profileUrl'])) $this->profileUrl = $o['profileUrl'];
        if (isset($o['roles'])) $this->roles = JsonConverters::fromArray('string', $o['roles']);
        if (isset($o['permissions'])) $this->permissions = JsonConverters::fromArray('string', $o['permissions']);
        if (isset($o['responseStatus'])) $this->responseStatus = JsonConverters::from('ResponseStatus', $o['responseStatus']);
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }

    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->userId)) $o['userId'] = $this->userId;
        if (isset($this->sessionId)) $o['sessionId'] = $this->sessionId;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->displayName)) $o['displayName'] = $this->displayName;
        if (isset($this->referrerUrl)) $o['referrerUrl'] = $this->referrerUrl;
        if (isset($this->bearerToken)) $o['bearerToken'] = $this->bearerToken;
        if (isset($this->refreshToken)) $o['refreshToken'] = $this->refreshToken;
        if (isset($this->profileUrl)) $o['profileUrl'] = $this->profileUrl;
        if (isset($this->roles)) $o['roles'] = JsonConverters::toArray('string', $this->roles);
        if (isset($this->permissions)) $o['permissions'] = JsonConverters::toArray('string', $this->permissions);
        if (isset($this->responseStatus)) $o['responseStatus'] = JsonConverters::to('ResponseStatus', $this->responseStatus);
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return empty($o) ? new class(){} : $o;
    }
}