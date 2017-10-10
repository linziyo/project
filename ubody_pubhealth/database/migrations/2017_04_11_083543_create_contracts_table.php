<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id')->comment('合约编号');
            $table->integer('doctor_id')->unsigned()->comment('医生编号');
            $table->integer('package_id')->unsigned()->comment('服务编号');
            $table->integer('archive_id')->unsigned()->nullable()->comment('档案编号');
            $table->text('images')->nullable()->comment('协议照片');
            $table->decimal('price')->comment('价格');
            $table->date('start_time')->comment('生效时间');
            $table->date('end_time')->comment('结束时间');
            $table->integer('status')->comment('状态 1-待审核 2-已审核');
            $table->dateTime('checked_at')->nullable()->comment('审核时间');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('archive_id')->references('id')->on('archives')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade')->onUpdate('cascade');

            $table->integer('tenant_id')->unsigned()->comment('租户编号');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('contract_family', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('contract_id')->unsigned();
            $table->string('name')->comment('姓名');
            $table->string('mobile')->nullable()->comment('手机号码');
            $table->string('relationship')->comment('关系');
            $table->string('id_code')->comment('身份证');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade')->onUpdate('cascade');

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
        Schema::dropIfExists('contract_family');
        Schema::dropIfExists('contracts');
    }
}
