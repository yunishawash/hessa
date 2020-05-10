@extends('layouts.master')

@section('pageTitle')
 {{ __("Master.OrderTitle") }}
@endSection

@section('contents')
 <!-- end:: Header -->
<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">
    <!-- begin:: Content Head -->
    <div class="kt-subheader   kt-grid__item" id="kt_subheader">
        <div class="kt-container  kt-container--fluid ">
            <div class="kt-subheader__main">

                <h3 class="kt-subheader__title">
                  {{ __("Master.OrderTitle") }}
                   @if(Auth::user()->user_type == 'sa')
                  - {{ __("Master.Advanced_Search_Form") }}
                    @endif
                </h3>

                <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">

                    <div class="kt-subheader__desc"><span id="kt_subheader_group_selected_rows"></span>
                        Selected:</div>

                    <div class="btn-toolbar kt-margin-l-20">
                        <div class="dropdown" id="kt_subheader_group_actions_status_change">
                            <button type="button"
                                class="btn btn-label-brand btn-bold btn-sm dropdown-toggle"
                                data-toggle="dropdown">
                                Update Status
                            </button>
                            <div class="dropdown-menu">
                                <ul class="kt-nav">
                                    <li class="kt-nav__section kt-nav__section--first">
                                        <span class="kt-nav__section-text">Change status to:</span>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link" data-toggle="status-change"
                                            data-status="1">
                                            <span class="kt-nav__link-text"><span
                                                    class="kt-badge kt-badge--unified-success kt-badge--inline kt-badge--bold">Approved</span></span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link" data-toggle="status-change"
                                            data-status="2">
                                            <span class="kt-nav__link-text"><span
                                                    class="kt-badge kt-badge--unified-danger kt-badge--inline kt-badge--bold">Rejected</span></span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link" data-toggle="status-change"
                                            data-status="3">
                                            <span class="kt-nav__link-text"><span
                                                    class="kt-badge kt-badge--unified-warning kt-badge--inline kt-badge--bold">Pending</span></span>
                                        </a>
                                    </li>
                                    <li class="kt-nav__item">
                                        <a href="#" class="kt-nav__link" data-toggle="status-change"
                                            data-status="4">
                                            <span class="kt-nav__link-text"><span
                                                    class="kt-badge kt-badge--unified-info kt-badge--inline kt-badge--bold">On
                                                    Hold</span></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <button class="btn btn-label-success btn-bold btn-sm btn-icon-h"
                            id="kt_subheader_group_actions_fetch" data-toggle="modal"
                            data-target="#kt_datatable_records_fetch_modal">
                            Fetch Selected
                        </button>
                        <button class="btn btn-label-danger btn-bold btn-sm btn-icon-h"
                            id="kt_subheader_group_actions_delete_all">
                            Delete All
                        </button>
                    </div>
                </div>
            </div>
            <div class="kt-subheader__toolbar">

                <a href="#" class="">

                </a>

                @if(Auth::user()->user_type == 'sa')
                <a href="#" id="New_Record" class="btn btn-brand btn-elevate btn-icon-sm">
                    <i class="la la-plus"></i>
                    {{ __("Master.New_Record") }}
                </a>
                @endif
            </div>
        </div>
    </div>
    <!-- end:: Content Head -->
    <!-- begin:: Content -->
    <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
        @foreach($orders as $order)
        <!--Begin::Section-->
        <div class="row">
            <div class="col-xl-12">
                <!--begin:: Widgets/Personal Income-->
                <div
                    class="kt-portlet kt-portlet--fit kt-portlet--head-lg kt-portlet--head-overlay kt-portlet--height-fluid">
                    <div class="kt-portlet__head kt-portlet__space-x">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title kt-font-light">
                                <?php 
                                        \Carbon\Carbon::setLocale('ar');
                                ?>
                                {{ $order->created_at->diffForHumans() }}
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-widget27">
                            <div class="kt-widget27__visual">
                                <img src="/assets/media//bg/bg-4.jpg" alt="">
                                <?php 
                                        $topics = '(';
                                        foreach($order->topics->toArray() as $key => $topic){
                                            if($key != count($order->topics->toArray()) - 1 ) {
                                                $topics.= $topic['as_name'].',';
                                            } else {
                                                $topics.= $topic['as_name'].'),';
                                            }
                                            
                                        }
                                    ?>
                                <h6 class="kt-widget27__title" style='text-align:center;max-width:90%;word-wrap:break-word;'>
                                    <span style='font-size:2.2rem'>
                                    {{__('Master.t_'.$order->order_targeted_gender)}},{{$topics}}
                                    {{__('Master.class_'.$order->order_student_class)}},{{@$order->serviceRequester->sr_address_1}}
                                    </span>
                                </h6>
                            </div>
                            <div class="kt-widget27__container kt-portlet__space-x">
                                <div class="tab-content">
                                    <div class="kt-portlet__body">
                                        <div class="kt-widget kt-widget--user-profile-3">
                                            <div class="kt-widget__bottom">
                                                <div style='text-align:right;width:100%'>

                                                    <div class="kt-widget__icon" style='float:right'>
                                                        <i class="flaticon-network"></i>
                                                    </div>
                                                    <div class="kt-widget__details" style='float:right'>
                                                        <div class="kt-section__content kt-section__content--solid">
                                                            <div class="kt-media-group">
                                                            @foreach($order->interested as $key => $serviceProvider)
                                                                <?php
                                                                    if($key == 3) {
                                                                        break;
                                                                    }
                                                                ?>
                                                                <a href="#" id="{{$order->order_id}}-sr-image" class="kt-media kt-media--sm kt-media--circle"
                                                                    data-toggle="kt-tooltip" data-skin="brand"
                                                                    data-placement="top" title=""
                                                                    data-original-title="{{$serviceProvider->sp_full_name}}">
                                                                    <img src="\{{ $serviceProvider->sp_personal_passport_img_url }}" alt="image">
                                                                </a>
                                                            @endforeach
                                                            @if($order->interested()->count() > 3)
                                                                <a href="#" class="kt-media kt-media--sm kt-media--circle"
                                                                    data-toggle="kt-tooltip" data-skin="brand"
                                                                    data-placement="top" title=""
                                                                    data-original-title="">
                                                                    <span>{{$order->interested()->count() - 3 }}</span>
                                                                </a>
                                                            @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="kt-widget__wrapper" style='float:left'>
                                                        <div class="kt-widget__section">
                                                            <div class="kt-widget__action">
                                                                <a  href="#" data-record-id='{{$order->order_id}}' class="btn btn-sm btn-clean btn-icon btn-icon-md btn-interest">
                                                                    <i id='{{$order->order_id}}-interest-icon' class="{{ ($order->IsInterested ==1)?'fas':'far' }} fa-heart"></i>
                                                                </a> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end:: Widgets/Personal Income-->
            </div>
        </div>
        <!--End::Section-->
        @endforeach

        <!--Begin::Pagination-->
        @component('components.paginate', ['rows' => $orders])
        @endcomponent
        <!--End::Pagination-->
    </div>
    <!-- end:: Content -->
</div>
<!-- begin:: Footer -->
<!--begin::Modal-->
@if(Auth::user()->user_type == 'sa')
<div class="modal fade" id="New_Record_Modal" tabindex="-1" role="dialog" aria-labelledby="New Record" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="New_RecordLabel">{{ __("Master.New_Order") }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form  method="POST" id="kt_signup_form" action="/orders/store">
                    <div class="accordion accordion-solid accordion-toggle-plus" id="SR_Order_Info_Accordion">
                      <div class="card">
                            <div class="row">
                                <div class="form-group col-12">
                                    <label for="fk_service_requester_id" class="form-control-label">{{ __("Master.ServiceRequester") }}</label>
                                    <select title="{{ __("Master.service_requester_placeholder") }}" style="width: 100%;" placeholder="{{ __("Master.service_requester_placeholder") }}" class="form-control kt-select2" name="fk_service_requester_id" id="fk_service_requester_id" required="">
                                    </select>
                                </div>
                              </div>
                       </div>
                        @component('components.SR_Order_Store')
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
@endif
<!--end::Modal-->
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

  jQuery(document).on("click",".btn-interest",function(){
    var id =jQuery(this).attr("data-record-id");
    jQuery.post("/orders/"+id+"/toggleInterest/", function(data, status){
        if(data.meta.message == "removed_from_interests_table") {
            jQuery("#"+id+"-interest-icon").attr('class', 'far fa-heart');
        } else {
            jQuery("#"+id+"-interest-icon").attr('class', 'fas fa-heart');
        }
    });
    return false;
  });

  jQuery(document).find('.form-control[required]').parent().find("label.form-control-label").append(' <span class="text-danger">*</span> ');


  jQuery(document).on("click",".btn-add-payment",function(){
        var orderId =jQuery(this).attr("data-record-id");
        var spId =jQuery(this).attr("data-sp-id");
        jQuery("#kt_Add_Payment_form").clearForm();
        jQuery("#kt_Add_Payment_form").validate().resetForm();
        jQuery("#fk_sp_id").val(spId);
        jQuery("#fk_order_id").val(orderId);
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


  jQuery(document).on("click",".btn-edit",function(){
        recordId =jQuery(this).attr("data-record-id");
        jQuery("#kt_signup_form").clearForm();
        jQuery("#kt_signup_form").validate().resetForm();
        jQuery(".kt-select2").val("").trigger('change');
        jQuery.get("/orders/"+recordId, function(data, status){
            jQuery("#New_RecordLabel").text("{{ __("Master.Edit") }} : " + data.data.order_student_name);
            jQuery.each( data.data, function(index, item){
                if (jQuery("#"+index).is("select")){
                  if(index.startsWith("fk_")){
                    jQuery("#"+index).append('<option value="'+item.id+'" selected>'+item.name+'</option>').val(item.id).trigger('change');
                  }else if(index.startsWith("languages") || index.startsWith("topics")){
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
            updateSelect2();
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
  jQuery('[name=order_type]').select2({
      placeholder: jQuery('[name=order_type]').attr("placeholder")
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
                            text: item.package_name + " ( {{ __("Master.package_hourly_rate") }} : "+item.package_hourly_rate+" ) ",
                            id: item.package_id
                        }
                    })
                };
            }
        }
      });

      jQuery('#fk_service_requester_id').select2({
          placeholder: {
              id: '-1', // the value of the option
              text: jQuery('#fk_service_requester_id').attr("placeholder")
          },
          ajax: {
              url: "/lookups/sr",
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
                              text: item.sr_full_name,
                              id: item.sr_id
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
                order_session_location: {
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
                fk_service_requester_id: {
                    required: true
                },
                order_preferred_payment_method: {
                    required: true
                },
                order_order_summery: {
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

                    $(".is-invalid").removeClass('is-invalid');
                    $(".invalid-feedback").remove();

                    jQuery.each(Erorrs, function( index, value ) {
                        $("[name="+index+"]:not(.kt-input-filter)").addClass('is-invalid');
                        $('<div id="'+index+'-error" class="error invalid-feedback">'+value[0]+'</div>').insertAfter("[name="+index+"]:not(.kt-input-filter)");

                    });
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
     "aLengthMenu": [[10, 100, 500, 1000, 0], [10, 100, 500, 1000,"{{ __("datatable.aLengthMenu") }}"]],
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
    {data: 'fk_location_id'},
    {data: 'sr_address_1'},
    {data: 'order_status'},
    {data: 'fk_assigned_to'},
    {data: 'Actions', responsivePriority: -1},
   ],
   columnDefs: [
    {
     targets: -1,
     orderable: false,
     render: function(data, type, full, meta) {
        if(typeof full.is_interested === "undefined") {
            var Links ="";
            if(full.assigned_to){
                Links = `
                <a class="dropdown-item btn-view" title="{{ __("Master.View_Session_Details") }}" data-record-id=`+full.order_id+` href="/orders/`+full.order_id+`/sessions/view"><i class="la la-list"></i> {{ __("Master.View_Session_Details") }}</a>
                <a class="dropdown-item btn-add-payment" title="{{ __("Master.Add_Payment") }}" data-record-id=`+full.order_id+`  data-sp-id=`+full.fk_assigned_to+` href="#"><i class="fas fa-dollar-sign"></i>{{ __("Master.Add_Payment") }} </a>`;
            }else{
                Links =`
                <a class="dropdown-item btn-view" title="{{ __("Master.interest_List") }}" data-record-id=`+full.order_id+` href="/orders/`+full.order_id+`/interestedServiceProviders/view"><i class="la la-list"></i> {{ __("Master.interest_List") }}</a>`;
            }
            return `
            <span class="dropdown">
                <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                  <i class="la la-ellipsis-h"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    `+Links+`
                </div>
            </span>
            <a href="#" data-record-id=`+full.order_id+` class="btn btn-sm btn-clean btn-icon btn-icon-md btn-edit" title="{{ __("Master.Edit") }}">
              <i class="la la-edit"></i>
            </a>`;
        }else{
          @if(Auth::user()->user_type == 'sp')
          var icon = "fas";
          var index = "interest";
          var status = {
            "interest" : {'title': '{{ __("Master.interest") }}', 'icontitle': '{{ __("Master.Cancel_interest") }}', 'state': 'success'},
            "dinterest": {'title': '{{ __("Master.dinterest") }}', 'icontitle': '{{ __("Master.interest_order") }}', 'state': 'danger'},
          };
          if(full.fk_assigned_to === {{  __(Auth::user()->serviceProvider->sp_id) }}){
             return `
             <span class="dropdown">
                <a href="#" class="btn btn-sm btn-clean btn-icon btn-icon-md" data-toggle="dropdown" aria-expanded="true">
                  <i class="la la-ellipsis-h"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item btn-add-payment" title="{{ __("Master.Add_Payment") }}" data-record-id=`+full.order_id+`  data-sp-id=`+full.fk_assigned_to+` href="#"><i class="fas fa-dollar-sign"></i>{{ __("Master.Add_Payment") }} </a>
                    <a class="dropdown-item " href="/orders/`+full.order_id+`/mysessions/view" data-record-id=`+full.order_id+` title="{{ __("Master.View_Session_Details") }}">
                      <i class="la la-list"></i> {{ __("Master.View_Session_Details") }}
                    </a>
                </div>
            </span>
            `;
          }else{
            if(full.is_able_to === true &&  ! full.fk_assigned_to){
              if(full.is_interested === false) {
                  icon = "far";
                  index = "dinterest";
              }
              return `
                    <a href="#" data-record-id=`+full.order_id+` class="btn btn-sm btn-clean btn-icon btn-icon-md btn-interest" title="`+status[index].icontitle+`">
                      <i class="`+icon+` fa-heart"></i>
                    </a> `;
            }
            return '';
         }
           @endif
        }

     },
    },
    {
        targets: 0,
        render: function(data, type, full, meta) {
            return data;
        }
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
     targets: 10,
     orderable: false,
     render: function(data, type, full, meta) {
      return full.service_requester_location;
     },
    },
    {
     targets: 11,
     orderable: false,
     render: function(data, type, full, meta) {
      return full.serviceRequester.sr_address_1;
     },
    },
    {
     targets: 13,
     render: function(data, type, full, meta) {
      return full.assigned_to;
     },
    }
   ],
   order: [
       [0, "desc"]
   ] // set first column as a default sort by asc
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

  $('#kt_filter').on('click', function(e) {
   e.preventDefault();
   table.table().ajax.url('/orders/list?order_type='+$('[name=order_type]').val()).load();
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
