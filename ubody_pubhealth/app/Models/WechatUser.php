<?php

namespace App\Models;

use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;

class WechatUser extends Model
{
    use BelongsToTenants;

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
