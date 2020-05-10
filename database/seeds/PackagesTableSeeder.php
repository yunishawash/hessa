<?php

use Illuminate\Database\Seeder;

class PackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('packages')->insert(
        [
              [
                'package_name' => 'حصّة واحدة',
                'package_hourly_rate' => 35,
              ],
              [
                'package_name' => 'حصّتين معاً',
                'package_hourly_rate' => 30,
              ],
              [
                'package_name' => 'حزمة فصلية',
                'package_hourly_rate' => 27.5,
              ],
        ]);
    }
}
