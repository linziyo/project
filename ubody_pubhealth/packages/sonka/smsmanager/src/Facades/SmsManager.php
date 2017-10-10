<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/15 0015
 * Time: 上午 9:22
 */

namespace Sonka\SmsManager\Facades;


use Illuminate\Support\Facades\Facade;

class SmsManager extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'smsmanager';
    }
}