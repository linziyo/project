<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthBloodFat extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_blood_fat";

    protected $fillable = ['TChol', 'HdlChol', 'Trig', 'CalcLdl', 'Result'];


    public function isAbnormal()
    {
        if($this->attributes['TChol'] < 2.86 || $this->attributes['TChol'] > 5.98){
            return true;
        }
        if($this->attributes['HdlChol'] < 0.94 || $this->attributes['HdlChol'] > 2.0){
            return true;
        }
        if($this->attributes['Trig'] < 0.56 || $this->attributes['Trig'] > 1.7){
            return true;
        }
        if($this->attributes['CalcLdl'] < 2.07 || $this->attributes['CalcLdl'] > 3.12){
            return true;
        }
        return false;
    }
}
