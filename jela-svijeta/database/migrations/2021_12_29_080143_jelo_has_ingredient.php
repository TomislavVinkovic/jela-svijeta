<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JeloHasIngredient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jelo_has_ingredient', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('jelo_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();
            $table->foreign('jelo_id')
                ->references('id')
                ->on('jela')
                ->onDelete('cascade');
            $table->foreign('ingredient_id')
                ->references('id')
                ->on('ingredients')
                ->onDelete('cascade');
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
        Schema::dropIfExists('jelo_has_ingredient');
    }
}
