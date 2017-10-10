<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoodCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //食物分类
        Schema::create('food_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('食物类别');
        });

        //食物
        Schema::create('food', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('食物名称');
            $table->string('chinese_name')->nullable()->comment('食物中文名称');
            $table->string('evaluate')->nullable()->comment('食物评价');

            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('food_categories')->onUpdate('cascade')->onDelete('cascade');
        });

        //营养信息
        Schema::create('food_nutrition_informations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('名称');
            $table->string('value')->nullable()->comment('含量值');

            $table->integer('food_id')->unsigned()->comment('食物ID');
            $table->foreign('food_id')->references('id')->on('food')->onUpdate('cascade')->onDelete('cascade');
        });

        //度量单位
        Schema::create('food_measure_units', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('名称');
            $table->string('value')->nullable()->comment('热量值');

            $table->integer('food_id')->unsigned()->comment('食物ID');
            $table->foreign('food_id')->references('id')->on('food')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foot_category');
        Schema::dropIfExists('foot');
        Schema::dropIfExists('foot_nutrition_information');
        Schema::dropIfExists('foot_measure_unit');
    }
}
