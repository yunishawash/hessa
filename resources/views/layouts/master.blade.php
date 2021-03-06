<!DOCTYPE html>
<html direction="rtl" dir="rtl" style="direction: rtl" >
  <head>
    <meta charset="utf-8">
    <title>@yield('pageTitle')</title>
    <meta name="description" content="Page with empty content">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--begin::Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">
    <!--end::Fonts -->
    <!--begin::Page Vendors Styles(used by this page) -->
    <link href="{{ URL::asset('/assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles -->
    <!--begin:: Global Mandatory Vendors -->
    <link href="{{ URL::asset('/assets/vendors/general/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
    <!--end:: Global Mandatory Vendors -->
    <!--begin:: Global Optional Vendors -->
    <link href="{{ URL::asset('/assets/vendors/general/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/bootstrap-datepicker/dist/css/bootstrap-datepicker3.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/bootstrap-datetime-picker/css/bootstrap-datetimepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/bootstrap-timepicker/css/bootstrap-timepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/nouislider/distribute/nouislider.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/owl.carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/quill/dist/quill.snow.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/@yaireo/tagify/dist/tagify.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/dual-listbox/dist/dual-listbox.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/sweetalert2/dist/sweetalert2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/custom/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/custom/vendors/flaticon/flaticon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/custom/vendors/flaticon2/flaticon.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/assets/vendors/general/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css" />
    <!--end:: Global Optional Vendors -->
    <!--begin::Global Theme Styles(used by all pages) -->
    <link href="{{ URL::asset('/assets/css/demo6/style.bundle.rtl.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles -->
    <!--begin::Layout Skins(used by all pages) -->
    <!--end::Layout Skins -->
    <link href="https://fonts.googleapis.com/css?family=Cairo" rel="stylesheet">
    <style>
    font,h1,h2,h3,h4,h5,h6,p,input,textarea,b,li,td,th,div {
      font-family: 'Cairo', sans-serif !important;
    }
     .select2-search--inline, .select2-search--inline input{
        width: 100% !important;
      }.kt-content{
        padding-bottom: 0px;
      }

    </style>
    <link rel="shortcut icon" href="{{ URL::asset('/assets/media/logos/favicon.ico') }}" />
    @yield('css')
</head>
<!-- end::Head -->
<!-- begin::Body -->
  <body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-aside--minimize kt-page--loading">
      <!-- begin:: Page -->
      <!-- begin:: Header Mobile -->
      @component('components.headerMobile')
      @endcomponent
      <!-- end:: Header Mobile -->
      <div class="kt-grid kt-grid--hor kt-grid--root">
          <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
              <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper kt-padding-l-0" id="kt_wrapper">
                  <!-- begin:: Header -->
                  <div id="kt_header" class="kt-header kt-grid kt-grid--ver  kt-header--fixed ">
                      <!-- begin:: Aside -->
                      <div class="kt-header__brand kt-grid__item  " id="kt_header_brand">
                          <div class="kt-header__brand-logo">
                              <a href="/">
                                  <img alt="Logo" src="{{ URL::asset('/assets/media/logos/logo-6.png') }}" />
                              </a>
                          </div>
                      </div>
                      <!-- end:: Aside -->
                      <!-- begin: Header Menu -->
                      @component('components.headerMenu')
                      @endcomponent
                      <!-- end: Header Menu -->
                      <!-- begin:: Header Topbar -->
                      <div class="kt-header__topbar">
                          <!--begin: User bar -->
                          @component('components.userIcon')
                          @endcomponent
                          <!--end: User bar -->

                      </div>
                      <!-- end:: Header Topbar -->
                  </div>
                  <!-- end:: Header -->
                  <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

                      <!-- begin:: Content -->
                      <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
                      @yield('contents')
                      </div>
                      <!-- end:: Content -->
                      @component('components.footer')
                      @endComponent
              </div>

          </div>
      </div>

      <!-- end:: Page -->
      <!-- begin::Scrolltop -->
      <div id="kt_scrolltop" class="kt-scrolltop">
          <i class="fa fa-arrow-up"></i>
      </div>
      <!-- end::Scrolltop -->

      <!-- begin::Global Config(global config for global JS sciprts) -->
      <script>
          var KTAppOptions = {
              "colors": {
                  "state": {
                      "brand": "#22b9ff",
                      "light": "#ffffff",
                      "dark": "#282a3c",
                      "primary": "#5867dd",
                      "success": "#34bfa3",
                      "info": "#36a3f7",
                      "warning": "#ffb822",
                      "danger": "#fd3995"
                  },
                  "base": {
                      "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                      "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                  }
              }
          };
      </script>
      <!-- end::Global Config -->

      <!--begin:: Global Mandatory Vendors -->
      <script src="{{ URL::asset('/assets/vendors/general/jquery/dist/jquery.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/moment/min/moment.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/sticky-js/dist/sticky.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/wnumb/wNumb.js') }}" type="text/javascript"></script>
      <!--end:: Global Mandatory Vendors -->

      <!--begin:: Global Optional Vendors -->
      <script src="{{ URL::asset('/assets/vendors/general/jquery-form/dist/jquery.form.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/custom/js/vendors/bootstrap-datepicker.init.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/custom/js/vendors/bootstrap-timepicker.init.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/bootstrap-maxlength/src/bootstrap-maxlength.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/custom/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/bootstrap-select/dist/js/bootstrap-select.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/bootstrap-switch/dist/js/bootstrap-switch.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/custom/js/vendors/bootstrap-switch.init.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/ion-rangeslider/js/ion.rangeSlider.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/typeahead.js/dist/typeahead.bundle.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/handlebars/dist/handlebars.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/inputmask/dist/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/inputmask/dist/inputmask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/nouislider/distribute/nouislider.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/owl.carousel/dist/owl.carousel.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/autosize/dist/autosize.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/clipboard/dist/clipboard.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/custom/js/vendors/dropzone.init.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/quill/dist/quill.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/@yaireo/tagify/dist/tagify.polyfills.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/@yaireo/tagify/dist/tagify.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/summernote/dist/summernote.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/markdown/lib/markdown.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/custom/js/vendors/bootstrap-markdown.init.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/bootstrap-notify/bootstrap-notify.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/custom/js/vendors/bootstrap-notify.init.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/jquery-validation/dist/additional-methods.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/custom/js/vendors/jquery-validation.init.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/dual-listbox/dist/dual-listbox.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/raphael/raphael.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/morris.js/morris.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/chart.js/dist/Chart.bundle.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/custom/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/custom/vendors/jquery-idletimer/idle-timer.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/waypoints/lib/jquery.waypoints.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/counterup/jquery.counterup.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/es6-promise-polyfill/promise.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/custom/js/vendors/sweetalert2.init.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/jquery.repeater/src/jquery.input.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/jquery.repeater/src/repeater.js') }}" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/general/dompurify/dist/purify.js') }}" type="text/javascript"></script>
      <!--end:: Global Optional Vendors -->
      <!--begin::Global Theme Bundle(used by all pages) -->
      ش
      <script src="{{ URL::asset('/assets/js/demo6/scripts.bundle.js') }}" type="text/javascript"></script>
      <!--end::Global Theme Bundle -->
      <!--begin::Page Vendors(used by this page) -->
      <script src="{{ URL::asset('/assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript"></script>
      <script src="//maps.google.com/maps/api/js?key=AIzaSyBTGnKT7dt597vo9QgeQ7BFhvSRP4eiMSM" type="text/javascript"></script>
      <script src="{{ URL::asset('/assets/vendors/custom/gmaps/gmaps.js') }}" type="text/javascript"></script>
      <!--end::Page Vendors -->
      <!--begin::Page Scripts(used by this page) -->
      <script src="{{ URL::asset('/assets/js/demo6/pages/dashboard.js') }}" type="text/javascript"></script>
      
      <!--end::Page Scripts -->
      @yield('javascript')
  </body>
  <!-- end::Body -->

</html>
