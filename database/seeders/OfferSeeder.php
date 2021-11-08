<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OfferSeeder extends Seeder
{
    public function run()
    {
        DB::table('offers')->insert([

            [
                'name' => 'عرض الصالة',
                'description' => 'تفاصيل العرض ',
                'price' => 150000,
                'hall_id' => 1
            ],

            [
                'name' => 'عرض الصالة',
                'description' => 'تفاصيل العرض ',
                'price' => 200000,
                'hall_id' => 2
            ],
            [
                'name' => 'عرض الصالة',
                'description' => 'تفاصيل العرض ',
                'price' => 200000,
                'hall_id' => 1
            ],
        ]);
    }
}