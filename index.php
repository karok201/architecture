<?php

require_once __DIR__ . '/bootstrap.php';

use App\Http\Controllers\{
    HomeController,
    AuthenticatedSessionController
};
use App\Http\Kernel;

$app = new Kernel();

$app->router->get('/', [HomeController::class, 'index']);
$app->router->get('/login', [AuthenticatedSessionController::class, 'create']);
$app->router->post('/login', [AuthenticatedSessionController::class, 'store']);

$app->run();
