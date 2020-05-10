@extends('layouts.master')

@section('pageTitle')
 {{ __("Master.PaymentList") }}
@endSection

@section('contents')

@if(Auth::user()->user_type == 'sa')

@component('components.sp_info', ['sp'=>$sp])
@endcomponent

@endif

<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid kt-margin-t-20">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                     {{ __("Master.PaymentList") }}
                </h3>
            </div>
            <div class="kt-portlet__head-toolbar">
                <div class="kt-portlet__head-wrapper">
                    <div class="kt-portlet__head-actions">
                        <a href="#" id="New_Record" class="btn btn-brand btn-elevate btn-icon-sm btn-add-payment">
                            <i class="la la-plus"></i>
                            {{ __("Master.New_Record") }}
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

            <table class="table table-striped- table-bordered table-hover table-checkable" id="kt_table_1">
                <thead>
                    <tr>
                        <th> {{ __("Master.date") }}</th>
                        <th> {{ __("Master.payment_amount") }}</th>
                        <th> {{ __("Master.added_by") }}</th>
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
                    <input type="hidden" id="fk_sp_id" name="fk_sp_id" value="{{ $sp->sp_id }}">
                    <input type="hidden" id="payment_id" name="payment_id" >
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
jQuery( document ).ready(function() {

  jQuery(document).on("click","#kt_reset",function(){
    jQuery(".kt-select2").val("").trigger('change');
  });
    var recordId = 0;
    jQuery(document).on("click",".btn-update-payment",function(){
        recordId =jQuery(this).attr("data-record-id");
        var value =jQuery(this).attr("data-value");
        jQuery("#kt_Add_Payment_form").clearForm();
        jQuery("#kt_Add_Payment_form").validate().resetForm();
        jQuery("#payment_id").val(recordId);
        jQuery("#payment_amount").val(value);
        jQuery("#fk_sp_id").val("{{ $sp->sp_id }}");
        jQuery("#SP_Payment_Modal").modal("show");
        jQuery(".alert").hide();
        return false;
      });

      jQuery(document).on("click",".btn-add-payment",function(){
        recordId = 0;
        jQuery("#kt_Add_Payment_form").clearForm();
        jQuery("#kt_Add_Payment_form").validate().resetForm();
        jQuery("#fk_sp_id").val("{{ $sp->sp_id }}");
        jQuery("#SP_Payment_Modal").modal("show");
        jQuery(".alert").hide();
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

    $('#kt_Add_Payment_submit').click(function(e) {
        e.preventDefault();

        var btn = $(this);
        var form = $("#kt_Add_Payment_form");

        var URL = '/sessions/payments/';
        var type = 'post';
        if(recordId == 0){
            URL = '/sessions/payments/';
            type = 'post';
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
        }else{
            URL = '/sessions/payments/'+recordId;
            type = 'put';
            form.validate({
                rules: {
                    payment_amount: {
                        required: true
                    },
                    fk_sp_id :{
                        required: true
                    },
                    payment_id:{
                        required: true
                    }
                }
            });
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
                    jQuery("#SP_Payment_Modal").modal("hide");
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
   searchDelay: 10,
   processing: true,
   serverSide: true,
   ajax: {
    url: '/serviceProvider/{{ $sp->sp_id }}/payments',
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
      "lengthMenu": [[10, 100, 500, 1000,0], [10, 100, 500, 1000,"{{ __("datatable.aLengthMenu") }}"]],
     },
   columns: [
    {data: 'created_at'},
    {data: 'payment_amount'},
    {data: 'fk_sa_id'},
    {data: 'Actions', responsivePriority: -1},
   ],
   order: [
       [0, "desc"]
   ],
   columnDefs: [
    {
     targets: -1,
     orderable: false,
     render: function(data, type, full, meta) {
      return `
            <a href="#" data-value=`+full.payment_amount+` data-record-id=`+full.payment_id+` class="btn-update-payment" title="{{ __("Master.Update_Payment") }}">
              <i class="fas fa-dollar-sign"></i> {{ __("Master.Update_Payment") }}
            </a>`;
     },
    },
     {
        targets: 2,
        render: function(data, type, full, meta) {
            if (typeof full.service_admin === 'undefined') {
                return '';
            }
            return full.service_admin.user_name;
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
<style>
 .select2-search--inline, .select2-search--inline input{
    width: 100% !important;
  }
</style>
@endSection
