<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12 0012
 * Time: 下午 7:36
 */

namespace App\Models\Observers;


use DB;

class CommunityObserver
{

    /**
     * Communitybserver constructor.
     */
    public function __construct()
    {
    }

    public function created($model)
    {
        DB::table('archive_code_increments')->insert(['community_id' => $model->id, 'code' => 1]);
    }
}