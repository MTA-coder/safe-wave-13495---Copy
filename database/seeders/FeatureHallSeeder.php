<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureHallSeeder extends Seeder
{
    public function run()
    {
        DB::table('feature_halls')->insert([
            [
                'hall_id' => 1,
                'feature_id' => 1
            ],
            [
                'hall_id' => 1,
                'feature_id' => 2
            ],
            [
                'hall_id' => 1,
                'feature_id' => 3
            ],
            [
                'hall_id' => 2,
                'feature_id' => 4
            ],
            [
                'hall_id' => 2,
                'feature_id' => 3
            ],
        ]);
    }
}