<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthLung extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_lung";

    protected $fillable = ['Lung', 'Result'];

    public function isAbnormal($sex)
    {
        if($sex == 1){
            if($this->attributes['Lung'] < 3470){
                return true;
            }
            if($this->attributes['FVC'] < 3062){
                return true;
            }
        }else{
            if($this->attributes['Lung'] < 2440){
                return true;
            }
            if($this->attributes['FVC'] < 2266){
                return true;
            }
        }
        return false;
    }
}
