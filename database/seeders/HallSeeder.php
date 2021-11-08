<?php

namespace Database\Seeders;

use App\Enums\RateEnum;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HallSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('halls')->insert([
            [
                'id' => 1,
                'name' => 'نفرتيتي',
                'description' => 'صالة رائعة',
                'Latitude' => '456168465',
                'Longitude' => '456168465',
                'area' => '100x500',
                'capacity' => 500,
                'rate' => RateEnum::three,
                'user_id' => 1,
                'city_id' => 1,
                'address' => 'ساحة الجامعة',
                'price' => 500000,
            ],
            [
                'id' => 2,
                'name' => 'قصر',
                'description' => 'فخامة الاسم تكفي',
                'Latitude' => '456789456',
                'Longitude' => '1231',
                'area' => '200x600',
                'capacity' => 400,
                'rate' => RateEnum::two,
                'user_id' => 1,
                'city_id' => 2,
                'address' => 'حمدانية',
                'price' => 350000,
            ],
        ]);
    }
}