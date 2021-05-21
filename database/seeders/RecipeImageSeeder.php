<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class RecipeImageSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $json   = File::get("database/data/images_recipes.json");
        $images = json_decode($json);

        foreach ($images as $image) {
            DB::table('recipe_images')->insert(
                [
                    'url'       => $image->url,
                    'recipe_id' => $image->recipe_id,
                ]
            );
        }
    }

}
