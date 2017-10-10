<?php

namespace App\Models;

use App\Models\Observers\CommunityObserver;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Community extends Model
{
    use BelongsToTenants, SoftDeletes;

    protected $fillable = ['community_hospital_id', 'code', 'tenant_id', 'name', 'population', 'telephone', 'address', 'image', 'contract'];

    public function hospital()
    {
        return $this->hasOne('App\Models\CommunityHospital');
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
        return $this->hasMany('App\Models\Package');
    }

    public static function boot()
    {
        parent::boot();
        static::observe(new CommunityObserver());
    }
}