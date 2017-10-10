<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthWhr extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_whr";

    protected $fillable = ['Waistline', 'Hipline', 'Whr', 'Result'];

    public function isAbnormal($sex)
    {
        if($sex == 1){
            if($this->attributes['Whr'] > 90){
                return true;
            }
        }else{
            if($this->attributes['Whr'] > 80){
                return true;
            }
        }
        return false;
    }
}
