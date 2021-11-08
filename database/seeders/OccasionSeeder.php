<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OccasionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('occasions')->insert([
            ['name' => 'خطوبة', 'image' => 'https://images.squarespace-cdn.com/content/v1/53278958e4b0790f5a8c2b6e/1520397491786-JFJFCYGHQ3TCC9PSIN5Y/tacori-engagement-rings-tacoriofficial-via-instagram-19.jpg?format=1000w'],
            ['name' => 'زفاف', 'image' => 'https://static.onecms.io/wp-content/uploads/sites/34/2021/06/04/shayla-lester-wedding-couple-0621.jpg'],
            ['name' => 'تخرج', 'image' => 'https://www.bgcconejo.org/wp-content/uploads/2017/04/graduation.jpg'],
            ['name' => 'مولد طفل', 'image' => 'https://delhicelebration.in/wp-content/uploads/2021/06/3-20.jpg'],
            ['name' => 'مؤتمرات', 'image' => 'https://cdn.stemcell.com/media/images/social/conferences.jpg'],

        ]);
    }
}