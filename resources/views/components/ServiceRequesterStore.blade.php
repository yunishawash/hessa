 @csrf
 <div class="card">
    <div id="collapse_Personal_Information" class="collapse show" aria-labelledby="Personal_Information" data-parent="#ServiceRequester_Info_Accordion">
        <div class="card-body">
          <div class="row">
            <div class="form-group col-lg-6">
                <label for="sr_full_name" class="form-control-label">{{ __("Master.sr_full_name") }}:</label>
                <input type="text" class="form-control" title="{{ __("Master.sr_full_name_placeholder") }}" placeholder="{{ __("Master.sr_full_name_placeholder") }}" name="sr_full_name" id="sr_full_name" required="">
            </div>
            <div class="form-group col-lg-6">
                <label for="sr_email" class="form-control-label">{{ __("Master.sr_email") }}:</label>
                <input class="form-control" title="{{ __("Master.sr_email_placeholder") }}" placeholder="{{ __("Master.sr_email_placeholder") }}" name="sr_email" id="sr_email" >
            </div>
          </div>
            <div class="row">
              <div class="form-group col-lg-6">
                <label for="sr_mobile" class="form-control-label">{{ __("Master.sr_mobile") }}:</label>
                  <input type="text" title="{{ __("Master.sr_mobile_placeholder") }}" placeholder="{{ __("Master.sr_mobile_placeholder") }}" class="form-control" name="sr_mobile" id="sr_mobile" required="">
              </div>
              <div class="form-group col-lg-6">
                  <label for="sr_facebook_id" class="form-control-label">{{ __("Master.sr_facebook_id") }}:</label>
                  <input type="url" title="{{ __("Master.sr_facebook_id_placeholder") }}" placeholder="{{ __("Master.sr_facebook_id_placeholder") }}" class="form-control" name="sr_facebook_id" id="sr_facebook_id">
              </div>
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
                  <label for="sr_address_1" class="form-control-label">{{ __("Master.sr_address_1") }}:</label>
                  <input type="text" title="{{ __("Master.sr_address_1_placeholder") }}" placeholder="{{ __("Master.sr_address_1_placeholder") }}" class="form-control" name="sr_address_1" id="sr_address_1" required="">
              </div>
              <div class="form-group col-lg-6">
                <label for="sr_address_2" class="form-control-label">{{ __("Master.sr_address_2") }}:</label>
                  <input type="text" title="{{ __("Master.sr_address_2_placeholder") }}" placeholder="{{ __("Master.sr_address_2_placeholder") }}" class="form-control" name="sr_address_2" id="sr_address_2">
              </div>
            </div>
        </div>
    </div>
 </div>
