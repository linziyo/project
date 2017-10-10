<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/10 0010
 * Time: 上午 10:14
 */

namespace Sonka\Dispatcher\Facades;


use Illuminate\Support\Facades\Facade;

class Dispatcher extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'dispatcher';
    }
}