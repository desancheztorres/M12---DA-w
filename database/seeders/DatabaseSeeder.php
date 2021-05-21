<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call(MagnitudeSeeder::class);
        $this->call(IngredientSeeder::class);
        $this->call(RecipeSeeder::class);
        $this->call(RecipeImageSeeder::class);
        $this->call(IngredientRecipeSeeder::class);
        $this->call(StepSeeder::class);
    }

}
