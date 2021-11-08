<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HallFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('res_halls')->insert([
            [
                'url' => 'https://static.small-projects.org/wp-content/uploads/2013/10/%D8%B5%D8%A7%D9%84%D8%A7%D8%AA-%D8%A7%D9%81%D8%B1%D8%A7%D8%AD.jpg',
                'hall_id' => 1
            ],
            [
                'url' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTcYkxh896kOq1NUdGa6bDUi4fTgFU_KgejVjnbJUdsPHQEsoU12t4FEK8ljHuPeCIL4vA&usqp=CAU',
                'hall_id' => 1
            ],
            [
                'url' => 'https://s3-eu-west-1.amazonaws.com/content.argaamnews.com/1628725d-711c-47b5-aa8b-882d5e797931.jpg',
                'hall_id' => 1
            ],

            [
                'url' => 'https://www.arabiaweddings.com/sites/default/files/articles/2020/02/wedding_venues_in_amman.png',
                'hall_id' => 2
            ],
            [
                'url' => 'https://lh3.googleusercontent.com/proxy/wngFhn48YiRjAP8ZpWRVG2eXSVKXHJs0nt7ckKNwbLqve7I-k0zDdOR8OPGs484jlRaeDDS_GuMRD0uqJzSQWM5knCw3pfWwbqagrw',
                'hall_id' => 2
            ],

        ]);
    }
}