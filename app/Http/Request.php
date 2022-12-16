<?php

namespace App\Http;

class Request
{
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

    /**
     * Get all the data from the request
     *
     * @return array
     */
    public function all(): array
    {
        if ($this->getMethod() === 'GET') {
            return $_GET;
        }

        return $_POST;
    }
}
