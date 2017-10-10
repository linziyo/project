<?php

namespace App\Models;

use App\Models\Observers\VisitObserver;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class GroupPackage extends Model
{
    use  BelongsToTenants;
    protected $fillable = [
        'group_id','package_id','tenant_id'
    ];

    public function doctor()
    {
        return $this->hasMany('App\Models\Doctor');
    }
    public function group()
    {
        return $this->hasOne('App\Models\Group');
    }

}
