<?php

namespace TynChristian\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use PHPUnit\Event\Telemetry\MemoryUsage;
use PHPUnit\Framework\TestCase;

class ProcessorTest extends TestCase
{
    public function testProcessorRecord()
    {
        $logger = new Logger(ProcessorTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new HostnameProcessor());
        $logger->pushProcessor(function ($record) {
            $record["extra"]["tyn"] = [
                "app" => "Belajar PHP Logging",
                "author" => "Christian"
            ];
            return $record;
        });

        $logger->info("Hello World", ["username" => "Tian"]);
        $logger->info("Hello World");
        $logger->info("Hello World Lagi");

        self::assertNotNull($logger);
    }
}