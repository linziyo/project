<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->comment('医组名称');
            $table->integer('community_hospital_id')->unsigned()->index()->comment('所属社区医院');
            $table->string('description')->nullable()->comment('医组介绍');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('community_hospital_id')->references('id')->on('community_hospitals')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('tenant_id')->unsigned()->comment('租户编号');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('group_doctors', function (Blueprint $table) {
            $table->integer('group_id')->unsigned()->comment('医组编号');
            $table->integer('doctor_id')->unsigned()->comment('医生编号');
            $table->primary(['group_id', 'doctor_id']);
            $table->boolean('is_leader')->default(false)->comment('队长');
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('tenant_id')->unsigned()->comment('租户编号');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('group_packages', function (Blueprint $table) {
            $table->integer('group_id')->unsigned()->comment('医组编号');
            $table->integer('package_id')->unsigned()->comment('服务包编号');
            $table->primary(['group_id', 'package_id']);
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('group_packages');
        Schema::dropIfExists('group_doctors');
        Schema::dropIfExists('groups');
    }
}
