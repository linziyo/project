<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Group extends Model
{
    use BelongsToTenants, SoftDeletes;

    protected $fillable = ['tenant_id', 'name', 'community_hospital_id', 'description'];

    public function doctors()
    {
        return $this->belongsToMany('App\Models\Doctor', 'group_doctors', 'group_id', 'doctor_id')->withPivot('is_leader','is_leader');
    }

    public function communityHospital()
    {
        return $this->belongsTo('App\Models\CommunityHospital');
    }

    public function contracts()
    {
        return $this->hasMany('App\Models\Contract');
    }

    public function packages()
    {
        return $this->belongsToMany('App\Models\Package', 'group_packages');
    }
}
