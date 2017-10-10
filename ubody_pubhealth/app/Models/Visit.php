<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    protected $fillable = ['archive_id', 'visited_at', 'next_visited_at', 'doctor_id', 'visit_type','visit_mode'];
    protected $hidden = ['created_at', 'updated_at'];
    public static $visit_type = [
        'App\Models\VisitSelfCareAbility' => 'visit_selfcare_ability',
        'App\Models\VisitHypertension' => 'visit_hypertension',
        'App\Models\VisitChineseMedicine' => 'visit_chinese_medicine',
        'App\Models\VisitDiabete' => 'visit_diabetes',
        'App\Models\VisitNewborn' => 'visit_newborn',
        'App\Models\VisitMentalPatient' => 'visit_mental_patient',
        'App\Models\VisitTuberculosisPatient' => 'visit_tuberculosis_patient',
        'App\Models\VisitTuberculosisFirstRecord' => 'visit_tuberculosis_first_record',
        'App\Models\VisitKid' => 'visit_kid',
        'App\Models\VisitTuberculosisPatient' => 'visit_tuberculosis_patient',
    ];

    public static $visit_name = [
        'App\Models\VisitSelfCareAbility' => '老年人生活自理评估随访',
        'App\Models\VisitHypertension' => '高血压随访',
        'App\Models\VisitDiabete' => '2型糖尿病患者随访',
        'App\Models\VisitNewborn' => '新生婴儿随访',
        'App\Models\VisitMentalPatient' => '严重精神障碍患者随访',
        'App\Models\VisitChineseMedicine' => '老年人中医药健康管理服务记录表',
        'App\Models\VisitTuberculosisPatient' => '肺结核患者随访服务记录表',
        'App\Models\VisitTuberculosisFirstRecord' => '肺结核患者第一次入户随访',
        'App\Models\VisitNewborn' => '新生儿家庭访视记录表',
        'App\Models\VisitKid' => '小儿访视记录表',
    ];

    public static $visit_types = [
        'App\Models\VisitSelfCareAbility' => ['table' => 'visit_selfcare_ability', 'name' => '老年人生活自理评估随访'],
        'App\Models\VisitHypertension' => ['table' => 'visit_hypertension', 'name' => '高血压随访'],
        'App\Models\VisitChineseMedicine' => ['table' => 'visit_chinese_medicine', 'name' => '中医体质随访'],
        'App\Models\VisitDiabete' => ['table' => 'visit_diabetes', 'name' => '2型糖尿病患者随访'],
        'App\Models\VisitNewborn' => ['table' => 'visit_newborn', 'name' => '新生婴儿随访'],
        'App\Models\VisitMentalPatient' => ['table' => 'visit_mental_patient', 'name' => '严重精神障碍患者随访'],
        'App\Models\VisitTuberculosisPatient' => ['table' => 'visit_tuberculosis_patient', 'name'=>'肺结核患者随访服务记录表'],
        'App\Models\VisitTuberculosisFirstRecord' => ['table' => 'visit_tuberculosis_first_record', 'name'=>'肺结核患者第一次入户随访'],
        'App\Models\VisitNewborn' => ['table' => 'visit_newborn','name' => '新生儿家庭访视记录表'],
        'App\Models\VisitKid' => ['table' => 'visit_kid','name' => '小儿访视记录表'],
    ];


    public function VisitNewborn()
    {
        return $this->hasOne('App\Models\VisitNewborn');
    }

    public function VisitSelfCareAbility()
    {
        return $this->hasOne('App\Models\VisitSelfCareAbility');
    }

    public function VisitHypertension()
    {
        return $this->hasOne('App\Models\VisitHypertension');
    }

    public function VisitChineseMedicine()
    {
        return $this->hasOne('App\Models\VisitChineseMedicine');
    }

    public function VisitDiabete()
    {
        return $this->hasOne('App\Models\VisitDiabete');
    }

    public function VisitMentalPatient()
    {
        return $this->hasOne('App\Models\VisitMentalPatient');
    }

    public function ChineseMedicine()
    {
        return $this->hasOne('App\Models\VisitChineseMedicine');
    }

    public function archive()
    {
        return $this->belongsTo('App\Models\Archive');
    }
}
