<?php

namespace App\Models;

use App\Models\Observers\VisitObserver;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitDiabete extends Model
{
    use SoftDeletes, BelongsToTenants;
    protected $table = "visit_diabetes";

    protected $fillable = ['archive_id', 'doctor_id', 'visited_at', 'visit_mode', 'symptom', 'signs','life_style', 'auxiliary_check','medication_compliance','adverse_drug','hypoglycemia_reaction','visit_classification','medication_situation','referral','next_visited_at','visit_doctor_signature','tenant_id'];

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
