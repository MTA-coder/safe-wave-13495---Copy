<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FeatureSeeder extends Seeder
{
    public function run()
    {
        DB::table('features')->insert([
            ['id' => 1, 'name' => 'درج ملكي'],
            ['id' => 2, 'name' => 'إنارة'],
            ['id' => 3, 'name' => 'موسيقا'],
            ['id' => 4, 'name' => 'فرق'],
        ]);
    }
}