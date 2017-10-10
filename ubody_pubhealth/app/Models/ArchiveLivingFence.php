<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveLivingFence extends Model
{
    protected $displayValues = [1 => '无', 2 => '单设', 3 => '室内', 4 => '室外'];
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
