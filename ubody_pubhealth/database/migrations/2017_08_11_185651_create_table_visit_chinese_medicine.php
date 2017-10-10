<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableVisitChineseMedicine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('visit_chinese_medicine',function(Blueprint $table){
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->integer('doctor_id')->unsigned()->comment('随访医生');
            $table->foreign('archive_id')->references('id')->on('archives')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('visit_id')->unsigned();
            $table->foreign('visit_id')->references('id')->on('visits')->onUpdate('cascade')->onDelete('cascade');

            $table->integer('visit_mode')->nullable()->comment('随访方式');
            $table->tinyInteger('energy',false,true)->default(0)->comment('精力充沛，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('exhausted',false,true)->default(0)->comment('疲劳,0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('breathing',false,true)->default(0)->comment('呼吸，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('voice',false,true)->default(0)->comment('声音，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('emotion',false,true)->default(0)->comment('情绪，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('mental',false,true)->default(0)->comment('精神，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('loneliness',false,true)->default(0)->comment('孤独，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('fear',false,true)->default(0)->comment('害怕，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('over_weight',false,true)->default(0)->comment('超重，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('dry',false,true)->default(0)->comment('干涉，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('cold',false,true)->default(0)->comment('发凉，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('fear_cold',false,true)->default(0)->comment('怕冷，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('tolerance_cold',false,true)->default(0)->comment('耐受寒冷，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('have_cold',false,true)->default(0)->comment('感冒，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('stuffy_nose',false,true)->default(0)->comment('鼻塞，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('snore',false,true)->default(0)->comment('打鼾，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('allergy',false,true)->default(0)->comment('过敏，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('urticaria',false,true)->default(0)->comment('麻疹，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('ecchymosis',false,true)->default(0)->comment('瘀斑，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('scratch',false,true)->default(0)->comment('抓痕，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('skin_dry',false,true)->default(0)->comment('皮肤干，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('pain',false,true)->default(0)->comment('疼痛，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('greasy',false,true)->default(0)->comment('油腻，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('face_speckle',false,true)->default(0)->comment('脸斑，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('eczema',false,true)->default(0)->comment('湿疹，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('throat_dry',false,true)->default(0)->comment('口干，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('mouse_smell',false,true)->default(0)->comment('异味，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('fat_abdomen',false,true)->default(0)->comment('腹部肥大，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('fear_cold_food',false,true)->default(0)->comment('怕凉食物，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('shit_ache',false,true)->default(0)->comment('大便不畅，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('shit_dry',false,true)->default(0)->comment('大便干燥，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('tongue_thick',false,true)->default(0)->comment('舌厚，0未选，1没有，2很少，3有时，4经常，5总是');
            $table->tinyInteger('vein_thick',false,true)->default(0)->comment('静脉增粗，0未选，1没有，2很少，3有时，4经常，5总是');

            $table->integer('qixu_score',false,true)->nullable()->comment('气虚质分数');
            $table->tinyInteger('qixu_level',false,true)->default(0)->comment('气虚质程度，0未选，1是，2倾向，3否');
            $table->string('qixu_healthcare')->default('0')->comment('气虚质保健，0未选，1情志调摄，2饮食调养，3起居，4运动，5穴位，6其他');
            $table->string('qixu_other')->nullable()->comment('气虚质保健其它内容');

            $table->integer('yangxu_score',false,true)->nullable()->comment('阳虚质分数');
            $table->tinyInteger('yangxu_level',false,true)->default(0)->comment('阳虚质程度，0未选，1是，2倾向，3否');
            $table->string('yangxu_healthcare')->default('0')->comment('阳虚质保健，0未选，1情志调摄，2饮食调养，3起居，4运动，5穴位，6其他');
            $table->string('yangxu_other')->nullable()->comment('阳虚质保健其它内容');

            $table->integer('yinxu_score',false,true)->nullable()->comment('阴虚质分数');
            $table->tinyInteger('yinxu_level',false,true)->default(0)->comment('阴虚质程度，0未选，1是，2倾向，3否');
            $table->string('yinxu_healthcare')->default('0')->comment('阴虚质保健，0未选，1情志调摄，2饮食调养，3起居，4运动，5穴位，6其他');
            $table->string('yinxu_other')->nullable()->comment('阴虚质保健其它内容');

            $table->integer('tanshi_score',false,true)->nullable()->comment('痰湿质分数');
            $table->tinyInteger('tanshi_level',false,true)->default(0)->comment('痰湿质程度，0未选，1是，2倾向，3否');
            $table->string('tanshi_healthcare')->default('0')->comment('痰湿质保健，0未选，1情志调摄，2饮食调养，3起居，4运动，5穴位，6其他');
            $table->string('tanshi_other')->nullable()->comment('痰湿质保健其它内容');

            $table->integer('shire_score',false,true)->nullable()->comment('湿热质分数');
            $table->tinyInteger('shire_level',false,true)->default(0)->comment('湿热质程度，0未选，1是，2倾向，3否');
            $table->string('shire_healthcare')->default('0')->comment('湿热质保健，0未选，1情志调摄，2饮食调养，3起居，4运动，5穴位，6其他');
            $table->string('shire_other')->nullable()->comment('湿热质保健其它内容');

            $table->integer('xieyu_score',false,true)->nullable()->comment('血瘀质分数');
            $table->tinyInteger('xieyu_level',false,true)->default(0)->comment('血瘀质程度，0未选，1是，2倾向，3否');
            $table->string('xieyu_healthcare')->default('0')->comment('血瘀质保健，0未选，1情志调摄，2饮食调养，3起居，4运动，5穴位，6其他');
            $table->string('xieyu_other')->nullable()->comment('血瘀质保健其它内容');

            $table->integer('qiyu_score',false,true)->nullable()->comment('气郁质分数');
            $table->tinyInteger('qiyu_level',false,true)->default(0)->comment('气郁质程度，0未选，1是，2倾向，3否');
            $table->string('qiyu_healthcare')->default('0')->comment('气郁质保健，0未选，1情志调摄，2饮食调养，3起居，4运动，5穴位，6其他');
            $table->string('qiyu_other')->nullable()->comment('气郁质保健其它内容');

            $table->integer('tebing_score',false,true)->nullable()->comment('特禀质分数');
            $table->tinyInteger('tebing_level',false,true)->default(0)->comment('特禀质程度，0未选，1是，2倾向，3否');
            $table->string('tebing_healthcare')->default('0')->comment('特禀质保健，0未选，1情志调摄，2饮食调养，3起居，4运动，5穴位，6其他');
            $table->string('tebing_other')->nullable()->comment('特禀质保健其它内容');

            $table->integer('pinghe_score',false,true)->nullable()->comment('平和质分数');
            $table->tinyInteger('pinghe_level',false,true)->default(0)->comment('平和质程度，0未选，1是，2倾向，3否');
            $table->string('pinghe_healthcare')->default('0')->comment('平和质保健，0未选，1情志调摄，2饮食调养，3起居，4运动，5穴位，6其他');
            $table->string('pinghe_other')->nullable()->comment('平和质保健其它内容');

            $table->date('form_date')->nullable()->comment('填表日期');
            $table->string('doctor_name')->nullable()->comment('医生签名');

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
        //
    }
}
