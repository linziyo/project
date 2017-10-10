<?php

namespace App\Models;

use App\Models\Observers\VisitObserver;
use HipsterJazzbo\Landlord\BelongsToTenants;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class VisitKid extends Model
{
    use SoftDeletes, BelongsToTenants;
    protected $table = "visit_kids";

    protected $fillable = [
        'archive_id', 'doctor_id', 'visited_at','visit_mode','next_visited_at','tenant_id','month','weight','height','head_size','face_color','skin','bregma','cervical_mass','eye','ear','mouth','tooth','gait',
        'chest','hearing','abdomen','navel','limb_mobility','rickets_symptom','rickets_sign','aedea','hemoglobin','outdoor_activity','intake_vitamin_d','grow_assessment',
        'disease_between_visit','referral_recommendations','guide','body_assessment','body_mark','vision'
    ];


    public function getWeightAttribute()
    {
        return json_decode($this->attributes['weight']);
    }

    public function getHeightAttribute()
    {
        return json_decode($this->attributes['height']);
    }

    public function getBregmaAttribute()
    {
        return json_decode($this->attributes['bregma']);
    }

    public function getDiseaseBetweenVisitAttribute()
    {
        return json_decode($this->attributes['disease_between_visit']);
    }

    public function getReferralRecommendationsAttribute()
    {
        return json_decode($this->attributes['referral_recommendations']);
    }

    public function getGuideAttribute()
    {
        return json_decode($this->attributes['guide']);
    }

    public function getRicketsSymptomAttribute()
    {
        return json_decode($this->attributes['rickets_symptom']);
    }

    public function getRicketsSignAttribute()
    {
        return json_decode($this->attributes['rickets_sign']);
    }

    public function getGrowAssessmentAttribute()
    {
        return json_decode($this->attributes['grow_assessment']);
    }

    public function getDoctorNameAttribute()
    {
        return $this->attributes['doctor_name'] = $this->doctor->user->real_name;
    }
    public function fillModel(array $data)
    {
        $this->attributes['weight'] = json_encode(['weight'=>!empty($data['weight'])? $data['weight']: '','weight_level'=>!empty($data['weight_level'])?$data['weight_level']:'']);
        $this->attributes['height'] = json_encode(['height'=>!empty($data['height'])? $data['height']: '','height_level'=>!empty($data['height_level'])?$data['height_level']:'']);
        $this->attributes['bregma'] = json_encode(['bregma'=>!empty($data['bregma'])?$data['bregma']:0,'bregma_width'=>!empty($data['bregma_width'])?$data['bregma_width']:'','bregma_height'=>!empty($data['bregma_height'])?$data['bregma_height']:'']);
        $this->attributes['referral_recommendations'] = json_encode([
            'referral_recommendations'=>!empty($data['referral_recommendations'])?$data['referral_recommendations']:'',
            'referral_recommendations_reason'=>!empty($data['referral_recommendations_reason'])?$data['referral_recommendations_reason']:'',
            'referral_recommendations_office'=>!empty($data['referral_recommendations_office'])?$data['referral_recommendations_office']:''
        ],JSON_UNESCAPED_UNICODE);
        $temp = [];
        if(!empty($data['random_access']))
        {
            foreach($data['random_access'] as $value)
            {
                $arr['random_access'] = $value;
                $key = 'random_access_content_'.$value;
                $arr['random_access_content'] = !empty($data[$key])?$data[$key]:'';
                array_push($temp,$arr);
            }
        }
        $this->attributes['disease_between_visit'] = json_encode($temp,JSON_UNESCAPED_UNICODE);

        unset($temp,$arr);
        $temp = [];
        if(!empty($data['guide']))
        {
            foreach($data['guide'] as $value)
            {
                $arr['guide'] = $value;
                if($value == 6)
                {
                    $arr['guide_other'] = $data['guide_other'];
                }
                array_push($temp,$arr);
            }
        }
        $this->attributes['guide'] = json_encode($temp,JSON_UNESCAPED_UNICODE);
        unset($temp,$arr);

        $this->attributes['rickets_symptom'] = json_encode(!empty($data['rickets_symptom'])?$data['rickets_symptom']:[]);
        $this->attributes['rickets_sign'] = json_encode(!empty($data['rickets_sign'])?$data['rickets_sign']:[]);
        $this->attributes['grow_assessment'] = json_encode(!empty($data['grow_assessment'])?$data['grow_assessment']:[]);



    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
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
