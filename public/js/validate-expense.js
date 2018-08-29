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

    $.validator.addMethod('customfloat', function (value, element) {
        return this.optional(element) || /^[0-9][0-9]*[.]?[0-9]*$/.test(value);
    });

    $("select").on("select2:close", function (e) {
        $(this).valid(); 
    });

    $('#addExpenseForm').validate({
        rules : {
            name: {
                required : true,
                lettersonly : true,
                minlength : 3
            } , 
            type : {
                required : true
            } ,
            project_service_id : {
                required : true
            } ,
            employee_id : {
                required : true
            } ,
            bank_id : {
                required : true
            } ,
            transfer_method_id : {
                required : true
            } ,
            value : {
                required : true ,
                customfloat : true
            } ,
            percentage_id : {
                required : true
            } ,
            date : {
                date : true,
                required : true
            }
        } ,
        messages : {
            name : {
                required : 'الرجاء إدخال إسم المصروف.',
                lettersonly : 'إسم المصروف  يجب أن يحتوي على حروف فقط.',
                minlength :  'إسم المصروف يجب أن يحتوي على 3 حروف على الأقل.',
            } , 
            type : {
                required : 'الرجاء إختيار النوع.'
            } ,
            project_service_id : {
                required : 'الرجاء إختيار اسم المشروع/الخدمة.'
            } ,
            employee_id : {
                required : 'الرجاء إختيار صاحب المصروف.'
            } ,
            bank_id : {
                required : 'الرجاء إختيار الحساب المحول منه.'
            } ,
            transfer_method_id : {
                required : 'الرجاء إختيار طريقة التحويل.'
            } ,
            value : {
                required : 'الرجاء إدخال المبلغ.',
                customfloat : 'الرجاء إدخال مبلغ صحيح.',
            } ,
            percentage_id : {
                required : 'الرجاء إختيار نسبة.'
            } ,
            date : {
                required : 'الرجاء إدخال التاريخ .',
                date : 'الرجاء إدخال تاريخ صحيح.',
            }
        }
    });

});