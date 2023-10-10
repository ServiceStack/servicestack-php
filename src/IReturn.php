<?php

namespace Servicestack;

/**
 * @template T
 */
interface IReturn
{
    function createResponse(): mixed;
}
