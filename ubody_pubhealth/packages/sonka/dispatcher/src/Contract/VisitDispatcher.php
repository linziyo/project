<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/10 0010
 * Time: 上午 10:09
 */

namespace Sonka\Dispatcher\Contract;


use App\Models\Visit;

interface VisitDispatcher
{

    function dispatchVisit(Visit $visit);

    function dispatchVisitNewborn($visitNewborn);

    function dispatchVisitKids($visitKids);
    //... more
}