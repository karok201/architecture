<?php

namespace App\Http\Controllers;

use App\Packages\Infrastructure\View;

class HomeController
{
    public function index(): View
    {
        return new View('main');
    }

    public function allowed(): View
    {
        return new View('main');
    }
}
