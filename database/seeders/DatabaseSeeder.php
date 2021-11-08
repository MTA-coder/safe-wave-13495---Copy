<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            UserSeeder::class,
            CitySeeder::class,
            TypeServicesSeeder::class,
            OccasionSeeder::class,
            HallSeeder::class,
            HallFilesSeeder::class,
            PriceSeeder::class,
            OfferSeeder::class,
            DiscountSeeder::class,
            OccationHallSeeder::class,
            TypeHallSeeder::class,
            TypeHallHallSeeder::class,
            FeatureSeeder::class,
            FeatureHallSeeder::class,
        ]);
    }
}