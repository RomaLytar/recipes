<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRecipeingredient extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recipe_ingredient', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('recipe_id')->unsigned();
            $table->integer('ingredient_id')->unsigned();
            $table->string('ingredients_count', 100);

            $table->foreign('recipe_id')->references('id')
                ->on('recipes')->onDelete('cascade');
            $table->foreign('ingredient_id')->references('id')
                ->on('ingredients')->onDelete('cascade');
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
        Schema::table('recipe_ingredient', function (Blueprint $table) {
            $table->dropForeign([
                'recipe_id'
            ]);
        });
        Schema::table('recipe_ingredient', function (Blueprint $table) {
            $table->dropForeign([
                'ingredient_id'
            ]);
        });

        Schema::drop('recipe_ingredient');
    }
}
