<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archives', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('community_hospital_id')->unsigned();
            $table->integer('community_id')->unsigned()->nullable();
            $table->integer('doctor_id')->unsigned()->nullable();

            /* 档案基本资料 */
            $table->string('code')->unique()->comment('档案编号');
            $table->string('real_name')->nullable()->comment('姓名');
            $table->string('sex')->default(0)->comment('性别');
            $table->string('birthday')->nullable()->comment('出生日期');
            $table->string('id_code')->nullable()->comment('身份证号码');
            $table->string('work_unit')->nullable()->comment('工作单位');
            $table->string('mobile')->nullable()->comment('本人电话');
            $table->string('contact_name')->nullable()->comment('联系人姓名');
            $table->string('contact_mobile')->nullable()->comment('联系人姓名');
            $table->string('emergency_contact_name')->nullable()->comment('紧急联系人');
            $table->string('emergency_contact_mobile')->nullable()->comment('紧急联系人电话');
            $table->boolean('is_register')->default(false)->comment('是否为户籍');
            $table->string('nation')->nullable()->comment('民族');
            $table->string('blood_group')->nullable()->comment('血型');
            $table->string('blood_group_rh')->nullable()->comment('RH:阴性,阳性,不详');
            $table->string('education')->nullable()->comment('文化程度');
            $table->string('job')->nullable()->comment('职业');
            $table->string('marital_status')->nullable()->comment('婚姻状况');
            $table->string('address')->nullable()->comment('家庭住址');
            $table->string('phone_number')->nullable()->comment('家庭电话');
            $table->string('description')->nullable()->comment('其他说明');

            $table->integer('status')->unsigned()->default(0)->comment('状态 0-待确认 1-已确认');
            $table->dateTime('checked_at')->nullable()->comment('审核时间');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('community_hospital_id')->references('id')->on('community_hospitals')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('community_id')->references('id')->on('communities')->onDelete('set null')->onUpdate('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('set null')->onUpdate('cascade');
            $table->integer('tenant_id')->unsigned()->comment('租户编号');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade')->onUpdate('cascade');
        });


        // 医疗费用支付方式
        Schema::create('archive_payment_modes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->string('value');
            $table->string('content')->nullable()->comment('其他支付方式');
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });

        // 药物过敏史
        Schema::create('archive_allergies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->string('value');
            $table->string('content')->nullable()->comment('药物过敏史');
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });

        // 暴露史
        Schema::create('archive_exposes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->string('value');
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });

        // 既往史-疾病
        Schema::create('archive_diseases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->string('value');
            $table->string('content')->nullable()->comment('疾病内容');
            $table->date('confirmed_at')->nullable()->comment('确诊时间');
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });

        // 既往史-外伤
        Schema::create('archive_injuries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->string('value');
            $table->string('content')->nullable()->comment('疾病内容');
            $table->date('confirmed_at')->nullable()->comment('确诊时间');
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });

        // 既往史-手术
        Schema::create('archive_operations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->string('value');
            $table->string('content')->nullable()->comment('疾病内容');
            $table->date('confirmed_at')->nullable()->comment('确诊时间');
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });

        // 既往史-输血
        Schema::create('archive_transfusions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->string('value');
            $table->string('content')->nullable()->comment('疾病内容');
            $table->date('confirmed_at')->nullable()->comment('确诊时间');
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });

        // 家族史
        Schema::create('archive_families', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->string('relationship');
            $table->string('value')->nullable()->comment('疾病');
            $table->string('content')->nullable()->comment('内容');
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });

        // 遗传病史
        Schema::create('archive_hereditary_diseases', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->string('value');
            $table->string('content')->nullable();
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });

        // 残疾情况
        Schema::create('archive_disabilities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->string('value');
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });

        // 生活环境-厨房排风设施
        Schema::create('archive_living_kitchens', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->string('value');
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });

        // 生活环境-燃料类型
        Schema::create('archive_living_fuels', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->string('value');
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });

        // 生活环境-饮水
        Schema::create('archive_living_waters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->string('value');
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });

        // 生活环境-厕所
        Schema::create('archive_living_toilets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->string('value');
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });

        // 生活环境-禽畜栏
        Schema::create('archive_living_fences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->string('value');
            $table->timestamps();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('archive_users', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('archive_id')->unsigned();
            $table->primary(['user_id', 'archive_id']);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archive_payment_modes');
        Schema::dropIfExists('archive_allergies');
        Schema::dropIfExists('archive_exposes');
        Schema::dropIfExists('archive_diseases');
        Schema::dropIfExists('archive_operations');
        Schema::dropIfExists('archive_injuries');
        Schema::dropIfExists('archive_transfusions');
        Schema::dropIfExists('archive_families');
        Schema::dropIfExists('archive_hereditary_diseases');
        Schema::dropIfExists('archive_disabilities');
        Schema::dropIfExists('archive_living_kitchens');
        Schema::dropIfExists('archive_living_fuels');
        Schema::dropIfExists('archive_living_waters');
        Schema::dropIfExists('archive_living_toilets');
        Schema::dropIfExists('archive_living_fences');

        Schema::dropIfExists('archive_users');
        Schema::dropIfExists('archives');
    }
}
