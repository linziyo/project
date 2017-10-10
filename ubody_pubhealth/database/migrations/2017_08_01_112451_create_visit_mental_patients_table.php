<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitMentalPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //精神患者个人信息表
        Schema::create('visit_mental_patients_info', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->integer('doctor_id')->unsigned()->comment('随访医生');
            $table->foreign('archive_id')->references('id')->on('archives')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('visit_id')->unsigned();
            $table->foreign('visit_id')->references('id')->on('visits')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('visit_mode')->nullable()->comment('随访方式');
            $table->string('guardian_name')->nullable()->comment('监护人姓名');
            $table->string('guardian_relationship')->nullable()->comment('与患者关系');
            $table->string('guardian_address')->nullable()->comment('监护人住址');
            $table->string('guardian_telephone')->nullable()->comment('监护人电话');
            $table->string('area_contact_person_info')->nullable()->comment('辖区村（居）委会联系人、电话');
            $table->integer('account_type')->nullable()->comment('户口类型:1.城镇 2.农村');
            $table->integer('employment_status')->nullable()->comment('就业情况:1.在岗工人 2.在岗管理者 3.农民 4.下岗或无业 5.在校学生 6.退休 7.专业技术人员 8.其他 9.不详');
            $table->string('knowing')->nullable()->comment('知情同意');
            $table->date('first_time')->nullable()->comment('初次发病时间');
            $table->string('symptom')->nullable()->comment('既往主要症状');
            $table->integer('locked_type')->nullable()->comment('既往关锁情况');
            $table->string('treatment')->nullable()->comment('既往治疗情况');
            $table->string('diagnosis')->nullable()->comment('目前诊断情况');
            $table->integer('last_treatment_effect')->nullable()->comment('效果:1.临床痊愈 2.好转 3.无变化 4.加重');
            $table->string('behavior')->nullable()->comment('危险行为');
            $table->integer('financial_condition')->nullable()->comment('经济状况:1.贫困，在当地贫困线标准以下 2.非贫困');
            $table->string('suggestion')->nullable()->comment('专科医生的意见');
            $table->date('form_at')->nullable()->comment('填表时间');
            $table->string('doctor_signature')->nullable()->comment('医生签名');
            $table->timestamp('visited_at')->nullable()->comment('本次访视日期');
            $table->timestamp('next_visited_at')->nullable()->comment('下次随访日期');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('tenant_id')->unsigned();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
        });

        //严重精神障碍患者随访服务记录表
        Schema::create('visit_mental_patients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->integer('doctor_id')->unsigned()->comment('随访医生');
            $table->foreign('archive_id')->references('id')->on('archives')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('visit_id')->unsigned();
            $table->foreign('visit_id')->references('id')->on('visits')->onUpdate('cascade')->onDelete('cascade');
            $table->date('visited_at')->nullable()->comment('本次访视日期');
            $table->integer('visit_mode')->nullable()->comment('随访方式');
            $table->string('lost_visit')->nullable()->comment('失访原因');
            $table->string('death')->nullable()->comment('死亡，日期和原因');
            $table->string('risk_assessment')->nullable()->comment('危险性评估');
            $table->string('symptom')->nullable()->comment('目前症状');
            $table->string('insight')->nullable()->comment('自知力');
            $table->string('sleep')->nullable()->comment('睡眠情况');
            $table->string('diet')->nullable()->comment('饮食情况');
            $table->string('social_function')->nullable()->comment('社会功能情况');
            $table->string('dangerous_act')->nullable()->comment('危险行为');
            $table->string('two_visit')->nullable()->comment('两次随访期间关锁情况');
            $table->string('two_hospitalization')->nullable()->comment('两次随访期间住院情况');
            $table->string('laboratory_examination')->nullable()->comment('实验室检查');
            $table->string('medication_compliance')->nullable()->comment('用药依从性');
            $table->string('adverse_drug')->nullable()->comment('药物不良反应');
            $table->string('treatment_effect')->nullable()->comment('治疗效果');
            $table->string('referral')->nullable()->comment('是否转诊');
            $table->string('medication_situation')->nullable()->comment('用药情况');
            $table->string('medication_instruction')->nullable()->comment('用药指导');
            $table->string('rehabilitation_measures')->nullable()->comment('康复措施');
            $table->string('visit_classification')->nullable()->comment('本次随访分类');
            $table->string('visit_doctor_signature')->nullable()->comment('医生签名');
            $table->date('next_visited_at')->nullable()->comment('下次随访日期');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('tenant_id')->unsigned();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
        });

        //高血压随访表
        Schema::create('visit_hypertension', function(Blueprint $table){
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->integer('doctor_id')->unsigned()->comment('随访医生');
            $table->foreign('archive_id')->references('id')->on('archives')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('visit_id')->unsigned();
            $table->foreign('visit_id')->references('id')->on('visits')->onUpdate('cascade')->onDelete('cascade');
            $table->date('visited_at')->nullable()->comment('随访日期');
            $table->integer('visit_mode')->nullable()->comment('随访方式');
            $table->string('symptom')->nullable()->comment('症状');
            $table->string('signs')->nullable()->comment('体征');
            $table->string('life_style')->nullable()->comment('生活方式指导');
            $table->string('auxiliary_check')->nullable()->comment('辅助检查');
            $table->string('medication_compliance')->nullable()->comment('服药依从性');
            $table->string('adverse_drug')->nullable()->comment('药物不良反应');
            $table->string('visit_classification')->nullable()->comment('此次随访分类');
            $table->string('medication_situation')->nullable()->comment('用药情况');
            $table->string('referral')->nullable()->comment('转诊');
            $table->date('next_visited_at')->nullable()->comment('下次随访日期');
            $table->string('visit_doctor_signature')->nullable()->comment('随访医生签名');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('tenant_id')->unsigned();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
        });

        //二型糖尿病患者随访服务记录表
        Schema::create('visit_diabetes', function(Blueprint $table){
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->integer('doctor_id')->unsigned()->comment('随访医生');
            $table->foreign('archive_id')->references('id')->on('archives')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('visit_id')->unsigned();
            $table->foreign('visit_id')->references('id')->on('visits')->onUpdate('cascade')->onDelete('cascade');
            $table->date('visited_at')->nullable()->comment('随访日期');
            $table->integer('visit_mode')->nullable()->comment('随访方式');
            $table->string('symptom')->nullable()->comment('症状');
            $table->string('signs')->nullable()->comment('体征');
            $table->string('life_style')->nullable()->comment('生活方式指导');
            $table->string('auxiliary_check')->nullable()->comment('辅助检查');
            $table->string('medication_compliance')->nullable()->comment('服药依从性');
            $table->string('adverse_drug')->nullable()->comment('药物不良反应');
            $table->string('hypoglycemia_reaction')->nullable()->comment('低血糖反应');
            $table->string('visit_classification')->nullable()->comment('此次随访分类');
            $table->string('medication_situation')->nullable()->comment('用药情况');
            $table->string('referral')->nullable()->comment('转诊');
            $table->date('next_visited_at')->nullable()->comment('下次随访日期');
            $table->string('visit_doctor_signature')->nullable()->comment('随访医生签名');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('tenant_id')->unsigned();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
        });

        //老年人生活自理能力评估表
        Schema::create('visit_self_care_ability', function(Blueprint $table){
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->integer('doctor_id')->unsigned()->comment('随访医生');
            $table->integer('visit_mode')->nullable()->comment('随访方式');
            $table->foreign('archive_id')->references('id')->on('archives')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('visit_id')->unsigned();
            $table->foreign('visit_id')->references('id')->on('visits')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('meal')->nullable()->comment('进餐');
            $table->integer('comb_wash')->nullable()->comment('梳洗');
            $table->integer('dressing')->nullable()->comment('穿衣');
            $table->integer('toilets')->nullable()->comment('如厕');
            $table->integer('activity')->nullable()->comment('活动');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('tenant_id')->unsigned();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
        });

        //肺结核患者随访服务记录表
        Schema::create('visit_tuberculosis_patient', function(Blueprint $table){
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->integer('doctor_id')->unsigned()->comment('随访医生');
            $table->integer('visit_id')->unsigned();
            $table->foreign('archive_id')->references('id')->on('archives')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('visit_id')->references('id')->on('visits')->onUpdate('cascade')->onDelete('cascade');

            $table->date('visited_at')->nullable()->comment('随访时间');
            $table->integer('visit_mode')->nullable()->comment('随访方式');
            $table->string('real_name')->nullable()->comment('姓名');
            $table->integer('treatment_monthly')->nullable()->comment('治疗月序');
            $table->integer('supervise_staff')->nullable()->comment('督导人员');
            $table->integer('follow_way')->nullable()->comment('随访方式');
            $table->string('symptom')->nullable()->comment('症状');
            $table->string('lift_style')->nullable()->comment('生活方式');
            $table->string('medication')->nullable()->comment('用药');
            $table->string('drug_response')->nullable()->comment('药物不良反应');
            $table->string('complication')->nullable()->comment('并发症');
            $table->string('referral')->nullable()->comment('转诊');
            $table->string('opinions')->nullable()->comment('处理意见');
            $table->date('next_visited_at')->nullable()->comment('下次随访时间');
            $table->string('visit_doctor_signature')->nullable()->comment('随访医生签名');
            $table->string('stop_treatment')->nullable()->comment('停止治疗');
            $table->string('full_management')->nullable()->comment('全程管理情况');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('tenant_id')->unsigned();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
        });

        //肺结核患者第一次入户随访服务记录表
        Schema::create('visit_tuberculosis_first_record', function(Blueprint $table){
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->integer('doctor_id')->unsigned()->comment('随访医生');
            $table->integer('visit_id')->unsigned();
            $table->foreign('archive_id')->references('id')->on('archives')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('visit_id')->references('id')->on('visits')->onUpdate('cascade')->onDelete('cascade');

            $table->date('visited_at')->nullable()->comment('随访时间');
            $table->integer('visit_mode')->nullable()->comment('随访方式');
            $table->string('patient_type')->nullable()->comment('患者类型');
            $table->string('sputum_situation')->nullable()->comment('痰菌情况');
            $table->string('drug_resistance')->nullable()->comment('耐药情况');
            $table->string('symptom')->nullable()->comment('症状及体征');
            $table->string('medication')->nullable()->comment('用药');
            $table->string('supervise_staff')->nullable()->comment('督导人员');
            $table->string('living_environment')->nullable()->comment('居住环境');
            $table->string('life_style')->nullable()->comment('生活方式');
            $table->string('education_training')->nullable()->comment('健康教育及培训');
            $table->date('next_visited_at')->nullable()->comment('下次随访时间');
            $table->string('visit_doctor_signature')->nullable()->comment('随访医生签名');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('tenant_id')->unsigned();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visit_mental_patients_info');
        Schema::dropIfExists('visit_mental_patients');
        Schema::dropIfExists('visit_hypertension');
        Schema::dropIfExists('visit_diabetes');
        Schema::dropIfExists('visit_self_care_ability');
        Schema::dropIfExists('visit_tuberculosis_patient');
        Schema::dropIfExists('visit_tuberculosis_first_record');
    }
}
