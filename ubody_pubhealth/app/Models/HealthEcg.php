<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthEcg extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_ecg";

    protected $fillable = ['Hr', 'EcgData', 'nGain', 'Result', 'Analysis'];

    public function isAbnormal($sex)
    {
        if($sex == 1){
            if($this->attributes['Hr'] < 50 || $this->attributes['Hr'] > 95) {
                return true;
            }
        }else{
            if($this->attributes['Hr'] < 55 || $this->attributes['Hr'] > 95) {
                return true;
            }
        }
        return false;
    }
}
