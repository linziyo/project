<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveInjury extends Model
{
    protected $fillable = ['value', 'content', 'confirmed_at'];
    protected $appends = ['display_value'];
    protected $hidden = ['id', 'archive_id', 'created_at', 'updated_at'];
    public function archive()
    {
        return $this->hasOne('App\Models\Archive');
    }

    public function getDisplayValueAttribute()
    {
        return $this->attributes['value'] == 1 ? '无' : $this->attributes['content'];
    }
}
