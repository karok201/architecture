<?php

namespace App\Packages\Infrastructure;

use App\Packages\Interfaces\Renderable;
use const EXTR_IF_EXISTS;

class View implements Renderable
{
    public string $path;
    public array $data;

    public function __construct(string $path, array $data = [])
    {
        $this->path = $path;
        $this->data = $data;
    }

    /*
     * @TODO method with
     */

    public function render(): void
    {
        extract($this->data, EXTR_IF_EXISTS);

        ob_start();
        $content = file_get_contents($this->getFullPath($this->path));
        ob_end_clean();

        include APP_PATH . '/resources/views/layouts/layout.php';
    }

    /**
     * Returns full path to provided view
     *
     * @param string $view
     * @return string
     */
    public function getFullPath(string $view): string
    {
        $view = str_replace('.', '/', $view);
        return APP_PATH . '/resources/views/pages/' . $view . '.php';
    }
}
