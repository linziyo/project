<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthBloodOxygen extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_blood_oxygen";

    protected $fillable = ['Oxygen', 'Bpm', 'OxygenList', 'BpmList', 'Result', 'StartTime', 'EndTime', 'SecondCount'];

    public function isAbnormal()
    {
        return ($this->attributes['Oxygen'] > 95)?true:false;
    }
}
