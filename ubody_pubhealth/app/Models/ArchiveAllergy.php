<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveAllergy extends Model
{
    protected $displayValues = [1 => '无', 2 => '青霉素', 3 => '磺胺', 4 => '链霉素', 5 => '其他'];
    protected $fillable = ['value', 'content'];
    protected $appends = ['display_value'];
    protected $hidden = ['id', 'archive_id', 'created_at', 'updated_at'];

    public function archive()
    {
        return $this->hasOne('App\Models\Archive');
    }

    public function getDisplayValueAttribute()
    {
        if($this->attributes['value']){
            return $this->attributes['content'];
        }
        return $this->displayValues[$this->attributes['value']];
    }
}
