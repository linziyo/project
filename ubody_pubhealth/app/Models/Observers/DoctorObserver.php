<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/8/31 0031
 * Time: 下午 5:41
 */

namespace App\Models\Observers;

use App\Models\Doctor;
use App\Models\Role;

class DoctorObserver
{
    public function created(Doctor $model)
    {
        $role = Role::where('name', 'doctor')->firstOrFail();
        $model->user->roles()->attach($role->id);
    }

    public function deleting(Doctor $model)
    {
        $model->user->roles()->detach(1);
    }
}