<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use  BelongsToTenants;

    protected $fillable = ['community_hospital_id', 'code', 'type', 'tenant_id'];

    public function communityHospital()
    {
        return $this->belongsTo('App\Models\CommunityHospital');
    }

    public function authDispatch()
    {
        return $this->hasOne('App\Models\AuthDispatch');
    }
}