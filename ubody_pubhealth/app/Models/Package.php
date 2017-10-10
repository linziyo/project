<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Package extends Model
{
    use SoftDeletes, BelongsToTenants;

    protected $fillable = ['tenant_id', 'name', 'community_hospital_id', 'character', 'requirement', 'management_objective', 'price'];

    public function communityHospital()
    {
        return $this->belongsTo('App\Models\CommunityHospital');
    }
}
