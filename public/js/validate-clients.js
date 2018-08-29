$(function(){

    $.validator.setDefaults({
        errorClass : 'help-block' ,
        highlight : function(element){
            $(element)
            .closest('.form-group')
            .addClass('has-error');
        },
        unhighlight : function(element){
            $(element)
            .closest('.form-group')
            .removeClass('has-error');
        }
    });

    $.validator.addMethod( "lettersonly", function( value, element ) {
        return this.optional( element ) || /^[a-zأ-ي ﻻءﻵ]+$/i.test( value );
    });

    
    $('#addClientForm').validate({
        rules: {
            name : {
                required : true,
                lettersonly : true,
                minlength : 3,
            }
        },
        messages : {
            name : {
                required : 'الرجاء إدخال الإسم.',
                lettersonly : 'الإسم  يجب أن يحتوي على حروف فقط.',
                minlength :  'الإسم يجب أن يحتوي على 3 حروف على الأقل.',
            }
        }
    });

});