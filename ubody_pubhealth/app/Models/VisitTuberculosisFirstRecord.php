<?php

namespace App\Models;

use App\Models\Observers\VisitObserver;
use Illuminate\Database\Eloquent\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitTuberculosisFirstRecord extends Model
{
    use SoftDeletes,BelongsToTenants;

    protected $table = "visit_tuberculosis_first_record";
    protected $fillable = ['archive_id', 'doctor_id', 'visited_at', 'visit_mode', 'patient_type', 'sputum_situation', 'drug_resistance', 'symptom', 'medication',
                           'supervise_staff', 'living_environment', 'life_style', 'education_training', 'next_visited_at', 'visit_doctor_signature', 'tenant_id'];


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
