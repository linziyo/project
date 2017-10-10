<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AuthDispatch extends Model
{
    use SoftDeletes, BelongsToTenants;

    protected $fillable = ['tenant_id', 'type','device_id','auth_list'];

    public function getAuthListAttribute()
    {
        return empty($this->attributes['auth_list'])?[]:explode(',',$this->attributes['auth_list']);
    }

    public function device()
    {
        return $this->belongsTo('App\Models\Device');
    }

}
