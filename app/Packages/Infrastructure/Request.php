<?php

namespace App\Packages\Infrastructure;

class Request
{
    private array $data;

    public function __construct()
    {
        $this->data = $this->getData();
    }

    public function getPath()
    {
        $path = $_SERVER['REQUEST_URI'] ?? '/';
        $position = strpos($path, '?');

        if ($position === false) {
            return $path;
        }
        return substr($path, 0, $position);
    }

    public function getMethod(): string
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    private function getData(): array
    {
        if ($this->getMethod() === 'GET') {
            return $_GET;
        }

        return $_POST;
    }

    /**
     * Get all the data from the request
     *
     * @return array
     */
    public function all(): array
    {
        return $this->data;
    }

    /**
     * Get data from the request by key
     *
     * @param string $key
     * @return mixed
     */
    public function get(string $key): mixed
    {
        return $this->data[$key];
    }
}
