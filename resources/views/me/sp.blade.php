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
        @if(\Auth::user()->serviceProvider->sp_profiling_stage != 'Complete' || \Auth::user()->serviceProvider->sp_status != 'active')
          <div class="alert alert-warning" role="alert">
              <div class="alert-text">{{ __("Master.need_to_update_profile") }}</div>
          </div>
        @endif
				<!--begin::Form-->
				<form method="POST" class="kt_form kt-padding-20" id="kt_signup_form" action="/me/updateProfile">
					<div class="kt-portlet__body">
						<div class="accordion accordion-solid accordion-toggle-plus" id="serviceProvider_Info_Accordion">
							@component('components.serviceProviderStore')
              @endcomponent
						</div>
					</div>
				</form>
				<div class="kt-portlet__foot">
					<div class="kt-form__actions">
           				<button type="button" class="btn btn-primary" id="kt_login_signup_submit">{{ __("Master.Save") }}</button>
					</div>
				</div>
				<!--end::Form-->
			</div>
			<!--end::Portlet-->
		</div>
	</div>
</div>
@endSection

@section('javascript')
<script type="text/javascript">
var id = 0;
jQuery( document ).ready(function() {

	jQuery("#password").removeAttr("required");
	jQuery("#sp_email").removeAttr("required");

	var showErrorMsg = function(form, type, msg) {
        var alert = $('<div class="alert alert-' + type + ' alert-dismissible" role="alert">\
            <div class="alert-text">'+msg+'</div>\
            <div class="alert-close">\
                <i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i>\
            </div>\
        </div>');

        form.find('.alert').remove();
        alert.prependTo(form);
        //alert.animateClass('fadeIn animated');
        KTUtil.animateClass(alert[0], 'fadeIn animated');
        alert.find('span').html(msg);
    }

	jQuery.get("/me", function(data, status){
		id = data.data.sp_id;
        jQuery.each( data.data, function(index, item){
            if (jQuery("#"+index).is("input")) {

                var type = jQuery("#"+index).attr("type");
                if(type !== "file"){
                    jQuery("#"+index).val(item);
                }else{
                    jQuery("#"+index).removeAttr("required");
                }
                if(index == "sp_gpa") {
                    jQuery("#sp_univ_avg").val(item*25);
                }

            }else if (jQuery("#"+index).is("select")){
                if(index.startsWith("fk_")){
                    jQuery("#"+index).append('<option value="'+item.id+'" selected>'+item.name+'</option>').val(item.id).trigger('change');
                }else if(index.startsWith("languages") || index.startsWith("topics")){
                    jQuery.each(item, function( i, subItem ) {
                        jQuery("#"+index).append('<option value="'+subItem.id+'" selected>'+subItem.name+'</option>').trigger('change');
                    });
                    jQuery("#"+index).trigger('change');
                }else if(index.startsWith("sp_ability_to_teach_days") || index.startsWith("sp_ability_to_teach_levels")){
                    var options = Array.from(document.querySelectorAll("#"+index +" option"));
                    item.split(',').forEach( function( v ) {
                        options.find(c => c.value == v).selected = true;
                    });
                    jQuery("#"+index).trigger('change');
                }
                else{
                    jQuery("#"+index).val(item).trigger('change');
                }
            }else  if (jQuery("#"+index).is("textarea")){
                jQuery("#"+index).val(item);
            }
        });
        jQuery(".hideFromAdd").show();
    });

  jQuery("#sp_land_line_number").inputmask({
      "mask": "09-2999999",
      placeholder: "09-0000000" // remove underscores from the input mask
  });

  jQuery("#sp_emergency_number").inputmask({
      "mask": "059-9999999",
      placeholder: "050-0000000" // remove underscores from the input mask
  });

  jQuery("#sp_id_number").inputmask({
      "mask": "999999999",
      placeholder: "999999999" // remove underscores from the input mask
  });

  jQuery("#sp_mobile").inputmask({
      "mask": "059-9999999",
      placeholder: "050-0000000" // remove underscores from the input mask
  });

  jQuery("#sp_gpa").inputmask({
      "mask": "9.99",
      placeholder: "0.00" // remove underscores from the input mask
  });

  jQuery("#sp_univ_avg").inputmask({
      "mask": "99.9",
      placeholder: "00.0" // remove underscores from the input mask
  });

  $('#sp_gpa').on('change', function(){
    $("#sp_univ_avg").val($(this).val()*25);
  });

  $('#sp_univ_avg').on('change', function(){
    $("#sp_gpa").val($(this).val()/25);
  });

    $('#sp_ability_to_teach_levels').change(function (e) {
        if ($('#sp_ability_to_teach_levels').select2('val')[0] == 'All') {
            var levels = ["primary", "secondary", "high"];
            $(this).val(levels).trigger('change');
        }
    });

    $('#sp_ability_to_teach_days').change(function (e) {
        if ($('#sp_ability_to_teach_days').select2('val')[0] == 'All') {
            var days = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
            $(this).val(days).trigger('change');
        }
    });

  $('#fk_district_id').change(function(){
      jQuery('#fk_location_id').select2("val", "");
      jQuery('#fk_location_id').val("").trigger('change');
  });

	jQuery('#kt_login_signup_submit').click(function(e) {
        e.preventDefault();

        var btn = jQuery(this);
        var form = jQuery("#kt_signup_form");

        form.validate({
            rules: {
                sp_full_name: {
                    required: true
                },
                sp_gender: {
                    required: true
                },
                sp_facebook_id: {
                    required: true
                },
                sp_mobile: {
                    required: true
                },
                sp_community: {
                    required: true
                },
                sp_emergency_number: {
                    required: true
                },
                sp_working_status: {
                    required: true
                },
                fk_location_id: {
                    required: true
                }
            }
        });

        if (!form.valid()) {
            return;
        }

        var URL = '/serviceProvider/'+id;
        var type = 'put';

        btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

        form.ajaxSubmit({
            url: URL,
            type: type,
            success: function(response, status, xhr, $form) {
                if(response.isTrue === true){
                    showErrorMsg(form, 'success', response.Message);
                }else {
                    var Erorrs = response.Erorrs;
                    var ErrorList = "";
                    jQuery.each(Erorrs, function( index, value ) {
                        ErrorList += "<div><strong>" + index + " </strong> : " +value+"</div>" ;
                    });
                    showErrorMsg(form, 'danger', ErrorList);
                }
                btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
            }
        });
    });

	jQuery('#serviceProvider_Info_Accordion').find('.form-control[required]').parent().find("label.form-control-label").append(' <span class="text-danger">*</span> ');

	$('#Account_Information_Wapper').hide();

	$('#serviceProvider_Info_Accordion').find("select.kt-select2").removeClass("kt-margin-t-25");

    $('#sp_profiling_stage').select2({
         placeholder: jQuery('#sp_profiling_stage').attr("placeholder")
    });

    $('#sp_status').select2({
         placeholder: jQuery('#sp_status').attr("placeholder")
    });

    $('#sp_gender').select2({
         placeholder: jQuery('#sp_gender').attr("placeholder")
    });

    $('#sp_working_status').select2({
         placeholder: jQuery('#sp_working_status').attr("placeholder")
    });

    $('#sp_community').select2({
         placeholder: jQuery('#sp_community').attr("placeholder")
    });

    $('#sp_high_school_branch').select2({
         placeholder: jQuery('#sp_high_school_branch').attr("placeholder")
    });

    $('#sp_educational_level_degree').select2({
         placeholder: jQuery('#sp_educational_level_degree').attr("placeholder")
    });

    $('#sp_study_year').select2({
         placeholder: jQuery('#sp_study_year').attr("placeholder")
    });

    $('#sp_ability_to_teach_at_home').select2({
         placeholder: jQuery('#sp_ability_to_teach_at_home').attr("placeholder")
    });

    $('#sp_ability_to_teach_levels_placeholder').select2({
         placeholder: jQuery('#sp_ability_to_teach_levels_placeholder').attr("placeholder")
    });

    $('#sp_ability_to_teach_levels').select2({
         placeholder: jQuery('#sp_ability_to_teach_levels').attr("placeholder")
    });

    $('#sp_ability_to_teach_days').select2({
         placeholder: jQuery('#sp_ability_to_teach_days').attr("placeholder")
    });

    $('#sp_targeted_gender_to_teach').select2({
         placeholder: jQuery('#sp_targeted_gender_to_teach').attr("placeholder")
    });

    $('#sp_ability_to_teach_days').change(function (e) {
        if ($('#sp_ability_to_teach_days').select2('val')[0] == 'All') {
            var days = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
            $(this).val(days).trigger('change');
        }
    });

    updateSelect2();

    function updateSelect2(){

        $('#topics').select2({
            placeholder: {
                id: '-1', // the value of the option
                text: jQuery('#topics').attr("placeholder")
            },
            ajax: {
                url: "/lookups/topics",
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
                                text: item.topic_name,
                                id: item.topic_id
                            }
                        })
                    };
                }
            }
        });

        $('#languages').select2({
             placeholder: {
                id: '-1', // the value of the option
                text: jQuery('#languages').attr("placeholder")
            },
             ajax: {
                url: "/lookups/languages",
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
                                text: item.lang_name,
                                id: item.lang_id
                            }
                        })
                    };
                }
            }
        });
        $('#fk_as_id').select2({
             placeholder: jQuery('#fk_as_id').attr("placeholder"),
             ajax: {
                url: "/lookups/specializations",
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
                                text: item.as_name,
                                id: item.as_id
                            }
                        })
                    };
                }
            }
        });
        $('#fk_univ_id').select2({
             placeholder: jQuery('#fk_univ_id').attr("placeholder"),
             ajax: {
                url: "/lookups/universities",
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
                                text: item.univ_name,
                                id: item.univ_id
                            }
                        })
                    };
                }
            }
        });
        $('#fk_district_id').select2({
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
        $('#fk_location_id').select2({
             placeholder: jQuery('#fk_location_id').attr("placeholder"),
              ajax: {
                url: "/lookups/locations",
                dataType: 'json',
                type: "POST",
                data: function (params) {
                    var queryParameters = {
                        district_id: jQuery('#fk_district_id').val(),
                        term: params.term
                    }
                    return queryParameters;
                },
                processResults: function (data) {
                    return {
                        results: $.map(data.data, function (item) {
                            return {
                                text: item.location_name,
                                id: item.location_id
                            }
                        })
                    };
                }
            }
        });
    }

 });
</script>
@endSection
