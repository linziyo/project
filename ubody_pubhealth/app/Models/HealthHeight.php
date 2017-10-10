<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthHeight extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_height";

    protected $fillable = ['Height', 'Weight', 'BMI', 'IdealWeight', 'Result'];
}
