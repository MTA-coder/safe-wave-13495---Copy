<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeHallHallSeeder extends Seeder
{
    public function run()
    {
        DB::table('type_halls_halls')->insert([

            [
                'hall_id' => 1,
                'type_hall_id' => 1,
            ],

            [
                'hall_id' => 1,
                'type_hall_id' => 2,
            ],

            [
                'hall_id' => 1,
                'type_hall_id' => 3,
            ],

            [
                'hall_id' => 2,
                'type_hall_id' => 1,
            ],

            [
                'hall_id' => 2,
                'type_hall_id' => 3,
            ],

        ]);
    }
}