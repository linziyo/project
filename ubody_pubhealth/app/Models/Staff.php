<?php

namespace App\Models;

use App\Models\Observers\StaffObserver;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Staff extends Authenticatable
{
    use Notifiable, EntrustUserTrait, BelongsToTenants;
    protected $fillable = ['community_hospital_id', 'user_id', 'tenant_id'];

    public function CommunityHospital()
    {
        return $this->belongsTo('App\Models\CommunityHospital');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public static function findByUser(User $user)
    {
        return Staff::where('user_id', $user->id)->first();
    }

    public static function boot()
    {
        parent::boot();
        Staff::observe(new StaffObserver());
    }
}