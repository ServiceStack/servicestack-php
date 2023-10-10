<?php

namespace Servicestack;

use Exception;
use JsonSerializable;

/** @description Sign Up */
// @Route("/register", "PUT,POST")
// @Api(Description="Sign Up")
// @DataContract
#[Returns('RegisterResponse')]
class Register implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $userName=null,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $firstName=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $lastName=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $displayName=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $email=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $password=null,

        // @DataMember(Order=7)
        /** @var string|null */
        public ?string $confirmPassword=null,

        // @DataMember(Order=8)
        /** @var bool|null */
        public ?bool $autoLogin=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $errorView=null,

        // @DataMember(Order=11)
        /** @var array<string,string>|null */
        public ?array $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['firstName'])) $this->firstName = $o['firstName'];
        if (isset($o['lastName'])) $this->lastName = $o['lastName'];
        if (isset($o['displayName'])) $this->displayName = $o['displayName'];
        if (isset($o['email'])) $this->email = $o['email'];
        if (isset($o['password'])) $this->password = $o['password'];
        if (isset($o['confirmPassword'])) $this->confirmPassword = $o['confirmPassword'];
        if (isset($o['autoLogin'])) $this->autoLogin = $o['autoLogin'];
        if (isset($o['errorView'])) $this->errorView = $o['errorView'];
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }

    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->firstName)) $o['firstName'] = $this->firstName;
        if (isset($this->lastName)) $o['lastName'] = $this->lastName;
        if (isset($this->displayName)) $o['displayName'] = $this->displayName;
        if (isset($this->email)) $o['email'] = $this->email;
        if (isset($this->password)) $o['password'] = $this->password;
        if (isset($this->confirmPassword)) $o['confirmPassword'] = $this->confirmPassword;
        if (isset($this->autoLogin)) $o['autoLogin'] = $this->autoLogin;
        if (isset($this->errorView)) $o['errorView'] = $this->errorView;
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return $o;
    }
    public function getTypeName(): string { return 'Register'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new RegisterResponse(); }
}