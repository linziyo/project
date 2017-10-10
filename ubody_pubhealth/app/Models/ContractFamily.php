<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContractFamily extends Model
{
    use SoftDeletes, BelongsToTenants;

    protected $table = 'contract_family';
    protected $fillable = ['relationship', 'name', 'mobile','id_code','contract_id','tenant_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function contract()
    {
        return $this->belongsTo('App\Models\Contract');
    }
}
