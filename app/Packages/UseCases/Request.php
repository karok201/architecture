<?php

namespace App\Packages\UseCases;

use App\Packages\Interfaces\Singleton;

class Request extends Singleton
{
    public static function method(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public static function path(): string
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public static function all(): array
    {
        if (static::method() === 'get') {
            return $_GET;
        }

        return $_POST;
    }
}
