<?php

namespace ServiceStack;

use Exception;
use JsonSerializable;

// @DataContract
#[Returns('UpdateEventSubscriberResponse')]
// @DataContract
class UpdateEventSubscriber implements IPost, JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var string|null */
        public ?string $id=null,

        // @DataMember(Order=2)
        /** @var string[]|null */
        public ?array $subscribeChannels=null,

        // @DataMember(Order=3)
        /** @var string[]|null */
        public ?array $unsubscribeChannels=null
    ) {
    }

    /** @throws Exception */
    public function fromMap($o): void {
        if (isset($o['id'])) $this->id = $o['id'];
        if (isset($o['subscribeChannels'])) $this->subscribeChannels = JsonConverters::fromArray('string', $o['subscribeChannels']);
        if (isset($o['unsubscribeChannels'])) $this->unsubscribeChannels = JsonConverters::fromArray('string', $o['unsubscribeChannels']);
    }

    /** @throws Exception */
    public function jsonSerialize(): mixed
    {
        $o = [];
        if (isset($this->id)) $o['id'] = $this->id;
        if (isset($this->subscribeChannels)) $o['subscribeChannels'] = JsonConverters::toArray('string', $this->subscribeChannels);
        if (isset($this->unsubscribeChannels)) $o['unsubscribeChannels'] = JsonConverters::toArray('string', $this->unsubscribeChannels);
        return empty($o) ? new class(){} : $o;
    }
}
