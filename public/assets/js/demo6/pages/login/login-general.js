"use strict";
//jQuery(".kt-login__container").attr("style","width:400px !important;");
// Class Definition
var KTLoginGeneral = function() {

    var login = $('#kt_login');

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
    // Private Functions
    var displaySignUpForm = function() {
        login.removeClass('kt-login--forgot');
        login.removeClass('kt-login--signin');
        jQuery(".kt-login__container").removeAttr("style");
        login.addClass('kt-login--signup');
        KTUtil.animateClass(login.find('.kt-login__signup')[0], 'flipInX animated');
    }

    var displaySignInForm = function() {
        login.removeClass('kt-login--forgot');
        login.removeClass('kt-login--signup');
    //    jQuery(".kt-login__container").attr("style","width:400px !important;");
        login.addClass('kt-login--signin');
        KTUtil.animateClass(login.find('.kt-login__signin')[0], 'flipInX animated');
        //login.find('.kt-login__signin').animateClass('flipInX animated');
    }

    var displayForgotForm = function() {
        login.removeClass('kt-login--signin');
        login.removeClass('kt-login--signup');

        login.addClass('kt-login--forgot');
        //login.find('.kt-login--forgot').animateClass('flipInX animated');
        KTUtil.animateClass(login.find('.kt-login__forgot')[0], 'flipInX animated');

    }

    var handleFormSwitch = function() {
        $('#kt_login_forgot').click(function(e) {
            e.preventDefault();
            displayForgotForm();
        });

        $('#kt_login_forgot_cancel').click(function(e) {
            e.preventDefault();
            displaySignInForm();
        });

        $('#kt_login_signup').click(function(e) {
            e.preventDefault();
            displaySignUpForm();
        });

        $('#kt_login_signup_cancel').click(function(e) {
            e.preventDefault();
            displaySignInForm();
        });
    }

    var handleSignInFormSubmit = function() {
        $('#kt_login_signin_submit').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
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
                url: '',
                success: function(response, status, xhr, $form) {
                    if(response.isTrue === true){
                        showErrorMsg(form, 'success', response.Message);
                        location.href = response.Redirect;
                    }else {
                        var Erorrs = response.Erorrs;
                        var ErrorList = "";
                        jQuery.each(Erorrs, function( index, value ) {
                            ErrorList += "<div> " +value+"</div>" ;
                        });
                        showErrorMsg(form, 'danger', ErrorList);
                    }
                    btn.removeClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', false);
                }
            });
        });
    }

    var handleSignUpFormSubmit = function() {
        $('#serviceProvider_Info_Accordion').find('.form-control[required]').parent().find("label.form-control-label").append(' <span class="text-danger">*</span> ');
        $('#sp_gender').select2({
             placeholder: jQuery('#sp_gender').attr("placeholder")
        });
        $('#sp_working_status').select2({
             placeholder: jQuery('#sp_working_status').attr("placeholder")
        });
        $('#sp_community').select2({
             placeholder: jQuery('#sp_community').attr("placeholder")
        });
        $('#sp_high_school_branch').select2({
             placeholder: jQuery('#sp_high_school_branch').attr("placeholder")
        });
        $('#sp_educational_level_degree').select2({
             placeholder: jQuery('#sp_educational_level_degree').attr("placeholder")
        });
        $('#sp_study_year').select2({
             placeholder: jQuery('#sp_study_year').attr("placeholder")
        });
        $('#sp_ability_to_teach_at_home').select2({
             placeholder: jQuery('#sp_ability_to_teach_at_home').attr("placeholder")
        });
        $('#sp_ability_to_teach_levels_placeholder').select2({
             placeholder: jQuery('#sp_ability_to_teach_levels_placeholder').attr("placeholder")
        });
        $('#sp_ability_to_teach_levels').select2({
             placeholder: jQuery('#sp_ability_to_teach_levels').attr("placeholder")
        });
        $('#sp_ability_to_teach_days').select2({
             placeholder: jQuery('#sp_ability_to_teach_days').attr("placeholder")
        });
        $('#sp_targeted_gender_to_teach').select2({
             placeholder: jQuery('#sp_targeted_gender_to_teach').attr("placeholder")
        });

        let topics = [1, 2];


        $('#topics').select2({
            placeholder: {
                id: '-1', // the value of the option
                text: jQuery('#topics').attr("placeholder")
            },
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

                    topics = data.data;

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


        $('#topics').change(function (e) {
            if ($('#topics').select2('val')[0] == -1) {

                let stringTopics = [];
                topics.forEach(element => {
                    if (element.topic_id != -1) {
                        stringTopics.push(element.topic_id);
                    }
                });

                console.log(stringTopics);
                
                $('#topics').val(stringTopics).trigger('change');
            }
        });

        $('#languages').select2({
            placeholder: {
                id: '-1', // the value of the option
                text: jQuery('#languages').attr("placeholder")
            },
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

        $('#fk_as_id').select2({
             placeholder: jQuery('#fk_as_id').attr("placeholder"),
             ajax: {
                url: "/lookups/specializations",
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
                                text: item.as_name,
                                id: item.as_id
                            }
                        })
                    };
                }
            }
        });
        $('#fk_univ_id').select2({
             placeholder: jQuery('#fk_univ_id').attr("placeholder"),
             ajax: {
                url: "/lookups/universities",
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
                                text: item.univ_name,
                                id: item.univ_id
                            }
                        })
                    };
                }
            }
        });


        $('#fk_district_id').select2({
             placeholder: jQuery('#fk_district_id').attr("placeholder"),
             ajax: {
                url: "/lookups/districts",
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
                                text: item.district_name,
                                id: item.district_id
                            }
                        })
                    };
                }
            }
        });


        $('#fk_district_id').change(function(){
            jQuery('#fk_location_id').select2("val", "");
            jQuery('#fk_location_id').val("").trigger('change');
        });

        $('#sp_ability_to_teach_levels').change(function (e) {
            if ($('#sp_ability_to_teach_levels').select2('val')[0] == 'All') {
                var levels = ["primary", "secondary", "high"];
                $(this).val(levels).trigger('change');
            }
        });

        $('#sp_ability_to_teach_days').change(function (e) {
            if ($('#sp_ability_to_teach_days').select2('val')[0] == 'All') {
                var days = ["Saturday", "Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday"];
                $(this).val(days).trigger('change');
            }
        });

        $('#sp_gpa').on('change', function(){
          $("#sp_univ_avg").val($(this).val()*25);
        });

        $('#sp_univ_avg').on('change', function(){
          $("#sp_gpa").val($(this).val()/25);
        });

        $('#fk_location_id').select2({
             placeholder: jQuery('#fk_location_id').attr("placeholder"),
              ajax: {
                url: "/lookups/locations",
                dataType: 'json',
                type: "POST",
                data: function (params) {
                    var queryParameters = {
                        district_id: jQuery('#fk_district_id').val(),
                        term: params.term
                    }
                    return queryParameters;
                },
                processResults: function (data) {
                    return {
                        results: $.map(data.data, function (item) {
                            return {
                                text: item.location_name,
                                id: item.location_id
                            }
                        })
                    };
                }
            }
        });
        // adding the masks to the inputs
        $("#sp_land_line_number").inputmask({
            "mask": "99-9999999",
            placeholder: "00-0000000" // remove underscores from the input mask
        });

        $("#sp_mobile").inputmask({
            "mask": "9999-999999",
            placeholder: "0500-000000" // remove underscores from the input mask
        });

        jQuery("#sp_emergency_number").inputmask({
            "mask": "9999-999999",
            placeholder: "0500-000000" // remove underscores from the input mask
        });

        jQuery("#sp_id_number").inputmask({
            "mask": "999999999",
            placeholder: "999999999" // remove underscores from the input mask
        });

        jQuery("#sp_gpa").inputmask({
            "mask": "9.99",
            placeholder: "0.00" // remove underscores from the input mask
        });

        jQuery("#sp_univ_avg").inputmask({
            "mask": "99.9",
            placeholder: "00.0" // remove underscores from the input mask
        });

        jQuery.validator.addMethod("Equal", function(value, element, param) {
          return this.optional(element) || value != param;
        }, "Please specify a different (non-default) value");

        $('#kt_login_signup_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    sp_full_name: {
                        required: true
                    },
                    sp_personal_passport_img_url: {
                        required: true
                    },
                    sp_gender: {
                        required: true
                    },
                    sp_facebook_id: {
                        required: true
                    },
                    sp_mobile: {
                        required: true,
                    },
                    sp_community: {
                        required: true
                    },
                    sp_email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 8
                    },
                    sp_emergency_number: {
                        required: true,
                    },
                    sp_working_status: {
                        required: true
                    },
                    fk_location_id: {
                        required: true
                    },
                    sp_id_number:{
                        required: true,
                        digits: true,
                        minlength: 9
                    },sp_ability_to_teach_at_home :{
                        Equal: "no",
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                url: '/serviceProvider/selfStore',
                success: function(response, status, xhr, $form) {

                    if(response.isTrue === true){

                         form.clearForm();
                        form.validate().resetForm();

                        // display signup form
                        displaySignInForm();
                        var signInForm = login.find('.kt-login__signin form');
                        signInForm.clearForm();
                        signInForm.validate().resetForm();
                        jQuery(".kt-select2").select2("val", "");
                        jQuery(".kt-select2").val("").trigger('change');
                        showErrorMsg(signInForm, 'success', response.Message);
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
    }

    var handleForgotFormSubmit = function() {
        $('#kt_login_forgot_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('kt-spinner kt-spinner--right kt-spinner--sm kt-spinner--light').attr('disabled', true);

            form.ajaxSubmit({
                url: '/auth/forgetPassword',
                dataType: 'json',
                type: "POST",
                success: function(response, status, xhr, $form) {

                    if(response.isTrue === true){
                        form.clearForm();
                        form.validate().resetForm();
                        // display signup form
                        displaySignInForm();
                        var signInForm = login.find('.kt-login__signin form');
                        signInForm.clearForm();
                        signInForm.validate().resetForm();
                        jQuery(".kt-select2").select2("val", "");
                        jQuery(".kt-select2").val("").trigger('change');
                        showErrorMsg(signInForm, 'success', response.Message);
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
    }

    // Public Functions
    return {
        // public functions
        init: function() {
            handleFormSwitch();
            handleSignInFormSubmit();
            handleSignUpFormSubmit();
            handleForgotFormSubmit();
        }
    };

}();

// Class Initialization
jQuery(document).ready(function() {
    KTLoginGeneral.init();
});
