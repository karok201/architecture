<?php

namespace App\Packages;

final class Logger extends Singleton
{
    private $fileHandle;

    protected function __construct()
    {
        parent::__construct();
        $this->fileHandle = fopen('storage/logs/app.log', 'w');
    }

    public function writeLog(string $message): void
    {
        $date = date('Y-m-d h-i-s');
        fwrite($this->fileHandle, "$date: $message\n");
    }

    public static function log(string $message): void
    {
        $logger = self::getInstance();
        $logger->writeLog($message);
    }
}
