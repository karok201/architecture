<?php

namespace App\Http;

use App\Packages\Infrastructure\Router;
use App\Packages\UseCases\Config;
use Illuminate\Database\Capsule\Manager as Capsule;

class Kernel
{
    /**
     * The router instance
     * @var Router
     */
    public Router $router;

    /**
     * The application's middleware stack
     * @var array
     */
    protected array $middleware;

    /**
     * The application's route middleware.
     * @var array
     */
    protected array $routeMiddleware;

    private function init(): void
    {
        $capsule = new Capsule();
        $config = Config::getInstance();

        $capsule->addConnection(
            $config->get('database')
        );
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }

    public function __construct()
    {
        $this->init();
        $this->router = new Router();
    }

    public function run(): void
    {
        try {
            if (is_string($this->router->dispatch())) {
                echo $this->router->dispatch();
                return;
            }

            $this->router->dispatch()->render();
        } catch (\Exception $e) {
            echo $e;
        }
    }
}
