@extends('layouts.master')

@section('pageTitle')
 {{ __("Master.OrderTitle") }} -  {{ __("Master.Sessions") }}
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
                      {{ __("Master.SessionsTitle") }}
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th> {{ __("Master.session_date") }}</th>
                        <th> {{ __("Master.session_time") }}</th>
                        <th> {{ __("Master.session_period") }}</th>
                        <th> {{ __("Master.session_notes") }}</th>
                        <th> {{ __("Master.session_sp_review_score") }}</th>
                        <th> {{ __("Master.session_sr_notes") }}</th>
                        <th> {{ __("Master.session_status") }}</th>
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
<div class="modal fade" id="SP_Payment_Modal" tabindex="-1" role="dialog" aria-labelledby="Payment SP" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="Contact_SP_Label">{{ __("Master.Add_Payment") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="kt_Add_Payment_form" action="/sessions/payments/store">
                    @component('components.Add_Payment')
                    @endcomponent
                    <input type="hidden" id="fk_sp_id" name="fk_sp_id">
                    <input type="hidden" id="fk_order_id" name="fk_order_id">
                    <input type="hidden" id="fk_session_id" name="fk_session_id">

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
                <form method="POST" id="kt_signup_form" action="/orders/{{ $order->order_id }}/sessions">
                <!--begin::Accordion-->
                <div class="accordion accordion-solid accordion-toggle-plus" id="Session_Info_Accordion">
                   <div class="card">
                      <div class="card-header" id="Session_Information">
                          <div class="card-title" data-toggle="collapse" data-target="#collapse_Session_Information" aria-expanded="true" aria-controls="collapseTwo6">
                              <i class="flaticon2-notification"></i> {{ __("Master.Session_Information") }}
                          </div>
                      </div>
                      <div id="collapse_Session_Information" class="collapse show" aria-labelledby="Session_Information" data-parent="#Session_Info_Accordion">
                          <div class="card-body">
                              <div class="row">
                                <div class="form-group col-6">
                                    <label for="session_sp_review_score" class="form-control-label">{{ __("Master.session_sp_review_score") }}:</label>
                                    <input type="number" min="0" max="100" step="1" title="{{ __("Master.session_sp_review_score_placeholder") }}" placeholder="{{ __("Master.session_sp_review_score_placeholder") }}" class="form-control" name="session_sp_review_score" id="session_sp_review_score">
                                </div>
                                <div class="form-group col-6">
                                    <label for="session_sr_notes" class="form-control-label">{{ __("Master.session_sr_notes") }}:</label>
                                    <textarea title="{{ __("Master.session_sr_notes_placeholder") }}" placeholder="{{ __("Master.session_sr_notes_placeholder") }}" class="form-control" name="session_sr_notes" id="session_sr_notes"></textarea>
                                </div>
                              </div>
                                <input type="hidden" name="fk_order_id" value="{{ $order->order_id }}">
                                <input type="hidden" name="fk_sr_id" value="{{ $order->fk_sr_id }}">
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

  jQuery("#is_session_sa_paid").change(function(){
    if(jQuery(this).is(':checked')){
      jQuery(this).val("1");
    }else{
      jQuery(this).val("0");
    }
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

  jQuery(document).on("click",".btn-add-payment",function(){
        var orderId =jQuery(this).attr("data-order-id");
        var fk_session_id =jQuery(this).attr("data-record-id");
        var spId =jQuery(this).attr("data-sp-id");
        jQuery("#kt_Add_Payment_form").clearForm();
        jQuery("#kt_Add_Payment_form").validate().resetForm();
        jQuery("#fk_sp_id").val(spId);
        jQuery("#fk_order_id").val(orderId);
        jQuery("#fk_session_id").val(fk_session_id);
        jQuery("#SP_Payment_Modal").modal("show");
        jQuery(".alert").hide();
        return false;
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
                },
                fk_order_id :{
                    required: true
                },
                fk_session_id :{
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


  jQuery(document).on("click",".btn-edit",function(){
        recordId =jQuery(this).attr("data-record-id");
        jQuery("#kt_signup_form").clearForm();
        jQuery("#kt_signup_form").validate().resetForm();
        jQuery(".kt-select2").val("").trigger('change');
        jQuery.get("/orders/{{ $order->order_id }}/sessions/"+recordId, function(data, status){
            jQuery("#New_RecordLabel").text("{{ __("Master.Edit") }} ");
            jQuery.each( data.data, function(index, item){
                if (jQuery("#"+index).is("select")){
                  if(index.startsWith("languages") || index.startsWith("topics")){
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
                    if(index.startsWith("is_session_sa_paid")){
                      jQuery("#"+index).prop('checked', item);
                    }
                }
            });
            jQuery(".alert").hide();
            jQuery("#New_Record_Modal").modal("show");
        });
        return false;
      });

  $('#order_student_class').change(function (e) {
      if($(e.target).val() == 12) {
        $(".row_order_student_high_school_branch").removeClass('kt-hide');
      } else {
        $(".row_order_student_high_school_branch").addClass('kt-hide');
      }
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

  updateSelect2();
  function updateSelect2(){

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
                            text: item.package_name,
                            id: item.package_id
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
                session_date: {
                    required: true,
                },
                session_time: {
                    required: true
                },
                session_period: {
                    required: true
                }
            }
        });

        if (!form.valid()) {
          //  return;
        }

        var URL = '/orders/{{ $order->order_id }}/sessions/'+recordId;
        var type = 'put';

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
    url: '/orders/{{ $order->order_id }}/sessions/list/',
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
    {data: 'session_date'},
    {data: 'session_time'},
    {data: 'session_period'},
    {data: 'session_notes'},
    {data: 'session_sp_review_score'},
    {data: 'session_sr_notes'},
    {data: 'session_status'},
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
                    <a class="dropdown-item btn-add-payment" title="{{ __("Master.Add_Payment") }}" data-record-id=`+full.session_id+` data-order-id=`+full.fk_order_id+` data-sp-id=`+full.order.fk_assigned_to+` href="#"><i class="fas fa-dollar-sign"></i>{{ __("Master.Add_Payment") }} </a>
                </div>
            </span>
            <a href="#" data-record-id=`+full.session_id+` class="btn btn-sm btn-clean btn-icon btn-icon-md btn-edit" title="{{ __("Master.Edit") }}">
              <i class="la la-edit"></i>
            </a>`;
     },
    },
     {
        targets: 6,
        render: function(data, type, full, meta) {
          var status = {
                "not_done" : {'title': '{{ __("Master.session_not_done") }}', 'state': 'danger'},
                "done": {'title': '{{ __("Master.session_done") }}', 'state': 'success'},
            };
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
