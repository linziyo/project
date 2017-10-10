<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthHb extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_hb";

    protected $fillable = ['Hb', 'Hct', 'Result'];

    public function isAbnormal($sex)
    {
        if($sex == 1){
            if($this->attributes['Hb'] < 7.45 || $this->attributes['Hb'] > 9.93){
                return true;
            }
            if($this->attributes['Hct'] < 40 || $this->attributes['Hct'] > 50){
                return true;
            }
        }else{
            if($this->attributes['Hb'] < 6.83 || $this->attributes['Hb'] > 9.31){
                return true;
            }
            if($this->attributes['Hct'] < 37 || $this->attributes['Hct'] > 48){
                return true;
            }
        }
        return false;
    }
}
