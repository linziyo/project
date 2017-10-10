<?php

namespace App\Models;
use App\Models\Observers\ArchiveCodeObserver;
use App\Models\Observers\VisitObserver;
use Illuminate\Database\Eloquent\Model;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class VisitNewborn extends Model
{
    use SoftDeletes, BelongsToTenants;
    public static $feedingPatterns=[1 => '纯母乳', 2 => '混合', 3 => '人工'];
    public static $asphyxia_neonate=[1 => '无', 2 => '有'];
    public static $deformity=[1 => '无', 2 => '有'];
    public static $eye=[1 => '未见异常', 2 => '异常'];

    public static $midwiferyMode=[1 => '顺产', 2 => '胎头吸引', 3 => '产钳', 4 => '剖宫', 5 => '双多胎', 6 => '臀位',7=>'其他'];
    public static $pregnancyDisease = [1 => '无', 2 => '糖尿病', 3 => '妊娠期高血压', 4 => '其他'];
    public static $hearingScreening = [1 => '通过', 2 => '未通过', 3 => '未筛查', 4 => '不详'];
    public static $diseaseScreening = [1 => '未进行', 2 => '检查均阴性', 3 => '甲低', 4 => '苯丙酮尿症', 5 => '其他遗传代谢病'];
    public static $color_face = [1 => '红润', 2 => '黄染', 3 => '其他'];
    public static $jaundiceParts = [1 => '无', 2 => '面部', 3 => '躯干', 4 => '四肢', 5 => '手足'];
    public static $umbilicalCord = [1 => '未脱', 2 => '脱落', 3 => '脐部有渗出', 4 => '其他'];
    public static $guides = [1 => '喂养指导', 2 => '发育指导', 3 => '防病指导', 4 => '预防伤害指导', 5 => '口腔保健指导', 6 => '其他'];
    public static $limb_mobility=[1 => '未见异常', 2 => '异常'];
    public static $ear=[1 => '未见异常', 2 => '异常'];
    public static $cervical_mass=[1 => '无', 2 => '有'];
    public static $nose=[1 => '未见异常', 2 => '异常'];
    public static $skin=[1 => '未见异常', 2 => '湿疹',3=>'糜烂',4=>'其他'];
    public static $portal_fissure=[1 => '未见异常', 2 => '异常'];
    public static $cardiopulmonary_auscu=[1 => '未见异常', 2 => '异常'];
    public static $chest=[1 => '未见异常', 2 => '异常'];
    public static $abdominal_touch=[1 => '未见异常', 2 => '异常'];
    public static $spine=[1 => '未见异常', 2 => '异常'];
    public static $aedea=[1 => '未见异常', 2 => '异常'];
    public static $referral_recommendations=[1 => '未见异常', 2 => '异常'];



    protected $fillable = [
        'archive_id', 'visited_at','visit_mode', 'next_visited_at', 'doctor_id','tenant_id','father_name','father_job','father_phone_number'
        ,'father_birthday','mother_name','mother_job','mother_phone_number','mother_birthday','pregnancy_disease','midwifery_institution'
        ,'midwifery_mode','asphyxia_neonate','deformity','hearing_screening','disease_screening','birth_weight','weight','birth_height'
        ,'feeding_patterns','feeding_amount','feeding_frequency','temperature'
        ,'heart_rate','breathing_rate','color_face','jaundice_parts','bregma','eye','ear','nose','mouth'
        ,'limb_mobility','cervical_mass','skin','portal_fissure','chest','spine','cardiopulmonary_auscultation'
        ,'abdominal_touch','aedea','umbilical_cord','referral_recommendations','referral_department','guide','pregnancy_week','vomit','shit','shit_times','referral_reason','guide_other'
        ,'midwifery_mode_other','deformity_other','disease_screening_other','color_face_other','bregma_result_other','umbilical_cord_other','doctor_name','next_visit_place'
    ];
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

//        $this->attributes['code'] = '1111';
    }

    public function getGuideAttribute()
    {
        return $this->attributes['guide']?explode(',',$this->attributes['guide']):0;
    }
    public function getPregnancyDiseaseAttribute()
    {
        return $this->attributes['pregnancy_disease']?explode(',',$this->attributes['pregnancy_disease']):0;
    }
    public function getMidwiferyModeAttribute()
    {
        return $this->attributes['midwifery_mode']?explode(',',$this->attributes['midwifery_mode']):0;
    }
    public function getJaundicePartsAttribute()
    {
        return $this->attributes['jaundice_parts']?explode(',',$this->attributes['jaundice_parts']):0;
    }
    public function getUmbilicalCordAttribute()
    {
        return $this->attributes['umbilical_cord']?explode(',',$this->attributes['umbilical_cord']):0;
    }

    public function getDiseaseScreeningAttribute()
    {
        return $this->attributes['disease_screening']?explode(',',$this->attributes['disease_screening']):0;
    }

    public function fillModel(Request $request)
    {
        $convertFields= ['guide','pregnancy_disease','midwifery_mode','jaundice_parts','umbilical_cord','disease_screening'];
        foreach($convertFields as $item)
        {
            $this->$item = $request->get($item)?implode(',',$request->get($item)):0;
        }
    }

    public function visit()
    {
        return $this->belongsTo('App\Models\Visit');
    }

    public static function boot()
    {
        parent::boot();
        static::observe(new VisitObserver());
    }
}
