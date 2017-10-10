<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    use SoftDeletes;

    protected $fillable = ['name', 'display_name', 'description'];
}
