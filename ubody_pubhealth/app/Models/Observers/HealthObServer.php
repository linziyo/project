<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/9 0009
 * Time: 下午 7:26
 */

namespace App\Models\Observers;


use App\Events\HealthCreatedEvent;

class HealthObServer
{
    public function created($model)
    {
        \Event::fire(new HealthCreatedEvent($model));
    }
}