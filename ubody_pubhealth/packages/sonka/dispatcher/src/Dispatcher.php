<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/10 0010
 * Time: 上午 10:43
 */

namespace Sonka\Dispatcher;


use App\Models\Archive;
use App\Models\Health;
use App\Models\Visit;
use Sonka\Dispatcher\Handler\ZhijiDispatchHandler;

class Dispatcher
{
    public function dispatch($model)
    {
        $dispatcher = $this->getDispatcher($model);

        if ($model instanceof Archive) {
            $dispatcher->dispatchArchive($model);
        }

        if ($model instanceof Health) {
            $dispatcher->dispatchHealth($model);
        }

        if ($model instanceof Visit) {
            $dispatcher->dispatchVisit($model);
        }
    }

    private function getDispatcher($model)
    {
        return new ZhijiDispatchHandler();
    }
}