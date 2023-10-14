<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
require_once 'techstacks.dtos.php';

use Servicestack\Inspect;
use techstacks\CreateTechnology;
use techstacks\FindTechnologies;
use techstacks\GetAllTechnologies;
use techstacks\GetAllTechnologiesResponse;
use techstacks\Overview;
use techstacks\OverviewResponse;
use techstacks\QueryPosts;
use techstacks\TechnologyView;
use PHPUnit\Framework\TestCase;
use Servicestack\ConsoleLogger;
use Servicestack\JsonServiceClient;
use Servicestack\Log;
use Servicestack\LogLevel;
use Servicestack\QueryResponse;
use Servicestack\WebServiceException;

class TechStacksTests extends TestCase
{
    public JsonServiceClient $client;

    public function setUp(): void
    {
//        $this->client = JsonServiceClient::create("https://localhost:5001");
        $this->client = JsonServiceClient::create("https://techstacks.io");
        Log::$logger = new ConsoleLogger();
        Log::$levels[] = LogLevel::Debug;
    }

    public function testShouldGetTechsResponse() {
        /** @var GetAllTechnologiesResponse $response */
        $response = $this->client->get(new GetAllTechnologies());
        $this->assertGreaterThan(0, count($response->results));
    }

    public function testShouldGetTechStacksOverview() {
        /** @var OverviewResponse $response */
        $response = $this->client->get(new Overview());
        foreach ($response->topTechnologies as $tech) {
            $tech->logoUrl = null;
        }
        Inspect::printTable($response->topTechnologies);
        $this->assertGreaterThan(0, count($response->topTechnologies));
    }

    public function testShouldThrow405() {
        $client = JsonServiceClient::create("https://test.servicestack.net");

        try {
            $client->get(new Overview());
            $this->fail("should throw");
        } catch (WebServiceException $ex) {
            $this->assertEquals(405, $ex->statusCode);
            $this->assertEquals("NotImplementedException", $ex->responseStatus->errorCode);
            $this->assertEquals("The operation 'Overview' does not exist for this service", $ex->responseStatus->message);
        }
    }

    public function testShouldThrow401() {
        try {
            $this->client->post(new CreateTechnology());
            $this->fail("should throw");
        } catch (WebServiceException $ex) {
            $this->assertEquals(401, $ex->statusCode);
            $this->assertEquals("401", $ex->responseStatus->errorCode);
            $this->assertEquals("Unauthorized", $ex->responseStatus->message);
        }
    }

    public function testCanQueryAutoQueryWithRuntimeArgs() {
        $request = new FindTechnologies();
        $request->take = 3;
        /** @var QueryResponse $response */
        $response = $this->client->get($request, args:["VendorName" => "Amazon"]);
        /** @var array<TechnologyView> $results */
        $results = $response->results;
        $this->assertEquals(3, count($results));
        $this->assertEquals(["Amazon", "Amazon", "Amazon"],
            array_map(fn(TechnologyView $x):string => $x->vendorName, $results));
    }

    public function testCanQueryAutoQueryWithAnonObjectAndRuntimeArgs() {
        $args = ["take" => 3, "vendorName" => "Amazon"];
        /** @var QueryResponse $response */
        $response = $this->client->getUrl("/technology/search.json", args:$args,
            responseAs: QueryResponse::create(["TechnologyView"]));
        /** @var array<TechnologyView> $results */
        $results = $response->results;
        $this->assertEquals(3, count($results));
        $this->assertEquals(["Amazon", "Amazon", "Amazon"],
            array_map(fn(TechnologyView $x):string => $x->vendorName, $results));
    }

    public function testCanQueryWithArgsAndBaseClassProperty() {
        /** @var QueryResponse $response */
        $techs = $this->client->get(new FindTechnologies(), args:["slug" => "flutter"]);

        $request = new QueryPosts(anyTechnologyIds: [$techs->results[0]->id],
            types: ['Announcement', 'Showcase']);
        $request->take = 3;
        /** @var QueryResponse $response */
        $posts = $this->client->get($request);

        $this->assertEquals("Flutter", $techs->results[0]->name);
        $this->assertNotEmpty($posts->results[0]->title);
    }

}