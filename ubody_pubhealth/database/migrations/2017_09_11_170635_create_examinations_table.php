<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExaminationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('examinations', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->integer('archive_id')->unsigned();
            $table->integer('doctor_id')->unsigned();
            $table->string('symptoms')->nullable()->comment('症状');
            $table->string('common')->nullable()->comment('一般情况');
            $table->string('old_people')->nullable()->comment('老年人');
            $table->string('lifestyle')->nullable()->comment('生活方式');
            $table->string('organ')->nullable()->comment('脏器功能');
            $table->string('body_check')->nullable()->comment('查体');
            $table->string('assist_check')->nullable()->comment('辅助检查');
            $table->string('problems')->nullable()->comment('现存主要健康问题');
            $table->string('hospitalization')->nullable()->comment('住院情况');
            $table->string('medications')->nullable()->comment('用药情况');
            $table->string('vaccinations')->nullable()->comment('非免疫规划预防接种史');
            $table->string('assessment')->nullable()->comment('健康评价');
            $table->string('guide')->nullable()->comment('健康评价');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('examinations');
    }
}
