<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArchiveFamily extends Model
{
    protected $displayValues = [1 => '无', 2 => '高血压', 3 => '糖尿病', 4 => '冠心病', 5 => '慢性阻塞性肺疾病', 6 => '恶性肿瘤',
        7 => '脑卒中', 8 => '严重精神障碍', 9 => '结核病', 10 => '肝炎', 11 => '先天畸形', 12 => '其他'];
    protected $fillable = ['relationship', 'value', 'content'];
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
