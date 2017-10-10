<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/16 0016
 * Time: 下午 3:59
 */

namespace Sonka\Importer;


use Sonka\Importer\Handler\Luohu;

class Importer
{
    public function getArchives(){
        $luohu = new Luohu();
        return $luohu->getOrganizations(2,25);
    }
}