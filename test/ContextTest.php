<?php

namespace KrisnaBeaute\BelajarPhpMvc;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class ContextTest extends TestCase
{
    public function testContext()
    {
        $logger = new Logger(ContextTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));

        $logger->info("This is log message", ["username" => "roziqin"]);
        $logger->info("Try login user", ["username" => "roziqin"]);
        $logger->info("Success login user", ["username" => "roziqin"]);
        $logger->info("Tidak ada context");

        self::assertNotNull($logger);
    }

}