<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthBloodPressure extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_blood_pressure";

    protected $fillable = ['HighPressure', 'LowPressure', 'Pulse', 'Result'];

    public function isAbnormal()
    {
        if($this->attributes['HighPressure'] < 60 || $this->attributes['HighPressure'] > 89){
            return true;
        }
        if($this->attributes['LowPressure'] < 90 || $this->attributes['LowPressure'] > 139){
            return true;
        }
        if($this->attributes['Pulse'] < 60 || $this->attributes['Pulse'] > 100){
            return true;
        }
        return false;
    }
}
