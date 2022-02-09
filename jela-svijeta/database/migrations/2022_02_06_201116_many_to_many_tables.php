<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ManyToManyTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //tags->meals
        Schema::create('meal_has_tag', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('tag_id')->unsigned();
            $table->integer('meal_id')->unsigned();
            $table->unique(['tag_id', 'meal_id']);
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
            $table->foreign('meal_id')
                ->references('id')
                ->on('meals')
                ->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('meal_has_ingredient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('meal_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();
            $table->unique(['meal_id', 'ingredient_id']);
            $table->foreign('meal_id')
                ->references('id')
                ->on('meals')
                ->onDelete('cascade');
            $table->foreign('ingredient_id')
                ->references('id')
                ->on('ingredients')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meal_has_tag');
        Schema::dropIfExists('meal_has_ingredient');
    }
}
