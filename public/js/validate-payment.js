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

    $.validator.addMethod('customnumber', function (value, element) {
        return this.optional(element) || /^[0-9][0-9  -]*$/.test(value);
    });

    $.validator.addMethod( "lettersonly", function( value, element ) {
        return this.optional( element ) || /^[a-zأ-ي ﻻءﻵ]+$/i.test( value );
    });

    $.validator.addMethod('customfloat', function (value, element) {
        return this.optional(element) || /^[0-9][0-9]*[.]?[0-9]*$/.test(value);
    });

    
    $.validator.addMethod('paypalEmail' , function (){
        var type = $('#payment-type :selected').text();
        if((type == 'باي بال') && ($('#paypal_email').val()=='')){
            return false;
        }else{
            return true;
        }
    });
    
    $.validator.addMethod('transfererName' , function (){
        var type = $('#payment-type :selected').text();
        if((type == 'كاش') && ($('#transferer_name').val()=='')){
            return false;
        }else{
            return true;
        }
    });

    $.validator.addMethod('dateCash' , function (){
        var type = $('#payment-type :selected').text();
        if((type == 'كاش') && ($('#date_cash').val()=='')){
            return false;
        }else{
            return true;
        }
    });

    $.validator.addMethod('bank_bankName' , function (){
        var type = $('#payment-type :selected').text();
        if((type == 'بنك') && ($('#from_bank_id').val()=='')){
            return false;
        }else{
            return true;
        }
    });

    $.validator.addMethod('fromBankNumber' , function (){
        var type = $('#payment-type :selected').text();
        if((type == 'بنك') && ($('#from_bank_number').val()=='')){
            return false;
        }else{
            return true;
        }
    });
    
    $.validator.addMethod('otherNumber' , function (){
        var type = $('#payment-type :selected').text();
        if((type == 'أخرى') && ($('#other_number').val()=='')){
            return false;
        }else{
            return true;
        }
    });

    $.validator.addMethod('defaultNumber' , function (){
        var type = $('#payment-type :selected').text();
        if((type == 'كاش') && (type != 'شيك') && (type != 'بنك') && (type != 'باي بال') && (type != 'أخرى') && ($('#default_number').val()=='')){
            return false;
        }else{
            return true;
        }
    });

    $("select").on("select2:close", function (e) {
        $(this).valid(); 
    });

    $('#addPaymentForm').validate({
        rules : {
            project_id : {
                required : true,
            } ,
            payment_number : {
                required : true,
            } ,
            currentPaidValue : {
                required : true,
                customfloat : true,
            } ,
            transfer_method : {
                required : true
            } ,
            to_bank_id : {
                required : true
            } ,
            paypal_email : {
                paypalEmail : true,
                email : true
            } ,
            transferer_name : {
                transfererName : true,
                lettersonly : true,
                minlength : 3
            } ,
            date_cash : {
                date : true,
                dateCash : true
            } ,
            from_bank_id : {
                bank_bankName : true
            } ,
            from_bank_number : {
                customnumber : true,
                fromBankNumber : true,
            } ,
            other_number : {
                customnumber : true,
                otherNumber : true
            } ,
            default_number : {
                customnumber : true,
                otherNumber : true
            } 
        },
        messages : {
            project_id : {
                required : 'الرجاء إختيار إسم المشروع.'
            } ,
            payment_number : {
                required : 'الرجاء إختيار رقم الدفعة.'
            } ,
            currentPaidValue : {
                required : 'الرجاء إدخال مبلغ صحيح.',
                customfloat : 'الرجاء إدخال مبلغ صحيح.',
            } ,
            transfer_method : {
                required : 'الرجاء إختيار نوع الدفعة.'
            } ,
            to_bank_id : {
                required : 'الرجاء إختيار البنك المحول اليه.'
            } ,
            paypal_email : {
                paypalEmail : 'الرجاء إدخال حساب الباى بال.',
                email: 'الرجاء إدخال إيميل صحيح.',
            } ,
            transferer_name : {
                transfererName : 'الرجاء إدخال اسم المحول.',
                lettersonly : 'اسم المحول  يجب أن يحتوي على حروف فقط.',
                minlength :  'الإسم يجب أن يحتوي على 3 حروف على الأقل.',
            } ,
            date_cash : {
                dateCash : 'الرجاء إدخال التاريخ .',
                date : 'الرجاء إدخال تاريخ صحيح.',
            } ,
            from_bank_id : {
                bank_bankName : 'الرجاء إختيار اسم البنك.'
            } ,
            from_bank_number : {
                customnumber : 'الرجاء إدخال رقم حساب صحيح.',
                fromBankNumber : 'الرجاء إدخال رقم الحساب.',
            } ,
            other_number : {
                customnumber : 'الرجاء إدخال رقم حساب صحيح.',
                otherNumber : 'الرجاء إدخال رقم الحساب.',
            } ,
            default_number : {
                customnumber : 'الرجاء إدخال رقم حساب صحيح.',
                defaultNumber : 'الرجاء إدخال رقم الحساب.',
            }
        }
    });

});