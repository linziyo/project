<?php

namespace App\Models;

use App\Models\Observers\VisitObserver;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class GroupDoctor extends Model
{
    use BelongsToTenants;
    protected $fillable = [
        'group_id','doctor_id','is_leader','tenant_id'
    ];
    public static $is_leader=[1 => '是', 2 => '否',];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function getIs_leaderAttribute()
    {
        return array_key_exists($this->attributes['is_leader'], VisitNewborn::$is_leader) ? VisitNewborn::$is_leader[$this->attributes['is_leader']] : "";
    }
    public function doctor()
    {
        return $this->hasMany('App\Models\Doctor');
    }
    public function group()
    {
        return $this->hasOne('App\Models\Group');
    }

}
