<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/16 0016
 * Time: 下午 3:58
 */

namespace Sonka\Importer;


use Arcanedev\Support\ServiceProvider;

class ImporterServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind('importer', function ($app) {
            return new Importer();
        });
    }
}