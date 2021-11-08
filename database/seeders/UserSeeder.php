<?php

namespace Database\Seeders;

use App\Enums\UserType;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'User Tester',
                'phone1' => '+963-953429502',
                'phone_verified_at' => Carbon::now(),
                'password' => Hash::make('password'),
                'type' => UserType::user
            ], [
                'name' => 'Sala Syria',
                'phone1' => '+963-964763928',
                'phone_verified_at' => Carbon::now(),
                'password' => Hash::make('salasyria'),
                'type' => UserType::owner
            ]
        ]);
    }
}