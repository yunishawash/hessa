<?php

use Illuminate\Database\Seeder;

class DistrictsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert(
        [
            [
                'district_name' => "القدس",
            ],
            [
                'district_name' => "رام الله و البيرة",
            ],
            [
                'district_name' => "نابلس",
            ],
            [
                'district_name' => "سلفيت",
            ],
            [
                'district_name' => "طولكرم",
            ],
            [
                'district_name' => "جنين",
            ],
            [
                'district_name' => "الخليل",
            ],
            [
                'district_name' => "بيت لحم",
            ],
            [
                'district_name' => "طوباس",
            ],
            [
                'district_name' => "قلقيلية",
            ],
            [
                'district_name' => "أريحا",
            ],
            [
                'district_name' => "غزة",
            ],
            [
                'district_name' => "شمال غزة",
            ],
            [
                'district_name' => "دير البلح",
            ],
            [
                'district_name' => "خان يونس",
            ],
            [
                'district_name' => "رفح",
            ],
        ]);
    }
}
