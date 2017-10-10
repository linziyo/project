<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitKidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {


        Schema::create('visit_kids', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->timestamps();
            $table->timestamp('visited_at')->nullable()->comment('本次访视日期');
            $table->integer('visit_mode')->nullable()->comment('随访方式');
            $table->timestamp('next_visited_at')->nullable()->comment('下次访视日期');
            $table->integer('doctor_id')->unsigned()->comment('随访医生');
            $table->integer('visit_id')->unsigned();
            $table->foreign('visit_id')->references('id')->on('visits')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('archive_id')->references('id')->on('archives')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('tenant_id')->unsigned();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('month',false,true)->default(0)->comment('月龄');
            $table->string('weight')->nullable()->comment('体重');
            $table->string('height')->nullable()->comment('身长');
            $table->string('head_size')->nullable()->comment('头围');
            $table->tinyInteger('face_color',false,true)->default(0)->comment('面色');
            $table->tinyInteger('skin',false,true)->default(0)->comment('皮肤');
            $table->string('bregma')->nullable()->comment('前卤');
            $table->tinyInteger('cervical_mass',false,true)->default(0)->comment('颈部包块');
            $table->tinyInteger('eye',false,true)->default(0)->comment('眼睛');
            $table->tinyInteger('ear',false,true)->default(0)->comment('耳朵');
            $table->string('mouth')->nullable()->comment('口腔');
            $table->string('tooth')->nullable()->comment('出牙 12-30月龄用');
            $table->string('gait')->nullable()->comment('步态 12-30月龄用');
            $table->tinyInteger('chest',false,true)->default(0)->comment('胸部');
            $table->tinyInteger('hearing',false,true)->default(0)->comment('听力');
            $table->tinyInteger('abdomen',false,true)->default(0)->comment('腹部');
            $table->tinyInteger('navel',false,true)->default(0)->comment('脐部');
            $table->tinyInteger('limb_mobility',false,true)->default(0)->comment('四肢');
            $table->string('rickets_symptom')->default(0)->comment('佝偻病症状');
            $table->string('rickets_sign')->default(0)->comment('佝偻病体征');
            $table->tinyInteger('aedea',false,true)->default(0)->comment('肝门/外生殖器');
            $table->string('hemoglobin')->nullable()->comment('血红蛋白');
            $table->string('outdoor_activity')->nullable()->comment('户外活动 小时/日');
            $table->string('intake_vitamin_d')->nullable()->comment('服用维生素D');
            $table->string('grow_assessment')->nullable()->comment('发育评估');
            $table->string('disease_between_visit')->nullable()->comment('两次随访间患病情况');
            $table->string('referral_recommendations')->nullable()->comment('转诊建议');
            $table->tinyInteger('body_assessment',false,true)->default(0)->comment('体格发育评估');
            $table->string('body_mark')->default(0)->comment('体格其他情况');
            $table->string('vision')->default(0)->comment('视力');
//            $table->string('referral_department')->nullable()->comment('转诊机构及科室');
            $table->string('guide')->nullable()->comment('指导');
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visit_kids');
    }
}
