<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/10 0010
 * Time: 上午 9:58
 */

namespace Sonka\Dispatcher\Contract;


use App\Models\Archive;

interface ArchiveDispatcher
{
    function dispatchArchive(Archive $archive);
}