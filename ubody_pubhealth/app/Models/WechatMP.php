<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;

class WechatMP extends Model
{
    use BelongsToTenants;

    protected $fillable = ['component_id', 'component_secret', 'token'];

    protected $hidden = ['created_at', 'updated_at'];
}
