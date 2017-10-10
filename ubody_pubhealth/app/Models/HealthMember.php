<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthMember extends Model
{
    use SoftDeletes;

    protected $table = "health_member";

    protected $fillable = ['Name', 'Mobile', 'IdCode', 'Age', 'Sex', 'Address', 'Birthday', 'UserIcon', 'Nation', 'StartDate', 'EndDate', 'Department', 'BarCode', 'IcCode', 'SocialCode', 'UserID'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function health()
    {
        return $this->belongsTo('App\Models\Health');
    }

    public function archive()
    {
        return $this->belongsTo('App\Models\Archive', 'IdCode', 'id_code');
    }
}