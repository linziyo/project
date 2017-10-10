<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/13 0013
 * Time: 上午 11:06
 */

namespace Sonka\PubHealth\Models;


use Illuminate\Database\Eloquent\Model;

class ShardingModel extends Model
{
    public function getTable()
    {
        return parent::getTable();


    }
}