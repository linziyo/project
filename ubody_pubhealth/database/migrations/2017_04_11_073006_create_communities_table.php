<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommunitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('community_hospital_id')->unsigned()->comment('社区医院编号');
            $table->string('name')->comment('社区名称');
            $table->string('code')->comment('社区编号');
            $table->integer('population')->comment('辖区人口数');
            $table->string('telephone')->nullable()->comment('联系电话');
            $table->string('address')->nullable()->comment('详细地址');
            $table->string('image')->nullable()->comment('门店图片');
            $table->string('contract')->nullable()->comment('家医合同');
            $table->timestamps();
            $table->softDeletes();

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
        Schema::dropIfExists('organizations');
    }
}
