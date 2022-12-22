<?php

namespace App\Http\Middleware;

use App\Http\Request;
use App\Packages\Interfaces\Middleware;

class Authenticate implements Middleware
{

    public function handle(Request $request): void
    {
        // TODO: Implement handle() method.
    }
}
