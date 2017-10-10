<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthUricAcid extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_uric_acid";

    protected $fillable = ['Ua', 'Result'];

    public function isAbnormal($sex,$age)
    {
        if($age < 14){
            if($sex == 1){
                if($this->attributes['Ua'] < 0.21 || $this->attributes['Ua'] > 0.43){
                    return true;
                }
            }elseif($sex == 2){
                if($this->attributes['Ua'] < 0.16 || $this->attributes['Ua'] > 0.16){
                    return true;
                }
            }
        }else{
            if($this->attributes['Ua'] < 0.12 || $this->attributes['Ua'] > 0.33){
                return true;
            }
        }
        return false;
    }
}
