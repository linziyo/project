<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31 0031
 * Time: 下午 5:47
 */

namespace App\Models\Observers;


use App\Models\Role;
use App\Models\Staff;

class StaffObserver
{
    public function created(Staff $model)
    {
        $role = Role::where('name', 'staff')->firstOrFail();
        $model->user->roles()->attach($role->id);
    }

    public function deleting(Staff $model)
    {
        $model->user->roles()->detach(1);
    }
}