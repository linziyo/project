<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Observers\VisitObserver;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisitTuberculosisPatient extends Model
{
    use SoftDeletes,BelongsToTenants;

    public static $supervise_staff = [1 => '医生', 2 => '家属', 3 => '自服药', 4 => '其他'];
    public static $visit_style = [1 => '门诊', 2 => '家庭', 3 => '电话'];
    public static $symptom = [0 => '没有症状', 1 => '咳嗽咳痰', 2 => '低热盗汗', 3 => '咯血或血痰', 4 => '胸痛消瘦', 5 => '恶心纳差', 6 => '关节疼痛',
                              7 => '头痛失眠', 8 => '视物模糊', 9 => '皮肤瘙痒、皮疹', 10 => '耳鸣、听力下降', 11 => '其他'];
    public static $drug_type = [1 => '固定剂量复合制剂', 2 => '散装药', 3 => '板式组合药', 4 => '注射剂'];

    protected $table = "visit_tuberculosis_patient";
    protected $fillable = ['archive_id', 'doctor_id', 'visit_id', 'visited_at', 'real_name','supervise_staff', 'treatment_monthly', 'visit_mode', 'symptom', 'lift_style', 'medication',
                           'drug_response', 'complication', 'referral', 'opinions', 'next_visited_at', 'visit_doctor_signature', 'stop_treatment', 'full_management', 'tenant_id'];

    public static function boot()
    {
        parent::boot();
        static::observe(new VisitObserver());
    }

    public function visit()
    {
        return $this->belongsTo('App\Models\Visit');
    }
}
