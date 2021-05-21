<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class StepSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json  = File::get("database/data/steps.json");
        $steps = json_decode($json);

        foreach ($steps as $step) {
            DB::table('steps')->insert(
                [
                    'step'      => $step->step,
                    'order'     => $step->order,
                    'recipe_id' => $step->recipe_id,
                ]
            );
        }
    }

}
