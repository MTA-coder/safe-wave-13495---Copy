<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeHallSeeder extends Seeder
{
    public function run()
    {
        DB::table('type_halls')->insert([
            ['name' => 'صالة مع مسبح'],
            ['name' => 'صالة في فندق'],
            ['name' => 'صالة في مطعم'],
        ]);
    }
}
