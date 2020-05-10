<?php

use Illuminate\Database\Seeder;

class LangaugesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('languages')->insert(
      [
          [
            'lang_name' => "عربي"
          ],
          [
            'lang_name' => "إنجليزي"
          ],
          [
            'lang_name' => "تركي"
          ],
          [
            'lang_name' => "عبري"
          ],
          [
            'lang_name' => "فرنسي"
          ],
          [
            'lang_name' => "ألماني"
          ],
          [
            'lang_name' => "ياباني"
          ],
          [
            'lang_name' => "صيني"
          ],
          [
            'lang_name' => "إيطالي"
          ]
      ]);
    }
}
