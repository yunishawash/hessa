<?php

use Illuminate\Database\Seeder;

class LocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('locations')->insert(
          [
          [
            "location_name"=>"مدينة القدس",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"أبو ديس",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"أم طوبا",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"بدّو",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"بيت إجزا",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"بيت إكسا",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"بيت جمال",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"بيت حنينا",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"بيت دقو",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"بيت سوريك",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"بيت صفافا",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"بيت عنان",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"بير نبالا",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"جبع",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"الجيب",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"حزما",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"الخان الأحمر",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"الرام",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"رافات",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"سلوان",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"السواحرة الشرقية",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"السواحرة الغربية",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"شرفات",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"شعفاط",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"صور باهر",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"الطور",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"عسلين",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"علار السفلى",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"عناتا",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"العيزرية ",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"العيسوية",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"عين كارم",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"مخماس",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"رأس العامود",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"الشيخ جراح",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"وادي الجوز ",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"جبل المكبر",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"قطنة",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"قلنديا",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"كفر عقب",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"مخيم شعفاط",
            "fk_district_id"=>1
          ],
          [
            "location_name"=>"مخيم قلنديا",
            "fk_district_id"=>1
          ],
          [
          "location_name" => "مدينة رام الله ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "مدينة البيرة ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "مدينة روابي",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "ضاحية الريحان",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "بيتونيا",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "الطيبة ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "المزرعة الشرقية",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "بيت لقيا",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "بيرزيت",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "ترمسعيا",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "دير دبوان",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "سلواد",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "سنجل",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "عبوين",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "عطارة",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "نعلين",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "الزيتونة ( تشمل المزرعة القبلية و أبو شخيدم) ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "بني زيد الشرقية ( تشمل عارورة و مزارع النوباني)",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "بني زيد الغربية ( تشمل بيت ريما و دير غسانة)",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "سردا",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "أبو قش",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "الاتحاد",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "دير عمار",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "بيت إللّو",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "جمّالا",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "بيتّين",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "اللبن الغربي ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "النبي صالح",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "بدرس",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "عابود",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "دير قديس ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "دير أبو مشعل",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "كوبر",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "بير نبالا ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "كفر عين",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "دير نظام",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "رمون",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "رنتيس",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "عين يبرود ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "خربثا المصباح ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "صفّا",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "بلعين ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "خربة أبو فلاح",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "بيت عور التحتا",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "دير جرير",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "كفر مالك",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "كفر نعمة ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "قراوة بني زيد",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "عين عِريك",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "برهام",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "بيت سيرا ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "برقة ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "دير السودان ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "دير إبزيع ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "جلجيليا  ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "عجول ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "يبرود ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "دورا القرع",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "عين سينيا  ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "جفنا ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "رأس كركر",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "الجانية ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "أم صفا ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "بيت عور الفوقا",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "عين قينيا ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "شقبا ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "خربثا ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "بني حارث",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "شبتين",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "قبية ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "المدية ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "المغير ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "الطيرة ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "جيبيا",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "مخيم دير عمار",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "مخيم الأمعري",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "مخيم الجلزون ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "مخيم بيرزيت",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "مخيم قدورة ",
          "fk_district_id"=> 2
          ],
          [
          "location_name" => "مخيم سلواد",
          "fk_district_id"=> 2
          ],
          [
            "location_name"=>"مدينة نابلس",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"بلاطة البلد",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"عسكر البلد",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"رفيديا",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"الجنيد",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"بيت فوريك ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"تشمل خربة طانا",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"بيتا",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"زعترة ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"جماعين",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>" حوارة ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"سبسطية",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"عصيرة الشمالية",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"عقربا ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"قصرة",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"قبلان ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"تشمل يانون",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"الطويل",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"تل الخشبة",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"الباذان ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"الساوية ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"العقربانية",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"اللبن الشرقية ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"الناقورة",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"النصارية",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"إجنسنيا",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>" أودلا ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"أوصرين",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>" برقة ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"بزاريا ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"بورين ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"بيت إمرين ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"بيت إيبا",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"بيت حسن",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"بيت دجن",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"عورتا",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"بيت وزن",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"تل",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"تلفيت",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"جالود",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"جوريش",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"دوما",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"دير الحطب",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"دير شرف",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>" روجيب",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>" زواتا ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"زيتا جماعين",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"عزموط",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"سالم ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"صرة ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"طلوزة",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"عصيرة القبلية ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"عمورية",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"عينبوس",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"عوريف",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"عراق بورين",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"عين شبلي",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"فروش بيت دجن",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"قريوت ( تشمل خربة صرة )",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"قوصين",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"كفر قليل",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"مادما ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"مجدل بني فاضل ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"نصف جبيل",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"يتما ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"ياصيد",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"مخيم العين ",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"مخيم بلاطة",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"مخيم عسكر الجديد",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"مخيم عسكر القديم",
            "fk_district_id"=> 3
          ],
          [
            "location_name"=>"مدينة سلفيت",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"ضاحية خربة قيس",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"اسكاكا",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"ياسوف",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"مردا",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"قيرة",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"كفل حارس",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"حارس ( تشمل دار أبو بصل)",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"دير استيا ( تشمل محمية وادي قانا)",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"بديا",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"الزاوية",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"قراوة بني حسان",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"سرطة ( تشمل عزبة أبو آدم)",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"مسحة",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"رافات",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"دير بلوط",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"كفر الديك",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"بروقين",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"فرخة",
            "fk_district_id" => 4
          ],
          [
            "location_name"=>"مدينة طولكرم ",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"شويكة",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"إكتابا",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"ارتاح",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"ذنابة",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"كفا",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"العزب",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"الرشيد",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"باقة الشرقية",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"النزلة الوسطى",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"، النزلة الغربية،",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>" نزلة أبو نار ",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"بلعا",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"بيت ليد",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"دير الغصون ",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"المسقوفة",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"زيتا",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"عتيل",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"علار",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"عنبتا",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"كفر رمان ",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"قفين",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"عكابة",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"كفر اللبد",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"تشمل الحفاصي",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"عزبة الخلال",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"عزبة أبو خميش",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"الجاروشية",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"الراس",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"النزلة الشرقية",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"جبارة",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"رامين",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"سفارين",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"شوفة",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"صيدا",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"فرعون",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"كفر جمال",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"كفر زيباد",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"كفر صور",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"كفر عبوش",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"نزلة عيسى",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"كور",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"عزبة أبو حمادة",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"مخيم طولكرم",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"مخيم نور شمس",
            "fk_district_id"=> 5
          ],
          [
            "location_name"=>"مدينة جنين",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"قباطية",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"يعبد",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"عرابة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"برقين",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"صانور",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"السيلة الحارثية",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"سيلة الظهر",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"الزبابدة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"اليامون",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"كفر راعي",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"كفر دان",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"ميثلون",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"دير أبو ضعيف",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"جبع",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"عجة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"خربة عبد الله اليونس",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"الرامة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"المنشية",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"بير الباشا",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"العقبة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"تلفيت",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"عرقة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"كفيرت",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"كفر قود",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"زبوب",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"االهاشمية",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"الفندقومية",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"عنزة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"الكفير",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"عابا",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"الألمانية",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"أم التوت",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"جلبون",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"عرانة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"جلقموس",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"مثلث الشهداء",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"فقوعة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"الطيبة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"المغير",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"رمانة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"برطعة الشرقية",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"سيريس",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"بيت قاد",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"جلمة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"مسلية",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"زبدة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"الجديدة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"دير غزالة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"العطارة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"صير",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"رابا",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"جربا",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"أم الريحان",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"نزلة الشيخ زيد",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"الخلجان",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"أم دار",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"خربة الطرم",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"طورة الشرقية",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"عانين",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"تعنك",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"عربونه",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"فراسين",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"خربة المطلة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"خربة طورة الغربية",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"فحمة",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"الزاوية",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"مخيم جنين",
            "fk_district_id"=>6
          ],
          [
            "location_name"=>"الخليل",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"قلقس",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"البويرة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"البقعة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"وادي الحسين",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"عرب الفريجات",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"الظاهرية",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"خربة زنوتة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"عناب الكبير",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"حلحول",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"دورا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"الطبقة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"كريسة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"سنجر",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"يطا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"الحيلة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"رقعة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"زيف",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"حريز",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"إذنا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"السموع",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"خربة السيميا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"رافات",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"الشيوخ",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"الكرمل",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"بني نعيم",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"بيت أمر",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"جالا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"خربة صافا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"بيت أولا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"قيلة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"بيت عوا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"ترقوميا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"تفوح",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"خاراس",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"سعير",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"بيت عينون",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"الدوارة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"كويزبة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"العديسة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"صوريف",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"نوبا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"البرج",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"التواني",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"الرماضين",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"الريحية",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"أم الدرج",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"الصرة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"مراح البقار",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"حدب العلقة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"الكوم",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"المجد",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"النجادة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"أم الخير",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"إمريش",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"إمنيزل",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"بيت الروش التحت",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"ابيت الروش الفوقا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"بيت عمرة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"بيت كاحل",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"بيت مرسم",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"حتا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"حدب الفوار",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"خربة الدير",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"خرسا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"خشم الدرج",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"خلة المية",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"دير العسل التحتا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"دير العسل الفوقا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"دير سامت",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"رابود",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"سكة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"سوسيا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"طرامة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"طواس",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"عبدة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"شيوخ العروب",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"كرزا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"كرمة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"مسافر بني نعيم",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"مسافر يطا",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"وادي الشاجنة",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"مخيم الفوار",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"مخيم العروب",
            "fk_district_id"=> 7
          ],
          [
            "location_name"=>"مدينة بيت لحم",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"بيت ساحور",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"بيت جالا",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"الخضر",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"الدوحة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"العبيدية",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"وادي العرايس",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"الحدايدة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"بتير",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"بيت فجار",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"تقوع",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"جناتا",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"رخمة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"خربة تقوع",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"خربة الدير",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"الحلقوم",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"العساكرة،",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"زعترة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"الجبعة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"إلخاص",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"الشواورة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"المعصرة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"المنية",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"الولجة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"أرطاس",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"أم سلمونة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"بيت تعمر",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"جبة الذيب",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"جورة الشمعة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"حوسان",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"خلة الحداد",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"خلة النعمان",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"خلة سكاريا ",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"دار صلاح ",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"جهاثم",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"الحجيلة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"عرب الرشايدة ",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"العزازمة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"كيسان",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"مراح رباح ",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"المنشية",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"مراح معلا",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"نحالين",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"هندازة ",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"وادي أم قلعة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"خلة اللوزة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"ظهرة الندى",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"وادي النيص",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"وادي رحال",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"خربة النخلة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>" وادي فوكين",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"خربة بيت زكريا",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"مخيم عايدة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"مخيم العزة",
            "fk_district_id"=>8
          ],
          [
            "location_name"=>"مخيم الدهيشة",
            "fk_district_id"=>8
          ],[
            "location_name"=>"مدينة طوباس",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"كشدة",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"خربة إبزيق",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"راس الفارعة",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"سلحب",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"وادي حمد",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"طمون",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"عقابا",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"العقبة",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"خربة يرزة",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"خربة المالح",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"الحديدية",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"الفارسية",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"خربة تل الحمة",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"عين الحلوة",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"البقيعة",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"بردلة",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"تياسير",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"خربة عاطوف ",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"خربة الراس الأحمر",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"عين البيضا",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"كردلة",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"وادي الفارعة",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"جباريس",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"مخيم الفارعة",
            "fk_district_id"=>9
          ],
          [
            "location_name"=>"مدينة قلقيلية",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"صوفين",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"خلة نوفل",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"جيوس",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"حبلة",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"الضبعة",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"عزون",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"عزبة الطبيب",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"كفر ثلث",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"عرب الخولة",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"العزب الغربي",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"عزبة جلعود",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"المدور،",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"عزبة الأشقر",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"عزبة سلمان",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"الفندق",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"النبي إلياس",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"إماتين",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"فرعتا",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"باقة الحطب",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"بيت أمين",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"جينصافوط",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"جيت",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"حجة",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"خربة صير",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"راس عطية",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"راس الطيرة",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"وادي الرشا",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"سنيريا",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"عرب أبو فردة",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"عرب الرماضين الجنوبي",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"عرب الرماضين الشمالي",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"عزون عتمة",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"عسلة",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"فلامية",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"كفر قدوم",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"كفر لاقف",
            "fk_district_id"=>10
          ],
          [
            "location_name"=>"مدينة أريحا",
            "fk_district_id"=>11,
          ],
          [
            "location_name"=>"عين الديوك التحتا",
            "fk_district_id"=>11,
          ],
          [
            "location_name"=>"النبي موسى",
            "fk_district_id"=>11,
          ],
          [
            "location_name"=>"العوجا",
            "fk_district_id"=>11,
          ],
          [
            "location_name"=>"الجفتلك",
            "fk_district_id"=>11,
          ],
          [
            "location_name"=>"الزبيدات",
            "fk_district_id"=>11,
          ],
          [
            "location_name"=>"النويعمة",
            "fk_district_id"=>11,
          ],
          [
            "location_name"=>"دير حجلة",
            "fk_district_id"=>11,
          ],
          [
            "location_name"=>"عين الديوك الفوقا",
            "fk_district_id"=>11,
          ],
          [
            "location_name"=>"عرب الكعابنة",
            "fk_district_id"=>11,
          ],
          [
            "location_name"=>"فصايل",
            "fk_district_id"=>11,
          ],
          [
            "location_name"=>"مرج الغزال",
            "fk_district_id"=>11,
          ],
          [
            "location_name"=>"مرج نعجة",
            "fk_district_id"=>11,
          ],
          [
            "location_name"=>"مخيم عقبة جبر",
            "fk_district_id"=>11,
          ],
          [
            "location_name"=>"مخيم عين السلطان",
            "fk_district_id"=>11,
          ]
        ]);
    }
}
