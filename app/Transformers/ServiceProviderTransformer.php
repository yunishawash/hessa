<?php namespace App\Transformers;

use League\Fractal\TransformerAbstract;
use Dingo\Api\Routing\Helpers;

use App\Models\ServiceProvider;
use Lang;

class ServiceProviderTransformer extends TransformerAbstract
{
    use Helpers;
    /**
     * Turn this item object into a generic array
     *
     * @return array
     */

     protected $type;
     protected $orderId;

     public function __construct($type = null , $order = null) {
       $this->type = $type;
       $this->order = $order;
     }


    /**
    * @author Yousef Zammar <yousef.zammar@gmail.com>
    *
    */
    public function transform(ServiceProvider $serviceProvider)
    {

        if($this->type == 'interested_list') {

          $data = [
            'sp_id' => $serviceProvider->sp_id,
            'sp_full_name' => $serviceProvider->sp_full_name,
            'sp_mobile' => $serviceProvider->sp_mobile,
            'sp_email' => $serviceProvider->sp_email,
            'sp_gender' => $serviceProvider->sp_gender,
            'sp_community' => $serviceProvider->sp_community,
            'sp_address_1' => $serviceProvider->sp_address_1,
            'sp_ability_to_teach_at_home' => $serviceProvider->sp_ability_to_teach_at_home,
            'sp_ability_to_teach_levels' => $serviceProvider->sp_ability_to_teach_levels,
            'sp_targeted_gender_to_teach' => $serviceProvider->sp_targeted_gender_to_teach,
            'sp_initial_eval' => $serviceProvider->sp_initial_eval,
            'sp_online_training_evaluation' => $serviceProvider->sp_online_training_evaluation,
            'sp_physical_interview_score' => $serviceProvider->sp_physical_interview_score,
            'sp_high_school_branch' => $serviceProvider->sp_high_school_branch,
            'sp_high_school_branch_value' => isset($serviceProvider->sp_high_school_branch)?Lang::get("Master.".ucfirst($serviceProvider->sp_high_school_branch)):null,
            'sp_high_school_average' => $serviceProvider->sp_high_school_average,
            'sp_sa_over_eval' => $serviceProvider->sp_sa_over_eval,
            'sp_sa_notes' => $serviceProvider->sp_sa_notes,
            'district' => $serviceProvider->district->district_name,
            'serviceAdmin' => @$serviceProvider->serviceAdmin->user_name,
            'languages' => $serviceProvider->languages()->selectRaw("lang_id as id, lang_name as name")->orderBy('name')->get(),
            'topics' => $serviceProvider->topics()->selectRaw("topic_id as id, topic_name_ar as name")->orderBy('name')->get(),
            'is_interested' => $this->order->fk_assigned_to == $serviceProvider->sp_id,
            'district' => $serviceProvider->district->district_name,
            'fk_district_id' => [
              "id" => $serviceProvider->fk_district_id,
              "name" => $serviceProvider->district->district_name
            ],
            'specialization' => [
              "id" => $serviceProvider->fk_as_id,
              "name" => $serviceProvider->AcademicSpecialization->as_name_ar
            ],
            'location' => $serviceProvider->location->location_name,
            'fk_location_id' => [
              "id" => $serviceProvider->fk_location_id,
              "name" => $serviceProvider->location->location_name
            ],
            'university' => $serviceProvider->university->univ_name,
            'fk_as_id' =>  [
              "id" => $serviceProvider->fk_as_id,
              "name" => $serviceProvider->AcademicSpecialization->as_name_ar
            ],
            'fk_univ_id' =>  [
              "id" => $serviceProvider->fk_univ_id,
              "name" => $serviceProvider->university->univ_name
            ]
          ];

        } else {
          $data = [
            'sp_id' => $serviceProvider->sp_id,
            'sp_full_name' => $serviceProvider->sp_full_name,
            'sp_mobile' => $serviceProvider->sp_mobile,
            'sp_email' => $serviceProvider->sp_email,
            'sp_facebook_id' => $serviceProvider->sp_facebook_id,
            'sp_gender' => $serviceProvider->sp_gender,
            'sp_gender_tran' => __('Master.'.$serviceProvider->sp_gender),
            'sp_community' => $serviceProvider->sp_community,
            'sp_address_1' => $serviceProvider->sp_address_1,
            'sp_address_2' => $serviceProvider->sp_address_2,
            'sp_street' => $serviceProvider->sp_street,
            'sp_land_line_number' => $serviceProvider->sp_land_line_number,
            'sp_emergency_number' => $serviceProvider->sp_emergency_number,
            'sp_emergency_contact_name' => $serviceProvider->sp_emergency_contact_name,
            'sp_do_b' => $serviceProvider->sp_do_b,
            'sp_personal_passport_img_url' => $serviceProvider->sp_personal_passport_img_url,
            'sp_id_number' => $serviceProvider->sp_id_number,
            'sp_id_number_img_url' => $serviceProvider->sp_id_number_img_url,
            'sp_working_status' => $serviceProvider->sp_working_status,
            'sp_high_school_branch' => $serviceProvider->sp_high_school_branch,
            'sp_high_school_branch_value' => isset($serviceProvider->sp_high_school_branch)?Lang::get("Master.".ucfirst($serviceProvider->sp_high_school_branch)):null,
            'sp_high_school_average' => $serviceProvider->sp_high_school_average,
            'sp_educational_level_degree' => $serviceProvider->sp_educational_level_degree,
            'sp_study_year' => $serviceProvider->sp_study_year,
            'sp_gpa' => $serviceProvider->sp_gpa,
            'sp_practical_experience' => $serviceProvider->sp_practical_experience,
            'sp_educational_experience' => $serviceProvider->sp_educational_experience,
            'sp_education_experience_years' => $serviceProvider->sp_education_experience_years,
            'sp_skills' => $serviceProvider->sp_skills,
            'sp_trainings' => $serviceProvider->sp_trainings,
            'sp_certifications' => $serviceProvider->sp_certifications,
            'sp_transcript_attachment_url' => $serviceProvider->sp_transcript_attachment_url,
            'sp_ability_to_teach_at_home' => $serviceProvider->sp_ability_to_teach_at_home,
            'sp_ability_to_teach_levels' => $serviceProvider->sp_ability_to_teach_levels,
            'sp_ability_to_teach_other_topics' => $serviceProvider->sp_ability_to_teach_other_topics,
            'sp_ability_to_teach_other_languages' => $serviceProvider->sp_ability_to_teach_other_languages,
            'sp_ability_to_teach_days' => $serviceProvider->sp_ability_to_teach_days,
            'sp_targeted_gender_to_teach' => $serviceProvider->sp_targeted_gender_to_teach,
            'sp_notes' => $serviceProvider->sp_notes,
            'sp_initial_eval' => $serviceProvider->sp_initial_eval,
            'sp_profiling_stage' => $serviceProvider->sp_profiling_stage,
            'sp_profiling_stage_tran' => __('Master.'.$serviceProvider->sp_profiling_stage.'_stage'),
            'sp_status' => $serviceProvider->sp_status,
            'sp_status_tran' => __('Master.'.$serviceProvider->sp_status),
            'sp_join_date' => $serviceProvider->sp_join_date->format('Y-m-d'),
            'sp_physical_interview_score' => $serviceProvider->sp_physical_interview_score,
            'sp_sa_over_eval' => $serviceProvider->sp_sa_over_eval,
            'sp_online_training_evaluation' => $serviceProvider->sp_online_training_evaluation,
            'sp_sa_notes' => $serviceProvider->sp_sa_notes,
            'sp_delivered_training_by_hessa' => $serviceProvider->sp_delivered_training_by_hessa,
            'sp_contact_attachment_url' => $serviceProvider->sp_contact_attachment_url,
            'district' => $serviceProvider->district->district_name,
            'fk_district_id' => [
              "id" => $serviceProvider->fk_district_id,
              "name" => $serviceProvider->district->district_name
            ],
            'specialization' => [
              "id" => $serviceProvider->fk_as_id,
              "name" => $serviceProvider->AcademicSpecialization->as_name_ar
            ],
            'location' => $serviceProvider->location->location_name,
            'fk_location_id' => [
              "id" => $serviceProvider->fk_location_id,
              "name" => $serviceProvider->location->location_name
            ],
            'university' => $serviceProvider->university->univ_name,
            'fk_as_id' =>  [
              "id" => $serviceProvider->fk_as_id,
              "name" => $serviceProvider->AcademicSpecialization->as_name_ar
            ],
            'fk_univ_id' =>  [
              "id" => $serviceProvider->fk_univ_id,
              "name" => $serviceProvider->university->univ_name
            ],
            'serviceAdmin' => @$serviceProvider->serviceAdmin->user_name,
            'languages' => $serviceProvider->languages()->selectRaw("lang_id as id, lang_name as name")->orderBy('name')->get(),
            'topics' => $serviceProvider->topics()->selectRaw("topic_id as id, topic_name_ar as name")->orderBy('name')->get(),
          ];

        }

        return $data;
    }

}
