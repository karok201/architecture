<?php

require_once __DIR__ . '/bootstrap.php';

use App\Http\Kernel;
use App\Http\Controllers\HomeController;
use App\Http\Middleware\Authenticate;

$app = new Kernel();

$app->router->get('/', [HomeController::class, 'main'])->setMiddleware((new Authenticate()));
$app->router->get('/allowed', [HomeController::class, 'allowed']);

$app->run();
