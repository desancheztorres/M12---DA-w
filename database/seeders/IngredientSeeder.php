<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class IngredientSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json        = File::get("database/data/ingredients.json");
        $ingredients = json_decode($json);

        foreach ($ingredients as $ingredient) {
            DB::table('ingredients')->insert(
                [
                    'name' => $ingredient->name,
                    'description' => $ingredient->description,
                    'image' => $ingredient->image,
                    'magnitude_id' => $ingredient->magnitude_id
                ]
            );
        }
    }

}
