<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/13 0013
 * Time: 上午 10:17
 */

namespace Sonka\PubHealth;


use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;

class PubHealthServiceProvider extends ServiceProvider
{
    public function boot()
    {
//        require __DIR__ . '/../vendor/autoload.php';
    }

    public function register()
    {
        $this->app->bind('pubhealth', function ($app) {
            return new PubHealth();
        });


        $this->setupRoutes($this->app->router);
    }

    public function setupRoutes(Router $router)
    {
        $router->group(['namespace' => 'Sonka\PubHealth'], function ($router) {
            $router->resource('old/users', 'Controllers\UserController');
        });
    }
}