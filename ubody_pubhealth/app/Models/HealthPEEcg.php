<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthPEEcg extends Model
{
    use SoftDeletes, HealthScopeUser;

    protected $table = "health_peecg";

    protected $fillable = ['Hr', 'EcgData', 'PAxis', 'Result', 'QRSAxis', 'TAxis', 'PR', 'QRS', 'QT', 'QTc', 'RV5', 'SV1', 'EcgImg'];
}
