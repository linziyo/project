<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveLivingToilet extends Model
{
    protected $displayValues = [1 => '卫生厕所', 2 => '一格或二格粪池式', 3 => '马桶', 4 => '露天粪坑', 5 => '简易棚厕'];
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
