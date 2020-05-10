@extends('layouts.master')

@section('pageTitle')
 {{ __("Master.View_Order") }} - {{ __("Master.ServiceRequester") }} ( {{ $sr->sr_full_name }} )
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
                     {{ __("Master.View_Order") }} - {{ $sr->sr_full_name }}
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
        	<div class="kt-form kt-form--fit kt-margin-b-20">
        		<div class="row">
            <div class="form-group col-lg-4">
                <label for="sr_full_name" class="form-control-label">{{ __("Master.sr_full_name") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $sr->sr_full_name }}</span>
            </div>
            <div class="form-group col-lg-4">
                <label for="sr_email" class="form-control-label">{{ __("Master.sr_email") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $sr->sr_email }}</span>
            </div>
            <div class="form-group col-lg-4">
                <label for="sr_mobile" class="form-control-label">{{ __("Master.sr_mobile") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $sr->sr_mobile }}</span>
              </div>
          </div>
            <div class="row">
              <div class="form-group col-lg-4">
                  <label for="sr_facebook_id" class="form-control-label">{{ __("Master.sr_facebook_id") }}:</label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder"><a href="{{ $sr->sr_facebook_id }}" target="_blank">
                  {{ __("Master.click_here") }} </a></span>
              </div>
              <div class="form-group col-lg-4">
                <label for="fk_district_id" class="form-control-label">{{ __("Master.District") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $sr->district["district_name"] }}</span>
              </div>
              <div class="form-group col-lg-4">
                  <label for="fk_location_id" class="form-control-label">{{ __("Master.location") }}:</label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $sr->location["location_name"] }}</span>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-4">
                  <label for="sr_address_1" class="form-control-label">{{ __("Master.sr_address_1") }}:</label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $sr->sr_address_1 }}</span>
              </div>
              <div class="form-group col-lg-4">
                <label for="sr_address_2" class="form-control-label">{{ __("Master.sr_address_2") }}:</label>
                <span class=" text-dark kt-margin-5 h4 font-weight-bolder"> @if($sr->sr_address_2){{ $sr->sr_address_2 }} @else {{  __("Master.not_exist")  }} @endif </span>
              </div>
              <div class="form-group col-lg-4">
                  <label for="sr_join_date" class="form-control-label">{{ __("Master.sr_join_date") }} : </label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $sr->sr_join_date->format('Y-m-d') }}</span>
              </div>
            </div>
        	</div>
        </div>
	</div>
</div>

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid kt-margin-t-20">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                      {{ __("Master.View_Order") }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="#" id="New_Record" class="btn btn-brand btn-elevate btn-icon-sm">
                            <i class="la la-plus"></i>
                            {{ __("Master.New_Record") }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th> {{ __("Master.date") }}</th>
                        <th> {{ __("Master.ServiceRequester") }}</th>
                        <th> {{ __("Master.sr_student_name") }}</th>
                        <th> {{ __("Master.sr_gender") }}</th>
                        <th> {{ __("Master.sr_student_class") }}</th>
                        <th> {{ __("Master.sr_targeted_gender") }}</th>
                        <th> {{ __("Master.package_id") }}</th>
                        <th> {{ __("Master.package_hourly_rate") }}</th>
                        <th> {{ __("Master.sr_initial_num_of_sessions") }}</th>
                        <th> {{ __("Master.topics") }}</th>
                        <th> {{ __("Master.order_status") }}</th>
                        <th> {{ __("Master.fk_assigned_to") }}</th>
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
                <form  method="POST" id="kt_signup_form" action="/orders/store">
                    <div class="accordion accordion-solid accordion-toggle-plus" id="SR_Order_Info_Accordion">
                        @component('components.SR_Order_Store')
                        @endcomponent
                    </div>
                    <input type="hidden" name="fk_service_requester_id" id="fk_service_requester_id" value="{{ $sr->sr_id }}">
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

  jQuery(document).on("click","#New_Record",function(){
    recordId = 0;
    jQuery("#New_RecordLabel").text("{{ __("Master.New_Record") }}");
    jQuery("#kt_signup_form").clearForm();
    jQuery("#kt_signup_form").validate().resetForm();
    jQuery(".kt-select2").val("").trigger('change');
    jQuery("#New_Record_Modal").modal("show");
    jQuery(".alert").hide();
    return false;
  });

  jQuery(document).find('.form-control[required]').parent().find("label.form-control-label").append(' <span class="text-danger">*</span> ');

  jQuery(document).on("click",".btn-edit",function(){
        recordId =jQuery(this).attr("data-record-id");
        jQuery("#kt_signup_form").clearForm();
        jQuery("#kt_signup_form").validate().resetForm();
        jQuery(".kt-select2").val("").trigger('change');
        jQuery.get("/orders/"+recordId, function(data, status){
            jQuery("#New_RecordLabel").text("{{ __("Master.Edit") }} : " + data.data.order_student_name);
            jQuery.each( data.data, function(index, item){
                if (jQuery("#"+index).is("select")){
                  if(index.startsWith("languages") || index.startsWith("topics")){
                    jQuery("#"+index).html("");
                    jQuery.each(item, function( i, subItem ) {
                        jQuery("#"+index).append('<option value="'+subItem.id+'" selected>'+subItem.name+'</option>').trigger('change');
                    });
                    jQuery("#"+index).trigger('change');
                  }else{
                    jQuery("#"+index).val(item).trigger('change');
                  }
                }else if(index.startsWith("package")){
                    jQuery("#fk_package_id").append('<option value="'+item.id+'" selected>'+item.name+'</option>').val(item.id).trigger('change');
                }else {
                    jQuery("#"+index).val(item);
                }
            });
            jQuery(".alert").hide();
            jQuery("#New_Record_Modal").modal("show");
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

  jQuery('#order_sr_relation_to_the_student').select2({
      placeholder: jQuery('#order_sr_relation_to_the_student').attr("placeholder")
  });
  jQuery('#order_student_gender').select2({
      placeholder: jQuery('#order_student_gender').attr("placeholder")
  });
  jQuery('#order_student_class').select2({
      placeholder: jQuery('#order_student_class').attr("placeholder")
  });
  jQuery('#order_student_high_school_branch').select2({
      placeholder: jQuery('#order_student_high_school_branch').attr("placeholder")
  });
  jQuery('#order_targeted_gender').select2({
      placeholder: jQuery('#order_targeted_gender').attr("placeholder")
  });
  jQuery('#order_status').select2({
      placeholder: jQuery('#order_status').attr("placeholder")
  });
  jQuery('#order_preferred_payment_method').select2({
      placeholder: jQuery('#order_preferred_payment_method').attr("placeholder")
  });

	   jQuery('#topics').select2({
	      placeholder: jQuery('#topics').attr("placeholder"),
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
	  jQuery('#languages').select2({
	      placeholder: jQuery('#languages').attr("placeholder"),
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
	  jQuery('#fk_package_id').select2({
	      placeholder: jQuery('#fk_package_id').attr("placeholder"),
	      ajax: {
	        url: "/lookups/packages",
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
	                        text: item.package_name + " ( {{ __("Master.package_hourly_rate") }} : "+item.package_hourly_rate+" ) ",
	                        id: item.package_id
	                    }
	                })
	            };
	        }
	    }
	  });


  $('#order_student_class').change(function (e) {
      if($(e.target).val() == 12) {
        $(".row_order_student_high_school_branch").removeClass('kt-hide');
      } else {
        $(".row_order_student_high_school_branch").addClass('kt-hide');
      }
  });

  jQuery('#kt_login_signup_submit').click(function(e) {
        e.preventDefault();

        var btn = $(this);
        var form = $("#kt_signup_form");

        form.validate({
            rules: {
                order_sr_relation_to_the_student: {
                    required: true
                },
                order_student_name: {
                    required: true
                },
                order_student_gender: {
                    required: true
                },
                order_student_class: {
                    required: true
                },
                order_targeted_gender: {
                    required: true
                },
                fk_package_id: {
                    required: true
                },
                order_initial_num_of_sessions: {
                    required: true
                },
                fk_sr_id: {
                    required: true
                },
                order_preferred_payment_method: {
                    required: true
                },
                topics: {
                    required: true
                }
            }
        });

        if (!form.valid()) {
            return;
        }

        var URL = '/orders/';
        var type = 'post';
        if(recordId == 0){
            URL = '/orders/';
            type = 'post';
        }else{
            URL = '/orders/'+recordId;
            type = 'put';
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
                    jQuery("#New_Record_Modal").modal("hide");
                    table.ajax.reload();
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
});

jQuery('.order_student_class').select2({
      placeholder: jQuery('.order_student_class').attr("placeholder")
  });
jQuery('.order_student_gender').select2({
      placeholder: jQuery('.order_student_gender').attr("placeholder")
 });
jQuery('.order_targeted_gender').select2({
      placeholder: jQuery('.order_targeted_gender').attr("placeholder")
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
    url: '/orders/sr/{{ $sr->sr_id }}/list/',
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
    {data: 'created_at'},
    {data: 'fk_sr_id'},
    {data: 'order_student_name'},
    {data: 'order_student_gender'},
    {data: 'order_student_class'},
    {data: 'order_targeted_gender'},
    {data: 'package'},
    {data: 'package'},
    {data: 'order_initial_num_of_sessions'},
    {data: 'topics'},
    {data: 'order_status'},
    {data: 'fk_assigned_to'},
    {data: 'Actions', responsivePriority: -1},
   ],
   "order": [[ 0, "desc" ]],
   columnDefs: [
    {
     targets: -1,
     orderable: false,
     render: function(data, type, full, meta) {
      return `
                        <span class="dropdown">
                            <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                              <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item btn-view" title="{{ __("Master.View_Session_Details") }}" data-record-id=`+full.order_id+` href="/orders/`+full.order_id+`/sessions/view"><i class="la la-list"></i> {{ __("Master.View_Session_Details") }}</a>
                                <a class="dropdown-item btn-view" title="{{ __("Master.interest_List") }}" data-record-id=`+full.order_id+` href="/orders/`+full.order_id+`/interestedServiceProviders/view"><i class="la la-list"></i> {{ __("Master.interest_List") }}</a>
                            </div>
                        </span>
                        <a href="#" data-record-id=`+full.order_id+` class="btn btn-sm btn-clean btn-icon btn-icon-md btn-edit" title="{{ __("Master.Edit") }}">
                          <i class="la la-edit"></i> {{ __("Master.Edit") }}
                        </a>`;
     },
    },
    {
       targets: 1,
       render: function(data, type, full, meta) {
           return full.service_requester;
       }
   },
     {
        targets: 3,
        render: function(data, type, full, meta) {
            if (typeof full.student_gender === 'undefined') {
                return '';
            }
            return full.student_gender;
        }
    },
     {
        targets: 4,
        render: function(data, type, full, meta) {
            if (typeof full.student_class === 'undefined') {
                return '';
            }
            return full.student_class;
        }
    },
     {
        targets: 5,
        render: function(data, type, full, meta) {
            if (typeof full.targeted_gender === 'undefined') {
                return '';
            }
            return full.targeted_gender;
        }
    },
    {
     targets: 6,
     render: function(data, type, full, meta) {
      return data.name;
     },
    },
    {
     targets: 7,
     render: function(data, type, full, meta) {
      return data.hourly_rate;
     },
    },
    {
     targets: 9,
     orderable: false,
     render: function(data, type, full, meta) {
      var result = "";
      var status = {
        0: 'danger',
        1: 'primary',
        2: 'success',
        3: 'info',
        4: 'warning',
        5: 'brand',
      };
      jQuery.each(data, function(index, item){
        result += '<span class="kt-badge kt-badge--' + status[item.id % 6] + ' kt-badge--dot"></span>&nbsp;<span class="kt-font-bold kt-font-' + status[item.id % 6] + '">' +  item.name + '</span> <br />';
      });
      return result;
     },
    },
    {
     targets: 11,
     render: function(data, type, full, meta) {
      return full.assigned_to;
     },
    }
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
