<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RecipeSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $json    = File::get("database/data/recipes.json");
        $recipes = json_decode($json);

        foreach ($recipes as $recipe) {
            DB::table('recipes')->insert(
                [
                    'name'  => $recipe->name,
                    'level' => $recipe->level,
                    'time'  => $recipe->time,
                    'description'  => $recipe->description,
                ]
            );
        }
    }

}
