<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveExpose extends Model
{
    protected $displayValues = [1 => '无', 2 => '化学品', 3 => '毒物', 4 => '射线'];
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
