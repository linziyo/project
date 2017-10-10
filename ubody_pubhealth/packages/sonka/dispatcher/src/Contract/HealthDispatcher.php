<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/10 0010
 * Time: 上午 9:57
 */

namespace Sonka\Dispatcher\Contract;


use App\Models\Health;

interface HealthDispatcher
{
    function dispatchHealth(Health $health);
}