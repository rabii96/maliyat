<!--[if lt IE 9]>
    <script src="{{ asset('assets/global/plugins/respond.min.js ') }}"></script>
    <script src="{{ asset('assets/global/plugins/excanvas.min.js ') }}"></script> 
    <![endif]-->
    <!-- BEGIN CORE PLUGINS -->
    <script src="{{ asset('assets/global/plugins/jquery.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap/js/bootstrap.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/js.cookie.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/jquery.blockui.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/uniform/jquery.uniform.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js ') }}" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <script src="{{ asset('assets/global/plugins/moment.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-datepicker/locales/bootstrap-datepicker.ar.min.js ') }}" type="text/javascript"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="{{ asset('assets/global/plugins/morris/morris.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/morris/raphael-min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/counterup/jquery.waypoints.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/counterup/jquery.counterup.min.js ') }}" type="text/javascript"></script>
    
    <script src="{{ asset('assets/global/scripts/datatable.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/datatables/datatables.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/select2/js/select2.full.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/global/plugins/icheck/icheck.min.js') }}" type="text/javascript"></script>


    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="{{ asset('assets/global/scripts/app.min.js ') }}" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="{{ asset('assets/pages/scripts/dashboard.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/pages/scripts/components-date-time-pickers.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/pages/scripts/table-datatables-responsive.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/pages/scripts/components-select2.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/pages/scripts/form-icheck.min.js') }}" type="text/javascript"></script>

    <!-- END PAGE LEVEL SCRIPTS -->
    <!-- BEGIN THEME LAYOUT SCRIPTS -->
    <script src="{{ asset('assets/layouts/layout/scripts/layout.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/layouts/layout/scripts/demo.min.js ') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/layouts/global/scripts/quick-sidebar.min.js ') }}" type="text/javascript"></script>
    <!-- END THEME LAYOUT SCRIPTS -->

    <script src="{{ asset('js/jquery.validate.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/additional-methods.js') }}" type="text/javascript"></script>

    <script src="{{ asset('js/validate-users.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/validate-employees.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/validate-clients.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/validate-expense.js') }}" type="text/javascript"></script>


    
    <script>
        	 
            $(".marketplace__title").click(function(){
                $(".filters__container--collapsed .filters").toggleClass("show__sbar");
            });
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $(document).on('ready', function() {
                

                $('.dt-buttons').hide();


                $('#addTask').click(function (e){
                    e.preventDefault();
                    $.ajax ({
                        url: "{{ route('addTask') }}",
                        method: 'post',
                        data: { 'taskName': $('input[name=taskName]').val()} ,
                        dataType: 'JSON' , 
                        success: function (data){
                            $('#taskName').val('');
                            $('#tasks-wrapper').load(window.location + ' #tasks');
                        }
                    });
                });

                $('#addExpenseType').click(function (e){
                    e.preventDefault();
                    $.ajax ({
                        url: "{{ route('addExpenseType') }}",
                        method: 'post',
                        data: { 'expenseTypeName': $('input[name=expenseTypeName]').val()} ,
                        dataType: 'JSON' , 
                        success: function (data){
                            $('#expenseTypeName').val('');
                            $('#expenses-wrapper').load(window.location + ' #expenses');
                        }
                    });
                });
                

                $('#addTransferMethod').click(function (e){
                    e.preventDefault();
                    $.ajax ({
                        url: "{{ route('addTransferMethod') }}",
                        method: 'post',
                        data: { 'transferMethodName': $('input[name=transferMethodName]').val()} ,
                        dataType: 'JSON' , 
                        success: function (data){
                            $('#transferMethodName').val('');
                            $('#transferMethods-wrapper').load(window.location + ' #transferMethods');
                        }
                    });
                });

                $('#addBank').click(function (e){
                    e.preventDefault();
                    $.ajax ({
                        url: "{{ route('addBank') }}",
                        method: 'post',
                        data: {
                            'bank_name': $('input[name=bank_name]').val() ,
                            'account_number': $('input[name=account_number]').val() ,
                            'initial_balance': $('input[name=initial_balance]').val() ,
                            'iban_number': $('input[name=iban_number]').val() ,
                            'percentage_name': $('input[name=percentage_name]').val() ,
                            'percentage_value': $('input[name=percentage_value]').val() ,                            
                        } ,
                        dataType: 'JSON' , 
                        success: function (data){
                            $('#bank_name').val('');
                            $('#account_number').val('');
                            $('#initial_balance').val('');
                            $('#iban_number').val('');
                            $('#percentage_name').val('');
                            $('#percentage_value').val('');
                            $('#banks-wrapper').load(window.location + ' #banks');
                        }
                    });
                });


                $('#addPercentage').click(function (e){
                    e.preventDefault();
                    $.ajax ({
                        url: "{{ route('addPercentage') }}",
                        method: 'post',
                        data: { 
                            'percentageName': $('input[name=percentageName]').val(),
                            'percentageValue': $('input[name=percentageValue]').val(),
                            'remarks': $('#remarks').val(),
                        } ,
                        dataType: 'JSON' , 
                        success: function (data){
                            $('#percentageName').val('');
                            $('#percentageValue').val('');
                            $('#remarks').val('');
                            $('#percentages-wrapper').load(window.location + ' #percentages');
                            $('#transfer_percentage-wrapper').load(window.location + ' #transfer_percentage-div');
                        }
                    });
                });

                $('#select_from_bank').on('change', function() {
                    var v = $('#select_from_bank :selected').val();
                    $('#bank_from_number').val($('#fromB_number'+v).val());
                });


                $('#select_to_bank').on('change', function() {
                    var v = $('#select_to_bank :selected').val();
                    $('#bank_to_number').val($('#toB_number'+v).val());
                });
                $('#transfer_amount').on('keyup', function(){
                    calcNetAmount();
                });

                $('#transfer_percentage').on('change', function() {
                    calcNetAmount();
                });

                function calcNetAmount(){
                    if($('#transfer_amount').val()!=''){
                        var percentage =  $('#transfer_percentage :selected').attr('data-value');
                        if(Number(percentage) != percentage){
                            percentage = 0;
                        }else{
                            percentage = parseFloat(percentage)/100;
                        }
                        $('#transfer_percentage_value').val(parseFloat($('#transfer_amount').val()) * percentage);
                        var net = parseFloat($('#transfer_amount').val()) - parseFloat($('#transfer_amount').val()) * percentage ;
                        $('#net_transfer_amount').val(net);
                    }else{
                        $('#net_transfer_amount').val(0);
                    }
                }

                $('#addBankTransfer').click(function (e){
                    e.preventDefault();
                    var formData = new FormData();
                    var attachement = $('#attachement');
                    formData.append('transfer_amount', $('#transfer_amount').val());
                    formData.append('net_transfer_amount', $('#net_transfer_amount').val());
                    formData.append('percentage_id', $('#transfer_percentage :selected').val());
                    formData.append('transfer_percentage_value', $('#transfer_percentage_value').val());
                    formData.append('from_bank_id', $('#select_from_bank :selected').val());
                    formData.append('to_bank_id', $('#select_to_bank :selected').val());
                    formData.append('attachement', attachement[0].files[0]);

                    $.ajax ({
                        url: "{{ route('addBankTransfer') }}",
                        method: 'post',
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: formData ,
                        dataType: 'JSON' , 
                        success: function (data){
                            $('#transfer_amount').val('');
                            $('#net_transfer_amount').val('');
                            $('#transfer_percentage_value').val('0');
                            $('#dismissAttachement').click();
                            $('#select_from_bank').val(null).trigger('change');
                            $('#select_to_bank').val(null).trigger('change');
                            $('#bankTransfers-wrapper').load(window.location + ' #bankTransfers');
                            $('#banks-wrapper').load(window.location + ' #banks');
                            alert('تمت عملية التحويل بنجاح');
                        },
                        error: function(data){
                            if(data.responseText != '')
                            alert(data.responseText);
                        }
                    });
                });

                
                $('#project_name').on('change',function(e){
                    $("#payment_number option").remove();
                    $('#payment_number').val(null).trigger('change');
                    $('#paymentValue').val('');
                    $.ajax({
                        url: "{{ route('updatePaymentNumbers') }}",
                        method: 'post',
                        data: {
                            'projectId' : e.target.value
                        },
                        dataType: 'JSON' ,
                        success: function(data){
                            $('#payment_number').append(
                                '<option></option>'
                            );
                            $.each(data, function(index,payment){
                                $('#payment_number').append(
                                    '<option data-id="'+payment.id+'" value="'+payment.remaining_value+'">'+(payment.index)+'</option>'
                                )
                            });
                        }
                    });
                });

                $('#currentPaidValue').on('keyup',function(){
                    var paymentValue = parseFloat($('#paymentValue').val());
                    if(!isNaN(paymentValue)){
                        var currentPaidValue = parseFloat($('#currentPaidValue').val());
                        if(!isNaN(currentPaidValue)){
                            var x = paymentValue - currentPaidValue;
                            if(x>=0){
                                $('#currentRemainingValue').val(x);
                            }else{
                                $('#currentPaidValue').val('');
                                $('#currentRemainingValue').val(paymentValue);
                            }
                        }
                    }
                });

                $('#payment_number').on('change',function(){
                    var payment_value = $('#payment_number :selected').val();
                    $('#expected_payment_id').val($('#payment_number :selected').attr('data-id'));
                    if(payment_value){
                        $('#paymentValue').val(payment_value);
                        $('#currentRemainingValue').val(payment_value);
                    }
                });

                $('#bank_payment').on('change', function(){
                    var number = $('#bank_payment :selected').attr('data-bank_number');
                    if(number){
                        $('#bank_payment_number').val(number)
                    }
                });


                $('#payment-type').on('change', function() {
				
                    var vl = $("#payment-type :selected").val();
                    //alert(vl);
                    switch(vl) {
                        case '1':
                            $("#paypal").slideDown();
                            $("#bank").hide();
                            $("#other").hide();
                            $("#check").hide();
                            $("#default").hide();
                            $("#transfer").hide();
                            break;
                        case '2':
                            $("#bank").slideDown();
                            $("#paypal").hide();
                            $("#other").hide();
                            $("#check").hide();
                            $("#default").hide();
                            $("#transfer").hide();
                            break;
                        case '3':
                            $("#check").slideDown();
                            $("#paypal").hide();
                            $("#other").hide();
                            $("#bank").hide();
                            $("#default").hide();
                            $("#transfer").hide();
                            break;
                        case '0':
                            $("#other").slideDown();
                            $("#bank").hide();
                            $("#paypal").hide();
                            $("#check").hide();
                            $("#default").hide();
                            $("#transfer").hide();
                            break;
                        case '-1' :
                            $("#transfer").slideDown();
                            $("#bank").hide();
                            $("#paypal").hide();
                            $("#check").hide();
                            $("#default").hide();
                            $("#other").hide();
                            break;
                        default:
                            var defaultName = $("#payment-type :selected").text();
                            $("#default").hide();
                            $('#default_name').text(defaultName);
                            $("#default").slideDown();
                            $("#bank").hide();
                            $("#paypal").hide();
                            $("#check").hide();
                            $("#other").hide();
                    }
                    
                });




                // Begin Add employee scripts
                $('#transferMethodSelect').on('change', function() {
				
                    var vl = $("#transferMethodSelect :selected").val();
                    switch(vl) {
                        case '1':
                            $("#paypal").slideDown();
                            $("#bank").hide();
                            $("#other").hide();
                            $("#check").hide();
                            $("#default").hide();
                            break;
                        case '2':
                            $("#bank").slideDown();
                            $("#paypal").hide();
                            $("#other").hide();
                            $("#check").hide();
                            $("#default").hide();
                            break;
                        case '3':
                            $("#check").slideDown();
                            $("#paypal").hide();
                            $("#other").hide();
                            $("#bank").hide();
                            $("#default").hide();
                            break;
                        case '0':
                            $("#other").slideDown();
                            $("#bank").hide();
                            $("#paypal").hide();
                            $("#check").hide();
                            $("#default").hide();
                            break;
                        default:
                            var defaultName = $("#transferMethodSelect :selected").text();
                            $("#default").hide();
                            $('#default_name').text(defaultName);
                            $("#default").slideDown();
                            $("#bank").hide();
                            $("#paypal").hide();
                            $("#check").hide();
                            $("#other").hide();
                    }
                });



                

                $('#delete_employee_banks').click(function(){
                    var bankTable = document.getElementById('bank_accounts_table');
                    i=0;
                    bankTable.innerHTML = ''; 
                });



               

                $('#delete_paypal_emails').click(function(){
                    var paypalTable = document.getElementById('paypal_emails_table');
                    j=0;
                    paypalTable.innerHTML = '';
                });


                

                $('#delete_checks').click(function(){
                    var checkTable = document.getElementById('checks_table');
                    k=0;
                    checkTable.innerHTML = '';
                });


        

                $('#delete_other_methods').click(function(){
                    var otherMethodTable = document.getElementById('other_methods_table');
                    l=0;
                    otherMethodTable.innerHTML = ''; 
                });

                $('#add_employee_form').on('submit', function(){
                    $('#add_paypal_email').click();
                    $('#add_employee_bank').click();
                    $('#add_other_method').click();
                    $('#add_default').click();
                });



                $('#delete_defaults').click(function(){
                    var defaultTable = document.getElementById('defaults_table');
                    m=0;
                    defaultTable.innerHTML = '';
                });

                $('#type_id').on('change',function(e){
                    $("#project_service_id option").remove();
                    $.ajax({
                        url: "{{ route('updateProjectServiceId') }}",
                        method: 'post',
                        data: {
                            'type' : e.target.value
                        },
                        dataType: 'JSON' ,
                        success: function(data){
                            $('#project_service_id').append(
                                '<option disabled selected value="-1">-- إختر --</option>'
                            );
                            $.each(data, function(index,data){
                                $('#project_service_id').append(
                                    '<option data-type="'+data.type+'" value="'+data.id+'">'+(data.name)+'</option>'
                                )
                            });
                            $('#project_service_id').val(-1).trigger('change');
                        }
                    });
                });

                $('#employee_id').on('change', function(){
                    $("[name='showEmployees']").each(function(){
                        $(this).addClass('hidden');
                    });
                    var x = ($('#employee_id :selected').val());
                    $('#showEmployee'+x).removeClass('hidden');
                });

                $('#project_service_id').on('change',function(){
                   var type = $('#project_service_id :selected').attr('data-type');
                   $('#type').val(type);
                   var id = $('#project_service_id :selected').val();
                   $('#project_id').val('');
                   $('#service_id').val('');
                   $('#'+type+'_id').val(id);
                });



            // End Add employee scripts
                

                // Without Search
                $(".select-hide").select2({
                    dir: "rtl",
                    minimumResultsForSearch: Infinity
                });
                        
                
                
                $('#payment-num').on('change', function() {
                    if($('#changed_payments').val() == 'false'){
                        $('#changed_payments').val('true');
                    }
                    $("#payment-container").slideDown();
                    var num = $('#payment-num :selected').text();
                    $("#payment-list li").remove();
                    for (i = 1; i <= num; i++) {
                        $("#payment-list").append(
                            '<li><div class="form-inline"><div class="form-group"><label class="sr-only">القيمة</label><div class="input-icon"><i class="fa fa-money font-green"></i><input type="text" dir="ltr" style="text-align: right" name="paymentValue[]" id="paymentValue'+i+'"  onkeyup="updateCost('+i+');" class="form-control w-100" placeholder="القيمة" > </div></div><div class="form-group"><label class="sr-only">تاريخ الدفعة</label><div class="input-icon"><i class="fa fa-calendar-check-o font-green "></i><input type="text" name="paymentDate[]" id="paymentDate'+i+'" class="form-control date" placeholder="تاريخ الدفعة"> </div></div></div><hr></li>'
                        );
                    }
                    var total_cost = parseFloat ($('#total_cost').val());
                    var last = $('#payment-num :selected').text();
                    if(!isNaN(total_cost)){
                        $('#paymentValue'+last).val(total_cost);
                    }
                });

                $('#value').on('keyup',function(){
                    calcValuePlusPercentage();
                });

                $('#percentage_id').on('change', function(){
                    calcValuePlusPercentage();
                });

                function calcValuePlusPercentage(){
                    var value = parseFloat($('#value').val());
                        if(!isNaN(value)){
                            var per_sum = 0;
                            $('#percentage_id :selected').each(function(){
                                var percentage = $(this).attr('data-value');
                                if(Number(percentage) != percentage){
                                    percentage = 0;
                                }else{
                                    percentage = parseFloat(percentage)/100;
                                }
                                per_sum+= percentage;
                            });
                            value = value + (value * per_sum);
                            $('#value_plus_percentage').val(value);
                        } else{
                            $('#value_plus_percentage').val('');
                        }
                }

                


                //Date Pickers
                $('.date').datepicker({
                    autoclose: true,
                    todayHighlight: true,
                    language: "ar"
                });
                
                $("#payment-container").delegate("input[type=text].date", "focusin", function(){
                    $(this).datepicker({
                        autoclose: true,
                        todayHighlight: true,
                        language: "ar"
                    });
                });



            // Without Search
			$(".select-hide").select2({
				dir: "rtl",
				minimumResultsForSearch: Infinity
			});
			
			

                
                          
            });	
        		 

    </script>