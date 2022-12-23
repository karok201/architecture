<?php

namespace App\Http\Middleware;

use App\Packages\Infrastructure\Request;
use App\Packages\Interfaces\Middleware;
use App\Packages\UseCases\Session;
use RuntimeException;

class Authenticate extends Middleware
{
    public function check(Request $request): bool
    {
        $user = Session::get('user');

        if (!$user) {
            throw new RuntimeException('Not found', '404');
        }

        return parent::check($request);
    }
}
