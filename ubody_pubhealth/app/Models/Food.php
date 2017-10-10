<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public $timestamps = false;
    protected $fillable = ['name', 'chinese_name', 'evaluate', 'category_id'];

    protected $table = 'food';


}
