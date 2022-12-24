<?php

namespace App\Packages\UseCases;

use App\Packages\Interfaces\Singleton;

class Session extends Singleton
{
    public static function get(string $key): mixed
    {
        return $_SESSION[$key] ?? null;
    }

    public static function put(string $key, $value = null): void
    {
        $_SESSION[$key] = $value;
    }
}
