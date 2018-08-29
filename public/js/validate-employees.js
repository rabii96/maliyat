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

    $.validator.addMethod('customphone', function (value, element) {
        return this.optional(element) || /^[+]?[0-9 ]*$/.test(value);
    });

    $.validator.addMethod('customnumber', function (value, element) {
        return this.optional(element) || /^[0-9][0-9  -]*$/.test(value);
    });

    $.validator.addMethod('paypalEmail' , function (){
        var type = $('#transferMethodSelect :selected').text();
        if((type == 'باي بال') && ($('#paypal_email').val()=='')){
            var emails = [];
            $("[name='paypal_emails[]']").each(function(value){
                emails.push($(this).val());
            });
            if(emails == ''){
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    });

    $.validator.addMethod('checkNumber' , function (){
        var type = $('#transferMethodSelect :selected').text();
        if((type == 'شيك') && ($('#check_number').val()=='')){
            var check_numbers = [];
            $("[name='check_numbers[]']").each(function(value){
                check_numbers.push($(this).val());
            });
            if(check_numbers == ''){
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    });

    $.validator.addMethod('bankNumber' , function (){
        var type = $('#transferMethodSelect :selected').text();
        if((type == 'بنك') && ($('#bank_account_number').val()=='')){
            var bank_numbers = [];
            $("[name='employee_bank_numbers[]']").each(function(value){
                bank_numbers.push($(this).val());
            });
            if(bank_numbers == ''){
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    });

    $.validator.addMethod('bankName' , function (){
        var type = $('#transferMethodSelect :selected').text();
        if((type == 'بنك') && ($('#bank_name').val()=='')){
            var bank_names = [];
            $("[name='employee_bank_names[]']").each(function(value){
                bank_names.push($(this).val());
            });
            if(bank_names == ''){
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    });

    $.validator.addMethod('otherName' , function (){
        var type = $('#transferMethodSelect :selected').text();
        if((type == 'أخرى') && ($('#other_method_name').val()=='')){
            var other_names = [];
            $("[name='other_method_names[]']").each(function(value){
                other_names.push($(this).val());
            });
            if(other_names == ''){
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    });

    $.validator.addMethod('otherNumber' , function (){
        var type = $('#transferMethodSelect :selected').text();
        if((type == 'أخرى') && ($('#other_method_number').val()=='')){
            var other_numbers = [];
            $("[name='other_method_numbers[]']").each(function(value){
                other_numbers.push($(this).val());
            });
            if(other_numbers == ''){
                return false;
            }else{
                return true;
            }
        }else{
            return true;
        }
    });

    $.validator.addMethod('defaultNumber' , function (){
        var type = $('#transferMethodSelect :selected').text();
        if(type == '-- إختر --'){
            return true;
        }
        if((type != 'شيك') && (type != 'بنك') && (type != 'باي بال') && (type != 'أخرى') && ($('#default_account_number').val()=='')){
                var default_numbers = [];
                $("[name='default_account_numbers[]']").each(function(value){
                    default_numbers.push($(this).val());
                });
                if(default_numbers == ''){
                    return false;
                }else{
                    return true;
                }
        }else{
            return true;
        }
    });

    $('#add_employee_bank').click(function(){
        var bankName = $('#bank_name').val();
        var bankNumber = $('#bank_account_number').val();
        $('#bank_account_number').valid() ;
        $('#bank_name').valid();
        if(($('#bank_account_number').valid()) && ($('#bank_name').valid())){
            if((bankName!='')&&(bankNumber!='')){
                var bankTable = document.getElementById('bank_accounts_table');
                i++;
                bankTable.innerHTML += 
                "<tr>"+
                    "<td>"+i+"</td>"+
                    "<td>"+bankName+"</td>"+
                    "<input type='hidden' name='employee_bank_names[]'' value='"+bankName+"'>"+
                    "<td>"+bankNumber+"</td>"+
                    "<input type='hidden' name='employee_bank_numbers[]' value='"+bankNumber+"'>"+
                "</tr>";
                $('#bank_name').val('');
                $('#bank_account_number').val('');                 
            }
        }
    });


    $('#add_paypal_email').click(function(){
        var paypalEmail = $('#paypal_email').val();
        if($('#paypal_email').valid()){
            if(paypalEmail!=''){
                var paypalTable = document.getElementById('paypal_emails_table');
                j++;
                paypalTable.innerHTML += 
                "<tr>"+
                    "<td>"+j+"</td>"+
                    "<td>"+paypalEmail+"</td>"+
                    "<input type='hidden' name='paypal_emails[]'' value='"+paypalEmail+"'>"+
                "</tr>";
                $('#paypal_email').val('');
            }
        }
    });

    $('#add_other_method').click(function(){
        var otherMethodName = $('#other_method_name').val();
        var otherMethodNumber = $('#other_method_number').val();
        $('#other_method_name').valid();
        $('#other_method_number').valid();
        if(($('#other_method_name').valid()) && ($('#other_method_number').valid())){
            if((otherMethodName!='')&&(otherMethodNumber!='')){
                var otherMethodTable = document.getElementById('other_methods_table');
                l++;
                otherMethodTable.innerHTML += 
                "<tr>"+
                    "<td>"+l+"</td>"+
                    "<td>"+otherMethodName+"</td>"+
                    "<input type='hidden' name='other_method_names[]'' value='"+otherMethodName+"'>"+
                    "<td>"+otherMethodNumber+"</td>"+
                    "<input type='hidden' name='other_method_numbers[]' value='"+otherMethodNumber+"'>"+
                "</tr>";
                $('#other_method_name').val('');
                $('#other_method_number').val('');
            }
        }
    });

    $('#add_check').click(function(){
        var checkNumber = $('#check_number').val();
        if($('#check_number').valid()){
            if(checkNumber!=''){
                var checkTable = document.getElementById('checks_table');
                k++;
                checkTable.innerHTML += 
                "<tr>"+
                    "<td>"+k+"</td>"+
                    "<td>"+checkNumber+"</td>"+
                    "<input type='hidden' name='check_numbers[]'' value='"+checkNumber+"'>"+
                "</tr>";
                $('#check_number').val('');                 
            }
        }
    });

    $('#add_default').click(function(){
        var defaultNumber = $('#default_account_number').val();
        if($('#default_account_number').valid()){
            if(defaultNumber!=''){
                var defaultTable = document.getElementById('defaults_table');
                m++;
                defaultTable.innerHTML += 
                "<tr>"+
                    "<td>"+m+"</td>"+
                    "<td>"+defaultNumber+"</td>"+
                    "<input type='hidden' name='default_account_numbers[]'' value='"+defaultNumber+"'>"+
                "</tr>";
                $('#default_account_number').val('');
            }
        }
    });


    $("select").on("select2:close", function (e) {
        $(this).valid(); 
    });
    
    

    $('#add_employee_form').validate({
        ignore: [], 
        rules : {
            name: {
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
            employee_task : {
                required : true,
            } ,
            transferMethodSelect : {
                required : true,
            },
            paypal_email : {
                email : true,
                paypalEmail : true,
            } ,
            check_number : {
                checkNumber : true,
                customnumber : true,
                minlength : 6,
            } , 
            bank_name : {
                bankName : true,
                minlength : 2,
                lettersonly : true,
            } ,
            bank_account_number : {
                bankNumber : true,
                customnumber : true,
                minlength : 6
            } ,
            other_method_name : {
                otherName : true,
                minlength : 2,
                lettersonly : true,
            } ,
            other_method_number : {
                otherNumber : true,
                customnumber : true,
                minlength : 6
            } ,
            default_account_number : {
                defaultNumber : true,
                customnumber : true,
                minlength : 6
            }
        } ,
        messages : {
            name : {
                required : 'الرجاء إدخال الإسم.',
                lettersonly : 'الإسم  يجب أن يحتوي على حروف فقط.',
                minlength :  'الإسم يجب أن يحتوي على 3 حروف على الأقل.',
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
            employee_task : {
                required : 'الرجاء إختيار المهمة.'
            } , 
            transferMethodSelect : {
                required : 'الرجاء إختيار طريقة التحويل.'
            } , 
            paypal_email : {
                email: 'الرجاء إدخال إيميل صحيح.',
                paypalEmail : 'الرجاء إدخال إيميل واحد على الأقل.',
            } ,
            check_number : {
                checkNumber : 'الرجاء إدخال رقم شيك واحد على الأقل.',
                customnumber : 'الرجاء إدخال رقم شيك صحيح.',
                minlength : 'الرجاء إدخال رقم شيك صحيح.',
            } ,
            bank_name : {
                bankName : 'الرجاء إدخال إسم بنك واحد على الأقل.',
                minlength : 'الرجاء إدخال إسم بنك صحيح.',
                lettersonly : 'الرجاء إدخال إسم بنك صحيح.',
            } ,
            bank_account_number : {
                bankNumber : 'الرجاء إدخال رقم حساب واحد على الأقل.',
                customnumber : 'الرجاء إدخال رقم حساب صحيح.',
                minlength : 'الرجاء إدخال رقم حساب صحيح.',
            } ,
            other_method_name : {
                otherName : 'الرجاء إدخال إسم طريقة تحويل واحدة على الأقل.',
                minlength : 'الرجاء إدخال إسم طريقة تحويل صحيحة.',
                lettersonly : 'الرجاء إدخال إسم طريقة تحويل صحيحة.',
            } ,
            other_method_number : {
                otherNumber : 'الرجاء إدخال رقم حساب واحد على الأقل.',
                customnumber : 'الرجاء إدخال رقم حساب صحيح.',
                minlength : 'الرجاء إدخال رقم حساب صحيح.',
            } ,
            default_account_number : {
                defaultNumber : 'الرجاء إدخال رقم حساب واحد على الأقل.',
                customnumber : 'الرجاء إدخال رقم حساب صحيح.',
                minlength : 'الرجاء إدخال رقم حساب صحيح.',
            }
        }
    });
});