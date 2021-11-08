<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PriceSeeder extends Seeder
{
    public function run()
    {
        DB::table('prices')->insert([
            [
                'name' => 'الأوقات الصباحية',
                'price' => 200000,
                'hall_id' => 1
            ],
            [
                'name' => 'الأوقات المسائية',
                'price' => 320000,
                'hall_id' => 2
            ],
            [
                'name' => 'الأوقات الصباحية',
                'price' => 250000,
                'hall_id' => 1
            ],
            [
                'name' => 'الأوقات الصباحية',
                'price' => 300000,
                'hall_id' => 2
            ],
        ]);
    }
}