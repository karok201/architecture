<?php

namespace App\Packages;

use RuntimeException;

abstract class Singleton
{
    /**
     * @var array
     */
    private static array $_instances = [];

    protected function __construct() { }

    public function __clone() {}

    /**
     * @throws RuntimeException
     */
    public function __wakeup() {
        throw new RuntimeException('Cannot serialize singleton');
    }

    /**
     * @return object
     */
    public static function getInstance(): object
    {
        $subclass = static::class;
        if (!isset(self::$_instances[$subclass])) {
            self::$_instances[$subclass] = new static();
        }

        return self::$_instances[$subclass];
    }
}
