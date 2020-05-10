<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid kt-margin-t-20">
    <div class="kt-portlet kt-portlet--mobile">
        <div class="kt-portlet__head kt-portlet__head--lg">
            <div class="kt-portlet__head-label">
                <span class="kt-portlet__head-icon">
                    <i class="kt-font-brand flaticon2-line-chart"></i>
                </span>
                <h3 class="kt-portlet__head-title">
                     {{ __("Master.ServiceRequester") }} ( {{ $order->serviceRequester->sr_full_name }} )
                </h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="kt-form kt-form--fit kt-margin-b-20">
                <div class="row">
            <div class="form-group col-lg-4">
                <label for="sr_full_name" class="form-control-label">{{ __("Master.sr_full_name") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $order->serviceRequester->sr_full_name }}</span>
            </div>
            <div class="form-group col-lg-4">
                <label for="sr_email" class="form-control-label">{{ __("Master.sr_email") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $order->serviceRequester->sr_email }}</span>
            </div>
            <div class="form-group col-lg-4">
                <label for="sr_mobile" class="form-control-label">{{ __("Master.sr_mobile") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $order->serviceRequester->sr_mobile }}</span>
              </div>
          </div>

            <div class="row">
              <div class="form-group col-lg-4">
                  <label for="sr_facebook_id" class="form-control-label">{{ __("Master.sr_facebook_id") }}:</label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder"><a href="{{ $order->serviceRequester->sr_facebook_id }}" target="_blank"> {{ __("Master.click_here") }}</a></span>
              </div>
              <div class="form-group col-lg-4">
                <label for="fk_district_id" class="form-control-label">{{ __("Master.District") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $order->serviceRequester->district["district_name"] }}</span>
              </div>
              <div class="form-group col-lg-4">
                  <label for="fk_location_id" class="form-control-label">{{ __("Master.location") }}:</label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $order->serviceRequester->location["location_name"] }}</span>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-lg-4">
                  <label for="sr_address_1" class="form-control-label">{{ __("Master.sr_address_1") }}:</label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $order->serviceRequester->sr_address_1 }}</span>
              </div>
              <div class="form-group col-lg-4">
                <label for="sr_address_2" class="form-control-label">{{ __("Master.sr_address_2") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $order->serviceRequester->sr_address_2 }}</span>
              </div>
              <div class="form-group col-lg-4">
                  <label for="sr_join_date" class="form-control-label">{{ __("Master.sr_join_date") }} :</label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $order->serviceRequester->sr_join_date }}</span>
              </div>
            </div>
            <div class="kt-separator kt-separator--border-dashed kt-separator--space-md"></div>

            <div class="row">
              <div class="form-group col-lg-4">
                <label for="sr_student_name" class="form-control-label">{{ __("Master.sr_student_name") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $order->order_student_name }}</span>
              </div>
              <div class="form-group col-lg-4">
                  <label for="sr_gender" class="form-control-label">{{ __("Master.sr_gender") }} :</label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ Lang::get("Master.gender_".ucfirst ($order->order_student_gender)) }}</span>
              </div>
              <div class="form-group col-lg-4">
                  <label for="sr_student_class" class="form-control-label">{{ __("Master.sr_student_class") }} :</label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{  Lang::get("Master.class_".$order->order_student_class) }} </span>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-lg-4">
                <label for="topics" class="form-control-label">{{ __("Master.topics") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">
                    @php
                        $status = ['danger','primary','success','info','warning','brand'];
                    @endphp
                    @foreach ($order->topics as $element)
                        <span class="kt-badge kt-badge--{{ $status[$element["topic_id"] % 6] }} kt-badge--dot"></span>
                        <span class="kt-font-bold kt-font-{{ $status[$element["topic_id"] % 6] }}"> {{ $element["as_name"] }}</span>
                    @endforeach
                </span>
              </div>
              <div class="form-group col-lg-4">
                  <label for="sr_session_location" class="form-control-label">{{ __("Master.sr_session_location") }} :</label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $order->order_session_location }}</span>
              </div>
              <div class="form-group col-lg-4">
                  <label for="sr_targeted_gender" class="form-control-label">{{ __("Master.sr_targeted_gender") }} : </label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ Lang::get("Master.gender_".ucfirst ($order->order_targeted_gender))}} </span>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-lg-4">
                <label for="sr_initial_num_of_sessions" class="form-control-label">{{ __("Master.sr_initial_num_of_sessions") }}:</label>
                <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $order->order_initial_num_of_sessions }}</span>
              </div>
              <div class="form-group col-lg-4">
                  <label for="package_id" class="form-control-label">{{ __("Master.package_id") }} :</label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $order->package["package_name"] }} </span>
              </div>
              <div class="form-group col-lg-4">
                  <label for="order_order_summery" class="form-control-label">{{ __("Master.order_summery") }} :</label>
                  <span class=" text-dark  kt-margin-5 h4 font-weight-bolder">{{ $order->order_order_summery }} </span>
              </div>
            </div>

            </div>
        </div>
    </div>
</div>
