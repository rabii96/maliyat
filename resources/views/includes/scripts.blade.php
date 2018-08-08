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
    
    <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            $(document).on('ready', function() {

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




                $('#payment-type').on('change', function() {
				
                    var vl = $("#payment-type :selected").val();
                    //alert(vl);
                    switch(vl) {
                        case '1':
                            $("#check").slideDown();
                            $("#paypal").hide();
                            $("#transfer").hide();
                            break;
                        case '2':
                            $("#paypal").slideDown();
                            $("#check").hide();
                            $("#transfer").hide();
                            break;
                        case '3':
                            $("#transfer").slideDown();
                            $("#check").hide();
                            $("#paypal").hide();
                            break;
                        default:
                            
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



                $('#add_employee_bank').click(function(){
                    var bankName = $('#bank_name').val();
                    var bankNumber = $('#bank_account_number').val();
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
                });

                $('#delete_employee_banks').click(function(){
                    var bankTable = document.getElementById('bank_accounts_table');
                    i=0;
                    bankTable.innerHTML = ''; 
                });



                $('#add_paypal_email').click(function(){
                    var paypalEmail = $('#paypal_email').val();
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
                });

                $('#delete_paypal_emails').click(function(){
                    var paypalTable = document.getElementById('paypal_emails_table');
                    j=0;
                    paypalTable.innerHTML = '';
                });


                $('#add_check').click(function(){
                    var checkNumber = $('#check_number').val();
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
                });

                $('#delete_checks').click(function(){
                    var checkTable = document.getElementById('checks_table');
                    k=0;
                    checkTable.innerHTML = '';
                });


                $('#add_other_method').click(function(){
                    var otherMethodName = $('#other_method_name').val();
                    var otherMethodNumber = $('#other_method_number').val();
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
                });

                $('#delete_other_methods').click(function(){
                    var otherMethodTable = document.getElementById('other_methods_table');
                    l=0;
                    otherMethodTable.innerHTML = ''; 
                });


                
                $('#add_default').click(function(){
                    var defaultNumber = $('#default_account_number').val();
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
                });

                $('#delete_defaults').click(function(){
                    var defaultTable = document.getElementById('defaults_table');
                    m=0;
                    defaultTable.innerHTML = '';
                });



            // End Add employee scripts
                

                // Without Search
                $(".select-hide").select2({
                    dir: "rtl",
                    minimumResultsForSearch: Infinity
                });
                        
                
                
                $('#payment-num').on('change', function() {
                    $("#payment-container").slideDown();
                    var num = $('#payment-num :selected').text();
                    $("#payment-list li").remove();
                    for (i = 0; i < num; i++) {
                        $("#payment-list").append(
                            '<li><div class="form-inline"><div class="form-group"><label class="sr-only">القيمة</label><div class="input-icon"><i class="fa fa-money font-green"></i><input type="text" class="form-control w-100" placeholder="القيمة" > </div></div><div class="form-group"><label class="sr-only">تاريخ الدفعة</label><div class="input-icon"><i class="fa fa-calendar-check-o font-green "></i><input type="text" class="form-control date" placeholder="تاريخ الدفعة"> </div></div></div><hr></li>'
                        );
                    }
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
        		 
	 //Date Pickers
	  $('.date').datepicker({
        autoclose: true,
        todayHighlight: true,
        language: "ar"
    });

    $(".marketplace__title").click(function(){
        $(".filters__container--collapsed .filters").toggleClass("show__sbar");
    })

    </script>