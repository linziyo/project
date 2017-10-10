<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveLivingKitchen extends Model
{
    protected $displayValues = [1 => '无', 2 => '油烟机', 3 => '换气扇', 4 => '烟囱'];
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
