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
        },
        errorPlacement : function(error,element){
            if(element.prop('type') === 'select-one'){
                error.insertAfter(element.next());
            }else{
                error.insertAfter(element);
            }
        }
    });

    $.validator.addMethod( "lettersonly", function( value, element ) {
        return this.optional( element ) || /^[a-zأ-ي ﻻءﻵ]+$/i.test( value );
    });

    $.validator.addMethod('customfloat', function (value, element) {
        return this.optional(element) || /^[0-9][0-9]*[.]?[0-9]*$/.test(value);
    });

    $('#addServiceForm').validate({
        rules : {
            name: {
                required : true,
                lettersonly : true,
                minlength : 3
            } , 
            start_date : {
                date : true,
            } ,
            end_date : {
                date : true,
            } ,
            total_cost : {
                customfloat : true
            } ,
        } ,
        messages : {
            name : {
                required : 'الرجاء إدخال إسم الخدمة',
                lettersonly : 'إسم الخدمة  يجب أن يحتوي على حروف فقط',
                minlength :  'إسم الخدمة يجب أن يحتوي على 3 حروف على الأقل',
            } , 
            start_date : {
                date : 'الرجاء إدخال تاريخ صحيح',
            } ,
            end_date : {
                date : 'الرجاء إدخال تاريخ صحيح',
            } ,
            total_cost : {
                customfloat : 'الرجاء إدخال مبلغ صحيح',
            } ,
        }
    });

    $('#editServiceForm').validate({
        rules : {
            name: {
                required : true,
                lettersonly : true,
                minlength : 3
            } , 
            start_date : {
                date : true,
            } ,
            end_date : {
                date : true,
            } ,
            total_cost : {
                customfloat : true
            } ,
        } ,
        messages : {
            name : {
                required : 'الرجاء إدخال إسم الخدمة',
                lettersonly : 'إسم الخدمة  يجب أن يحتوي على حروف فقط',
                minlength :  'إسم الخدمة يجب أن يحتوي على 3 حروف على الأقل',
            } , 
            start_date : {
                date : 'الرجاء إدخال تاريخ صحيح',
            } ,
            end_date : {
                date : 'الرجاء إدخال تاريخ صحيح',
            } ,
            total_cost : {
                customfloat : 'الرجاء إدخال مبلغ صحيح',
            } ,
        }
    });
});