<?php

namespace App\Models;

use App\Models\Observers\VisitObserver;
use App\Models\Observers\VisitChineseMedicineObserver;
use Illuminate\Database\Eloquent\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;


class VisitChineseMedicine extends Model
{
    use SoftDeletes, BelongsToTenants;

    protected $table = "visit_chinese_medicine";
    protected $fillable = ['archive_id', 'doctor_id','visit_mode', 'energy','exhausted','breathing','voice','emotion','mental','loneliness','fear','dry','cold','fear_cold','tolerance_cold',
        'have_cold','stuffy_nose','snore','allergy','ecchymosis','scratch','skin_dry','pain','greasy','face_speckle','eczema','throat_dry','mouse_smell','fat_abdomen','fear_cold_food',
        'shit_ache','shit_dry','tongue_thick','vein_thick','qixu_score','qixu_level','qixu_healthcare','qixu_other',
        'yangxu_score','yangxu_level','yangxu_healthcare','yangxu_other','yinxu_score','yinxu_level','yinxu_healthcare','yinxu_other',
        'tanshi_score','tanshi_level','tanshi_healthcare','tanshi_other','shire_score','shire_level','shire_healthcare','shire_other',
        'xieyu_score','xieyu_level','xieyu_healthcare','xieyu_other','qiyu_score','qiyu_level','qiyu_healthcare','qiyu_other',
        'tebing_score','tebing_level','tebing_healthcare','tebing_other','pinghe_score','pinghe_level','pinghe_healthcare','pinghe_other',
        'form_date','doctor_name','tenant_id','urticaria','over_weight'];


    public function getYangxuHealthcareAttribute()
    {
        return empty($this->attributes['yangxu_healthcare'])?0:explode(',',$this->attributes['yangxu_healthcare']);
    }

    public function getYinxuHealthcareAttribute()
    {
        return empty($this->attributes['yinxu_healthcare'])?0:explode(',',$this->attributes['yinxu_healthcare']);
    }

    public function getQixuHealthcareAttribute()
    {
        return empty($this->attributes['qixu_healthcare'])?0:explode(',',$this->attributes['qixu_healthcare']);
    }

    public function getTanshiHealthcareAttribute()
    {
        return empty($this->attributes['tanshi_healthcare'])?0:explode(',',$this->attributes['tanshi_healthcare']);
    }

    public function getShireHealthcareAttribute()
    {
        return empty($this->attributes['shire_healthcare'])?0:explode(',',$this->attributes['shire_healthcare']);
    }

    public function getXieyuHealthcareAttribute()
    {
        return empty($this->attributes['xieyu_healthcare'])?0:explode(',',$this->attributes['xieyu_healthcare']);
    }

    public function getQiyuHealthcareAttribute()
    {
        return empty($this->attributes['qiyu_healthcare'])?0:explode(',',$this->attributes['qiyu_healthcare']);
    }

    public function getTebingHealthcareAttribute()
    {
        return empty($this->attributes['tebing_healthcare'])?0:explode(',',$this->attributes['tebing_healthcare']);
    }

    public function getPingheHealthcareAttribute()
    {
        return empty($this->attributes['pinghe_healthcare'])?0:explode(',',$this->attributes['pinghe_healthcare']);
    }
    public static function boot()
    {
        parent::boot();
        static::observe(new VisitObserver());
    }

    public function visit()
    {
        return $this->belongsTo('App\Models\Visit');
    }

    public function archive()
    {
        return $this->belongsTo('App\Models\Archive');
    }

    public function fillModel(Request $request)
    {
        $convertFields= ['qixu_healthcare','yangxu_healthcare','yinxu_healthcare','tanshi_healthcare','shire_healthcare','xieyu_healthcare','qiyu_healthcare','tebing_healthcare','pinghe_healthcare'];
        foreach($convertFields as $item)
        {
            $this->$item = $request->get($item)?implode(',',$request->get($item)):0;
        }
    }
}
