<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthTemperature extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_temperature";

    protected $fillable = ['Temperature', 'Result'];

    public function isAbnormal()
    {
        if($this->attributes['Temperature'] < 36 || $this->attributes['Temperature'] > 37){
            return true;
        }
        return false;
    }
}
