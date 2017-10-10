<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/6/27 0027
 * Time: 下午 1:02
 */

namespace App\Models;


trait HealthScopeUser
{
    public function health()
    {
        return $this->belongsTo('App\Models\Health');
    }

    public function scopeUser($query, $user)
    {
        return $query->whereHas('health', function ($q) use ($user) {
            $q->whereHas('Member', function ($query) use ($user) {
                $query->where('IdCode', $user->id_code)->orWhere('Mobile', $user->mobile);
            });
        });
    }
}