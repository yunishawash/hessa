<?php

use Illuminate\Database\Seeder;

class AcademicSpecializationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('academic_specializations')->insert(
      [
          [
            'as_name_ar' => "العلوم",
          ],
          [
            'as_name_ar' => "الأحياء",
          ],
          [
            'as_name_ar' => "الرياضيات",
          ],
          [
            'as_name_ar' => "الفيزياء",
          ],
          [
            'as_name_ar' => "العلوم الحياتية",
          ],
          [
            'as_name_ar' => "الكيمياء",
          ],
          [
            'as_name_ar' => "الحاسوب وتقنية المعلومات",
          ],
          [
            'as_name_ar' => "الهندسة والإتصالات",
          ],
          [
            'as_name_ar' => "الآداب",
          ],
          [
            'as_name_ar' => "اللغة الإنجليزية وآدابها",
          ],
          [
            'as_name_ar' => "اللغة العربية وآدابها",
          ],
          [
            'as_name_ar' => "اللغة الفرنسية وآدابها",
          ],
          [
            'as_name_ar' => "الاقتصاد والعلوم الاجتماعية",
          ],
          [
            'as_name_ar' => "الحقوق والقانون",
          ],
          [
            'as_name_ar' => "الزراعة ولطب البيطري",
          ],
          [
            'as_name_ar' => "الطب والصيدلة والعلوم الصحّية",
          ],
          [
            'as_name_ar' => "التمريض والتحاليل الطبية",
          ],
          [
            'as_name_ar' => "العلوم التربوية وإعداد المعلّمين",
          ],
          [
            'as_name_ar' => "التاريخ والسياحة والآثار",
          ],
          [
            'as_name_ar' => "الفنون",
          ],
          [
            'as_name_ar' => "العلوم الشرعية",
          ],
      ]);
    }
}
