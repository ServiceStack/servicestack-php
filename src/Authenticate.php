<?php

namespace Servicestack;

use JsonSerializable;

/** @description Sign In */
// @Route("/auth", "OPTIONS,GET,POST,DELETE")
// @Route("/auth/{provider}", "OPTIONS,GET,POST,DELETE")
// @Api(Description="Sign In")
// @DataContract
#[Returns('AuthenticateResponse')]
class Authenticate implements IReturn, IPost, JsonSerializable
{
    public function __construct(
        /** @description AuthProvider, e.g. credentials */
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $provider=null,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $state=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $oauth_token=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $oauth_verifier=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $userName=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $password=null,

        // @DataMember(Order=7)
        /** @var bool|null */
        public ?bool $rememberMe=null,

        // @DataMember(Order=9)
        /** @var string|null */
        public ?string $errorView=null,

        // @DataMember(Order=10)
        /** @var string|null */
        public ?string $nonce=null,

        // @DataMember(Order=11)
        /** @var string|null */
        public ?string $uri=null,

        // @DataMember(Order=12)
        /** @var string|null */
        public ?string $response=null,

        // @DataMember(Order=13)
        /** @var string|null */
        public ?string $qop=null,

        // @DataMember(Order=14)
        /** @var string|null */
        public ?string $nc=null,

        // @DataMember(Order=15)
        /** @var string|null */
        public ?string $cnonce=null,

        // @DataMember(Order=17)
        /** @var string|null */
        public ?string $accessToken=null,

        // @DataMember(Order=18)
        /** @var string|null */
        public ?string $accessTokenSecret=null,

        // @DataMember(Order=19)
        /** @var string|null */
        public ?string $scope=null,

        // @DataMember(Order=20)
        /** @var string|null */
        public ?string $returnUrl=null,

        // @DataMember(Order=21)
        /** @var array<string,string>|null */
        public ?array $meta=null
    ) {
    }

    public function fromMap($o): void {
        if (isset($o['provider'])) $this->provider = $o['provider'];
        if (isset($o['state'])) $this->state = $o['state'];
        if (isset($o['oauth_token'])) $this->oauth_token = $o['oauth_token'];
        if (isset($o['oauth_verifier'])) $this->oauth_verifier = $o['oauth_verifier'];
        if (isset($o['userName'])) $this->userName = $o['userName'];
        if (isset($o['password'])) $this->password = $o['password'];
        if (isset($o['rememberMe'])) $this->rememberMe = $o['rememberMe'];
        if (isset($o['errorView'])) $this->errorView = $o['errorView'];
        if (isset($o['nonce'])) $this->nonce = $o['nonce'];
        if (isset($o['uri'])) $this->uri = $o['uri'];
        if (isset($o['response'])) $this->response = $o['response'];
        if (isset($o['qop'])) $this->qop = $o['qop'];
        if (isset($o['nc'])) $this->nc = $o['nc'];
        if (isset($o['cnonce'])) $this->cnonce = $o['cnonce'];
        if (isset($o['accessToken'])) $this->accessToken = $o['accessToken'];
        if (isset($o['accessTokenSecret'])) $this->accessTokenSecret = $o['accessTokenSecret'];
        if (isset($o['scope'])) $this->scope = $o['scope'];
        if (isset($o['returnUrl'])) $this->returnUrl = $o['returnUrl'];
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }

    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->provider)) $o['provider'] = $this->provider;
        if (isset($this->state)) $o['state'] = $this->state;
        if (isset($this->oauth_token)) $o['oauth_token'] = $this->oauth_token;
        if (isset($this->oauth_verifier)) $o['oauth_verifier'] = $this->oauth_verifier;
        if (isset($this->userName)) $o['userName'] = $this->userName;
        if (isset($this->password)) $o['password'] = $this->password;
        if (isset($this->rememberMe)) $o['rememberMe'] = $this->rememberMe;
        if (isset($this->errorView)) $o['errorView'] = $this->errorView;
        if (isset($this->nonce)) $o['nonce'] = $this->nonce;
        if (isset($this->uri)) $o['uri'] = $this->uri;
        if (isset($this->response)) $o['response'] = $this->response;
        if (isset($this->qop)) $o['qop'] = $this->qop;
        if (isset($this->nc)) $o['nc'] = $this->nc;
        if (isset($this->cnonce)) $o['cnonce'] = $this->cnonce;
        if (isset($this->accessToken)) $o['accessToken'] = $this->accessToken;
        if (isset($this->accessTokenSecret)) $o['accessTokenSecret'] = $this->accessTokenSecret;
        if (isset($this->scope)) $o['scope'] = $this->scope;
        if (isset($this->returnUrl)) $o['returnUrl'] = $this->returnUrl;
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return empty($o) ? new class(){} : $o;
    }
    public function getTypeName(): string { return 'Authenticate'; }
    public function getMethod(): string { return 'POST'; }
    public function createResponse(): mixed { return new AuthenticateResponse(); }
}