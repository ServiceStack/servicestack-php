<?php declare(strict_types=1);

require_once __DIR__ . '/../vendor/autoload.php';
require_once 'aiserver.dtos.php';

use PHPUnit\Framework\TestCase;
use ServiceStack\ConsoleLogger;
use ServiceStack\JsonServiceClient;
use ServiceStack\Log;
use ServiceStack\LogLevel;
use ServiceStack\UploadFile;
use aiserver\SpeechToText;
use aiserver\GenerationResponse;

class AiServerTests extends TestCase
{
    private static ?JsonServiceClient $client = null;

    public static function setUpBeforeClass(): void
    {
        // Skip if RUN_AI_TESTS is not set
        if (!getenv('RUN_AI_TESTS')) {
            self::markTestSkipped(
                'Skipping AI Server tests. Set RUN_AI_TESTS=1 to run these tests.'
            );
        }

        // Check for required environment variables
        $url = getenv('AI_SERVER_URL');
        $apiKey = getenv('AI_SERVER_API_KEY');

        if (!$url || !$apiKey) {
            self::markTestSkipped(
                'AI_SERVER_URL and AI_SERVER_API_KEY environment variables are required. ' .
                'Please set these before running the AI server tests.'
            );
        }

        // Setup client
        self::$client = JsonServiceClient::create($url);
        self::$client->setBearerToken($apiKey);

        // Setup logging
        Log::$logger = new ConsoleLogger();
        Log::$levels[] = LogLevel::Debug;
    }

    protected function setUp(): void
    {
        if (self::$client === null) {
            $this->markTestSkipped('Client not initialized - environment checks failed');
        }
    }

    public function testCanSpeechToTextUrl()
    {
        $audioFile = __DIR__ . '/files/test_audio.wav';
        // Log audio file path
        Log::debug("Audio file path: " . $audioFile);
        $this->assertFileExists($audioFile, 'Test audio file not found');

        $request = new SpeechToText();

        $upload = new UploadFile(
            filePath: $audioFile,
            fileName: 'test_audio.wav',
            fieldName: 'audio',
            contentType: 'audio/wav'
        );

        /** @var GenerationResponse $response */
        $response = self::$client->postFilesWithRequestUrl(
            '/api/SpeechToText',
            $request,
            $upload
        );

        // Verify response structure
        $this->assertNotNull($response);
        $this->assertTrue(property_exists($response, 'textOutputs'));
        $this->assertIsArray($response->textOutputs);
        $this->assertCount(2, $response->textOutputs);

        // Get both text outputs
        $textWithTimestamps = $response->textOutputs[1]->text;
        $textOnly = $response->textOutputs[0]->text;

        // Basic validation of outputs
        $this->assertNotNull($textWithTimestamps);
        $this->assertNotNull($textOnly);

        // Log results
        Log::debug("\nSpeech to Text Results:");
        Log::debug("Text with timestamps: " . $textWithTimestamps);
        Log::debug("Text only: " . $textOnly);
    }

    public function testCanSpeechToText()
    {
        $audioFile = __DIR__ . '/files/test_audio.wav';
        // Log audio file path
        Log::debug("Audio file path: " . $audioFile);
        $this->assertFileExists($audioFile, 'Test audio file not found');

        $request = new SpeechToText();

        $upload = new UploadFile(
            filePath: $audioFile,
            fileName: 'test_audio.wav',
            fieldName: 'audio',
            contentType: 'audio/wav'
        );

        /** @var GenerationResponse $response */
        $response = self::$client->postFilesWithRequest(
            $request,
            $upload
        );

        // Verify response structure
        $this->assertNotNull($response);
        $this->assertTrue(property_exists($response, 'textOutputs'));
        $this->assertIsArray($response->textOutputs);
        $this->assertCount(2, $response->textOutputs);

        // Get both text outputs
        $textWithTimestamps = $response->textOutputs[1]->text;
        $textOnly = $response->textOutputs[0]->text;

        // Basic validation of outputs
        $this->assertNotNull($textWithTimestamps);
        $this->assertNotNull($textOnly);

        // Log results
        Log::debug("\nSpeech to Text Results:");
        Log::debug("Text with timestamps: " . $textWithTimestamps);
        Log::debug("Text only: " . $textOnly);
    }
}