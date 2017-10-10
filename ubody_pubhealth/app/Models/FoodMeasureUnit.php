<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodMeasureUnit extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'value', 'food_id'];

}
