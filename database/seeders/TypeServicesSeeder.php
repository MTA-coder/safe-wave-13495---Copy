<?php

namespace Database\Seeders;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TypeServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('type_services')->insert([
            ['name' => 'كاتو'],
            ['name' => 'ورود'],
            ['name' => 'مصوغات'],
            ['name' => 'فساتين'],
            ['name' => 'أحذية'],
            ['name' => 'سيارات'],
            ['name' => 'فوتوغرافر'],
            ['name' => 'كوافير'],
            ['name' => 'مكياج'],
        ]);
    }
}
