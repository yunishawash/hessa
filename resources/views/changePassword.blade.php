@extends('layouts.master')

@section('pageTitle')
 {{ __("Master.Change_Password") }}
@endSection

@section('contents')

	<div class="row kt-margin-t-20">
		<div class="col-md-8 offset-md-2">
			<!--begin::Portlet-->
			<div class="kt-portlet">
				<div class="kt-portlet__head">
					<div class="kt-portlet__head-label">
						<h3 class="kt-portlet__head-title">
							 {{ __("Master.Change_Password") }}
						</h3>
					</div>
				</div>
				<!--begin::Form-->
				<form class="kt-form" action='/auth/changePasswordSave'  method="post" id="kt_login">
					<div class="kt-portlet__body">
						<div class="form-group form-group-last">
							<div class="alert alert-secondary" role="alert">
								<div class="alert-icon"><i class="flaticon-warning kt-font-brand"></i></div>
							  	<div class="alert-text">
									 {{ __("Master.Change_Password_Message") }}
								</div>
							</div>
						</div>
						@csrf
						<div class="form-group">
							<label for="old_password">{{ __("Master.old_password") }}</label>
							<input type="password" class="form-control" name="old_password" id="old_password"  title="{{ __("Master.password_title") }}"  placeholder="{{ __("Master.old_password") }}">
						</div>
						<div class="form-group">
							<label for="password">{{ __("Master.password_new") }}</label>
							<input type="password" class="form-control" name="password" id="password"  title="{{ __("Master.password_title") }}"  placeholder="{{ __("Master.password_new") }}">
						</div>
						<div class="form-group form-group-last">
							<label for="rpassword">{{ __("Master.Confirm_Password") }}</label>
							<input type="password" class="form-control" name="rpassword" id="rpassword"  title="{{ __("Master.password_title") }}"  placeholder="{{ __("Master.Confirm_Password") }}">
						</div>
					</div>
					<div class="kt-portlet__foot">
						<div class="kt-form__actions">
							<button type="Submit" id="kt_ChangePassword_submit" class="btn btn-primary">{{ __("Master.Submit") }}</button>
						</div>
					</div>
				</form>
				<!--end::Form-->			
			</div>
			<!--end::Portlet-->
		</div>
	</div>	
@endSection
@section('javascript')
<script type="text/javascript">

var login = jQuery('#kt_login');

var showErrorMsg = function(form, type, msg) {
        var alert = jQuery('<div class="alert alert-' + type + ' alert-dismissible" role="alert">\
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

 var handleChangePasswordFormSubmit = function() {
       jQuery('#kt_ChangePassword_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                	old_password:{
                		required: true,
                		 minlength: 8
                	},
                    password: {
                        required: true,
                         minlength: 8
                    },
                    rpassword: {
                        required: true,
                         minlength: 8
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
              //  url: '',
                success: function(response, status, xhr, $form) {
                	if(response.isTrue === true){
                		form.clearForm();
	                    form.validate().resetForm();
                        showErrorMsg(login.children (".kt-portlet__body"), 'success', response.Message);
                    }else {
                        var Erorrs = response.Erorrs;
                        var ErrorList = "";
                        jQuery.each(Erorrs, function( index, value ) {
                            ErrorList += "<div>" +value+"</div>" ;
                        });
                        showErrorMsg(login.children (".kt-portlet__body"), 'danger', ErrorList);
                    }
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                }
            });
            return false;
        });
    }
jQuery(document).ready(function() {
   handleChangePasswordFormSubmit();

   jQuery(document).find('.form-control[required]').parent().find("label.form-control-label").append(' <span class="text-danger">*</span> ');

});

</script>
    @endSection