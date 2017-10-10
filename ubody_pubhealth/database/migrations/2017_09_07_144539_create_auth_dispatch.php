<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuthDispatch extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('auth_dispatches',function(Blueprint $table){
           $table->increments('id');

            $table->string('type',20)->nullable()->comment('授权类型');
            $table->integer('device_id')->nullable()->unsigned();
            $table->string('auth_list')->nullable()->comment('授权关联ID');

            $table->timestamps();
            $table->softDeletes();
            $table->integer('tenant_id')->unsigned();
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('device_id')->references('id')->on('devices')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('auth_dispatches');
    }
}
