<?php

namespace App\Models;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Image;

class ServiceProvider extends Model
{

    use BaseModel;

    protected $table = 'service_providers';
    protected $primaryKey = 'sp_id';
    // ------------------- [Casts] -------------------
    /**
    * The attributes that should be cast to native types.
    *
    * @var array
    */
     protected $casts = [
       'sp_id' => 'integer',
       'sp_full_name' => 'string',
       'sp_mobile' => 'string',
       'sp_email' => 'string',
       'sp_facebook_id' => 'string',
       'sp_gender' => 'string',
       'sp_community' => 'string',
       'sp_address_1' => 'string',
       'sp_address_2' => 'string',
       'sp_street' => 'string',
       'sp_land_line_number' => 'string',
       'sp_emergency_number' => 'string',
       'sp_do_b' => 'string',
       'sp_personal_passport_img_url' => 'string',
       'sp_id_number' => 'string',
       'sp_id_copy_url' => 'string',
       'sp_working_status' => 'string',
       'sp_high_school_branch' => 'string',
       'sp_high_school_average' => 'string',
       'sp_educational_level_degree' => 'string',
       'sp_study_year' => 'string',
       'sp_gpa' => 'float',
       'sp_practical_experience' => 'string',
       'sp_educational_experience' => 'string',
       'sp_education_experience_years' => 'string',
       'sp_skills' => 'string',
       'sp_trainings' => 'string',
       'sp_certifications' => 'string',
       'sp_transcript_attachment_url' => 'string',
       'sp_ability_to_teach_at_home' => 'string',
       'sp_ability_to_teach_levels' => 'string',
       'sp_ability_to_teach_other_topics' => 'string',
       'sp_ability_to_teach_other_languages' => 'string',
       'sp_ability_to_teach_days' => 'string',
       'sp_targeted_gender_to_teach' => 'string',
       'sp_notes' => 'string',
       'sp_initial_eval' => 'float',
       'sp_profiling_stage' => 'string',
       'sp_status' => 'string',
       'sp_join_date' => 'date',
       'sp_physical_interview_score' => 'float',
       'sp_sa_over_eval' => 'float',
       'sp_sa_notes' => 'string',
       'sp_delivered_training_by_hessa' => 'string',
       'sp_contact_attachment_url' => 'string',
       'fk_district_id' => 'integer',
       'fk_location_id' => 'integer',
       'fk_univ_id' => 'integer',
       'fk_sa_id' => 'integer',
     ];
    // ------------------- [Rules] -------------------
    // ------------------- [Relations] -------------------
        /**
    * Get location locations
    */
    public function district()
    {
       return $this->belongsTo(District::class, 'fk_district_id')->select('district_id', 'district_name');
    }
    /**
    * Get location locations
    */
    public function location()
    {
       return $this->belongsTo(Location::class, 'fk_location_id')->select('location_id', 'location_name');
    }
    /**
    * Get location locations
    */
    public function university()
    {
       return $this->belongsTo(University::class, 'fk_univ_id')->select('univ_id', 'univ_name');
    }
    /**
    * Get location locations
    */
    public function serviceAdmin()
    {
       return $this->belongsTo(User::class, 'fk_sa_id')->select('user_id', 'user_name');
    }

    /**
    * Get languages
    */
    public function languages()
    {
       return $this->belongsToMany(Language::class, 'service_providers_languages', 'fk_sp_id', 'fk_lang_id')->select('lang_id', 'lang_name');
    }

    /**
    * Get orderes
    */
    public function orders()
    {
       return $this->hasMany(Order::class, 'fk_assigned_to');
    }

    /**
    * Get user
    */
    public function user()
    {
       return $this->belongsTo(User::class, 'fk_user_id');
    }

    /**
    * Get orderes
    */
    public function payments()
    {
       return $this->hasMany(Payment::class, 'fk_sp_id');
    }

    /**
    * Get interests
    */
    public function interests()
    {
       return $this->belongsToMany(Order::class, 'interests_orders', 'fk_sp_id','fk_order_id');
    }

     /**
    * Get topics
    */
    public function topics()
    {
       return $this->belongsToMany(Topic::class, 'service_providers_topics', 'fk_sp_id', 'fk_topic_id')->select('topic_id', 'topic_name_ar as as_name');
    }

    /**
   * Get topics
   */
   public function AcademicSpecialization()
   {
      return $this->belongsTo(AcademicSpecialization::class,'fk_as_id');
   }
    // ------------------- [Scopes] -------------------
    // ------------------- [Functions] -------------------
    public function store(Request $request)
    {

        $user = new User();
        $user->user_name = $request->sp_full_name;
        $user->user_email =  $request->sp_email;
        $user->user_type = 'sp';
        $user->password = \Hash::make($request->password);
        $user->save();

        $serviceProvider = new ServiceProvider();
        $serviceProvider->sp_full_name = $request->sp_full_name??null;
        $serviceProvider->sp_mobile = $request->sp_mobile??null;
        $serviceProvider->sp_email = $request->sp_email??null;
        $serviceProvider->sp_facebook_id = $request->sp_facebook_id??null;
        $serviceProvider->sp_gender = $request->sp_gender??null;
        $serviceProvider->sp_community = $request->sp_community??null;
        $serviceProvider->sp_address_1 = $request->sp_address_1??null;
        $serviceProvider->sp_address_2 = $request->sp_address_2??null;
        $serviceProvider->sp_street = $request->sp_street??null;
        $serviceProvider->sp_land_line_number = $request->sp_land_line_number??null;
        $serviceProvider->sp_emergency_number = $request->sp_emergency_number??null;
        $serviceProvider->sp_emergency_contact_name = $request->sp_emergency_contact_name??null;
        $serviceProvider->sp_do_b = $request->sp_do_b??null;
        $serviceProvider->sp_graduation_date = $request->sp_graduation_date??null;
        $serviceProvider->sp_id_number = $request->sp_id_number??null;
        $serviceProvider->sp_working_status = $request->sp_working_status??null;
        $serviceProvider->sp_status = 'active';
        $serviceProvider->sp_high_school_branch = $request->sp_high_school_branch??null;
        $serviceProvider->sp_high_school_average = $request->sp_high_school_average??null;
        $serviceProvider->sp_educational_level_degree = $request->sp_educational_level_degree??null;
        $serviceProvider->sp_study_year = $request->sp_study_year??null;
        $serviceProvider->sp_gpa = $request->sp_gpa??null;
        $serviceProvider->sp_practical_experience = $request->sp_practical_experience??null;
        $serviceProvider->sp_educational_experience = $request->sp_educational_experience??null;
        $serviceProvider->sp_education_experience_years = $request->sp_education_experience_years??null;
        $serviceProvider->sp_skills = $request->sp_skills??null;
        $serviceProvider->sp_trainings = $request->sp_trainings??null;
        $serviceProvider->sp_certifications = $request->sp_certifications??null;
        $serviceProvider->sp_ability_to_teach_at_home = $request->sp_ability_to_teach_at_home??null;
        $serviceProvider->sp_ability_to_teach_levels = isset($request->sp_ability_to_teach_levels)?implode(',', $request->sp_ability_to_teach_levels):null;
        $serviceProvider->sp_ability_to_teach_other_topics = $request->sp_ability_to_teach_other_topics??null;
        $serviceProvider->sp_ability_to_teach_other_languages = $request->sp_ability_to_teach_other_languages??null;
        $serviceProvider->sp_ability_to_teach_days = isset($request->sp_ability_to_teach_days)?implode(',', $request->sp_ability_to_teach_days):null;
        $serviceProvider->sp_targeted_gender_to_teach = $request->sp_targeted_gender_to_teach??null;
        $serviceProvider->sp_notes = $request->sp_notes??null;
        $serviceProvider->sp_profiling_stage = 'NewRequest';
        $serviceProvider->sp_join_date = date('Y-m-d');
        $serviceProvider->sp_physical_interview_score = $request->sp_physical_interview_score??null;
        $serviceProvider->sp_sa_over_eval = $request->sp_sa_over_eval??null;
        $serviceProvider->sp_online_training_evaluation = $request->sp_online_training_evaluation??null;
        $serviceProvider->sp_sa_notes = $request->sp_sa_notes??null;
        $serviceProvider->sp_delivered_training_by_hessa = $request->sp_delivered_training_by_hessa??null;
        $serviceProvider->sp_contact_attachment_url = $request->sp_contact_attachment_url??null;
        $serviceProvider->fk_district_id = $request->fk_district_id??null;
        $serviceProvider->fk_location_id = $request->fk_location_id??null;
        $serviceProvider->fk_univ_id = $request->fk_univ_id??null;
        $serviceProvider->fk_sa_id = $request->fk_sa_id??null;
        $serviceProvider->fk_as_id = $request->fk_as_id??null;
        $serviceProvider->fk_user_id = $user->user_id;
        $serviceProvider->sp_initial_eval =  ($request->sp_high_school_average * 0.5) + ( $request->sp_gpa * 12.5) ;
        $serviceProvider->save();

        if( ! empty($request->languages) ) {
          $serviceProvider->languages()->sync($request->languages);
        }

        if( ! empty($request->topics) ) {
          $serviceProvider->topics()->sync($request->topics);
        }

        $folderPath = public_path('sps');

        if($request->hasFile('sp_personal_passport_img_url')) {
          if(!\File::exists($folderPath)) {
              \File::makeDirectory($folderPath, 0776, true, true);
          }
          $fileName = date('Ymd').'_'.time().uniqid().'_'.'.'.$request->sp_personal_passport_img_url->getClientOriginalExtension();
          $request->sp_personal_passport_img_url->move($folderPath, $fileName);
          $serviceProvider->sp_personal_passport_img_url = 'sps\\'.$fileName;
        }

        if($request->hasFile('sp_id_copy_url')) {
          if(!\File::exists($folderPath)) {
              \File::makeDirectory($folderPath, 0711, true, true);
          }
          $fileName = date('Ymd').'_'.time().uniqid().'_'.'.'.$request->sp_id_copy_url->getClientOriginalExtension();
          $request->sp_id_copy_url->move($folderPath, $fileName);
          $serviceProvider->sp_id_copy_url = 'sps\\'.$fileName;
        }

        if($request->hasFile('sp_transcript_attachment_url')) {
          if(!\File::exists($folderPath)) {
              \File::makeDirectory($folderPath, 0711, true, true);
          }
          $fileName = date('Ymd').'_'.time().uniqid().'_'.'.'.$request->sp_transcript_attachment_url->getClientOriginalExtension();
          $request->sp_transcript_attachment_url->move($folderPath, $fileName);
          $serviceProvider->sp_transcript_attachment_url = 'sps\\'.$fileName;
        }

        if($request->hasFile('sp_contact_attachment_url')) {
          if(!\File::exists($folderPath)) {
              \File::makeDirectory($folderPath, 0711, true, true);
          }
          $fileName = date('Ymd').'_'.time().uniqid().'_'.'.'.$request->sp_contact_attachment_url->getClientOriginalExtension();
          $request->sp_contact_attachment_url->move($folderPath, $fileName);
          $serviceProvider->sp_contact_attachment_url = 'sps\\'.$fileName;
        }

        $serviceProvider->save();

       return $serviceProvider;
    }

    public function modify(Request $request)
    {
        if($request->get('password') != null) {
          $this->user->password = \Hash::make($request->password);
          $this->user->save();
        }
        
        
        $this->sp_full_name = $request->sp_full_name??$this->sp_full_name;
        $this->user->user_name = $this->sp_full_name;
        $this->sp_email = $request->sp_email??$this->sp_email;
        $this->user->user_email = $this->sp_email??$this->user_email;
        $this->user->save();

        $this->sp_mobile = $request->sp_mobile??$this->sp_mobile;

        $this->sp_facebook_id = $request->sp_facebook_id??$this->sp_facebook_id;
        $this->sp_gender = $request->sp_gender??$this->sp_gender;
        $this->sp_community = $request->sp_community??$this->sp_community;
        $this->sp_address_1 = $request->sp_address_1??$this->sp_address_1;
        $this->sp_address_2 = $request->sp_address_2??$this->sp_address_2;
        $this->sp_street = $request->sp_street??$this->sp_street;
        $this->sp_land_line_number = $request->sp_land_line_number??$this->sp_land_line_number;
        $this->sp_emergency_number = $request->sp_emergency_number??$this->sp_emergency_number;
        $this->sp_do_b = $request->sp_do_b??$this->sp_do_b;
        $this->sp_id_number = $request->sp_id_number??$this->sp_id_number;
        $this->sp_working_status = $request->sp_working_status??$this->sp_working_status;
        $this->sp_high_school_branch = $request->sp_high_school_branch??$this->sp_high_school_branch;
        $this->sp_high_school_average = $request->sp_high_school_average??$this->sp_high_school_average;
        $this->sp_educational_level_degree = $request->sp_educational_level_degree??$this->sp_educational_level_degree;
        $this->sp_study_year = $request->sp_study_year??$this->sp_study_year;
        $this->sp_gpa = $request->sp_gpa??$this->sp_gpa;
        $this->sp_practical_experience = $request->sp_practical_experience??$this->sp_practical_experience;
        $this->sp_educational_experience = $request->sp_educational_experience??$this->sp_educational_experience;
        $this->sp_education_experience_years = $request->sp_education_experience_years??$this->sp_education_experience_years;
        $this->sp_skills = $request->sp_skills??$this->sp_skills;
        $this->sp_trainings = $request->sp_trainings??$this->sp_trainings;
        $this->sp_status = $request->sp_status??$this->sp_status;
        $this->sp_certifications = $request->sp_certifications??$this->sp_certifications;
        $this->sp_ability_to_teach_at_home = $request->sp_ability_to_teach_at_home??$this->sp_ability_to_teach_at_home;
        $this->sp_ability_to_teach_levels = isset($request->sp_ability_to_teach_levels)?implode(',', $request->sp_ability_to_teach_levels):$this->sp_ability_to_teach_levels;
        $this->sp_ability_to_teach_other_topics = $request->sp_ability_to_teach_other_topics??$this->sp_ability_to_teach_other_topics;
        $this->sp_ability_to_teach_other_languages = $request->sp_ability_to_teach_other_languages??$this->sp_ability_to_teach_other_languages;
        $this->sp_ability_to_teach_days = isset($request->sp_ability_to_teach_days)?implode(',', $request->sp_ability_to_teach_days):$this->sp_ability_to_teach_days;
        $this->sp_targeted_gender_to_teach = $request->sp_targeted_gender_to_teach??$this->sp_targeted_gender_to_teach;
        $this->sp_notes = $request->sp_notes??$this->sp_notes;
        $this->sp_initial_eval = $request->sp_initial_eval??$this->sp_initial_eval;
        $this->sp_profiling_stage = $request->sp_profiling_stage??$this->sp_profiling_stage;
        $this->sp_join_date = $request->sp_join_date??$this->sp_join_date;
        $this->sp_physical_interview_score = $request->sp_physical_interview_score??$this->sp_physical_interview_score;
        $this->sp_sa_over_eval = $request->sp_sa_over_eval??$this->sp_sa_over_eval;
        $this->sp_online_training_evaluation = $request->sp_online_training_evaluation??$this->sp_online_training_evaluation;
        $this->sp_sa_notes = $request->sp_sa_notes??$this->sp_sa_notes;
        $this->sp_delivered_training_by_hessa = $request->sp_delivered_training_by_hessa??$this->sp_delivered_training_by_hessa;
        $this->sp_contact_attachment_url = $request->sp_contact_attachment_url??$this->sp_contact_attachment_url;
        $this->fk_district_id = $request->fk_district_id??$this->fk_district_id;
        $this->fk_location_id = $request->fk_location_id??$this->fk_location_id;
        $this->fk_univ_id = $request->fk_univ_id??$this->fk_univ_id;
        $this->fk_sa_id = $request->fk_sa_id??$this->fk_sa_id;
        $this->fk_as_id = $request->fk_as_id??$this->fk_as_id;// academic specialization

        if( ! empty($request->languages) ) {
          $this->languages()->sync($request->languages);
        }


        if( ! empty($request->topics) ) {
          $this->topics()->sync($request->topics);
        }

        $folderPath = public_path('sps');

        if($request->hasFile('sp_personal_passport_img_url')) {
          if(!\File::exists($folderPath)) {
              \File::makeDirectory($folderPath, 0711, true, true);
          }
          $fileName = date('Ymd').'_'.time().uniqid().'_'.'.'.$request->sp_personal_passport_img_url->getClientOriginalExtension();
          $request->sp_personal_passport_img_url->move($folderPath, $fileName);
          $this->sp_personal_passport_img_url = 'sps\\'.$fileName;
        }

        if($request->hasFile('sp_id_copy_url')) {
          if(!\File::exists($folderPath)) {
              \File::makeDirectory($folderPath, 0711, true, true);
          }
          $fileName = date('Ymd').'_'.time().uniqid().'_'.'.'.$request->sp_id_copy_url->getClientOriginalExtension();
          $request->sp_id_copy_url->move($folderPath, $fileName);
          $this->sp_id_copy_url = 'sps\\'.$fileName;
        }

        if($request->hasFile('sp_transcript_attachment_url')) {
          if(!\File::exists($folderPath)) {
              \File::makeDirectory($folderPath, 0711, true, true);
          }
          $fileName = date('Ymd').'_'.time().uniqid().'_'.'.'.$request->sp_transcript_attachment_url->getClientOriginalExtension();
          $request->sp_transcript_attachment_url->move($folderPath, $fileName);
          $this->sp_transcript_attachment_url = 'sps\\'.$fileName;
        }

        if($request->hasFile('sp_contact_attachment_url')) {
          if(!\File::exists($folderPath)) {
              \File::makeDirectory($folderPath, 0711, true, true);
          }
          $fileName = date('Ymd').'_'.time().uniqid().'_'.'.'.$request->sp_contact_attachment_url->getClientOriginalExtension();
          $request->sp_contact_attachment_url->move($folderPath, $fileName);
          $this->sp_contact_attachment_url = 'sps\\'.$fileName;
        }

        $this->save();

       return $this;
    }

    // ------------------- [Scopes] -------------------
    
    public function scopeSearch($query, $request, $val = null)
    {

        if($request->get('columns')[1]['search']['value'] != null) {
          $query = $query->where('sp_full_name', 'like', '%'.$request->get('columns')[1]['search']['value'].'%');
        }

        if($request->get('columns')[2]['search']['value'] != null) {
          $query = $query->where('fk_district_id', 'like', '%'.$request->get('columns')[2]['search']['value'].'%');
        }

        if($request->get('columns')[4]['search']['value'] != null) {
          $query = $query->where('sp_mobile', 'like', '%'.$request->get('columns')[4]['search']['value'].'%');
        }

        if($request->get('columns')[5]['search']['value'] != null && $request->get('columns')[5]['search']['value'] != 'both'  ) {
          $query = $query->where('sp_gender', 'like', '%'.$request->get('columns')[5]['search']['value'].'%');
        }

        if($request->get('columns')[6]['search']['value'] != null) {
          $query = $query->where('sp_high_school_branch', 'like', '%'.$request->get('columns')[6]['search']['value'].'%');
        }

        if($request->get('columns')[10]['search']['value'] != null) {
          $query = $query->where('sp_profiling_stage', 'like', '%'.$request->get('columns')[10]['search']['value'].'%');
        }

        if($request->get('columns')[11]['search']['value'] != null) {
          $query = $query->where('sp_status', 'like', '%'.$request->get('columns')[11]['search']['value'].'%');
        }

    }

    // ------------------- [Getters] -------------------
    public function getAbilityToTeachLevelsAttribute()
    {
      $levels = $this->sp_ability_to_teach_levels;
      $levels = explode(',', $levels);
      
      $levelsNumbers = [];

      if(in_array('primary', $levels)) {
        $levelsNumbers = array_merge($levelsNumbers, [1,2,3,4,5,6]);          
      }

      if(in_array('high', $levels)) {
        $levelsNumbers = array_merge($levelsNumbers, [7,8,9,10]);        
      }

      if(in_array('secondary', $levels)) {
        $levelsNumbers = array_merge($levelsNumbers, [11,12]);        
      }

      return $levelsNumbers;

    }
}
