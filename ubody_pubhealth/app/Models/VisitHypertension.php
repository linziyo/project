<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Observers\VisitObserver;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitHypertension extends Model
{
    use SoftDeletes, BelongsToTenants;
    protected $table = "visit_hypertension";

    protected $fillable = ['archive_id', 'doctor_id','visited_at', 'visit_mode', 'symptom', 'signs','life_style', 'auxiliary_check', 'medication_compliance','adverse_drug','visit_classification','medication_situation','referral','next_visited_at','visit_doctor_signature','tenant_id'];

    public function visit()
    {
        return $this->belongsTo('App\Models\Visit');
    }

    public static function boot()
    {
        parent::boot();
        static::observe(new VisitObserver());
    }
}
