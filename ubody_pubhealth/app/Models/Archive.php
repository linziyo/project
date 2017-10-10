<?php

namespace App\Models;

use App\Models\Observers\ArchiveCodeObserver;
use App\Models\Observers\ArchiveObserver;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Archive extends Model
{
    use BelongsToTenants, SoftDeletes;

    public static $sexes = [0 => '未知的性别', 1 => '男', 2 => '女', 9 => '未说明的性别'];

    public static $educations = [
        1 => '研究生', 2 => '大学本科', 3 => '大学专科和专科学校', 4 => '中等专业学校', 5 => '技工学校',
        6 => '高中', 7 => '初中', 8 => '小学', 9 => '文盲或半文盲', 10 => '不详'];

    public static $jobs = [
        1 => '国家机关、党群组织、企业、事业单位负责人',
        2 => '专业技术人员',
        3 => '办事人员和有关人员',
        4 => '商业、服务业人员',
        5 => '农、林、牧、渔、水利业生产人员',
        6 => '生产、运输设备操作人员及有关人员',
        7 => '军人',
        8 => '不便分类的其他从业人员',
        9 => '无职业'
    ];

    public static $bloodGroups = [
        1 => 'A 型',
        2 => 'B 型',
        3 => 'O 型',
        4 => 'AB 型',
        5 => '不详'
    ];

    public static $bloodGroupRHs = [
        1 => '阴性',
        2 => '阳性',
        3 => '不详'
    ];

    public static $maritalStatus = [
        1 => '未婚',
        2 => '已婚',
        3 => '丧偶',
        4 => '离异',
        5 => '未说明的婚姻状况'
    ];

    protected $fillable = [
        'community_id', 'doctor_id', 'code', 'real_name', 'sex', 'birthday', 'id_code', 'work_unit', 'mobile', 'contact_name', 'contact_mobile', 'emergency_contact_name',
        'emergency_contact_mobile', 'is_register', 'nation', 'blood_group', 'blood_group_rh', 'education', 'job', 'marital_status', 'address', 'phone_number', 'description',
        'status', 'checked_at', 'tenant_id'];

    protected $appends = ['age'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);

        $this->attributes['code'] = '1111';
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function contract()
    {
        return $this->hasOne('App\Models\Contract');
    }

    public function approved()
    {
        return $this['status'] == 2;
    }

    public function paymentModes()
    {
        return $this->hasMany('App\Models\ArchivePaymentMode');
    }

    public function allergies()
    {
        return $this->hasMany('App\Models\ArchiveAllergy');
    }

    public function exposes()
    {
        return $this->hasMany('App\Models\ArchiveExpose');
    }

    public function diseases()
    {
        return $this->hasMany('App\Models\ArchiveDisease');
    }

    public function injuries()
    {
        return $this->hasMany('App\Models\ArchiveInjury');
    }

    public function operations()
    {
        return $this->hasMany('App\Models\ArchiveOperation');
    }

    public function transfusions()
    {
        return $this->hasMany('App\Models\ArchiveTransfusion');
    }

    public function families()
    {
        return $this->hasMany('App\Models\ArchiveFamily');
    }

    public function hereditaryDisease()
    {
        return $this->hasOne('App\Models\ArchiveHereditaryDisease');
    }

    public function disabilities()
    {
        return $this->hasMany('App\Models\ArchiveDisability');
    }

    public function livingKitchen()
    {
        return $this->hasOne('App\Models\ArchiveLivingKitchen');
    }

    public function livingFuel()
    {
        return $this->hasOne('App\Models\ArchiveLivingFuel');
    }

    public function livingWater()
    {
        return $this->hasOne('App\Models\ArchiveLivingWater');
    }

    public function livingToilet()
    {
        return $this->hasOne('App\Models\ArchiveLivingToilet');
    }

    public function livingFence()
    {
        return $this->hasOne('App\Models\ArchiveLivingFence');
    }

    public function getSexDisplayAttribute()
    {
        return array_key_exists($this->attributes['sex'], Archive::$sexes) ? Archive::$sexes[$this->attributes['sex']] : "";
    }

    public function visits()
    {
        return $this->hasMany('App\Models\Visit');
    }

    public function getAgeAttribute()
    {
        $age = strtotime($this->attributes['birthday']);
        if ($age === false) {
            return false;
        }
        list($y1, $m1, $d1) = explode("-", date("Y-m-d", $age));
        $now = strtotime("now");
        list($y2, $m2, $d2) = explode("-", date("Y-m-d", $now));
        $age = $y2 - $y1;
        if ((int)($m2 . $d2) < (int)($m1 . $d1))
            $age -= 1;
        return $age;
    }

    public function getEducationDisplayAttribute()
    {
        return array_key_exists($this->attributes['education'], Archive::$educations) ? Archive::$educations[$this->attributes['education']] : "";
    }

    public function getJobDisplayAttribute()
    {
        return array_key_exists($this->attributes['job'], Archive::$jobs) ? Archive::$jobs[$this->attributes['job']] : "";
    }

    public function getBloodGroupDisplayAttribute()
    {
        $return = '';
        if (array_key_exists($this->attributes['blood_group'], Archive::$bloodGroups)) {
            $return = Archive::$bloodGroups[$this->attributes['blood_group']];
        } else {
            return $return;
        }

        return $return;
    }


    public function getRhDisplayAttribute()
    {
        if (array_key_exists($this->attributes['blood_group_rh'], Archive::$bloodGroupRHs)) {
            return Archive::$bloodGroupRHs[$this->attributes['blood_group_rh']];
        }else {
            return '';
        }
    }

    /**
     * @return string
     */
    public function getMaritalStatusDisplayAttribute()
    {
        return array_key_exists($this->attributes['marital_status'], Archive::$maritalStatus) ? Archive::$maritalStatus[$this->attributes['marital_status']] : "";
    }

    public static function boot()
    {
        parent::boot();
        static::observe(new ArchiveObserver());
    }


    public static function details($id){
        $archive = Archive::with([
            'paymentModes', 'allergies', 'exposes', 'diseases', 'operations', 'injuries', 'transfusions',
            'families', 'hereditaryDisease', 'disabilities', 'livingKitchen', 'livingFuel', 'livingWater', 'livingToilet', 'livingFence'
        ])->findOrFail($id);
        return $archive;
    }
}
