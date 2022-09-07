<?php

namespace KrisnaBeaute\BelajarPhpMvc;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        $logger = new Logger(HandlerTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));
//        $logger->pushHandler(new StreamHandler(__DIR__ . '/../application.log'));

        $logger->info("Belajar Pemrograman PHP Logging");
        $logger->info("Selamat Datang di Krisna Beaute");
        $logger->info("Ini Informasi Aplikasi Logging");

        self::assertNotNull($logger);
    }

}