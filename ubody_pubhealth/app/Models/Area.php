<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use BelongsToTenants, SoftDeletes;

    protected $fillable = ['tenant_id', 'name', 'community_id'];

    public function doctors()
    {
        return $this->hasMany('App\Models\Doctor');
    }

    public function community()
    {
        return $this->belongsTo('App\Models\Community');
    }
}
