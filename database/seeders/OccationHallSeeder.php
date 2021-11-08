<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OccationHallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occasion_halls')->insert([
            ['occasion_id' =>1,'hall_id'=>1],
            ['occasion_id' =>2,'hall_id'=>1],
            ['occasion_id' =>3,'hall_id'=>2],
            ['occasion_id' =>1,'hall_id'=>2],
        ]);
    }
}
