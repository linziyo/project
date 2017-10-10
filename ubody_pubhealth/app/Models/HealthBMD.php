<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthBMD extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_bmd";

    protected $fillable = ['TSCORE', 'ZSCORE', 'OI', 'BQI', 'SOS', 'YOUNG_ADULT', 'AGE_MATCHED', 'BUA', 'EOA', 'RRF', 'PAB', 'Result', 'GraphBmp'];

    public function isAbnormal()
    {
        if($this->attributes['TSCORE'] < -1){
            return true;
        }
        if($this->attributes['ZSCORE'] < 1){
            return true;
        }
        return false;
    }
}
