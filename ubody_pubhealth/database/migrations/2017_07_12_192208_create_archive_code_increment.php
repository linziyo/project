<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArchiveCodeIncrement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('archive_code_increments', function (Blueprint $table) {
            $table->integer('community_id')->unsigned();
            $table->integer('code')->unsigned();

            $table->primary(['community_id', 'code']);

            $table->foreign('community_id')->references('id')->on('communities')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('archive_code_increments');
    }
}
