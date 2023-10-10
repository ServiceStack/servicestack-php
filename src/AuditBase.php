<?php

namespace Servicestack;

use DateTime;
use JsonSerializable;

// @DataContract
class AuditBase implements JsonSerializable
{
    public function __construct(
        // @DataMember(Order=1)
        /** @var DateTime */
        public DateTime $createdDate=new DateTime(),

        // @DataMember(Order=2)
        // @Required()
        /** @var string */
        public string $createdBy='',

        // @DataMember(Order=3)
        /** @var DateTime */
        public DateTime $modifiedDate=new DateTime(),

        // @DataMember(Order=4)
        // @Required()
        /** @var string */
        public string $modifiedBy='',

        // @DataMember(Order=5)
        /** @var DateTime|null */
        public ?DateTime $deletedDate=null,

        // @DataMember(Order=6)
        /** @var string|null */
        public ?string $deletedBy=null
    ) {
    }

    public function fromMap($o): void {
        if (isset($o['createdDate'])) $this->createdDate = JsonConverters::from('DateTime', $o['createdDate']);
        if (isset($o['createdBy'])) $this->createdBy = $o['createdBy'];
        if (isset($o['modifiedDate'])) $this->modifiedDate = JsonConverters::from('DateTime', $o['modifiedDate']);
        if (isset($o['modifiedBy'])) $this->modifiedBy = $o['modifiedBy'];
        if (isset($o['deletedDate'])) $this->deletedDate = $o['deletedDate'];
        if (isset($o['deletedBy'])) $this->deletedBy = $o['deletedBy'];
    }

    public function jsonSerialize(): array
    {
        $o = [];
        if (isset($this->createdDate)) $o['createdDate'] = JsonConverters::to('DateTime', $this->createdDate);
        if (isset($this->createdBy)) $o['createdBy'] = $this->createdBy;
        if (isset($this->modifiedDate)) $o['modifiedDate'] = JsonConverters::to('DateTime', $this->modifiedDate);
        if (isset($this->modifiedBy)) $o['modifiedBy'] = $this->modifiedBy;
        if (isset($this->deletedDate)) $o['deletedDate'] = $this->deletedDate;
        if (isset($this->deletedBy)) $o['deletedBy'] = $this->deletedBy;
        return $o;
    }
}
