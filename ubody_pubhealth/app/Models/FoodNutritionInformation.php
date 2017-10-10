<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FoodNutritionInformation extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'value', 'food_id'];

}
