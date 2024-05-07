<?php

namespace TynChristian\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase
{
    public function testContext()
    {
        $logger = new Logger(ContextTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));

        $logger->info("This is log message", ["username" => "christian"]);
        $logger->info("Try login user", ["username" => "christian"]);
        $logger->info("Success login user", ["username" => "christian"]);
        $logger->info("Tidak ada context");

        self::assertNotNull($logger);
    }
}