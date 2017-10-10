<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveLivingWater extends Model
{
    protected $displayValues = [1 => '自来水', 2 => '经净化过滤的水', 3 => '井水', 4 => '河湖水', 5 => '塘水', 6 => '其他'];
    protected $fillable = ['value'];
    protected $appends = ['display_value'];
    protected $hidden = ['id', 'archive_id', 'created_at', 'updated_at'];
    public function archive()
    {
        return $this->hasOne('App\Models\Archive');
    }

    public function getDisplayValueAttribute()
    {
        return $this->displayValues[$this->attributes['value']];
    }
}
