<?php

namespace ServiceStack;

use Exception;
use JsonSerializable;

class NavItem implements JsonSerializable
{
    public function __construct(
        /** @var string|null */
        public ?string $label=null,
        /** @var string|null */
        public ?string $href=null,
        /** @var bool|null */
        public ?bool $exact=null,
        /** @var string|null */
        public ?string $id=null,
        /** @var string|null */
        public ?string $className=null,
        /** @var string|null */
        public ?string $iconClass=null,
        /** @var string|null */
        public ?string $iconSrc=null,
        /** @var string|null */
        public ?string $show=null,
        /** @var string|null */
        public ?string $hide=null,
        /** @var array<NavItem>|null */
        public ?array $children=null,
        /** @var array<string,string>|null */
        public ?array $meta=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['label'])) $this->label = $o['label'];
        if (isset($o['href'])) $this->href = $o['href'];
        if (isset($o['exact'])) $this->exact = $o['exact'];
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['className'])) $this->className = $o['className'];
        if (isset($o['iconClass'])) $this->iconClass = $o['iconClass'];
        if (isset($o['iconSrc'])) $this->iconSrc = $o['iconSrc'];
        if (isset($o['show'])) $this->show = $o['show'];
        if (isset($o['hide'])) $this->hide = $o['hide'];
        if (isset($o['children'])) $this->children = JsonConverters::fromArray('NavItem', $o['children']);
        if (isset($o['meta'])) $this->meta = JsonConverters::from(JsonConverters::context('Dictionary',genericArgs:['string','string']), $o['meta']);
    }

    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->label)) $o['label'] = $this->label;
        if (isset($this->href)) $o['href'] = $this->href;
        if (isset($this->exact)) $o['exact'] = $this->exact;
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->className)) $o['className'] = $this->className;
        if (isset($this->iconClass)) $o['iconClass'] = $this->iconClass;
        if (isset($this->iconSrc)) $o['iconSrc'] = $this->iconSrc;
        if (isset($this->show)) $o['show'] = $this->show;
        if (isset($this->hide)) $o['hide'] = $this->hide;
        if (isset($this->children)) $o['children'] = JsonConverters::toArray('NavItem', $this->children);
        if (isset($this->meta)) $o['meta'] = JsonConverters::to(JsonConverters::context('Dictionary',genericArgs:['string','string']), $this->meta);
        return empty($o) ? new class(){} : $o;
    }
}