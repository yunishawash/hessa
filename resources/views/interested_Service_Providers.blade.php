@extends('layouts.master')

@section('pageTitle')
 {{ __("Master.interest_List") }}
@endSection

@section('contents')

@component('components.order_info', ['order'=>$order])
@endcomponent

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid kt-margin-t-20">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                      {{ __("Master.interest_List") }}
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <!--begin: Search Form -->

            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th> {{ __("Master.sp_full_name") }}</th>
                        <th> {{ __("Master.sp_gender") }}</th>
                        <th> {{ __("Master.District") }}</th>
                        <th> {{ __("Master.location") }}</th>
                        <th> {{ __("Master.sp_mobile") }}</th>
                        <th> {{ __("Master.university") }}</th>
                        <th> {{ __("Master.Specialization") }}</th>
                        <th> {{ __("Master.sp_sa_over_eval") }}</th>
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
                <form method="POST" id="kt_signup_form" action="/serviceProvider/store">
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
                                    <div class="form-group col-6">
                                        <label for="sp_join_date" class="form-control-label">{{ __("Master.sp_join_date") }}:</label>
                                        <input type="date" class="form-control" placeholder="{{ __("Master.sp_join_date_placeholder") }}" name="sp_join_date" id="sp_join_date" disabled="disabled">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="sp_initial_eval" class="form-control-label">{{ __("Master.sp_initial_eval") }}:</label>
                                        <input type="number" step="0.01" min="0" max="100" class="form-control" placeholder="{{ __("Master.sp_initial_eval_placeholder") }}" disabled="disabled" name="sp_initial_eval" id="sp_initial_eval">
                                    </div>
                                </div>

                                <div class="row hideFromAdd">
                                    <div class="form-group col-6">
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
                                    <div class="form-group col-6">
                                        <label for="sp_status" class="form-control-label">{{ __("Master.sp_status") }}:</label>
                                        <select class="form-control kt-select2" style="width: 100%;"  placeholder="{{ __("Master.sp_status_placeholder") }}" name="sp_status" id="sp_status">
                                            <option></option>
                                            <option value="Active">{{ __("Master.Active") }}</option>
                                            <option value="NotActive">{{ __("Master.NotActive") }}</option>
                                            <option value="Suspend">{{ __("Master.Suspend") }}</option>
                                            <option value="Refused">{{ __("Master.Refused") }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="sp_physical_interview_score" class="form-control-label">{{ __("Master.sp_physical_interview_score") }}:</label>
                                        <input type="number" min="0" step="0.01" max="100" placeholder="{{ __("Master.sp_physical_interview_score_placeholder") }}" class="form-control" name="sp_physical_interview_score" id="sp_physical_interview_score">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="sp_sa_over_eval" class="form-control-label">{{ __("Master.sp_sa_over_eval") }}:</label>
                                        <input type="number" min="0" step="0.01" max="100" class="form-control"  placeholder="{{ __("Master.sp_sa_over_eval_placeholder") }}"  name="sp_sa_over_eval" id="sp_sa_over_eval">
                                    </div>
                                </div>

                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="sp_delivered_training_by_hessa" class="form-control-label">{{ __("Master.sp_delivered_training_by_hessa") }}:</label>
                                        <input type="text" class="form-control" placeholder="{{ __("Master.sp_delivered_training_by_hessa_placeholder") }}" name="sp_delivered_training_by_hessa" id="sp_delivered_training_by_hessa">
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="sp_initial_eval" class="form-control-label">{{ __("Master.sp_online_training_evaluation") }}:</label>
                                        <input type="number" step="0.01" min="0" max="100" class="form-control" placeholder="{{ __("Master.sp_online_training_evaluation_placeholder") }}" name="sp_online_training_evaluation" id="sp_online_training_evaluation">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="sp_contact_attachment_url" class="form-control-label">{{ __("Master.sp_contact_attachment") }}:</label>
                                        <input type="file" placeholder="{{ __("Master.sp_contact_attachment_placeholder") }}" class="form-control" name="sp_contact_attachment_url" id="sp_contact_attachment_url">
                                    </div>
                                    <div class="form-group col-6">
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

  jQuery(document).on("click",".btn-view",function(){
        recordId =jQuery(this).attr("data-record-id");
        $("#kt_signup_form").clearForm();
        $("#kt_signup_form").validate().resetForm();
        jQuery(".kt-select2").val("").trigger('change');
        jQuery("#sp_personal_passport_img_url").removeAttr("required");
        jQuery("#password").removeAttr("required");
        jQuery.get("/serviceProvider/"+recordId, function(data, status){
            jQuery("#New_RecordLabel").text("{{ __("Master.View_Details") }} : " + data.data.sp_full_name);
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
            jQuery(".alert").hide();
            jQuery("#New_Record_Modal").modal("show");
        });
        return false;
      });

  jQuery(document).on("click",".btn-check",function(){
    var id =jQuery(this).attr("data-record-id");
    jQuery.post("/orders/{{ $order->order_id }}/toggleAssignTo/"+id, function(data, status){
        table.ajax.reload();
    });
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
    url: '/orders/{{ $order->order_id }}/interestedServiceProviders/',
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
    {data: 'sp_full_name'},
    {data: 'sp_gender'},
    {data: 'fk_district_id'},
    {data: 'fk_location_id'},
    {data: 'sp_mobile'},
    {data: 'fk_univ_id'},
    {data: 'fk_as_id'},
    {data: 'sp_sa_over_eval'},
    {data: 'Actions', responsivePriority: -1},
   ],
   columnDefs: [
    {
     targets: -1,
     orderable: false,
     render: function(data, type, full, meta) {
      var view =`
            <a href="#" data-record-id=`+full.sp_id+` class="btn btn-sm btn-clean btn-icon-md btn-view" title="{{ __("Master.View_Details") }}">
              <i class="la la-eye"></i>
            </a> `;
      if(full.is_interested === true){
        return view + `
            <a href="#" data-record-id=`+full.sp_id+` class="btn btn-sm btn-clean btn-icon-md btn-check" title="{{ __("Master.cancel_assignTo") }}">
              <i class="la la-close"></i> {{ __("Master.cancel_assignTo") }}
            </a> `;
      }else{
        return view + `
            <a href="#" data-record-id=`+full.sp_id+` class="btn btn-sm btn-clean btn-icon-md btn-check" title="{{ __("Master.assignTo") }}">
              <i class="la la-check"></i> {{ __("Master.assignTo") }}
            </a> `;
      }
     },
    },
    {
     targets: 1,
     orderable: false,
     render: function(data, type, full, meta) {
      if(data === "male"){
        return `{{ __("Master.gender_Male") }}`;
      }else{
        return `{{ __("Master.gender_Female") }}`;
      }
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
            if (typeof full.university === 'undefined') {
                return '';
            }
            return full.university;
        }
    },
     {
        targets: 6,
        render: function(data, type, full, meta) {
            if (typeof data === 'undefined') {
                return '';
            }
            return data.name;
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
@endSection
