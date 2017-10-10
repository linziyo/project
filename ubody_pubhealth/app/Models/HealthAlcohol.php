<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthAlcohol extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_alcohol";

    protected $fillable = ['Alcohol', 'Result', 'AlcoholImg', 'errcode', 'errinfo'];

    public function isAbnormal()
    {
        return ($this->attributes['Alcohol'] > 20)?true:false;
    }
}
