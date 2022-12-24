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
        $data = $this->getMethod() === 'GET' ? $_GET : $_POST;

        // Validation for every request
        foreach ($data as $index => $value) {
            $value = trim($value);
            $value = stripslashes($value);
            $value = htmlspecialchars($value);
            $data[$index] = $value;
        }

        return $data;
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
