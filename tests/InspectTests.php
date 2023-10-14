<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload
use PHPUnit\Framework\TestCase;
use Servicestack\Inspect;

final class InspectTests extends TestCase
{
    public function testCanUseInspect()
    {
        $args = [
            [
                "a" => 1,
                "b" => "foo",
            ],
            [
                "a" => 2.1,
                "b" => "foobar",
            ],
            [
                "a" => 3.21,
                "b" => "foobarbaz",
            ],
        ];

        Inspect::vars($args);

        Inspect::printTable($args);

        $orgName = "php";

        $opts = [
            "http" => [
                "header" => "User-Agent: gist.cafe\r\n"
            ]
        ];
        $context = stream_context_create($opts);
        $json = file_get_contents("https://api.github.com/orgs/{$orgName}/repos", false, $context);
        $orgRepos = array_map(function($x) {
            $x = get_object_vars($x);
            return [
                "name"        => $x["name"],
                "description" => $x["description"],
                "url"         => $x["url"],
                "lang"        => $x["language"],
                "watchers"    => $x["watchers"],
                "forks"       => $x["forks"],
            ];
        }, json_decode($json));
        usort($orgRepos, function($a,$b) { return $b["watchers"] - $a["watchers"]; });

        echo  "Top 3 {$orgName} GitHub Repos:\n";
        Inspect::printDump(array_slice($orgRepos, 0, 3));

        echo  "\nTop 10 {$orgName} GitHub Repos:\n";
        Inspect::printTable(array_map(function($x) {
            return [
                "name"        => $x["name"],
                "lang"        => $x["lang"],
                "watchers"    => $x["watchers"],
                "forks"       => $x["forks"],
            ];
        }, array_slice($orgRepos, 0, 10)));

        $this->assertTrue(true);
    }
}

