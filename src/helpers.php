<?php

use App\Packages\UseCases\Config;
use JetBrains\PhpStorm\NoReturn;

if (! function_exists('redirect')) {
    #[NoReturn] function redirect(string $path, $statusCode = 303): void
    {
        header('Location: ' . (Config::getInstance())->get('app_url') . $path, true, $statusCode);
        die();
    }
}
