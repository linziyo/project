<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchivePaymentMode extends Model
{
    protected $displayValues = [1 => '城镇职工基本医疗保险', 2 => '城镇居民基本医疗保险', 3 => '新型农村合作医疗', 4 => '贫困救助', 5 => '商业医疗保险', 6 => '全公费', 7 => '全自费', 8 => '其他'];
    protected $fillable = ['value','content'];
    protected $appends = ['display_value'];
    protected $hidden = ['id', 'archive_id', 'created_at', 'updated_at'];
    public function archive()
    {
        return $this->hasOne('App\Models\Archive');
    }

    public function getDisplayValueAttribute()
    {
        if($this->attributes['value'] == 8){
            return $this->attributes['content'];
        }
        return $this->displayValues[$this->attributes['value']];
    }
}
