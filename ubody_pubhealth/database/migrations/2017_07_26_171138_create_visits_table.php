<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('archive_id')->unsigned();
            $table->timestamp('visited_at')->nullable()->comment('本次访视日期');
            $table->timestamp('next_visited_at')->nullable()->comment('下次访视日期');
            $table->integer('doctor_id')->unsigned()->comment('随访医生');
            $table->string('visit_type')->comment('随访类型');
            $table->integer('visit_mode')->nullable()->comment('随访方式:1、门诊，2、家庭，3、电话');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visits');
    }
}
