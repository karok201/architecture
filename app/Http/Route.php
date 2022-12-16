<?php

namespace App\Http;

use Closure;
use HttpException;

class Route
{
    public string $method;
    public string $path;
    public Closure $callback;

    public function __construct(string $method, string $path, array $callback)
    {
        $this->method = $method;
        $this->path = $path;
        $this->callback = $this->prepareCallback($callback);
    }

    private function prepareCallback(array $callback): Closure
    {
        return function (...$params) use ($callback) {
            [$class, $method] = $callback;
            return (new  $class)->{$method}(...$params);
        };
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @throws HttpException
     */
    public function match(string $path, string $method): bool
    {
        if ($method === $this->method) {
            return trim($this->getPath(), '/') === $path;
        } else {
            throw new HttpException('The transmission method does not match the route', 405);
        }
    }

    public function run()
    {
        return call_user_func($this->callback);
    }
}
