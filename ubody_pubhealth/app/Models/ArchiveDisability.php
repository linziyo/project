<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveDisability extends Model
{
    protected $displayValues = [1 => '无残疾', 2 => '视力残疾', 3 => '听力残疾', 4 => '言语残疾', 5 => '肢体残疾', 6 => '智力残疾', 7 => '精神残疾', 8 => '其他残疾'];
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
