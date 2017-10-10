<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthFat extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_fat";

}
