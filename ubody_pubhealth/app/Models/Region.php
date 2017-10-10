<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    public $timestamps = false;
    protected $fillable = ['code', 'name', 'parent_code'];
    protected $hidden = ['parent_code'];

    public function children()
    {
        return $this->hasMany('App\Models\Region', 'parent_code', 'code');
    }
}
