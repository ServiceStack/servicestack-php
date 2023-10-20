<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once 'dtos.php';

use dtos\CreateCategory;
use dtos\PatchAlbums;
use dtos\QueryCategories;
use dtos\SendGet;
use dtos\SendPost;
use dtos\SendPut;
use dtos\UpdateCategory;
use PHPUnit\Framework\TestCase;
use ServiceStack\ByteArray;
use function ServiceStack\qsValue;
use function ServiceStack\resolveHttpMethod;

class ClientUtilsTests extends TestCase
{
    /** @throws Exception */
    public function testQsValue() {
        $this->assertEquals("", qsValue(null));
        $this->assertEquals("A", qsValue("A"));
        $this->assertEquals(1, qsValue("1"));
        $this->assertEquals("UHl0aG9u", qsValue(new ByteArray(base64_encode(b"Python"))));
    }

    public function testDoesResolveIVerbsFromRequestDtoInterfaceMarker() {
        $this->assertEquals("GET", resolveHttpMethod(new SendGet()));
        $this->assertEquals("POST", resolveHttpMethod(new SendPost()));
        $this->assertEquals("PUT", resolveHttpMethod(new SendPut()));
//        $this->assertEquals("GET", resolveHttpMethod(new QueryCategories()));
//        $this->assertEquals("POST", resolveHttpMethod(new CreateCategory()));
//        $this->assertEquals("PUT", resolveHttpMethod(new UpdateCategory()));
//        $this->assertEquals("PATCH", resolveHttpMethod(new PatchAlbums()));
    }
}