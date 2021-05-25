<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class IngredientRecipeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $json        = File::get("database/data/ingredient_recipes.json");
        $ingredients = json_decode($json);

        foreach ($ingredients as $ingredient) {
            DB::table('ingredient_recipe')->insert(
                [
                    'recipe_id'     => $ingredient->recipe_id,
                    'ingredient_id' => $ingredient->ingredient_id,
                    'quantity'      => $ingredient->quantity,
                ]
            );
        }
    }

}
