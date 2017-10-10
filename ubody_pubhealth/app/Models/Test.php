<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class Test extends Model
{
      
    protected $table = "test";

    protected $fillable = ['id', 'name'];

    public function getOne()
    {
        
    }

    // public function community()
    // {
    //     return $this->belongsTo('App\Models\Community');
    // }

    // public function groups()
    // {
    //     return $this->belongsToMany('App\Models\Group', 'group_doctors', 'doctor_id', 'group_id');
    // }

    // public function user()
    // {
    //     return $this->belongsTo('App\Models\User');
    // }
}