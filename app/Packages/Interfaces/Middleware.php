<?php

namespace App\Packages\Interfaces;

use App\Http\Request;

interface Middleware
{
    public function handle(Request $request): void;
}
