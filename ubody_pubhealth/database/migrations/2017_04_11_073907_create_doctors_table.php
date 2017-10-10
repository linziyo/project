<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctors', function (Blueprint $table) {
            $table->increments('id')->comment('医生编号');
            $table->integer('user_id')->unsigned();
            $table->integer('community_hospital_id')->unsigned()->index()->comment('所属社区医院');
            $table->string('avatar')->nullable()->comment('医生头像');
            $table->string('duty')->nullable()->comment('职务');
            $table->string('title')->nullable()->comment('职称');
            $table->string('specialty')->nullable()->comment('专业');
            $table->string('skills')->nullable()->comment('技能');
            $table->string('working_time')->nullable()->comment('从业时间');
            $table->string('consult')->nullable()->comment('咨询时间');
            $table->string('description')->nullable()->comment('医生介绍');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('community_hospital_id')->references('id')->on('community_hospitals')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('tenant_id')->unsigned()->comment('租户编号');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctors');
    }
}
