@extends('layouts.master')

@section('pageTitle')
  {{ __("Master.My_Profile") }} 
@endSection

@section('contents')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid  kt-margin-t-20">
	<div class="row">
		<div class="col-md-10 offset-1">
			<!--begin::Portlet-->
			<div class="kt-portlet">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							 {{ __("Master.My_Profile") }} 
						</h3>
					</div>
				</div>
				<!--begin::Form-->
				<form class="kt-form">
					<div class="kt-portlet__body">
						<div class="form-group">
							<label for="user_name" class="form-control-label">{{ __("Master.user_name") }}:</label>
			                <input type="text" class="form-control" title="{{ __("Master.user_name_placeholder") }}" placeholder="{{ __("Master.user_name_placeholder") }}" name="user_name" id="user_name" required="">
						</div>

						<div class="form-group">
							<label for="fk_district_id" class="form-control-label">{{ __("Master.District") }}:</label>
			                  <select title="{{ __("Master.fk_district_id_placeholder") }}" style="width: 100%;" placeholder="{{ __("Master.fk_district_id_placeholder") }}" name="fk_district_id" class="form-control kt-select2" id="fk_district_id" required="">
			                  </select>
						</div>
						<div class="form-group form-group-last">
							<button type="button" class="btn btn-danger btn-change-account-status">{{ __("Master.change_to_active_account") }} </button>
						</div>
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
               				<button type="button" class="btn btn-primary" id="kt_login_signup_submit">{{ __("Master.Save") }}</button>
               				<button type="reset" class="btn btn-secondary">{{ __("Master.Reset") }} </button>
						</div>
					</div>
				</form>
				<!--end::Form-->			
			</div>
			<!--end::Portlet-->
		</div>
	</div>	
</div>
@endSection

@section('javascript')
<script type="text/javascript">

jQuery( document ).ready(function() {

	jQuery(document).on("click",".btn-change-account-status",function(){
	    jQuery.post("/serviceAdmins/1/toggleActive/", function(data, status){
	        if(jQuery(".btn-change-account-status").attr("value") === "0"){
	        	jQuery(".btn-change-account-status").attr("value", "1") ;
	        	jQuery(".btn-change-account-status").text("{{ __("Master.change_to_active_account") }}");
	        }else{
	        	jQuery(".btn-change-account-status").text("{{ __("Master.change_to_inactive_account") }}");
	        	jQuery(".btn-change-account-status").attr("value", "1") ;
	        }
	    });
	    return false;
	  });

	jQuery('#fk_district_id').select2({
         placeholder: jQuery('#fk_district_id').attr("placeholder"),
         ajax: {
            url: "/lookups/districts",
            dataType: 'json',
            type: "POST",
            data: function (params) {
                var queryParameters = {
                    term: params.term
                }
                return queryParameters;
            },
            processResults: function (data) {
                return {
                    results: $.map(data.data, function (item) {
                        return {
                            text: item.district_name,
                            id: item.district_id
                        }
                    })
                };
            }
        }
    });
 });
</script>
@endSection