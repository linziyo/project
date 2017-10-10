<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVisitNewborn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('visit_newborns', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('visit_mode')->nullable()->comment('随访方式');
            $table->timestamp('visited_at')->nullable()->comment('本次访视日期');
            $table->timestamp('next_visited_at')->nullable()->comment('下次访视日期');
            $table->integer('doctor_id')->unsigned()->comment('随访医生');
            $table->integer('visit_id')->unsigned();
            $table->foreign('visit_id')->references('id')->on('visits')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('archive_id')->references('id')->on('archives')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('tenant_id')->unsigned();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');

            $table->string('father_name')->nullable()->comment('父亲姓名');
            $table->string('father_job')->nullable()->comment('父亲职业');
            $table->string('father_phone_number')->nullable()->comment('父亲电话');
            $table->string('father_birthday')->nullable()->comment('父亲出生日期');
            $table->string('mother_name')->nullable()->comment('母亲姓名');
            $table->string('mother_job')->nullable()->comment('母亲姓名');
            $table->string('mother_phone_number')->nullable()->comment('母亲电话');
            $table->string('mother_birthday')->nullable()->comment('母亲出生日期');

            $table->string('pregnancy_disease')->nullable()->comment('母亲妊娠期患病情况');
            $table->string('pregnancy_week')->nullable()->comment('出生孕周');
            $table->string('midwifery_institution')->nullable()->comment('助产机构名称');
            $table->string('midwifery_mode')->nullable()->comment('出生情况');
            $table->string('midwifery_mode_other')->nullable()->comment('出生情况其它内容');
            $table->tinyInteger('asphyxia_neonate',false,true)->default(0)->comment('新生儿窒息');
            $table->tinyInteger('deformity',false,true)->default(0)->comment('畸形');
            $table->string('deformity_other')->nullable()->comment('畸形其它');
            $table->tinyInteger('hearing_screening',false,true)->default(0)->comment('听力筛查');
            $table->string('disease_screening')->nullable()->comment('疾病筛查');
            $table->string('disease_screening_other')->nullable()->comment('疾病筛查其它');
            $table->string('birth_weight')->nullable()->comment('新生儿出生体重');
            $table->string('weight')->nullable()->comment('目前体重');
            $table->string('birth_height')->nullable()->comment('出生身长');
            $table->tinyInteger('feeding_patterns',false,true)->default(0)->comment('喂养方式');
            $table->string('feeding_amount')->nullable()->comment('吃奶量 mL/次');
            $table->string('feeding_frequency')->nullable()->comment('吃奶次数 次/日');
            $table->tinyInteger('vomit',false,true)->default(0)->comment('呕吐');
            $table->tinyInteger('shit',false,true)->default(0)->comment('大便');
            $table->integer('shit_times',false,true)->default(0)->comment('大便次数');
            $table->string('temperature')->nullable()->comment('体温');
            $table->string('heart_rate')->nullable()->comment('心率');
            $table->string('breathing_rate')->nullable()->comment('呼吸频率');
            $table->tinyInteger('color_face',false,true)->default(0)->comment('面色');
            $table->string('color_face_other')->nullable()->comment('面色其它');
            $table->string('jaundice_parts')->nullable()->comment('黄疸部位');
            $table->string('bregma')->nullable()->comment('前卤');
            $table->tinyInteger('bregma_result',false,true)->default(0)->comment('前卤判断结果');
            $table->string('bregma_result_other')->nullable()->comment('前卤判断结果其它');
            $table->tinyInteger('eye',false,true)->default(0)->comment('眼睛 1:未见异常 2:异常');
            $table->tinyInteger('ear',false,true)->default(0)->comment('耳朵 1:未见异常 2:异常');
            $table->tinyInteger('nose',false,true)->default(0)->comment('鼻子');
            $table->tinyInteger('mouth',false,true)->default(0)->comment('口腔');
            $table->tinyInteger('limb_mobility',false,true)->default(0)->comment('四肢活动度');
            $table->tinyInteger('cervical_mass',false,true)->default(0)->comment('颈部包块');
            $table->tinyInteger('skin',false,true)->default(0)->comment('皮肤');
            $table->tinyInteger('portal_fissure',false,true)->default(0)->comment('肝门');
            $table->tinyInteger('chest',false,true)->default(0)->comment('胸部');
            $table->tinyInteger('spine',false,true)->default(0)->comment('脊柱');
            $table->tinyInteger('cardiopulmonary_auscultation',false,true)->default(0)->comment('心肺听诊');
            $table->tinyInteger('abdominal_touch',false,true)->default(0)->comment('腹部触诊');
            $table->tinyInteger('aedea',false,true)->default(0)->comment('外生殖器');
            $table->string('umbilical_cord')->nullable()->comment('脐带');
            $table->string('umbilical_cord_other')->nullable()->comment('脐带其它');
            $table->tinyInteger('referral_recommendations',false,true)->default(0)->comment('转诊建议');
            $table->string('referral_department')->nullable()->comment('转诊机构及科室');
            $table->string('referral_reason')->nullable()->comment('转诊原因');
            $table->string('guide')->nullable()->comment('指导');
            $table->string('guide_other')->nullable()->comment('指导其它');
            $table->string('doctor_name')->nullable()->comment('医生签名');
            $table->string('next_visit_place')->nullable()->comment('下次随访地点');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('visit_newborns');

    }
}
