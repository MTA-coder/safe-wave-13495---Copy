<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscountSeeder extends Seeder
{
    public function run()
    {
        DB::table('discounts')->insert([
            [
                'name' => 'حسم شتوي',
                'from' => null,
                'to' => null,
                'value' => 25,
                'hall_id' => 1
            ],
            [
                'name' => 'حسم صباحي',
                'from' => null,
                'to' => null,
                'value' => 15,
                'hall_id' => 1
            ],
            [
                'name' => 'حسم أعياد',
                'from' => '2021-11-07',
                'to' => '2021-12-07',
                'value' => 10,
                'hall_id' => 2
            ],
        ]);
    }
}