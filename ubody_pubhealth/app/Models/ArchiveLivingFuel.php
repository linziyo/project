<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveLivingFuel extends Model
{
    protected $displayValues = [1 => '液化气', 2 => '煤', 3 => '天然气', 4 => '沼气', 5 => '柴火', 6 => '其他'];
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
