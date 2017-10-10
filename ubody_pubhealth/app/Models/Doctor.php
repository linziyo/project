<?php

namespace App\Models;

use App\Models\Observers\DoctorObserver;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model
{
    use SoftDeletes, BelongsToTenants;

    protected $fillable = ['tenant_id', 'user_id', 'community_hospital_id', 'avatar', 'duty', 'title', 'specialty', 'skills', 'working_time', 'consult', 'description'];

    public function communityHospital()
    {
        return $this->belongsTo('App\Models\CommunityHospital');
    }

    public function groups()
    {
        return $this->belongsToMany('App\Models\Group', 'group_doctors', 'doctor_id', 'group_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function archives()
    {
        return $this->hasMany('App\Models\Archive');
    }

    public function contracts()
    {
        return $this->hasMany('App\Models\Contract');
    }

    public function visitMentalPatients()
    {
        return $this->hasMany('App\Models\VisitMentalPatient');
    }

    public static function findByUser(User $user)
    {
        return Doctor::where('user_id', $user->id)->first();
    }

    public static function boot()
    {
        parent::boot();
        Doctor::observe(new DoctorObserver());
    }
}
