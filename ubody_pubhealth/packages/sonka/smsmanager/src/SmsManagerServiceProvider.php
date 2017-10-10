<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/27 0027
 * Time: 下午 4:03
 */

namespace Sonka\SmsManager;


use Illuminate\Support\ServiceProvider;

class SmsManagerServiceProvider extends ServiceProvider
{
    public function boot()
    {

    }

    public function register()
    {
        $this->app->bind('smsmanager', function ($app) {
            return new SmsManager();
        });
    }
}