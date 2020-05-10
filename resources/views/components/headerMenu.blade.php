<button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
<div class="kt-header-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_header_menu_wrapper">
    <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout-default ">
        <ul class="kt-menu__nav ">
            @if(Auth::user()->user_type == 'sa')
            <li class="kt-menu__item " aria-haspopup="true">
                <a href="/serviceProvider/view" class="kt-menu__link ">
                    <span class="kt-menu__link-text">{{ __("Master.ServiceProviderLink") }} </span>
                </a>
            </li>
            <li class="kt-menu__item " aria-haspopup="true">
                <a href="/serviceRequester/view" class="kt-menu__link ">
                    <span class="kt-menu__link-text">{{ __("Master.ServiceRequesterLink") }} </span>
                </a>
            </li>
            @endif
            <li class="kt-menu__item " aria-haspopup="true">
                <a href="/orders/view" class="kt-menu__link ">
                    <span class="kt-menu__link-text">{{ __("Master.OrderLink") }} </span>
                </a>
            </li>
            @if(Auth::user()->user_type == 'sa')
            <li class="kt-menu__item " aria-haspopup="true">
                <a href="/serviceAdmins/view" class="kt-menu__link ">
                    <span class="kt-menu__link-text">{{ __("Master.ServiceAdminLink") }} </span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</div>
