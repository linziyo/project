<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Family extends Model
{
    use SoftDeletes, BelongsToTenants;

    protected $fillable = ['user_id', 'relationship', 'name', 'mobile'];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
