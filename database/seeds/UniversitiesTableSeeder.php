<?php

use Illuminate\Database\Seeder;

class UniversitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('universities')->insert(
        [
            [
              'univ_name' => 'جامعة النجاح الوطنية',
            ],
            [
              'univ_name' => 'جامعة بيرزيت',
            ],
            [
              'univ_name' => 'جامعة القدس أبو ديس',
            ],
            [
              'univ_name' => 'جامعة القدس المفتوحة',
            ],
            [
              'univ_name' => 'جامعة الخليل',
            ],
            [
              'univ_name' => 'الجامعة العربية الأمريكية',
            ],
            [
              'univ_name' => 'جامعة بيت لحم',
            ],
            [
              'univ_name' => 'جامعة فلسطين التقنية - خضوري',
            ],
            [
              'univ_name' => 'جامعة بوليتيكنك فلسطين',
            ],
            [
              'univ_name' => 'جامعة الاستقلال',
            ],
            [
              'univ_name' => 'جامعة فلسطين الأهلية',
            ],
            [
              'univ_name' => 'كليات أو معاهد أخرى',
            ]
        ]);
    }
}
