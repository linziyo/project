<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/12 0012
 * Time: 下午 7:26
 */

namespace App\Models\Observers;


use App\Events\ArchiveCreatedEvent;
use App\Models\Community;
use DB;

class ArchiveObserver
{

    /**
     * ArchiveCodeObserver constructor.
     */
    public function __construct()
    {
    }

    public function creating($model)
    {
        $community = Community::findOrFail($model->community_id);

        DB::table('archive_code_increments')->where('community_id', $community->id)->increment('code', 1);
        $archiveCode = DB::table('archive_code_increments')->where('community_id', $community->id)->first();

        $model->code = $community->code . str_pad($archiveCode->code, 5, '0', STR_PAD_LEFT);
    }

    public function created($model)
    {
        \Event::fire(new ArchiveCreatedEvent($model));
    }
}