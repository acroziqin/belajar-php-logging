<?php

namespace KrisnaBeaute\BelajarPhpMvc;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
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
            $record["extra"]["krb"] = [
                "app" => "Belajar PHP Logging",
                "author" => "Achmad Choirur Roziqin"
            ];
            return $record;
        });

        $logger->info("Hello World", ["username" => "roziqin"]);
        $logger->info("Hello World");
        $logger->info("Hello World Lagi");

        self::assertNotNull($logger);
    }

}