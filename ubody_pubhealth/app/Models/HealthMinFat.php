<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthMinFat extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_min_fat";

    protected $fillable = ['Height', 'Weight', 'FatRat', 'BasicMetabolism', 'Bmi', 'Physique', 'Shape', 'Result'];
}
