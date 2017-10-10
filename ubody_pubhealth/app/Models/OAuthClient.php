<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OAuthClient extends Model
{
    protected $table = "oauth_clients";

    public function community()
    {
        return $this->hasMany('App\Models\Community');
    }

    public function users()
    {
        return $this->hasMany('App\Models\Users');
    }
}