<?php

namespace App\Models;

use App\Models\Observers\VisitObserver;
use Illuminate\Database\Eloquent\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;


class VisitMentalPatient extends Model
{
    use SoftDeletes,BelongsToTenants;

    protected $fillable = ['archive_id',  'doctor_id', 'visited_at', 'visit_mode', 'lost_visit', 'death','risk_assessment', 'symptom', 'insight', 'sleep', 'diet', 'social_function', 'dangerous_act','two_visit', 'two_hospitalization', 'laboratory_examination', 'medication_compliance','adverse_drug', 'treatment_effect', 'referral', 'medication_situation','medication_instruction','rehabilitation_measures', 'visit_classification', 'visit_doctor_signature','next_visited_at', 'tenant_id'];

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