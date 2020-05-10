@extends('layouts.master')

@section('pageTitle')
 {{ __("Master.ServiceRequesterTitle") }}
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
                     {{ __("Master.ServiceRequesterTitle") }} |  {{ __("Master.Advanced_Search_Form") }}
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
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>{{ __("Master.District") }}:</label>
                        <select class="form-control kt-select2 fk_district_id kt-input-filter kt-input" name="fk_district_id" placeholder="{{ __("Master.fk_district_id_placeholder") }}"  data-col-index="0">
                        </select>
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>{{ __("Master.sr_full_name") }}:</label>
                        <input type="text" class="form-control kt-input-filter kt-input" name="sr_full_name"  placeholder="{{ __("Master.sp_full_name_placeholder") }}"   data-col-index="1">
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>{{ __("Master.sr_mobile") }}:</label>
                        <input type="text" class="form-control kt-input-filter kt-input" name="sr_mobile"  placeholder="{{ __("Master.sp_mobile_placeholder") }}"  data-col-index="2">
                    </div>
                     <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>{{ __("Master.sr_email") }}:</label>
                        <input type="text" class="form-control kt-input-filter kt-input" name="sr_email"  placeholder="{{ __("Master.sp_email_placeholder") }}" data-col-index="3">
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
                        <th> {{ __("Master.sr_join_date") }}</th>
                        <th> {{ __("Master.sr_full_name") }}</th>
                        <th> {{ __("Master.District") }}</th>
                        <th> {{ __("Master.location") }}</th>
                        <th> {{ __("Master.sr_address_1") }}</th>
                        <th> {{ __("Master.sr_mobile") }}</th>
                        <th> {{ __("Master.sr_email") }}</th>
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
                <form  method="POST" id="kt_signup_form" action="/serviceRequester/store">
                    <div class="accordion accordion-solid accordion-toggle-plus" id="ServiceRequester_Info_Accordion">
                        @component('components.ServiceRequesterStore')
                        @endcomponent
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

<!--begin::Modal-->
<div class="modal fade" id="Contact_Modal" tabindex="-1" role="dialog" aria-labelledby="Contact SP" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Contact_SR_Label">{{ __("Master.Contact_SR") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="kt_Send_Message_form" action="/serviceRequester/store">
                    <div class="row">
                         @csrf
                        <div class="form-group col-12">
                            <label for="sp_initial_eval" class="form-control-label">{{ __("Master.sr_contact_body") }}:</label>
                            <textarea class="form-control" title="{{ __("Master.contact_body_title") }}" placeholder="{{ __("Master.sr_contact_body_placeholder") }}" name="content" id="content" rows="5" required=""></textarea>
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
    jQuery(".kt-select2").select2("val", "");
    jQuery(".kt-select2").val("").trigger('change');
    jQuery("#New_RecordLabel").text("{{ __("Master.New_Record") }}");
    jQuery("#kt_signup_form").clearForm();
    jQuery("#kt_signup_form").validate().resetForm();
    jQuery(".kt-select2").val("").trigger('change');
    jQuery("#New_Record_Modal").modal("show");
    jQuery(".alert").hide();
    return false;
   });

  jQuery(document).on("click",".btn-contact",function(){
      recordId =jQuery(this).attr("data-record-id");
      jQuery.get("/serviceRequester/"+recordId, function(data, status){
        jQuery("#Contact_SR_Label").text("{{ __("Master.Contact_SR") }} : " + data.data.sr_email);
      });
      $("#kt_Send_Message_form").clearForm();
      $("#kt_Send_Message_form").validate().resetForm();
      jQuery("#Contact_Modal").modal("show");
      jQuery(".alert").hide();
      return false;
    });

  jQuery(document).find('.form-control[required]').parent().find("label.form-control-label").append(' <span class="text-danger">*</span> ');


  jQuery(document).on("click",".btn-edit",function(){
        recordId =jQuery(this).attr("data-record-id");
        $("#kt_signup_form").clearForm();
        $("#kt_signup_form").validate().resetForm();
        jQuery(".kt-select2").select2("val", "");
        jQuery(".kt-select2").val("").trigger('change');
        jQuery.get("/serviceRequester/"+recordId, function(data, status){
            jQuery("#New_RecordLabel").text("{{ __("Master.Edit") }} : " + data.data.sr_full_name);
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
            jQuery("#New_Record_Modal").modal("show");
            jQuery(".alert").hide();
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


  $('#sr_community').select2({
      placeholder: jQuery('#sr_community').attr("placeholder")
  });

  jQuery("#sr_mobile").inputmask({
      "mask": "9999-999999",
      placeholder: "0500-000000" // remove underscores from the input mask
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
        jQuery('#fk_district_id').change(function(){
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
  }

  jQuery('#kt_Send_Message_submit').click(function(e) {
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

        var URL = '/serviceRequester/'+recordId+'/contact';

        btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

        form.ajaxSubmit({
            url: URL,
            type: "post",
            success: function(response, status, xhr, $form) {
                if(response.isTrue === true){
                    form.clearForm();
                    form.validate().resetForm();
                    showErrorMsg(jQuery("#kt_table_1_wrapper"), 'success', response.Message);
                    jQuery("#Contact_Modal").modal("hide");
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

  jQuery('#kt_login_signup_submit').click(function(e) {
        e.preventDefault();

        var btn = $(this);
        var form = $("#kt_signup_form");

        form.validate({
            rules: {
                sr_full_name: {
                    required: true
                },
                sr_mobile: {
                    required: true
                },
                sr_address_1: {
                    required: true
                },
                fk_location_id: {
                    required: true
                },
                fk_district_id: {
                    required: true
                }
            }
        });

        if (!form.valid()) {
            return;
        }

        var URL = '/serviceRequester/';
        var type = 'post';
        if(recordId == 0){
            URL = '/serviceRequester/';
            type = 'post';
        }else{
            URL = '/serviceRequester/'+recordId;
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
    url: '/serviceRequester/list',
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
    {data: 'sr_join_date'},
    {data: 'sr_full_name'},
    {data: 'fk_district_id'},
    {data: 'fk_location_id'},
    {data: 'sr_address_1'},
    {data: 'sr_mobile'},
    {data: 'sr_email'},
    {data: 'Actions', responsivePriority: -1},
   ],
   "order": [[ 0, "desc" ]],
   columnDefs: [
    {
     targets: -1,
     orderable: false,
     render: function(data, type, full, meta) {

       let customHTML = `
                        <span class="dropdown">
                            <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                              <i class="la la-ellipsis-h"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item btn-view" title="{{ __("Master.View_Order") }}" data-record-id=`+full.sr_id+` href="/orders/sr/`+full.sr_id+`/view"><i class="la la-list"></i> {{ __("Master.View_Order") }}</a>`;
     if(full.sr_email != null) {
                   customHTML+=`<a class="dropdown-item btn-contact" title="{{ __("Master.Contact") }}" data-record-id=`+full.sr_id+` href="#"><i class="la la-envelope"></i>{{ __("Master.Contact") }} </a>`;
     }
    customHTML+=            `</div>
                        </span>
                        <a href="#" data-record-id=`+full.sr_id+` class="btn btn-sm btn-clean btn-icon btn-icon-md btn-edit" title="{{ __("Master.Edit") }}">
                          <i class="la la-edit"></i> {{ __("Master.Edit") }}
                        </a>`;
      return customHTML;
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
