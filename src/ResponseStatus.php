<?php

namespace Servicestack;

use Exception;
use JsonSerializable;

// @DataContract
class ResponseStatus implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $errorCode=null,

        // @DataMember(Order=2)
        /** @var string|null */
        public ?string $message=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $stackTrace=null,

        // @DataMember(Order=4)
        /** @var array<ResponseError>|null */
        public ?array $errors=null,

        // @DataMember(Order=5)
        /** @var array<string,string>|null */
        public ?array $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['errorCode'])) $this->errorCode = $o['errorCode'];
        if (isset($o['message'])) $this->message = $o['message'];
        if (isset($o['stackTrace'])) $this->stackTrace = $o['stackTrace'];
        if (isset($o['errors'])) $this->errors = JsonConverters::fromArray('ResponseError', $o['errors']);
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }

    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->errorCode)) $o['errorCode'] = $this->errorCode;
        if (isset($this->message)) $o['message'] = $this->message;
        if (isset($this->stackTrace)) $o['stackTrace'] = $this->stackTrace;
        if (isset($this->errors)) $o['errors'] = JsonConverters::toArray('ResponseError', $this->errors);
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return empty($o) ? new class(){} : $o;
    }
}
