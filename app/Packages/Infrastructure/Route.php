<?php

namespace App\Packages\Infrastructure;

use App\Packages\Interfaces\Middleware;
use Closure;
use RuntimeException;

class Route
{
    private string $method;

    private string $path;

    public Closure $callback;

    private Middleware $middleware;

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

    public function setMiddleware(Middleware $middleware): void
    {
        $this->middleware = $middleware;
    }

    /**
     * @throws RuntimeException
     */
    public function match(string $path, string $method): bool
    {
        if ($method === $this->method) {
            return trim($this->getPath(), '/') === $path;
        }

        return false;
    }

    private function runMiddleware(Request $request): void
    {
        if (isset($this->middleware) && !$this->middleware->check($request)) {
            throw new RuntimeException('Forbidden', 403);
        }
    }

    public function run(Request $request)
    {
        $this->runMiddleware($request);

        return call_user_func($this->callback);
    }
}
