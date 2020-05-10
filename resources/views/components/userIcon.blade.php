<!--begin: User bar -->
<div class="kt-header__topbar-item">
	<div class="kt-header__topbar-item dropdown kt-margin-10 ">
	  <div class="kt-header__topbar-icon kt-header__topbar-icon--success" style="width: auto; border-radius: 5px;">
	    <span class="kt-header__topbar-icon" style="width: auto; border-radius: 5px;">{{ __("Master.hello") }} - {{ Auth::user()->user_name }}</span>
	  </div>
	</div>
</div>
<div class="kt-header__topbar-item kt-header__topbar-item--user">


	<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
		<span class="kt-header__topbar-icon kt-hidden-">
			@if(\Auth::user()->user_type == 'sa')
			<i class="flaticon2-user-outline-symbol"></i>
			@elseif(\Auth::user()->user_type == 'sp')
			<img src="\{{ \Auth::user()->serviceProvider->sp_personal_passport_img_url }}" />
			@endif
		</span>
	</div>
	<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-xl">
		<!--begin: Navigation -->
		<div class="kt-notification">
			@if(Auth::user()->user_type == 'sp')
			<a href="/me/profile" class="kt-notification__item">
				<div class="kt-notification__item-icon">
						<i class="flaticon2-calendar-3 kt-font-success"></i>
				</div>
				<div class="kt-notification__item-details">
						<div class="kt-notification__item-title kt-font-bold">
								{{ __("Master.My_Profile") }}
						</div>
				</div>
			</a>
			<a href="/me/payments/list" class="kt-notification__item">
				<div class="kt-notification__item-icon">
						<i class="fa fa-money-bill kt-font-success"></i>
				</div>
				<div class="kt-notification__item-details">
						<div class="kt-notification__item-title kt-font-bold">
								{{ __("Master.PaymentList") }}
						</div>
				</div>
			</a>
			<a href="/sessions/today/view" class="kt-notification__item">
				<div class="kt-notification__item-icon">
						<i class="flaticon-calendar kt-font-success"></i>
				</div>
				<div class="kt-notification__item-details">
						<div class="kt-notification__item-title kt-font-bold">
								{{ __("Master.sessions_today") }}
						</div>
				</div>
			</a>
			@endif
			<a href="/auth/changePassword" class="kt-notification__item">
				<div class="kt-notification__item-icon">
						<i class="flaticon2-calendar-3 kt-font-success"></i>
				</div>
				<div class="kt-notification__item-details">
					<div class="kt-notification__item-title kt-font-bold">
							{{ __("Master.Change_Password") }}
					</div>
				</div>
			</a>
			<div class="kt-notification__custom kt-space-between">
				<a href="/auth/logout" class="btn btn-label btn-label-brand btn-sm btn-bold">{{ __("Master.SignOut") }}</a>
			</div>
		</div>
		<!--end: Navigation -->
	</div>
</div>
<!--end: User bar -->
