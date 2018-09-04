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


    $("select").on("select2:close", function (e) {
        $(this).valid(); 
    });

    $('#addProjectForm').validate({
        ignore: [], 
        rules : {
            name: {
                required : true,
                lettersonly : true,
                minlength : 3
            } , 
            start_date : {
                date : true,
                required : true
            } ,
            end_date : {
                date : true,
                required : true
            } ,
            client_id : {
                required : true
            } ,
            total_cost : {
                required : true,
                customfloat : true
            } ,
            payment_num : {
                required : true
            } ,
        } ,
        messages : {
            name : {
                required : 'الرجاء إدخال إسم المشروع',
                lettersonly : 'إسم المشروع  يجب أن يحتوي على حروف فقط',
                minlength :  'إسم المشروع يجب أن يحتوي على 3 حروف على الأقل',
            } , 
            start_date : {
                required : 'الرجاء إدخال التاريخ ',
                date : 'الرجاء إدخال تاريخ صحيح',
            } ,
            end_date : {
                required : 'الرجاء إدخال التاريخ ',
                date : 'الرجاء إدخال تاريخ صحيح',
            } ,
            client_id : {
                required : 'الرجاء إختيار العميل'
            } ,
            total_cost : {
                required : 'الرجاء إدخال تكلفة المشروع',
                customfloat : 'الرجاء إدخال مبلغ صحيح',
            } ,
            payment_num : {
                required : 'الرجاء إختيار عدد الدفعات'
            } ,
        }
    });

    $('#editProjectForm').validate({
        ignore: [], 
        rules : {
            name: {
                required : true,
                lettersonly : true,
                minlength : 3
            } , 
            start_date : {
                date : true,
                required : true
            } ,
            end_date : {
                date : true,
                required : true
            } ,
            client_id : {
                required : true
            } ,
            total_cost : {
                required : true,
                customfloat : true
            } ,
            payment_num : {
                required : true
            } ,
        } ,
        messages : {
            name : {
                required : 'الرجاء إدخال إسم المشروع',
                lettersonly : 'إسم المشروع  يجب أن يحتوي على حروف فقط',
                minlength :  'إسم المشروع يجب أن يحتوي على 3 حروف على الأقل',
            } , 
            start_date : {
                required : 'الرجاء إدخال التاريخ ',
                date : 'الرجاء إدخال تاريخ صحيح',
            } ,
            end_date : {
                required : 'الرجاء إدخال التاريخ ',
                date : 'الرجاء إدخال تاريخ صحيح',
            } ,
            client_id : {
                required : 'الرجاء إختيار العميل'
            } ,
            total_cost : {
                required : 'الرجاء إدخال تكلفة المشروع',
                customfloat : 'الرجاء إدخال مبلغ صحيح',
            } ,
            payment_num : {
                required : 'الرجاء إختيار عدد الدفعات'
            } ,
        }
    });

    $("input[name^='paymentValue']").each(function(){
        $(this).rules("add", {
            required: true,
            customfloat: true,
            messages: {
                required: 'أدخل المبلغ' ,
                customfloat : 'مبلغ غير صحيح',
            }
        });
    });

    $("input[name^='paymentDate']").each(function(){
        $(this).rules("add", {
            required: true,
            date: true,
            messages: {
                required: 'أدخل التاريخ' ,
                date : 'تاريخ غير صحيح',
            }
        });
    });

});