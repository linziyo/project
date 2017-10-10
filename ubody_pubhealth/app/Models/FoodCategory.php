<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodCategory extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

}
