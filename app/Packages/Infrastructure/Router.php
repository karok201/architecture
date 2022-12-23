<?php

namespace App\Packages\Infrastructure;

use ReflectionException;
use RuntimeException;

class Router
{
    protected array $routes = [];

    public Request $request;

    public function __construct()
    {
        $this->request = new Request();
    }

    public function get($path, $callback): Route
    {
        return $this->addRoute('get', $path, $callback);
    }

    public function post($path, $callback): Route
    {
        return $this->addRoute('post', $path, $callback);
    }

    public function addRoute(string $method, string $path, array $callback): Route
    {
        $route = new Route($method, $path, $callback);
        $this->routes[] = $route;

        return $route;
    }

    /**
     * @throws ReflectionException
     * @throws RuntimeException
     */
    public function dispatch()
    {
        $path = trim($this->request->getPath(), '/');
        $method = $this->request->getMethod();

        foreach ($this->routes as $route) {
            if ($route->match($path, $method)) {
                return $route->run($this->request);
            }
        }

        throw new RuntimeException('Not found', 404);
    }
}
