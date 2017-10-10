<?php

namespace App\Models;

use App\Models\Observers\CommunityObserver;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CommunityHospital extends Model
{
    use SoftDeletes, BelongsToTenants;

    protected $fillable = ['name', 'phone_number', 'address', 'image', 'contract', 'tenant_id' ];

    public function communities()
    {
        return $this->hasMany('App\Models\Community');
    }

    public function archives()
    {
        return $this->hasMany('App\Models\Archive');
    }

    public function contracts()
    {
        return $this->hasManyThrough('App\Models\Contract','App\Models\Doctor');
    }

    public function doctors()
    {
        return $this->hasMany('App\Models\Doctor');
    }

    public function groups()
    {
        return $this->hasMany('App\Models\Group');
    }

    public function packages()
    {
        return $this->hasMany('App\Models\Package','community_hospital_id');
    }
}
