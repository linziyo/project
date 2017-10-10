<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunityHospitalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('community_hospitals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('社区医院名称');
            $table->string('phone_number')->nullable()->comment('电话');
            $table->string('address')->nullable()->comment('地址');
            $table->string('image')->nullable()->comment('门店照片');
            $table->string('contract')->nullable()->comment('家医合同');
            $table->timestamps();
            $table->softDeletes();

            $table->integer('tenant_id')->unsigned();
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
        Schema::dropIfExists('community_hospitals');
    }
}
