<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthCardiovascular extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_cardiovascular";

    protected $fillable = ['HeartFunction1', 'VascularCondition1', 'HeartFunction2', 'VascularCondition2', 'SV', 'CO', 'HOV', 'CMBV', 'TPR', 'PAWP', 'N', 'Result'];

}
