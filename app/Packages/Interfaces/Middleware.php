<?php

namespace App\Packages\Interfaces;

use App\Packages\Infrastructure\Request;

abstract class Middleware
{
    /**
     * @var Middleware
     */
    private $next;

    /**
     * Build chain of middleware
     */
    public function linkWith(Middleware $next): Middleware
    {
        $this->next = $next;

        return $next;
    }

    /**
     * Checking the passage of middleware. Can be overridden by children classes
     */
    public function check(Request $request): bool
    {
        if (!$this->next) {
            return true;
        }

        return $this->next->check($request);
    }
}
