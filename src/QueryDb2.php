<?php

namespace Servicestack;

use Exception;
use JsonSerializable;

/**
 * @template From
 * @template Into
 */
class QueryDb2 extends QueryBase implements JsonSerializable
{
    public array $genericArgs = [];
    public static function create(array $genericArgs=[]): QueryDb2 {
        $to = new QueryDb2();
        $to->genericArgs = $genericArgs;
        return $to;
    }

    /**
     * @param int|null $skip
     * @param int|null $take
     * @param string|null $orderBy
     * @param string|null $orderByDesc
     * @param string|null $include
     * @param string|null $fields
     * @param array<string,string>|null $meta
     */
    public function __construct(
        int $skip=null,
        int $take=null,
        string $orderBy=null,
        string $orderByDesc=null,
        string $include=null,
        string $fields=null,
        array $meta=null
    ) {
        parent::__construct($skip,$take,$orderBy,$orderByDesc,$include,$fields,$meta);
    }

    /** @throws Exception */
    public function fromMap($o): void {
        parent::fromMap($o);
    }

    /** @throws Exception */
    public function jsonSerialize(): array
    {
        $o = parent::jsonSerialize();
        return $o;
    }
}