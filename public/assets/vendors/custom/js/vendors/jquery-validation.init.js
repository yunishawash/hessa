"use strict";
var valGetParentContainer = function(element) {
    var element = $(element);

    if ($(element).closest('.form-group-sub').length > 0) {
        return $(element).closest('.form-group-sub')
    } else if ($(element).closest('.bootstrap-select').length > 0) {
        return $(element).closest('.bootstrap-select')
    } else {
        return $(element).closest('.form-group');
    }
}

jQuery.validator.setDefaults({
    errorElement: 'div', //default input error message container
    focusInvalid: false, // do not focus the last invalid input
    ignore: "",  // validate all fields including form hidden input

    errorPlacement: function(error, element) { // render error placement for each input type
        var element = $(element);

        var group = valGetParentContainer(element);
        var help = group.find('.form-text');

        if (group.find('.valid-feedback, .invalid-feedback').length !== 0) {
            return;
        }
        jQuery(element).closest('.card').children(".card-header").children(".card-title").addClass("text-danger alert alert-danger alert-dismissible");

        element.addClass('is-invalid');
        error.addClass('invalid-feedback');

        if (help.length > 0) {
            help.before(error);
        } else {
            if (element.closest('.custom-file').length > 0) { 
              element.parent().parent().after(error);
            } else if (element.closest('.bootstrap-select').length > 0) {     //Bootstrap select
                element.closest('.bootstrap-select').find('.bs-placeholder').after(error);
            } else if (element.closest('.input-group').length > 0) {   //Bootstrap group
                element.parent().append(error);
            } else {                                                   //Checkbox & radios
                if (element.is(':checkbox')) {
                    element.closest('.kt-checkbox').find('> span').after(error);
                } else {
                  //  element.after(error);
                   element.parent().append(error);
                }                
            }            
        }
    },

    highlight: function(element) { // hightlight error inputs
        var group = valGetParentContainer(element);
        group.addClass('validate');
        group.addClass('is-invalid');
        $(element).removeClass('is-valid');
    },

    unhighlight: function(element) { // revert the change done by hightlight
        var group = valGetParentContainer(element);
        group.removeClass('validate'); 
        group.removeClass('is-invalid'); 
        $(element).removeClass('is-invalid');
        var hasValue = jQuery(element).closest('.card').find('.is-invalid');
        if(hasValue.length == 0){
            jQuery(element).closest('.card').children(".card-header").children(".card-title").removeClass("text-danger alert alert-danger alert-dismissible");
        }
    },

    success: function(label, element) {
        var group = valGetParentContainer(element);
        group.removeClass('validate');
        group.find('.invalid-feedback').remove();
    }
});

jQuery.validator.addMethod("email", function(value, element) {
    if (/^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(value)) {
        return true;
    } else {
        return false;
    }
}, "Please enter a valid Email.");