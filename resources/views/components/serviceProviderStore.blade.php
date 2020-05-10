 @csrf
 <div class="card">
    <div class="card-header" id="Service_Delivery_Information">
        <div class="card-title" data-toggle="collapse" data-target="#collapse_Service_Delivery_Information" aria-expanded="true" aria-controls="collapse_Service_Delivery_Information">
            <i class="flaticon2-chart"></i> {{ __("Master.Service_Delivery_Information") }}
        </div>
    </div>
    <div id="collapse_Service_Delivery_Information" class="collapse show" aria-labelledby="Service_Delivery_Information" data-parent="#serviceProvider_Info_Accordion">
        <div class="card-body">
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="sp_ability_to_teach_at_home" class="form-control-label">{{ __("Master.sp_ability_to_teach_at_home") }}:</label>
                  <select type="text" title="{{ __("Master.sp_ability_to_teach_at_home_title") }}" placeholder="{{ __("Master.sp_ability_to_teach_at_home_placeholder") }}" class="form-control kt-select2" id="sp_ability_to_teach_at_home" name="sp_ability_to_teach_at_home" style="width: 100%;" required="">
                    <option></option>
                    <option value="yes">{{ __("Master.yes") }}</option>
                    <option value="no">{{ __("Master.no") }}</option>
                  </select>
              </div>
              <div class="form-group col-lg-6">
                  <label for="sp_ability_to_teach_levels" class="form-control-label">{{ __("Master.sp_ability_to_teach_levels") }}:{{ __("Master.sp_can_choose_more_than_level") }}</label>
                  <select type="text" title="{{ __("Master.sp_ability_to_teach_levels_placeholder") }}" placeholder="{{ __("Master.sp_ability_to_teach_levels_placeholder") }}" class="form-control kt-select2" id="sp_ability_to_teach_levels" name="sp_ability_to_teach_levels[]" style="width: 100%;" multiple required="">
                    <option value="All">{{ __("Master.All_levels") }}</option>
                    <option value="primary">{{ __("Master.primary") }}</option>
                    <option value="high">{{ __("Master.high") }}</option>
                    <option value="secondary">{{ __("Master.secondary") }}</option>
                  </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="topics" class="form-control-label">{{ __("Master.topics") }}:{{ __("Master.sp_can_choose_more_than_topic") }}</label>
                  <select title="{{ __("Master.topics_placeholder") }}"  placeholder="{{ __("Master.topics_placeholder") }}" class="form-control kt-select2" id="topics" name="topics[]" multiple style="width: 100%;" required="">
                  </select>
              </div>
              <div class="form-group col-lg-6">
                  <label for="sp_ability_to_teach_other_topics" class="form-control-label">{{ __("Master.sp_ability_to_teach_other_topics") }}:</label>
                  <input type="text"  title="{{ __("Master.sp_ability_to_teach_other_topics_placeholder") }}" placeholder="{{ __("Master.sp_ability_to_teach_other_topics_placeholder") }}" class="form-control" name="sp_ability_to_teach_other_topics" id="sp_ability_to_teach_other_topics">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                  <label for="languages" class="form-control-label">{{ __("Master.sp_ability_to_teach_languages") }}:</label>
                  <select type="text" title="{{ __("Master.sp_ability_to_teach_languages_placeholder") }}" placeholder="{{ __("Master.sp_ability_to_teach_languages_placeholder") }}" class="form-control kt-select2" id="languages" multiple name="languages[]" style="width: 100%;">
                  </select>
              </div>
              <div class="form-group col-lg-6">
                  <label for="sp_ability_to_teach_other_languages" class="form-control-label">{{ __("Master.sp_ability_to_teach_other_languages") }}:</label>
                  <input type="text"  title="{{ __("Master.sp_ability_to_teach_other_languages_placeholder") }}" placeholder="{{ __("Master.sp_ability_to_teach_other_languages_placeholder") }}" class="form-control" name="sp_ability_to_teach_other_languages" id="sp_ability_to_teach_other_languages">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="sp_ability_to_teach_days" class="form-control-label">{{ __("Master.sp_ability_to_teach_days") }}:</label>
                  <select type="text" title="{{ __("Master.sp_ability_to_teach_days_placeholder") }}" placeholder="{{ __("Master.sp_ability_to_teach_days_placeholder") }}"  class="form-control kt-select2" name="sp_ability_to_teach_days[]" id="sp_ability_to_teach_days" style="width: 100%;" multiple required="">
                    <option value="All">{{ __("Master.All_days") }}</option>
                    <option value="Saturday">{{ __("Master.Saturday") }}</option>
                    <option value="Sunday">{{ __("Master.Sunday") }}</option>
                    <option value="Monday">{{ __("Master.Monday") }}</option>
                    <option value="Tuesday">{{ __("Master.Tuesday") }}</option>
                    <option value="Wednesday">{{ __("Master.Wednesday") }}</option>
                    <option value="Thursday">{{ __("Master.Thursday") }}</option>
                    <option value="Friday">{{ __("Master.Friday") }}</option>
                  </select>
              </div>
              <div class="form-group col-lg-6">
                  <label for="sp_targeted_gender_to_teach" class="form-control-label">{{ __("Master.sp_targeted_gender_to_teach") }}</label>
                  <select type="text" title="{{ __("Master.sp_targeted_gender_to_teach_placeholder") }}" placeholder="{{ __("Master.sp_targeted_gender_to_teach_placeholder") }}" class="form-control kt-select2" id="sp_targeted_gender_to_teach" name="sp_targeted_gender_to_teach" style="width: 100%;" required="">
                    <option></option>
                    <option value="yes">{{ __("Master.yes") }}</option>
                    <option value="no">{{ __("Master.no") }}</option>
                  </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-12">
                <label for="sp_notes" class="form-control-label">{{ __("Master.sp_notes") }}:</label>
                <textarea type="text" title="{{ __("Master.sp_notes_placeholder") }}" placeholder="{{ __("Master.sp_notes_placeholder") }}" class="form-control" style="height: auto;" rows="5" name="sp_notes" id="sp_notes"></textarea>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header" id="Personal_Information">
        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse_Personal_Information" aria-expanded="false" aria-controls="collapse_Personal_Information">
            <i class="flaticon-pie-chart-1"></i> {{ __("Master.Personal_Information") }}
        </div>
    </div>
    <div id="collapse_Personal_Information" class="collapse" aria-labelledby="Personal_Information" data-parent="#serviceProvider_Info_Accordion">
        <div class="card-body">
          <div class="row">
            <div class="form-group col-lg-6">
                <label for="sp_full_name" class="form-control-label">{{ __("Master.sp_full_name") }}:</label>
                <input type="text" class="form-control" title="{{ __("Master.sp_full_name_placeholder") }}" placeholder="{{ __("Master.sp_full_name_placeholder") }}" name="sp_full_name" id="sp_full_name" required="">
            </div>
            <div class="form-group col-lg-6">
              <label for="sp_personal_passport_img_url" class="form-control-label">{{ __("Master.sp_personal_passport_img_url") }}:</label>
              <input type="file" class="form-control" title="{{ __("Master.sp_personal_passport_img_url_placeholder") }}" placeholder="{{ __("Master.sp_personal_passport_img_url_placeholder") }}" name="sp_personal_passport_img_url" id="sp_personal_passport_img_url" required="">
            </div>
          </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="sp_mobile" class="form-control-label">{{ __("Master.sp_mobile") }}:</label>
                  <input type="text" title="{{ __("Master.sp_mobile_placeholder") }}" placeholder="{{ __("Master.sp_mobile_placeholder") }}" class="form-control" name="sp_mobile" id="sp_mobile" required="">
              </div>
              <div class="form-group col-lg-6">
                  <label for="sp_facebook_id" class="form-control-label">{{ __("Master.sp_facebook_id") }}:</label>
                  <input type="url" title="{{ __("Master.sp_facebook_id_placeholder") }}" placeholder="{{ __("Master.sp_facebook_id_placeholder") }}" class="form-control" name="sp_facebook_id" id="sp_facebook_id" required="">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="sp_gender" class="form-control-label">{{ __("Master.sp_gender") }}</label>
                  <select title="{{ __("Master.sp_gender_placeholder") }}" style="width: 100%;" placeholder="{{ __("Master.sp_gender_placeholder") }}" class="form-control kt-margin-t-25 kt-select2" name="sp_gender" id="sp_gender" required="">
                    <option></option>
                    <option value="male">{{ __("Master.gender_Male") }}</option>
                    <option value="female">{{ __("Master.gender_Female") }}</option>
                  </select>
              </div>
              <div class="form-group col-lg-6">
                <label for="sp_community" class="form-control-label">{{ __("Master.sp_community") }}:</label>
                  <select type="text" title="{{ __("Master.sp_community_placeholder") }}" placeholder="{{ __("Master.sp_community_placeholder") }}" style="width: 100%;" class="form-control kt-select2" id="sp_community" name="sp_community" required="">
                    <option></option>
                    <option value="city">{{ __("Master.community_City") }}</option>
                    <option value="village">{{ __("Master.community_Village") }}</option>
                    <option value="camp">{{ __("Master.community_Camp") }}</option>
                  </select>
              </div>
            </div>
            <div class="alert" role="alert">
              <div class="alert-text">{{ __("Master.teaching_in_distcit_and_location_message") }}</div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="fk_district_id" class="form-control-label">{{ __("Master.District") }}:</label>
                  <select type="text" title="{{ __("Master.fk_district_id_placeholder") }}" style="width: 100%;" placeholder="{{ __("Master.fk_district_id_placeholder") }}" name="fk_district_id" class="form-control kt-select2" id="fk_district_id" required="">
                  </select>
              </div>
              <div class="form-group col-lg-6">
                  <label for="fk_location_id" class="form-control-label">{{ __("Master.location") }}:</label>
                  <select type="text" title="{{ __("Master.location_placeholder") }}" style="width: 100%;" placeholder="{{ __("Master.location_placeholder") }}" name="fk_location_id" class="form-control kt-select2" id="fk_location_id" required="">
                  </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                  <label for="sp_address_1" class="form-control-label">{{ __("Master.sp_address_1") }}:</label>
                  <input type="text" title="{{ __("Master.sp_address_1_placeholder") }}" placeholder="{{ __("Master.sp_address_1_placeholder") }}" class="form-control" name="sp_address_1" id="sp_address_1">
              </div>
              <div class="form-group col-lg-6">
                <label for="sp_address_2" class="form-control-label">{{ __("Master.sp_address_2") }}:</label>
                  <input type="text" title="{{ __("Master.sp_address_2_placeholder") }}" placeholder="{{ __("Master.sp_address_2_placeholder") }}" class="form-control" name="sp_address_2" id="sp_address_2">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                  <label for="sp_land_line_number" class="form-control-label">{{ __("Master.sp_land_line_number") }}:</label>
                  <input type="text" title="{{ __("Master.sp_land_line_number_placeholder") }}" placeholder="{{ __("Master.sp_land_line_number_placeholder") }}" class="form-control" name="sp_land_line_number" id="sp_land_line_number">
              </div>
              <div class="form-group col-lg-6">
                  <label for="sp_do_b" class="form-control-label">{{ __("Master.sp_do_b") }}:</label>
                  <input type="date"  title="{{ __("Master.sp_do_b_placeholder") }}" placeholder="{{ __("Master.sp_do_b_placeholder") }}"  class="form-control" name="sp_do_b" id="sp_do_b">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="sp_emergency_contact_name" class="form-control-label">{{ __("Master.sp_emergency_contact_name") }}:</label>
                  <input type="text" title="{{ __("Master.sp_emergency_contact_name_placeholder") }}" placeholder="{{ __("Master.sp_emergency_contact_name_placeholder") }}" class="form-control" name="sp_emergency_contact_name" id="sp_emergency_contact_name" required="">
              </div>
              <div class="form-group col-lg-6">
                <label for="sp_emergency_number" class="form-control-label">{{ __("Master.sp_emergency_number") }}:</label>
                  <input type="text" title="{{ __("Master.sp_emergency_number_placeholder") }}" placeholder="{{ __("Master.sp_emergency_number_placeholder") }}" class="form-control" name="sp_emergency_number" id="sp_emergency_number" required="">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="sp_id_number" class="form-control-label">{{ __("Master.sp_id_number") }}:</label>
                <input type="text" class="form-control" title="{{ __("Master.sp_id_number_placeholder") }}" placeholder="{{ __("Master.sp_id_number_placeholder") }}" name="sp_id_number" id="sp_id_number" required="">
              </div>
              <div class="form-group col-lg-6">
                  <label for="sp_id_copy_url" class="form-control-label">{{ __("Master.sp_id_number_img_url") }}</label>
                  <input type="file" class="form-control" title="{{ __("Master.sp_id_number_img_url_placeholder") }}" placeholder="{{ __("Master.sp_id_number_img_url_placeholder") }}" name="sp_id_copy_url" id="sp_id_copy_url">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-12">
                <label for="sp_working_status" class="form-control-label">{{ __("Master.sp_working_status") }}:</label>
                  <select title="{{ __("Master.sp_working_status_placeholder") }}"  style="width: 100%;" placeholder="{{ __("Master.sp_working_status_placeholder") }}" class="form-control kt-select2" id="sp_working_status" name="sp_working_status" required="">
                    <option></option>
                    <option value="not_working">{{ __("Master.sp_community_NoWork") }}</option>
                    <option value="part_time">{{ __("Master.sp_community_PartTime") }}</option>
                    <option value="full_time">{{ __("Master.sp_community_FullTime") }}</option>
                  </select>
              </div>
            </div>
        </div>
    </div>
</div>
<div class="card" id="Account_Information_Wapper">
    <div class="card-header" id="Account_Information">
        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse_Account_Information" aria-expanded="false" aria-controls="collapseTwo6">
            <i class="flaticon2-notification"></i> {{ __("Master.enter_email_and_password") }}
        </div>
    </div>
    <div id="collapse_Account_Information" class="collapse" aria-labelledby="Account_Information" data-parent="#serviceProvider_Info_Accordion">
        <div class="card-body">
            <div class="row">
              <div class="form-group col-lg-6">
                  <label for="sp_email" class="form-control-label">{{ __("Master.sp_email") }}:</label>
                  <input type="email" title="{{ __("Master.sp_email_placeholder") }}" placeholder="{{ __("Master.sp_email_placeholder") }}" class="form-control" name="sp_email" id="sp_email" required="">
              </div>
              <div class="form-group col-lg-6">
                  <label for="password" class="form-control-label">{{ __("Master.Password") }}:</label>
                  <input type="password" title="{{ __("Master.password_title") }}" placeholder="{{ __("Master.sp_password_placeholder") }}" class="form-control" name="password" id="password" required="">
              </div>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-header" id="Academic_Information">
        <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse_Academic_Information" aria-expanded="false" aria-controls="collapse_Academic_Information">
            <i class="flaticon2-chart"></i> {{ __("Master.Academic_Information") }}
        </div>
    </div>
    <div id="collapse_Academic_Information" class="collapse" aria-labelledby="Academic_Information" data-parent="#serviceProvider_Info_Accordion">
        <div class="card-body">
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="sp_high_school_branch" class="form-control-label">{{ __("Master.sp_high_school_branch") }}:</label>
                  <select  title="{{ __("Master.sp_high_school_branch_placeholder") }}" placeholder="{{ __("Master.sp_high_school_branch_placeholder") }}" class="form-control kt-select2" style="width: 100%;" name="sp_high_school_branch" id="sp_high_school_branch" required="">
                    <option></option>
                    <option value="science">{{ __("Master.Science") }}</option>
                    <option value="literary">{{ __("Master.Literary") }}</option>
                    <option value="commercial">{{ __("Master.Commercial") }}</option>
                    <option value="hotel">{{ __("Master.Hotel") }}</option>
                    <option value="sharia">{{ __("Master.Sharia") }}</option>
                    <option value="technology">{{ __("Master.Technology") }}</option>
                    <option value="industrial">{{ __("Master.Industrial") }}</option>
                    <option value="professional">{{ __("Master.Professional") }}</option>
                  </select>
              </div>
              <div class="form-group col-lg-6">
                  <label for="sp_high_school_average" class="form-control-label">{{ __("Master.sp_high_school_average") }}:</label>
                  <input type="number" max="100" min="0" step="0.01" title="{{ __("Master.sp_high_school_average_placeholder") }}" placeholder="{{ __("Master.sp_high_school_average_placeholder") }}" class="form-control" name="sp_high_school_average" id="sp_high_school_average" required="">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="sp_educational_level_degree" class="form-control-label">{{ __("Master.sp_educational_level_degree") }}:</label>
                  <select type="text" title="{{ __("Master.sp_educational_level_degree_placeholder") }}" placeholder="{{ __("Master.sp_educational_level_degree_placeholder") }}" class="form-control kt-select2" style="width: 100%;" name="sp_educational_level_degree" id="sp_educational_level_degree" required="">
                    <option></option>
                    <option value="CSIOrD">{{ __("Master.College_student_institute_or_diploma") }}</option>
                    <option value="College_student">{{ __("Master.College_student") }}</option>
                    <option value="Diploma">{{ __("Master.Diploma") }}</option>
                    <option value="BA">{{ __("Master.Baccalaureus") }}</option>
                    <option value="Master">{{ __("Master.Master") }}</option>
                    <option value="Ph_D">{{ __("Master.Ph_D") }}</option>
                  </select>
              </div>
              <div class="form-group col-lg-6">
                  <label for="fk_univ_id" class="form-control-label">{{ __("Master.university") }}:</label>
                  <select title="{{ __("Master.sp_university_placeholder") }}" placeholder="{{ __("Master.sp_university_placeholder") }}" class="form-control kt-select2" style="width: 100%;" name="fk_univ_id" id="fk_univ_id" required="">
                  </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="fk_as_id" class="form-control-label">{{ __("Master.Specialization") }}:</label>
                  <select title="{{ __("Master.sp_Specialization_placeholder") }}" placeholder="{{ __("Master.sp_Specialization_placeholder") }}"  class="form-control kt-select2" style="width: 100%;" name="fk_as_id" id="fk_as_id" required="">
                  </select>
              </div>
              <div class="form-group col-lg-6">
                  <label for="sp_study_year" class="form-control-label">{{ __("Master.sp_study_year") }}:</label>
                  <select title="{{ __("Master.sp_study_year_placeholder") }}" placeholder="{{ __("Master.sp_study_year_placeholder") }}" class="form-control kt-select2" style="width: 100%;" name="sp_study_year" id="sp_study_year">
                    <option></option>
                    <option value="first_year">{{ __("Master.first_year") }}</option>
                    <option value="second_year">{{ __("Master.second_year") }}</option>
                    <option value="third_year">{{ __("Master.third_year") }}</option>
                    <option value="fourth_year">{{ __("Master.fourth_year") }}</option>
                    <option value="fifth_year">{{ __("Master.fifth_year") }}</option>
                    <option value="graduated">{{ __("Master.graduated") }}</option>
                  </select>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-6">
                  <label for="sp_gpa" class="form-control-label">{{ __("Master.sp_gpa") }}:</label>
                  <input title="{{ __("Master.sp_gpa_placeholder") }}" placeholder="{{ __("Master.sp_gpa_placeholder") }}" min="0" step="0.01" max="4" class="form-control" name="sp_gpa" id="sp_gpa" required="">
              </div>
              <div class="form-group col-lg-6">
                  <label for="sp_univ_avg" class="form-control-label">{{ __("Master.sp_univ_avg") }}:</label>
                  <input title="{{ __("Master.sp_univ_avg_placeholder") }}" placeholder="{{ __("Master.sp_univ_avg_placeholder") }}" min="0" step="0.01" max="100" class="form-control" name="sp_univ_avg" id="sp_univ_avg" required="">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-12">
                  <label for="sp_skills" class="form-control-label">{{ __("Master.sp_skills") }}:</label>
                  <textarea type="text"  title="{{ __("Master.sp_skills_placeholder") }}" placeholder="{{ __("Master.sp_skills_placeholder") }}" class="form-control" id="sp_skills" name="sp_skills" rows="5" style="height: auto;">
1-
2-
3-
                  </textarea>
              </div>
            </div>
        </div>
    </div>
</div>

