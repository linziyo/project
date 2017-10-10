<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthChol extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_chol";

    protected $fillable = ['Chol', 'Result'];

    public function isAbnormal()
    {
        if($this->attributes['Chol'] < 2.86 || $this->attributes['Chol'] > 5.98){
            return true;
        }
        return false;
    }
}