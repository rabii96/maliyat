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
        return this.optional( element ) || /^[a-zأ-ي ]+$/i.test( value );
    });

    $.validator.addMethod('customphone', function (value, element) {
        return this.optional(element) || /^[+]?[0-9 ]*$/.test(value);
    }, "Please enter a valid phone number");
    
    $.validator.addClassRules('customphone', {
        customphone: true
    });
    
    $('#add_user_form').validate({
        rules : {
            username: {
                required : true,
                lettersonly : true,
                minlength : 3
            } , 
            email : {
                required : true,
                email: true
            } ,
            phone : {
                required : true,
                customphone : true,
                minlength : 8,
            } , 
            password : {
                required : true,
                minlength : 8,
            }
        } ,
        messages : {
            username : {
                required : 'الرجاء إدخال اسم المستخدم.',
                lettersonly : 'اسم المستخدم يجب أن يحتوي على حروف فقط.',
                minlength :  'اسم المستخدم يجب أن يحتوي على 3 حروف على الأقل.',
            } , 
            email : {
                required : 'الرجاء إدخال الإيميل.',
                email: 'الرجاء إدخال إيميل صحيح.'
            } ,
            phone : {
                required : 'الرجاء إدخال رقم الجوال.',
                customphone : 'الرجاء إدخال رقم جوال صحيح.',
                minlength : 'الرجاء إدخال رقم جوال صحيح.',
            },
            password : {
                required : 'الرجاء إدخال كلمة المرور.',
                minlength :  'كلمة المرور يجب أن تحتوي على 8 رموز على الأقل.',
            } , 
        }
    });
});