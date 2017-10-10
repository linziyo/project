<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthUrinalysis extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_urinalysis";

    protected $fillable = ['URO', 'BLD', 'BIL', 'KET', 'LEU', 'GLU', 'PRO', 'PH', 'NIT', 'SG', 'VC', 'MAL', 'CR', 'UCA', 'Result'];

    public function isAbnormal()
    {
        if($this->attributes['URO'] == '阳性'){
            return true;
        }
        if($this->attributes['BLD'] == '阳性'){
            return true;
        }
        if($this->attributes['BIL'] == '阳性'){
            return true;
        }
        if($this->attributes['KET'] == '阳性'){
            return true;
        }
        if($this->attributes['LEU'] == '阳性'){
            return true;
        }
        if($this->attributes['GLU'] == '阳性'){
            return true;
        }
        if($this->attributes['PRO'] == '阳性'){
            return true;
        }
        if($this->attributes['PH'] < 5 || $this->attributes['PH'] > 7){
            return true;
        }
        if($this->attributes['NIT'] == '阳性'){
            return true;
        }
        if($this->attributes['SG'] < 1.015 || $this->attributes['SG'] > 1.025){
            return true;
        }
        if($this->attributes['VC'] == '阳性'){
            return true;
        }
    }
}