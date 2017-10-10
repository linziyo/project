<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDevicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->increments('id')->change();
            $table->integer('community_hospital_id')->unsigned()->comment('社区医院ID');
            $table->string('code')->nullable()->comment('设备编号');
            $table->renameColumn('model', 'type')->nullable()->comment('设备型号');
            $table->softDeletes();
            $table->integer('tenant_id')->unsigned()->comment('租户编号');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('community_hospital_id')->references('id')->on('community_hospitals')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('devices', function (Blueprint $table) {
            $table->dropColumn('community_hospital_id')->unsigned();
            $table->dropColumn('code');
            $table->renameColumn('type', 'model')->nullable()->comment('设备型号');
            $table->dropSoftDeletes();
            $table->dropForeign('devices_tenant_id_foreign');
            $table->dropForeign('devices_community_hospital_id_foreign');
            $table->dropColumn('tenant_id');
        });
    }
}
