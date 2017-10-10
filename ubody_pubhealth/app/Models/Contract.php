<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class Contract extends Model
{
    use SoftDeletes, BelongsToTenants;
    protected $fillable = ['doctor_id', 'package_id', 'archive_id', 'price','status', 'start_time', 'end_time', 'tenant_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
    public static $status=[1=>'待审核',2=>'已审核'];

    public function archive()
    {
        return $this->belongsTo('App\Models\Archive');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }

    public function package()
    {
        return $this->belongsTo('App\Models\Package');
    }
    public function family()
    {
        return $this->hasMany('App\Models\ContractFamily');
    }
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }
//    public function getStatusAttribute()
//    {
//        return array_key_exists($this->attributes['status'], Contract::$status) ? Contract::$status[$this->attributes['status']] : "";
//    }
}
