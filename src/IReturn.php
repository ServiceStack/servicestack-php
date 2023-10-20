<?php

namespace ServiceStack;

/**
 * @template T
 */
interface IReturn
{
    function createResponse(): mixed;
}
