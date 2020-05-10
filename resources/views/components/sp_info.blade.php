<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid kt-margin-t-20">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                     {{ __("Master.ServiceProvider") }} ( {{ $sp->sp_full_name }} )
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="kt-form kt-form--fit kt-margin-b-20">
                <div class="row">
            <div class="form-group col-lg-4">
                <label for="sp_full_name" class="form-control-label">{{ __("Master.sp_full_name") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $sp->sp_full_name }}</span>
            </div>
            <div class="form-group col-lg-4">
                <label for="sp_email" class="form-control-label">{{ __("Master.sp_email") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $sp->sp_email }}</span>
            </div>
            <div class="form-group col-lg-4">
                <label for="sp_mobile" class="form-control-label">{{ __("Master.sp_mobile") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $sp->sp_mobile }}</span>
              </div>
          </div>
            <div class="row">
              <div class="form-group col-lg-4">
                  <label for="sp_facebook_id" class="form-control-label">{{ __("Master.sp_facebook_id") }}:</label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder"><a href="{{ $sp->sp_facebook_id }}" target="_blank">  {{ __("Master.click_here") }} </a></span>
              </div>
              <div class="form-group col-lg-4">
                <label for="sp_gender" class="form-control-label">{{ __("Master.sp_gender") }} : </label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ __("Master.gender_". ucfirst ($sp->sp_gender)) }}</span>
              </div>
              <div class="form-group col-lg-4">
                <label for="sp_community" class="form-control-label">{{ __("Master.sp_community") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ __("Master.community_".ucfirst ($sp->sp_community)) }}</span>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-4">
                <label for="fk_district_id" class="form-control-label">{{ __("Master.District") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $sp->district["district_name"] }}</span>
              </div>
              <div class="form-group col-lg-4">
                  <label for="fk_location_id" class="form-control-label">{{ __("Master.location") }}:</label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $sp->location["location_name"] }}</span>
              </div>
              <div class="form-group col-lg-4">
                  <label for="sp_address_1" class="form-control-label">{{ __("Master.sp_address_1") }}:</label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $sp->sp_address_1 }}</span>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-4">
                <label for="sp_address_2" class="form-control-label">{{ __("Master.sp_address_2") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">@if($sp->sp_address_2 ){{$sp->sp_address_2 }} @else {{  __("Master.not_exist")  }} @endif</span>
              </div>
              <div class="form-group col-lg-4">
                  <label for="sp_join_date" class="form-control-label">{{ __("Master.sp_join_date") }}: </label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $sp->sp_join_date->format('Y-m-d') }}</span>
              </div>
            </div>
            </div>
        </div>
    </div>
</div>
