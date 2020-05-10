@extends('layouts.master')

@section('pageTitle')
 {{ __("Master.OrderTitle") }}
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
                      {{ __("Master.OrderTitle") }} - {{ __("Master.Advanced_Search_Form") }}
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <!--begin: Search Form -->
            <form class="kt-form kt-form--fit kt-margin-b-20">
                <div class="row kt-margin-b-20">
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>{{ __("Master.sr_student_name") }}:</label>
                        <input type="text" class="form-control kt-input" name="sr_student_name" placeholder="{{ __("Master.sr_student_name_placeholder") }}"  data-col-index="0">
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>{{ __("Master.sr_student_gender") }}:</label>
                        <select title="{{ __("Master.sr_student_gender_placeholder") }}" style="width: 100%;" placeholder="{{ __("Master.sr_student_gender_placeholder") }}" class="form-control kt-select2 order_student_gender kt-input" name="order_student_gender" data-col-index="1">
                        <option></option>
                        <option value="male">{{ __("Master.gender_Male") }}</option>
                        <option value="female">{{ __("Master.gender_Female") }}</option>
                      </select>
                    </div>
                    <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>{{ __("Master.sr_student_class") }}:</label>
                        <select class="form-control kt-select2 order_student_class kt-input" name="fk_district_id"  placeholder="{{ __("Master.sr_student_class_placeholder") }}"  data-col-index="2">
                            <option></option>
                            <option value="1">{{ __("Master.class_1") }}</option>
                            <option value="2">{{ __("Master.class_2") }}</option>
                            <option value="3">{{ __("Master.class_3") }}</option>
                            <option value="4">{{ __("Master.class_4") }}</option>
                            <option value="5">{{ __("Master.class_5") }}</option>
                            <option value="6">{{ __("Master.class_6") }}</option>
                            <option value="7">{{ __("Master.class_7") }}</option>
                            <option value="8">{{ __("Master.class_8") }}</option>
                            <option value="9">{{ __("Master.class_9") }}</option>
                            <option value="10">{{ __("Master.class_10") }}</option>
                            <option value="11">{{ __("Master.class_11") }}</option>
                            <option value="12">{{ __("Master.class_12") }}</option>
                        </select>
                    </div>

                     <div class="col-lg-3 kt-margin-b-10-tablet-and-mobile">
                        <label>{{ __("Master.sr_targeted_gender") }}:</label>
                        <select title="{{ __("Master.sr_targeted_gender_placeholder") }}" style="width: 100%;" placeholder="{{ __("Master.sr_targeted_gender_placeholder") }}" class="form-control kt-select2 order_targeted_gender kt-input" name="order_targeted_gender" data-col-index="5">
                        <option></option>
                        <option value="male">{{ __("Master.gender_Male") }}</option>
                        <option value="female">{{ __("Master.gender_Female") }}</option>
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
                        <th> {{ __("Master.sr_student_name") }}</th>
                        <th> {{ __("Master.sr_gender") }}</th>
                        <th> {{ __("Master.sr_student_class") }}</th>
                        <th> {{ __("Master.topics") }}</th>
                        <th> {{ __("Master.sr_session_location") }}</th>
                        <th> {{ __("Master.sr_targeted_gender") }}</th>
                        <th> {{ __("Master.package_id") }}</th>
                        <th> {{ __("Master.sr_initial_num_of_sessions") }}</th>
                        <th> {{ __("Master.status") }}</th>
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
jQuery( document ).ready(function() {


  jQuery(document).on("click",".btn-interest",function(){
    var id =jQuery(this).attr("data-record-id");
    jQuery.post("/orders/"+id+"/toggleInterest/", function(data, status){
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

var status = {
        "interest" : {'title': '{{ __("Master.interest") }}', 'state': 'success'},
        "dinterest": {'title': '{{ __("Master.dinterest") }}', 'state': 'danger'},
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
    url: '/orders/list/',
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
    {data: 'order_student_name'},
    {data: 'student_gender'},
    {data: 'student_class'},
    {data: 'topics'},
    {data: 'order_session_location'},
    {data: 'targeted_gender'},
    {data: 'package'},
    {data: 'order_initial_num_of_sessions'},
    {data: 'is_interested'},
    {data: 'Actions', responsivePriority: -1},
   ],
   columnDefs: [
    {
     targets: -1,
     orderable: false,
     render: function(data, type, full, meta) {
      var index = "fas";
      var title = status["interest"].title;
      if(full.is_interested === false) {
          index = "far";
          title = status["dinterest"].title;
      }
      return `
            <a href="#" data-record-id=`+full.order_id+` class="btn btn-sm btn-clean btn-icon btn-icon-md btn-interest" title="`+title+`">
              <i class="`+index+` fa-heart"></i>
            </a>`;
     },
    },
    {
     targets: 3,
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
     targets: 6,
     render: function(data, type, full, meta) {
      return data.name;
     },
    },
     {
        targets: 8,
        render: function(data, type, full, meta) {
            var index = "interest";
            if (data === false) {
                index = "dinterest";
            }
            return '<span class="kt-badge kt-badge--' + status[index].state + ' kt-badge--dot"></span>&nbsp;' +
                '<span class="kt-font-bold kt-font-' + status[index].state + '">' + status[index].title + '</span>';
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
