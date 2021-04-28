<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class MagnitudeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json        = File::get("database/data/magnitudes.json");
        $magnitudes = json_decode($json);

        foreach ($magnitudes as $magntiude) {
            DB::table('magnitudes')->insert(
                [
                    'name' => $magntiude->name,
                ]
            );
        }
    }
}
