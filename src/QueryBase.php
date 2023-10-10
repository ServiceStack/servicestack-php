<?php

namespace Servicestack;

use Exception;
use JsonSerializable;

// @DataContract
class QueryBase implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var int|null */
        public ?int $skip=null,

        // @DataMember(Order=2)
        /** @var int|null */
        public ?int $take=null,

        // @DataMember(Order=3)
        /** @var string|null */
        public ?string $orderBy=null,

        // @DataMember(Order=4)
        /** @var string|null */
        public ?string $orderByDesc=null,

        // @DataMember(Order=5)
        /** @var string|null */
        public ?string $include=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $fields=null,

        // @DataMember(Order=7)
        /** @var array<string,string>|null */
        public ?array $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['skip'])) $this->skip = $o['skip'];
        if (isset($o['take'])) $this->take = $o['take'];
        if (isset($o['orderBy'])) $this->orderBy = $o['orderBy'];
        if (isset($o['orderByDesc'])) $this->orderByDesc = $o['orderByDesc'];
        if (isset($o['include'])) $this->include = $o['include'];
        if (isset($o['fields'])) $this->fields = $o['fields'];
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }

    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->skip)) $o['skip'] = $this->skip;
        if (isset($this->take)) $o['take'] = $this->take;
        if (isset($this->orderBy)) $o['orderBy'] = $this->orderBy;
        if (isset($this->orderByDesc)) $o['orderByDesc'] = $this->orderByDesc;
        if (isset($this->include)) $o['include'] = $this->include;
        if (isset($this->fields)) $o['fields'] = $this->fields;
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return $o;
    }
}