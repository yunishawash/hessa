@extends('layouts.master')

@section('pageTitle')
 {{ __("Master.View_Order") }} - {{ __("Master.ServiceProvider") }} ( {{ $sp->sp_full_name }} )
@endSection

@section('contents')

@component('components.sp_info', ['sp'=>$sp])
@endcomponent

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
                        <th> {{ __("Master.package_id") }}</th>
                        <th> {{ __("Master.package_hourly_rate") }}</th>
                        <th> {{ __("Master.sr_initial_num_of_sessions") }}</th>
                        <th> {{ __("Master.topics") }}</th>
                        <th> {{ __("Master.order_status") }}</th>
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
    url: '/orders/sp/{{ $sp->sp_id }}/list/',
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
    {data: 'package'},
    {data: 'package'},
    {data: 'order_initial_num_of_sessions'},
    {data: 'topics'},
    {data: 'order_status'},
    {data: 'Actions', responsivePriority: -1},
   ],
   "order": [[ 0, "desc" ]],
   columnDefs: [
    {
     targets: -1,
     orderable: false,
     render: function(data, type, full, meta) {
      return `
      <a class="btn-view" title="{{ __("Master.View_Session_Details") }}" href="/orders/`+full.order_id+`/sessions/view"><i class="la la-list"></i> {{ __("Master.View_Session_Details") }}</a>`;
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
      return data.name;
     },
    },
    {
     targets: 6,
     render: function(data, type, full, meta) {
      return data.hourly_rate;
     },
    },
    {
     targets: 8,
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
