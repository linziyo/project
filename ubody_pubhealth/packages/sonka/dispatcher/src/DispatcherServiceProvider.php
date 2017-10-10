<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/10 0010
 * Time: 上午 10:11
 */

namespace Sonka\Dispatcher;


use Arcanedev\Support\ServiceProvider;

class DispatcherServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind('dispatcher', function ($app) {
            return new Dispatcher();
        });
    }
}