<?php

namespace App\Http\Controllers;

use App\Packages\View;

class HomeController
{
    public function main(): View
    {
        return new View('main');
    }
}
