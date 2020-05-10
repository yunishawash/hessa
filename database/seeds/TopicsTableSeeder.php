<?php

use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('topics')->insert(
      [
          [
            'topic_name_ar' => "عربي",
          ],
          [
            'topic_name_ar' => "إنجليزي",
          ],
          [
            'topic_name_ar' => "رياضيات",
          ],
          [
            'topic_name_ar' => "فيزياء",
          ],
          [
            'topic_name_ar' => "كيمياء",
          ],
          [
            'topic_name_ar' => "أحياء",
          ]
      ]);
    }
}
