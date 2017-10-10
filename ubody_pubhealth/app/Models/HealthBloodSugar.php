<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthBloodSugar extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_blood_sugar";

    protected $fillable = ['BloodSugar', 'BloodsugarType', 'Result'];

    public function isAbnormal()
    {
        if($this->attributes['BloodsugarType'] == 1)
        {
            if($this->attributes['BloodSugar'] < 3.9 || $this->attributes['BloodSugar'] > 6.1){
                return true;
            }
        }
        if($this->attributes['BloodsugarType'] == 2)
        {
            if($this->attributes['BloodSugar'] < 7.8 && $this->attributes['BloodSugar'] > 11.1){
                return true;
            }
        }
        if($this->attributes['BloodsugarType'] == 2)
        {
            if($this->attributes['BloodSugar'] > 11.1){
                return true;
            }
        }
        return false;
    }
}
