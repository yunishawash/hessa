 @csrf
 <div class="card">
 	
    
    	<div class="card-body">
    	 	<div class="row">
	            <div class="form-group col-lg-6">
	                <label for="order_sr_relation_to_the_student_placeholder" class="form-control-label">{{ __("Master.sr_relation_to_the_student") }}:</label>
	                <select title="{{ __("Master.order_sr_relation_to_the_student_placeholder") }}" style="width: 100%;" placeholder="{{ __("Master.order_sr_relation_to_the_student_placeholder") }}" class="form-control kt-select2" name="order_sr_relation_to_the_student" id="order_sr_relation_to_the_student" required="">
	                    <option></option>
	                    <option value="father">{{ __("Master.Relation_father") }}</option>
	                    <option value="mother">{{ __("Master.Relation_mother") }}</option>
	                    <option value="brother">{{ __("Master.Relation_brother") }}</option>
	                    <option value="sister">{{ __("Master.Relation_sister") }}</option>
	                    <option value="other">{{ __("Master.Relation_other") }}</option>
	                  </select>
	            </div>
	            <div class="form-group col-lg-6">
	                <label for="order_student_name" class="form-control-label">{{ __("Master.sr_student_name") }} :</label>
	                <input type="text" class="form-control" title="{{ __("Master.sr_student_name_placeholder") }}" placeholder="{{ __("Master.sr_student_name_placeholder") }}" name="order_student_name" id="order_student_name" required="">
	            </div>

          </div>
          <div class="row">
	            <div class="form-group col-lg-6">
	                <label for="order_student_gender" class="form-control-label">{{ __("Master.sr_student_gender") }} :</label>
	                <select title="{{ __("Master.sr_student_gender_placeholder") }}" style="width: 100%;" placeholder="{{ __("Master.sr_student_gender_placeholder") }}" class="form-control kt-select2" name="order_student_gender" id="order_student_gender" required="">
	                    <option></option>
	                    <option value="male">{{ __("Master.gender_Male") }}</option>
	                    <option value="female">{{ __("Master.gender_Female") }}</option>
	                  </select>
	            </div>
	            <div class="form-group col-lg-6">
	                <label for="order_student_class" class="form-control-label">{{ __("Master.sr_student_class") }} :</label>
	                <select title="{{ __("Master.sr_student_class_placeholder") }}" style="width: 100%;" placeholder="{{ __("Master.sr_student_class_placeholder") }}" class="form-control kt-select2" name="order_student_class" id="order_student_class" required="">
	                    <option></option>
	                    <option value="1">{{ __("Master.class_1") }}</option>
	                    <option value="2">{{ __("Master.class_2") }}</option>
	                    <option value="3">{{ __("Master.class_3") }}</option>
	                    <option value="4">{{ __("Master.class_4") }}</option>
	                    <option value="5">{{ __("Master.class_5") }}</option>
	                    <option value="6">{{ __("Master.class_6") }}</option>
	                    <option value="7">{{ __("Master.class_7") }}</option>
	                    <option value="8">{{ __("Master.class_8") }}</option>
	                    <option value="9">{{ __("Master.class_9") }}</option>
	                    <option value="10">{{ __("Master.class_10") }}</option>
	                    <option value="11">{{ __("Master.class_11") }}</option>
	                    <option value="12">{{ __("Master.class_12") }}</option>
	                  </select>
	            </div>
          </div>
          <div class="row row_order_student_high_school_branch kt-hide">
              <div class="form-group col-lg-12">
                  <label for="order_student_high_school_branch" class="form-control-label">{{ __("Master.sr_student_high_school_branch") }} :</label>
                  <select title="{{ __("Master.sr_student_high_school_branch_placeholder") }}" style="width: 100%;" placeholder="{{ __("Master.sr_student_high_school_branch_placeholder") }}" class="form-control kt-select2" name="order_student_high_school_branch" id="order_student_high_school_branch">
                      <option value="science">{{ __("Master.Science") }}</option>
                      <option value="literary">{{ __("Master.Literary") }}</option>
                      <option value="hotel">{{ __("Master.Hotel") }}</option>
                      <option value="sharia">{{ __("Master.Sharia") }}</option>
                      <option value="commercial">{{ __("Master.Commercial") }}</option>
                      <option value="technology">{{ __("Master.Technology") }}</option>
                      <option value="industrial">{{ __("Master.Industrial") }}</option>
                      <option value="professional">{{ __("Master.Professional") }}</option>
                    </select>
              </div>
          </div>
          <div class="row">
	            <div class="form-group col-12">
	                <label for="order_order_summery" class="form-control-label">{{ __("Master.sr_order_summery") }} :</label>
	                <textarea title="{{ __("Master.order_notes_placeholder") }}" rows="5" placeholder="{{ __("Master.order_notes_placeholder") }}" class="form-control" name="order_order_summery" id="order_order_summery"></textarea>
	            </div>
            </div>
    	</div>
</div>

<div class="card">

    	<div class="row">
              <div class="form-group col-lg-6">
                <label for="topics" class="form-control-label">{{ __("Master.sp_order_topics") }} :</label>
                  <select title="{{ __("Master.sp_order_topics_placeholder") }}" placeholder="{{ __("Master.sp_order_topics_placeholder") }}"  class="form-control kt-select2" style="width: 100%;" multiple name="topics[]" id="topics" required="">
                  </select>
              </div>
              <div class="form-group col-lg-6">
                  <label for="order_other_topics" class="form-control-label">{{ __("Master.sr_other_topics") }} :</label>
                  <input type="text" title="{{ __("Master.sr_other_topics_placeholder") }}" placeholder="{{ __("Master.sr_other_topics_placeholder") }}" class="form-control" name="order_other_topics" id="order_other_topics">
              </div>
        </div>

        <div class="row">
              <div class="form-group col-lg-6">
                <label for="languages" class="form-control-label">{{ __("Master.Languages") }} :</label>
                  <select title="{{ __("Master.Languages_placeholder") }}" placeholder="{{ __("Master.Languages_placeholder") }}"  class="form-control kt-select2" style="width: 100%;" multiple name="languages[]" id="languages">
                  </select>
              </div>
              <div class="form-group col-lg-6">
                  <label for="order_other_languages" class="form-control-label">{{ __("Master.sr_other_languages") }} :</label>
                  <input type="text" title="{{ __("Master.sr_other_languages_placeholder") }}" placeholder="{{ __("Master.sr_other_languages_placeholder") }}" class="form-control" name="order_other_languages" id="order_other_languages">
              </div>
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
            <label for="order_session_location" class="form-control-label">{{ __("Master.sr_session_location") }} :</label>
            <input type="text" class="form-control" title="{{ __("Master.sr_session_location_placeholder") }}" placeholder="{{ __("Master.sr_session_location_placeholder") }}" name="order_session_location" id="order_session_location">
          </div>
          <div class="form-group col-lg-6">
              <label for="order_notes" class="form-control-label">{{ __("Master.sr_notes") }}:</label>
              <textarea class="form-control" title="{{ __("Master.sr_notes_placeholder") }}" placeholder="{{ __("Master.sr_notes_placeholder") }}" name="order_notes" id="order_notes" rows="5"></textarea>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-lg-6">
          	<label for="order_targeted_gender" class="form-control-label">{{ __("Master.sr_targeted_gender") }} :</label>
            <select title="{{ __("Master.sr_targeted_gender_placeholder") }}" style="width: 100%;" placeholder="{{ __("Master.sr_targeted_gender_placeholder") }}" class="form-control kt-select2" name="order_targeted_gender" id="order_targeted_gender" required="">
                <option></option>
                <option value="male">{{ __("Master.gender_Male") }}</option>
                <option value="female">{{ __("Master.gender_Female") }}</option>
                <option value="both">{{ __("Master.gender_Both") }}</option>
              </select>
          </div>
          <div class="form-group col-lg-6">
              <label for="fk_package_id" class="form-control-label">{{ __("Master.package_id") }} :</label>
              <select title="{{ __("Master.package_id_placeholder") }}" style="width: 100%;" placeholder="{{ __("Master.package_id_placeholder") }}" class="form-control kt-select2" name="fk_package_id" id="fk_package_id" required="">
              </select>
          </div>
        </div>

        <div class="row">
          <div class="form-group col-lg-12">
              <label for="order_initial_num_of_sessions" class="form-control-label">{{ __("Master.sr_initial_num_of_sessions") }} :</label>
              <input type="number" min="0" step="1" class="form-control" title="{{ __("Master.sr_initial_num_of_sessions_placeholder") }}" placeholder="{{ __("Master.sr_initial_num_of_sessions_placeholder") }}" name="order_initial_num_of_sessions" id="order_initial_num_of_sessions" required="">
          </div>
        </div>
</div>
