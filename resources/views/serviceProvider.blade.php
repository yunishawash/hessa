@extends('layouts.master')

@section('pageTitle')
 {{ __("Master.ServiceProviderTitle") }}
@endSection

@section('contents')
<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid kt-margin-t-20">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                     {{ __("Master.ServiceProviderTitle") }} |  {{ __("Master.Advanced_Search_Form") }}
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <!--begin: Search Form -->
            <form class="kt-form kt-form--fit kt-margin-b-20">
                <div class="row kt-margin-b-20">
                    <div class="col-lg-6 kt-margin-b-10-tablet-and-mobile">
                        <label>{{ __("Master.sp_full_name") }}:</label>
                        <input type="text" class="form-control kt-input" name="sp_full_name"  placeholder="{{ __("Master.sp_full_name_placeholder") }}"   data-col-index="1">
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>{{ __("Master.sp_mobile") }}:</label>
                        <input type="text" class="form-control kt-input" name="sp_mobile"  placeholder="{{ __("Master.sp_mobile_placeholder") }}"  data-col-index="4">
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                      <label for="sp_filter_gender" class="form-control-label">{{ __("Master.sp_gender") }}</label>
                      <select type="text" title="{{ __("Master.sp_gender_placeholder") }}" placeholder="{{ __("Master.sp_gender_placeholder") }}" class="form-control kt-select2 kt-input" id="sp_filter_gender" name="sp_gender" style="width: 100%;" data-col-index="5">
                        <option></option>
                        <option value='both' >{{ __("Master.gender_Both") }}</option>
                        <option value="male">{{ __("Master.male") }}</option>
                        <option value="female">{{ __("Master.female") }}</option>
                      </select>
                    </div>
                </div>
                <div class="row kt-margin-b-20">
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>{{ __("Master.District") }}:</label>
                        <select class="form-control kt-select2 kt-input" name="fk_district_id" id="fk_filter_district_id" placeholder="{{ __("Master.fk_district_id_placeholder") }}"  data-col-index="2">
                        </select>
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                      <label for="sp_filter_high_school_branch" class="form-control-label">{{ __("Master.sp_high_school_branch") }}:</label>
                          <select  title="{{ __("Master.sp_high_school_branch_placeholder") }}" placeholder="{{ __("Master.sp_high_school_branch_placeholder") }}" class="form-control kt-select2 kt-input" style="width: 100%;" name="sp_high_school_branch" id="sp_filter_high_school_branch" data-col-index="6">
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
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                      <label for="sp_filter_profiling_stage" class="form-control-label">{{ __("Master.sp_profiling_stage") }}:</label>
                      <select class="form-control kt-select2 kt-input" style="width: 100%;" placeholder="{{ __("Master.sp_profiling_stage_placeholder") }}" name="sp_profiling_stage" id="sp_filter_profiling_stage" data-col-index="10">
                          <option></option>
                          <option value="NewRequest">{{ __("Master.NewRequest_stage") }}</option>
                          <option value="NotComplete">{{ __("Master.NotComplete_stage") }}</option>
                          <option value="Interview">{{ __("Master.Interview_stage") }}</option>
                          <option value="Contract">{{ __("Master.Contract_stage") }}</option>
                          <option value="Training">{{ __("Master.Training_stage") }}</option>
                          <option value="Complete">{{ __("Master.Complete_stage") }}</option>
                      </select>
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                      <label for="sp_filter_status" class="form-control-label">{{ __("Master.sp_status") }}:</label>
                      <select class="form-control kt-select2 kt-input" style="width: 100%;"  placeholder="{{ __("Master.sp_status_placeholder") }}" name="sp_status" id="sp_filter_status" data-col-index="11">
                          <option></option>
                          <option value="active">{{ __("Master.Active") }}</option>
                          <option value="inactive">{{ __("Master.NotActive") }}</option>
                          <option value="suspend">{{ __("Master.Suspend") }}</option>
                          <option value="refused">{{ __("Master.Refused") }}</option>
                      </select>
                    </div>

                </div>
                <div class="kt-separator kt-separator--md kt-separator--dashed"></div>

                <div class="row">
                    <div class="col-lg-12">
                        <button class="btn btn-primary btn-brand--icon" id="kt_search">
                            <span>
                                <i class="la la-search"></i>
                                <span>{{ __("Master.Search") }}</span>
                            </span>
                        </button>
                        &nbsp;&nbsp;
                        <button class="btn btn-secondary btn-secondary--icon" id="kt_reset">
                            <span>
                                <i class="la la-close"></i>
                                <span>{{ __("Master.Reset") }}</span>
                            </span>
                        </button>
                    </div>
                </div>
            </form>
            <!--begin: Datatable -->
            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th> {{ __("Master.sp_join_date") }}</th>
                        <th> {{ __("Master.sp_full_name") }}</th>
                        <th> {{ __("Master.District") }}</th>
                        <th> {{ __("Master.location") }}</th>
                        <th> {{ __("Master.sp_mobile") }}</th>
                        <th> {{ __("Master.sp_gender") }}</th>
                        <th> {{ __("Master.sp_high_school_branch") }}</th>
                        <th> {{ __("Master.university") }}</th>
                        <th> {{ __("Master.Specialization") }}</th>
                        <th> {{ __("Master.ServiceProviderImage") }}</th>
                        <th> {{ __("Master.sp_profiling_stage") }}</th>
                        <th> {{ __("Master.sp_status") }}</th>
                        <th> {{ __("Master.Actions") }}</th>
                    </tr>
                </thead>
            </table>
            <!--end: Datatable -->
        </div>
    </div>
</div>
<!-- end:: Content -->
</div>

<!--begin::Modal-->
<div class="modal fade" id="New_Record_Modal" tabindex="-1" role="dialog" aria-labelledby="New Record" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="New_RecordLabel">{{ __("Master.New_Record") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="kt_signup_form" accept-charset="UTF-8" enctype="multipart/form-data" action="/serviceProvider/store">
                <!--begin::Accordion-->
                <div class="accordion accordion-solid accordion-toggle-plus" id="serviceProvider_Info_Accordion">
                    @component('components.serviceProviderStore')
                    @endcomponent
                    <div class="card">
                        <div class="card-header" id="Service_Administration">
                            <div class="card-title collapsed" data-toggle="collapse" data-target="#collapse_Service_Administration" aria-expanded="false" aria-controls="collapse_Service_Administration">
                                <i class="flaticon2-chart"></i> {{ __("Master.Service_Administration") }}
                            </div>
                        </div>
                        <div id="collapse_Service_Administration" class="collapse" aria-labelledby="Service_Administration" data-parent="#serviceProvider_Info_Accordion">
                            <div class="card-body">
                                <div class="row hideFromAdd">
                                    <div class="form-group col-lg-6">
                                        <label for="sp_join_date" class="form-control-label">{{ __("Master.sp_join_date") }}:</label>
                                        <input type="text" class="form-control" placeholder="{{ __("Master.sp_join_date_placeholder") }}" name="sp_join_date" id="sp_join_date" disabled="disabled">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="sp_initial_eval" class="form-control-label">{{ __("Master.sp_initial_eval") }}:</label>
                                        <input type="number" step="0.01" min="0" max="100" class="form-control" placeholder="{{ __("Master.sp_initial_eval_placeholder") }}" disabled="disabled" name="sp_initial_eval" id="sp_initial_eval">
                                    </div>
                                </div>

                                <div class="row hideFromAdd">
                                    <div class="form-group col-lg-6">
                                        <label for="sp_profiling_stage" class="form-control-label">{{ __("Master.sp_profiling_stage") }}:</label>
                                        <select class="form-control kt-select2" style="width: 100%;" placeholder="{{ __("Master.sp_profiling_stage_placeholder") }}" name="sp_profiling_stage" id="sp_profiling_stage">
                                            <option></option>
                                            <option value="NewRequest">{{ __("Master.NewRequest_stage") }}</option>
                                            <option value="NotComplete">{{ __("Master.NotComplete_stage") }}</option>
                                            <option value="Interview">{{ __("Master.Interview_stage") }}</option>
                                            <option value="Contract">{{ __("Master.Contract_stage") }}</option>
                                            <option value="Training">{{ __("Master.Training_stage") }}</option>
                                            <option value="Complete">{{ __("Master.Complete_stage") }}</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="sp_status" class="form-control-label">{{ __("Master.sp_status") }}:</label>
                                        <select class="form-control kt-select2" style="width: 100%;"  placeholder="{{ __("Master.sp_status_placeholder") }}" name="sp_status" id="sp_status">
                                            <option></option>
                                            <option value="active">{{ __("Master.Active") }}</option>
                                            <option value="inactive">{{ __("Master.NotActive") }}</option>
                                            <option value="suspend">{{ __("Master.Suspend") }}</option>
                                            <option value="refused">{{ __("Master.Refused") }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group col-lg-6">
                                        <label for="sp_physical_interview_score" class="form-control-label">{{ __("Master.sp_physical_interview_score") }}:</label>
                                        <input type="number" min="0" step="0.01" max="100" placeholder="{{ __("Master.sp_physical_interview_score_placeholder") }}" class="form-control" name="sp_physical_interview_score" id="sp_physical_interview_score">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="sp_sa_over_eval" class="form-control-label">{{ __("Master.sp_sa_over_eval") }}:</label>
                                        <input type="number" min="0" step="0.01" max="100" class="form-control"  placeholder="{{ __("Master.sp_sa_over_eval_placeholder") }}"  name="sp_sa_over_eval" id="sp_sa_over_eval">
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group col-lg-6">
                                        <label for="sp_delivered_training_by_hessa" class="form-control-label">{{ __("Master.sp_delivered_training_by_hessa") }}:</label>
                                        <input type="text" class="form-control" placeholder="{{ __("Master.sp_delivered_training_by_hessa_placeholder") }}" name="sp_delivered_training_by_hessa" id="sp_delivered_training_by_hessa">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="sp_initial_eval" class="form-control-label">{{ __("Master.sp_online_training_evaluation") }}:</label>
                                        <input type="number" step="0.01" min="0" max="100" class="form-control" placeholder="{{ __("Master.sp_online_training_evaluation_placeholder") }}" name="sp_online_training_evaluation" id="sp_online_training_evaluation">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-lg-6">
                                        <label for="sp_contact_attachment_url" class="form-control-label">{{ __("Master.sp_contact_attachment") }}:</label>
                                        <input type="file" placeholder="{{ __("Master.sp_contact_attachment_placeholder") }}" class="form-control" name="sp_contact_attachment_url" id="sp_contact_attachment_url">
                                    </div>
                                    <div class="form-group col-lg-6">
                                        <label for="sp_sa_notes" class="form-control-label">{{ __("Master.sp_sa_notes") }}:</label>
                                        <textarea placeholder="{{ __("Master.sp_sa_notes_placeholder") }}" class="form-control" rows="5" name="sp_sa_notes" id="sp_sa_notes" style="height: auto;"></textarea>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Accordion-->
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Master.Close") }} </button>
                <button type="button" class="btn btn-primary" id="kt_login_signup_submit">{{ __("Master.Save") }}</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->

<!--begin::Modal-->
<div class="modal fade" id="Contact_SP_Modal" tabindex="-1" role="dialog" aria-labelledby="Contact SP" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Contact_SP_Label">{{ __("Master.Contact_SP") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="kt_Send_Message_form" action="/serviceProvider/store">
                    <div class="row">
                         @csrf
                        <div class="form-group col-12">
                            <label for="sp_initial_eval" class="form-control-label">{{ __("Master.sp_contact_body") }}:</label>
                            <textarea class="form-control" title="{{ __("Master.contact_body_title") }}" placeholder="{{ __("Master.sp_contact_body_placeholder") }}" name="content" id="content" rows="5" required=""></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Master.Close") }} </button>
                <button type="button" class="btn btn-primary" id="kt_Send_Message_submit">{{ __("Master.Send_Message") }}</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->

<!--begin::Modal-->
<div class="modal fade" id="SP_Payment_Modal" tabindex="-1" role="dialog" aria-labelledby="Payment SP" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Add_Payment_SP_Label">{{ __("Master.Add_Payment") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="kt_Add_Payment_form" action="/sessions/payments/store">
                    @component('components.Add_Payment')
                    @endcomponent
                    <input type="hidden" id="fk_sp_id" name="fk_sp_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __("Master.Close") }} </button>
                <button type="button" class="btn btn-primary" id="kt_Add_Payment_submit">{{ __("Master.Save") }}</button>
            </div>
        </div>
    </div>
</div>
<!--end::Modal-->
@endSection

@section('javascript')
 <!--begin::Page Vendors(used by this page) -->
    <script src="{{  URL::asset('/assets/vendors/custom/datatables/datatables.bundle.js')}}" type="text/javascript"></script>
<!--end::Page Vendors -->
<script type="text/javascript">

 var table = "";
 var recordId = 0;

jQuery( document ).ready(function() {

  jQuery(document).on("click","#kt_reset",function(){
    jQuery(".kt-select2").val("").trigger('change');
  });

      jQuery(document).on("click",".btn-contact",function(){
        recordId =jQuery(this).attr("data-record-id");
        jQuery.get("/serviceProvider/"+recordId, function(data, status){
            jQuery("#Contact_SP_Label").text("{{ __("Master.Contact_SP_with_email") }} : " + data.data.sp_email);
         });
        $("#kt_Send_Message_form").clearForm();
        $("#kt_Send_Message_form").validate().resetForm();
        jQuery(".kt-select2").val("").trigger('change');
        jQuery("#Contact_SP_Modal").modal("show");
        jQuery(".alert").hide();
        return false;
      });

      jQuery(document).on("click",".btn-add-payment",function(){
        recordId =jQuery(this).attr("data-record-id");
        jQuery.get("/serviceProvider/"+recordId, function(data, status){
            jQuery("#Add_Payment_SP_Label").text("{{ __("Master.Add_Payment") }} : " + data.data.sp_full_name);
         });
        jQuery("#kt_Add_Payment_form").clearForm();
        jQuery("#kt_Add_Payment_form").validate().resetForm();
        jQuery("#fk_sp_id").val(recordId);
        jQuery("#SP_Payment_Modal").modal("show");
        jQuery(".alert").hide();
        return false;
      });

      jQuery(document).on("click",".btn-edit",function(){
        recordId =jQuery(this).attr("data-record-id");
        jQuery(".kt-select2").select2("val", "");
        jQuery(".kt-select2").val("").trigger('change');
        jQuery("#password").removeClass("is-invalid");
        $("#kt_signup_form").clearForm();
        $("#kt_signup_form").validate().resetForm();
        jQuery(".kt-select2").val("").trigger('change');
        jQuery("#sp_personal_passport_img_url").removeAttr("required");
        jQuery("#password").removeAttr("required");
        jQuery.get("/serviceProvider/"+recordId, function(data, status){
            jQuery("#New_RecordLabel").text("{{ __("Master.Edit") }} : " + data.data.sp_full_name );
            jQuery.each( data.data, function(index, item){
                if (jQuery("#"+index).is("input")) {
                    var type = jQuery("#"+index).attr("type");
                    if(type !== "file"){
                        jQuery("#"+index).val(item);
                    }else{
                        jQuery("#"+index).removeAttr("required");
                    }
                    if(type !== "password"){
                        jQuery("#"+index).removeAttr("required");
                    }

                    if(index == "sp_gpa") {
                        jQuery("#sp_univ_avg").val(item*25);
                    }

                }else if (jQuery("#"+index).is("select")){
                    if(index.startsWith("fk_")){
                        jQuery("#"+index).append('<option value="'+item.id+'" selected>'+item.name+'</option>').val(item.id).trigger('change');
                    }else if(index.startsWith("languages") || index.startsWith("topics")){
                        jQuery("#"+index).html("");
                        jQuery.each(item, function( i, subItem ) {
                            jQuery("#"+index).append('<option value="'+subItem.id+'" selected>'+subItem.name+'</option>').trigger('change');
                        });
                        jQuery("#"+index).trigger('change');
                    }else if(index.startsWith("sp_ability_to_teach_days") || index.startsWith("sp_ability_to_teach_levels")){
                        var options = Array.from(document.querySelectorAll("#"+index +" option"));
                        item.split(',').forEach( function( v ) {
                            if(v){
                                options.find(c => c.value == v).selected = true;
                            }
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
            updateSelect2();
            jQuery(".hideFromAdd").show();
            jQuery(".alert").hide();
            jQuery("#New_Record_Modal").modal("show");
        });
        return false;
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

      jQuery('#serviceProvider_Info_Accordion').find('.form-control[required]').parent().find("label.form-control-label").append(' <span class="text-danger">*</span> ');

      jQuery(document).on("click","#New_Record",function(){
            recordId = 0;
            jQuery("#languages").html("");
            jQuery("#topics").html("");
            jQuery(".hideFromAdd").hide();
            jQuery(".kt-select2").select2("val", "");
            jQuery(".kt-select2").val("").trigger('change');
            jQuery("#password").removeClass("is-invalid");
            $("#kt_signup_form").clearForm();
            $("#kt_signup_form").validate().resetForm();
            jQuery("#password").attr("required","required");
            jQuery("#sp_personal_passport_img_url").attr("required","required");
            jQuery("#sp_personal_passport_img_url").attr("required","required");
            jQuery("#New_Record_Modal").modal("show");
            jQuery(".alert").hide();
            jQuery("#New_RecordLabel").text("{{ __("Master.New_Record") }}");
            return false;
       });

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

    $('#kt_login_signup_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $("#kt_signup_form");

            var URL = '/serviceProvider/';
            var type = 'post';

            if(recordId == 0){
                form.validate({
                    rules: {
                        sp_full_name: {
                            required: true
                        },
                        sp_personal_passport_img_url: {
                            required: true
                        },
                        sp_gender: {
                            required: true
                        },
                        sp_facebook_id: {
                            required: true
                        },
                        sp_mobile: {
                            required: true,
                        },
                        sp_community: {
                            required: true
                        },
                        sp_email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 8
                        },
                        sp_emergency_number: {
                            required: true,
                        },
                        sp_working_status: {
                            required: true
                        },
                        fk_location_id: {
                            required: true
                        },
                        sp_id_number:{
                            required: true,
                            digits: true,
                        }
                    }
                });
            }else{
                URL = '/serviceProvider/'+recordId;
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
                        sp_email: {
                            required: true,
                            email: true
                        },
                        password: {
                            minlength: 8
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
            }

            var password = jQuery("#password").val();
            if(password){
                if(password.length < 8){
                    setTimeout( function() {
                        jQuery("#password").addClass("is-invalid");
                        jQuery("#password").after('<div id="password-error" class="error invalid-feedback">'+jQuery("#password").attr("title")+'</div>');
                      }, 500);
                    return false;
                }
            }

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                url: URL,
                type: type,
                success: function(response, status, xhr, $form) {
                    if(response.isTrue === true){
                        form.clearForm();
                        form.validate().resetForm();
                        showErrorMsg(jQuery("#kt_table_1_wrapper"), 'success', response.Message);
                        table.ajax.reload();
                        jQuery("#New_Record_Modal").modal("hide");
                    } else {
                        var Erorrs = response.Erorrs;
                        var ErrorList = "";
                        jQuery.each(Erorrs, function( index, value ) {
                            ErrorList += "<div>" +value+"</div>" ;
                        });
                        showErrorMsg(form, 'danger', ErrorList);
                    }
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                }
            });
    });

    $('#kt_Send_Message_submit').click(function(e) {
        e.preventDefault();

        var btn = $(this);
        var form = $("#kt_Send_Message_form");

        form.validate({
            rules: {
                content: {
                    required: true
                }
            }
        });

        if (!form.valid()) {
            return;
        }

        var URL = '/serviceProvider/'+recordId+'/contact';

        btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

        form.ajaxSubmit({
            url: URL,
            type: "post",
            success: function(response, status, xhr, $form) {
                if(response.isTrue === true){
                    form.clearForm();
                    form.validate().resetForm();
                    showErrorMsg(jQuery("#kt_table_1_wrapper"), 'success', response.Message);
                    jQuery("#Contact_SP_Modal").modal("hide");
                }else {
                    var Erorrs = response.Erorrs;
                    var ErrorList = "";
                    jQuery.each(Erorrs, function( index, value ) {
                        ErrorList += "<div>" +value+"</div>" ;
                    });
                    showErrorMsg(form, 'danger', ErrorList);
                }
                btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
            }
        });
    });

    $('#kt_Add_Payment_submit').click(function(e) {
        e.preventDefault();

        var btn = $(this);
        var form = $("#kt_Add_Payment_form");

        form.validate({
            rules: {
                payment_amount: {
                    required: true
                },
                fk_sp_id :{
                    required: true
                }
            }
        });

        if (!form.valid()) {
            return;
        }

        var URL = '/sessions/payments/';

        btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

        form.ajaxSubmit({
            url: URL,
            type: "post",
            success: function(response, status, xhr, $form) {
                if(response.isTrue === true){
                    form.clearForm();
                    form.validate().resetForm();
                    showErrorMsg(jQuery("#kt_table_1_wrapper"), 'success', response.Message);
                    jQuery("#SP_Payment_Modal").modal("hide");
                }else {
                    var Erorrs = response.Erorrs;
                    var ErrorList = "";
                    jQuery.each(Erorrs, function( index, value ) {
                        ErrorList += "<div>" +value+"</div>" ;
                    });
                    showErrorMsg(form, 'danger', ErrorList);
                }
                btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
            }
        });
    });

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

    // filters

    $('#sp_filter_high_school_branch').select2({
         placeholder: jQuery('#sp_filter_high_school_branch').attr("placeholder")
    });

    $('#sp_filter_profiling_stage').select2({
         placeholder: jQuery('#sp_filter_profiling_stage').attr("placeholder")
    });

    $('#sp_filter_status').select2({
         placeholder: jQuery('#sp_filter_status').attr("placeholder")
    });

    $('#sp_filter_gender').select2({
         placeholder: jQuery('#sp_filter_gender').attr("placeholder")
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

        $('#fk_district_id').change(function(){
            jQuery('#fk_location_id').select2("val", "");
            jQuery('#fk_location_id').val("").trigger('change');
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

        $('#sp_ability_to_teach_days').change(function (e) {
            if ($('#sp_ability_to_teach_days').select2('val')[0] == 'All') {
                var days = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
                $(this).val(days).trigger('change');
            }
        });

        $('#fk_filter_district_id').select2({
             placeholder: jQuery('#fk_filter_district_id').attr("placeholder"),
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

    }
});

var KTDatatablesSearchOptionsAdvancedSearch = function() {

 $.fn.dataTable.Api.register('column().title()', function() {
  return $(this.header()).text().trim();
 });

 var initTable1 = function() {
  // begin first table
  table = $('#kt_table_1').DataTable({
   responsive: true,
   // Pagination settings
   dom: `<'row'<'col-sm-12'tr>>
   <'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 dataTables_pager'lp>>`,
   // read more: https://datatables.net/examples/basic_init/dom.html

   language: {
    'lengthMenu': 'Display _MENU_',
   },

   searchDelay: 500,
   processing: true,
   serverSide: true,
   ajax: {
    url: '/serviceProvider/list',
    type: 'POST',
    data: function (d) {
        d.page = $('#kt_table_1').DataTable().page.info().page + 1;
        d.pagination = $('#kt_table_1').DataTable().page.info().length;
    },
     dataSrc: (json) => {
              json.recordsFiltered = json.meta.pagination.total;
              json.recordsTotal = json.meta.pagination.total;
              return json.data;
          },
   },
   "oLanguage": {
      "sSearch": "{{ __("datatable.sSearch") }}",
      "sProcessing":"{{ __("datatable.sProcessing") }}",
      "sLoadingRecords": "{{ __("datatable.sLoadingRecords") }}",
      "sInfoEmpty": "{{ __("datatable.sInfoEmpty") }}",
      "sInfo": "{{ __("datatable.sInfo") }}",
      "sEmptyTable": "{{ __("datatable.sEmptyTable") }}",
      "sZeroRecords": "{{ __("datatable.sZeroRecords") }}",
      "sInfoFiltered":"{{ __("datatable.sInfoFiltered") }}",
      "sLengthMenu":"{{ __("datatable.sLengthMenu") }}",
      "oPaginate": {
       "sFirst":"{{ __("datatable.sFirst") }}",
       "sLast": "{{ __("datatable.sLast") }}",
       "sPrevious":"{{ __("datatable.sPrevious") }}",
       "sNext": "{{ __("datatable.sNext") }}",
      },

     },
     "aLengthMenu": [[10, 100, 500, 1000,0], [10, 100, 500, 1000,"{{ __("datatable.aLengthMenu") }}"]],
   columns: [
    {data: 'sp_join_date'},
    {data: 'sp_full_name'},
    {data: 'fk_district_id'},
    {data: 'fk_location_id'},
    {data: 'sp_mobile'},
    {data: 'sp_gender'},
    {data: 'sp_high_school_branch'},
    {data: 'fk_univ_id'},
    {data: 'fk_as_id'},
    {data: 'sp_id'},
    {data: 'sp_profiling_stage'},
    {data: 'sp_status'},
    {data: 'Actions', responsivePriority: -1},
   ],
   "order": [[ 0, "desc" ]],
   columnDefs: [
    {
     targets: -1,
     orderable: false,
     render: function(data, type, full, meta) {
      return `
                        <a href="#" data-record-id=`+full.sp_id+` class="btn btn-add-payment btn-sm btn-clean btn-icon btn-icon-md" title="{{ __("Master.Add_Payment") }}">
                          <i class="fa fa-plus-circle"></i>
                        </a>

                        <a href="/serviceProvider/`+full.sp_id+`/payments/list" data-record-id=`+full.sp_id+` class="btn  btn-sm btn-clean btn-icon btn-icon-md" title="{{ __("Master.PaymentList") }}">
                          <i class="fa fa-money-bill"></i>
                        </a>

                        <a href="/orders/sp/`+full.sp_id+`/view" data-record-id=`+full.sp_id+` class="btn btn-contact btn-sm btn-clean btn-icon btn-icon-md" title="{{ __("Master.Contact") }}">
                          <i class="la la-envelope"></i>
                        </a>

                        <a href="/orders/sp/`+full.sp_id+`/view" data-record-id=`+full.sp_id+` class="btn btn-view btn-sm btn-clean btn-icon btn-icon-md" title="{{ __("Master.View_Order") }}">
                          <i class="la la-list"></i>
                        </a>

                        <a href="#" data-record-id=`+full.sp_id+` class="btn btn-edit btn-sm btn-clean btn-icon btn-icon-md" title="{{ __("Master.Edit") }}">
                          <i class="la la-edit"></i>
                        </a>
            `;
     },
    },
     {
        targets: 2,
        render: function(data, type, full, meta) {
            if (typeof full.district === 'undefined') {
                return '';
            }
            return full.district;
        }
    },
     {
        targets: 3,
        render: function(data, type, full, meta) {
            if (typeof full.location === 'undefined') {
                return '';
            }
            return full.location;
        }
    },
    {
        targets: 5,
        render: function(data, type, full, meta) {
            return full.sp_gender_tran;
        }
    },
     {
        targets: 6,
        render: function(data, type, full, meta) {
            if (typeof full.sp_high_school_branch_value === 'undefined') {
                return '';
            }
            return full.sp_high_school_branch_value;
        }
    },
     {
        targets: 7,
        render: function(data, type, full, meta) {
            if (typeof full.university === 'undefined') {
                return '';
            }
            return full.university;
        }
    },
     {
        targets: 8,
        render: function(data, type, full, meta) {
            if (typeof full.specialization === 'undefined') {
                return '';
            }
            return full.specialization.name;
        }
    },
    {
        targets: 9,
        render: function(data, type, full, meta) {

        return '<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">'
                    +'<span class="kt-header__topbar-icon kt-hidden-">'
                        +'<img  width="50px" src="\\'+full.sp_personal_passport_img_url+'">'
                    +'</span>'
                +'</div>';
        }
    },
     {
        targets: 10,
        render: function(data, type, full, meta) {
            if (typeof full.sp_profiling_stage_tran === 'undefined') {
                return '';
            }
            return full.sp_profiling_stage_tran;
        }
    },
     {
        targets: 11,
        render: function(data, type, full, meta) {
            if (typeof full.sp_status_tran === 'undefined') {
                return '';
            }
            return full.sp_status_tran;
        }
    },

   ],
  });

  var filter = function() {
   var val = $.fn.dataTable.util.escapeRegex($(this).val());
   table.column($(this).data('col-index')).search(val ? val : '', false, false).draw();
  };

  var asdasd = function(value, index) {
   var val = $.fn.dataTable.util.escapeRegex(value);
   table.column(index).search(val ? val : '', false, true);
  };

  $('#kt_search').on('click', function(e) {
   e.preventDefault();
   var params = {};
   $('.kt-input').each(function() {
    var i = $(this).data('col-index');
    if (params[i]) {
     params[i] += '|' + $(this).val();
    }
    else {
     params[i] = $(this).val();
    }
   });
   $.each(params, function(i, val) {
    // apply search params to datatable
    table.column(i).search(val ? val : '', false, false);
   });
   table.table().draw();
  });

  $('#kt_reset').on('click', function(e) {
   e.preventDefault();
   $('.kt-input').each(function() {
    $(this).val('');
    table.column($(this).data('col-index')).search('', false, false);
   });
   table.table().draw();
  });

  $('#kt_datepicker').datepicker({
   todayHighlight: true,
   templates: {
    leftArrow: '<i class="la la-angle-left"></i>',
    rightArrow: '<i class="la la-angle-right"></i>',
   },
  });

 };

 return {

  //main function to initiate the module
  init: function() {
   initTable1();
  },

 };

}();

jQuery(document).ready(function() {
 KTDatatablesSearchOptionsAdvancedSearch.init();
});
</script>
@endSection

@section('css')
 <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{ URL::asset('/assets/vendors/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
<!--end::Page Vendors Styles -->
<style>
 .select2-search--inline, .select2-search--inline input{
    width: 100% !important;
  }
</style>
@endSection
