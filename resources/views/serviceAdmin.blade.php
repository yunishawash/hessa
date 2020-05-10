@extends('layouts.master')

@section('pageTitle')
{{ __("Master.ServiceAdminTitle") }}
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
                     {{ __("Master.ServiceAdminTitle") }} |  {{ __("Master.Advanced_Search_Form") }}
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
            <!--begin: Search Form -->
            <form class="kt-form kt-form--fit kt-margin-b-20">
                <div class="row kt-margin-b-20">
                    <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                        <label>{{ __("Master.user_name") }}:</label>
                        <input type="text" class="form-control kt-input kt-input-filter" name="user_name" placeholder="{{ __("Master.user_name") }}"  data-col-index="0">
                    </div>
                    <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                        <label>{{ __("Master.user_email") }}:</label>
                        <input type="text" class="form-control kt-input kt-input-filter" name="user_email"  placeholder="{{ __("Master.user_email") }}" data-col-index="1">
                      </div>
                    <div class="col-lg-4 kt-margin-b-10-tablet-and-mobile">
                        <label>{{ __("Master.District") }}:</label>
                        <select class="form-control kt-select2 fk_district_id kt-input kt-input-filter" name="fk_district_id"  placeholder="{{ __("Master.fk_district_id_placeholder") }}"  data-col-index="2">
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
                        <th> {{ __("Master.user_name") }}</th>
                        <th> {{ __("Master.user_email") }}</th>
                        <th> {{ __("Master.District") }}</th>
                        <th> {{ __("Master.user_account_status") }}</th>
                        <th> {{ __("Master.Actions") }}</th>
                    </tr>
                </thead>
            </table>
            <!--end: Datatable -->
        </div>
    </div>
</div>
<!-- end:: Content -->

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
                <form  method="POST" id="kt_signup_form" action="/serviceAdmins/store">
                	<div class="row">
			            <div class="form-group col-lg-6">
			                <label for="user_name" class="form-control-label">{{ __("Master.user_name") }}:</label>
			                <input type="text" class="form-control" title="{{ __("Master.user_name_placeholder") }}" placeholder="{{ __("Master.user_name_placeholder") }}" name="user_name" id="user_name" required="">
			            </div>
			            <div class="form-group col-lg-6">
			              <label for="user_email" class="form-control-label">{{ __("Master.user_email") }}:</label>
			              <input type="email" class="form-control" title="{{ __("Master.user_email_placeholder") }}" placeholder="{{ __("Master.user_email_placeholder") }}" name="user_email" id="user_email" required="">
			            </div>
			         </div>
			         <div class="row">
			            <div class="form-group col-lg-6">
			                <label for="fk_district_id" class="form-control-label">{{ __("Master.District") }}:</label>
			                  <select title="{{ __("Master.fk_district_id_placeholder") }}" style="width: 100%;" placeholder="{{ __("Master.fk_district_id_placeholder") }}" name="fk_district_id" class="form-control kt-select2" id="fk_district_id">
			                  </select>
			              </div>
			            <div class="form-group col-lg-6">
			                  <label for="password" class="form-control-label">{{ __("Master.Password") }}:</label>
			                  <input type="password" title="{{ __("Master.password_title") }}" placeholder="{{ __("Master.sp_password_placeholder") }}" class="form-control" name="password" id="password" required="">
			              </div>
			         </div>
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
    jQuery(".alert").hide();
    jQuery("#New_Record_Modal").modal("show");
    jQuery("#password").attr("required");
    jQuery("#password").removeClass("is-invalid");
    return false;
   });

  jQuery(document).on("click",".btn-change-account-status",function(){
    var id =jQuery(this).attr("data-record-id");
    jQuery.post("/serviceAdmins/"+id+"/toggleActive/", function(data, status){
        table.ajax.reload();
    });
    return false;
  });

  jQuery(document).find('.form-control[required]').parent().find("label.form-control-label").append(' <span class="text-danger">*</span> ');

  jQuery(document).on("click",".btn-edit",function(){
        recordId =jQuery(this).attr("data-record-id");
        $("#kt_signup_form").clearForm();
        $("#kt_signup_form").validate().resetForm();
        jQuery(".kt-select2").val("").trigger('change');
        jQuery("#password").removeClass("is-invalid");
        jQuery("#password").removeAttr("required");
        jQuery.get("/serviceAdmins/"+recordId, function(data, status){
            jQuery("#New_RecordLabel").text("{{ __("Master.Edit") }} : " + data.data.user_name);
            jQuery.each( data.data, function(index, item){
                if (jQuery("#"+index).is("select")){
                  if(index.startsWith("fk_")){
                      jQuery("#"+index).append('<option value="'+item.id+'" selected>'+item.name+'</option>').val(item.id).trigger('change');
                  }else{
                      jQuery("#"+index).val(item).trigger('change');
                  }
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


	$('.fk_district_id').select2({
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
  updateSelect2();
  function updateSelect2(){
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
  }

  jQuery('#kt_login_signup_submit').click(function(e) {
        e.preventDefault();

        var btn = $(this);
        var form = $("#kt_signup_form");

        form.validate({
            rules: {
                user_name: {
                    required: true
                },
                user_email: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 8
                }
            }
        });

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

        var URL = '/serviceAdmins/';
        var type = 'post';
        if(recordId == 0){
            URL = '/serviceAdmins/';
            type = 'post';
        }else{
            URL = '/serviceAdmins/'+recordId;
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

var KTDatatablesSearchOptionsAdvancedSearch = function() {
    var status = {
        "inactive" : {'title': '{{ __("Master.inactive") }}', 'state': 'danger'},
        "active": {'title': '{{ __("Master.active") }}', 'state': 'success'},
    };
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
    url: '/serviceAdmins/list/',
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
    {data: 'user_name'},
    {data: 'user_email'},
    {data: 'fk_district_id'},
    {data: 'user_account_status'},
    {data: 'Actions', responsivePriority: -1},
   ],
   columnDefs: [
    {
     targets: -1,
     orderable: false,
     render: function(data, type, full, meta) {
        var statusObj  = "";
    if (full.user_account_status === "active") {
        statusObj = "{{ __("Master.change_to_inactive_account") }}";
    }else{
        statusObj = "{{ __("Master.change_to_active_account") }}";
    }
      return `
            <a href="#" data-record-id=`+full.user_id+` class="btn btn-sm btn-clean btn-icon-md btn-change-account-status" title="` + statusObj + `">
              <i class="la la-edit"></i> ` + statusObj + `
            </a>
            <a href="#" data-record-id=`+full.user_id+` class="btn btn-sm btn-clean btn-icon-md btn-edit" title="{{ __("Master.Edit") }}">
              <i class="la la-edit"></i> {{ __("Master.Edit") }}
            </a>`;
        }
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
            if (typeof status[data] === 'undefined') {
                return data;
            }
            return '<span class="kt-badge kt-badge--' + status[data].state + ' kt-badge--dot"></span>&nbsp;' +
                '<span class="kt-font-bold kt-font-' + status[data].state + '">' + status[data].title + '</span>';
        }
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
   	console.log(val);
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
