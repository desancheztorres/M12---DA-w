<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngredientRecipeTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create(
            'ingredient_recipe',
            function (Blueprint $table) {
                $table->foreignId('recipe_id')->constrained()->onDelete('cascade');
                $table->foreignId('ingredient_id')->constrained()->onDelete('cascade');
                $table->string('quantity');
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredient_recipe');
    }

}
