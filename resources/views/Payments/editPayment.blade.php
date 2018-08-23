@extends('layouts.base')

@section('content')
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            
            
                @include('includes.pageHeader')
            <!-- BEGIN DASHBOARD STATS 1-->
            <div class="row clearfix">
                <div class="col-md-12">
                    @include('includes.messages')
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-layers font-dark"></i>
                                <span class="caption-subject bold uppercase">تعديل دفعة</span>
                            </div>
                            
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                        <form method="POST" action="{{ route('editPayment', ['id' => $payment->id ]) }}" enctype="multipart/form-data">
                            @csrf                               
                                        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="project_name">اسم المشروع <span>*</span></label>
                                <select id="project_name" name="project_id" class="form-control select2 ">
                                    <option></option>
                                    @if($projects)
                                        @foreach($projects as $project)
                                            <option value="{{ $project->id }}" {{ $payment->project->id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            </div>     
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="payment_number">رقم الدفعة <span>*</span></label>
                                <select id="payment_number" name="payment_number" class="form-control select2 ">
                                    <option></option>
                                    @foreach($expected_payments as $ex)
                                        <option data-id="{{ $ex->id }}" value="{{ $ex->remaining_value }}" {{ $payment->expected_payment->id == $ex->id ? 'selected' : '' }}>{{ $ex->index }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="expected_payment_id" id="expected_payment_id" value="{{ $payment->expected_payment->id }}">
                            </div>
                            </div>                           
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>مبلغ الدفعة <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input id="paymentValue" value="{{ $payment->expected_payment->remaining_value + $payment->paid_value }}" type="text" class="form-control" placeholder="" disabled> 
                                </div>
                            </div>
                            </div>                             
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>المبلغ المدفوع <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input id="currentPaidValue" value="{{ $payment->paid_value }}" name="currentPaidValue" type="text" class="form-control" placeholder=""> 
                                </div>
                            </div>
                            </div>        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="payment-type">نوع الدفعة <span>*</span></label>
                                <select id="payment-type" name="transfer_method" class="form-control select2 select-hide">
                                    <option disabled selected>-- إختر --</option>
                                    <option value="-1" {{ $payment->transfer_method == null ? 'selected' : '' }}>كاش</option>
                                    @foreach($transferMethods as $transferMethod)
                                            @if( $transferMethod->id  != 0 )  
                                                <option value="{{ $transferMethod->id }}" {{ @$payment->transfer_method->id == $transferMethod->id ? 'selected' : '' }}>{{ $transferMethod->name }}</option>
                                            @endif
                                        @endforeach
                                        <option value="0" {{ $payment->transfer_method != null && @$payment->transfer_method->id == 0 ? 'selected' : '' }}>أخرى</option>
                                </select>
                            </div>
                            </div>                              
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>الباقى <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input id="currentRemainingValue" value="{{ $payment->expected_payment->remaining_value }}" name="currentRemainingValue" type="text" class="form-control" placeholder="" disabled> 
                                </div>
                            </div>
                            </div> 
                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">                  
                            <div class="form-group">
                                <label for="bank_payment">البنك المحول اليه <span>*</span></label>
                                <select id="bank_payment" name="to_bank_id" class="form-control select2 ">
                                    <option></option>
                                    @if($banks)
                                        @foreach($banks as $bank)
                                            <option data-bank_number="{{ $bank->account_number }}" value="{{ $bank->id }}" {{ $payment->to_bank->id == $bank->id ? 'selected' : '' }}>{{ $bank->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            </div>  
                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">                   
                            <div class="form-group">
                                <label for="bank_payment_number">رقم الحساب </label>
                                    <input id="bank_payment_number" type="text" class="form-control" value="{{ $payment->to_bank->account_number }}" placeholder="" disabled> 
                            </div>  
                            </div>

                            <script>
                                 $(document).on('ready', function() {
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
                            </script>
                                        
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <hr>
                            </div>
                            
                            
                            <div class="col-md-6 col-md-offset-3 col-sm-12"> 
                                                                    
                            <fieldset id="check" style="display: none;">
                            <legend class="font-purple">
                                شيك
                            </legend>
                                                    
                            <div class="form-group">
                                <label for="single">اسم البنك <span>*</span></label>
                                <select id="single" name="from_bank_id" class="form-control select2 ">
                                    <option></option>
                                    @if($banks)
                                        @foreach($banks as $bank)
                                            <option data-bank_number="{{ $bank->account_number }}" value="{{ $bank->id }}" {{ @$payment->from_bank->id == $bank->id ? 'selected' : '' }}>{{ $bank->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                                    
                                                                    
                            <div class="form-group">
                                <label for="single">تاريخ <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-calendar font-green "></i>
                                <input type="text" class="form-control date" name="date_check" value="{{ $payment->date->format('m/d/Y') }}" placeholder="">
                                </div>
                            </div>
                                                                    
                                                    
                            <div class="form-group">
                                <label for="single">رقم الشيك <span>*</span></label>
                                    <input type="text" name="check_number" value="{{ $payment->check_number }}" class="form-control" placeholder=""> 
                            </div>
                            
                            
                            </fieldset> 
                            </div>    
                            
                            
                                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <fieldset id="transfer" style="display: none;">
                            <legend class="font-purple">
                                تحويل
                            </legend>
                                                    
                            <div class="form-group">
                                <label for="single3">اسم المحول <span>*</span></label>
                                <input id="single3" name="transferer_name" value="{{ $payment->transferer_name }}" type="text" class="form-control" placeholder=""> 
                            </div>
                                    
                                                                    
                            <div class="form-group">
                                <label for="single">تاريخ <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-calendar font-green "></i>
                                <input type="text" class="form-control date" value="{{ $payment->date->format('m/d/Y') }}" name="date_cash" placeholder="">
                                </div>
                            </div>
                            
                            
                            </fieldset>
                            </div>
                            
                            
                            
                            
                            <div class="col-md-6 col-md-offset-3 col-sm-12"> 
                                                                    
                            <fieldset id="paypal" style="display: none;">
                            <legend class="font-purple">
                                باى بال
                            </legend>
                                                                    
                                                    
                            <div class="form-group">
                                <label for="single">حساب الباى بال <span>*</span></label>
                                <input type="email" name="paypal_email" value="{{ $payment->paypal_email }}" class="form-control" placeholder=""> 
                            </div>
                            
                            
                            </fieldset> 
                            </div>

                            <div class="col-md-6 col-md-offset-3 col-sm-12"> 
                                                                    
                                <fieldset id="bank" style="display: none;">
                                    <legend class="font-purple">
                                        بنك
                                    </legend>
                                                                            
                                                            
                                    <div class="form-group">
                                            <label for="single">اسم البنك <span>*</span></label>
                                            <select id="single" name="from_bank_id" class="form-control select2 ">
                                                <option></option>
                                                @if($banks)
                                                    @foreach($banks as $bank)
                                                        <option data-bank_number="{{ $bank->account_number }}" value="{{ $bank->id }}" {{ @$payment->from_bank->id == $bank->id ? 'selected' : '' }}>{{ $bank->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                            <br>
                                        <label for="single">رقم الحساب<span>*</span></label>
                                        <input type="text" name="from_bank_number" value="{{ @$payment->from_bank_number }}" class="form-control" placeholder=""> 
                                    </div>
                                    
                                    
                                </fieldset> 
                            </div>

                            <div class="col-md-6 col-md-offset-3 col-sm-12"> 
                                                                    
                                <fieldset id="other" style="display: none;">
                                    <legend class="font-purple">
                                        أخرى
                                    </legend>
                                                                            
                                                            
                                    <div class="form-group">
                                        <label for="single">رقم الحساب<span>*</span></label>
                                        <input type="text" name="other_number" value="{{ @$payment->from_bank_number }}" class="form-control" placeholder=""> 
                                    </div>
                                    
                                    
                                </fieldset> 
                            </div>

                            <div class="col-md-6 col-md-offset-3 col-sm-12"> 
                                                                    
                                <fieldset id="default" style="display: none;">
                                    <legend id="default_name" class="font-purple">
                                       x
                                    </legend>
                                                                            
                                                            
                                    <div class="form-group">
                                        <label for="single">رقم الحساب<span>*</span></label>
                                        <input type="text" name="default_number" class="form-control" placeholder=""> 
                                    </div>
                                    
                                    
                                </fieldset> 
                            </div>
                            
                            
                                                
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <hr>
                            </div>
                        
                        
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                @if($payment->attachement)
                                    <label>تغيير المرفق</label>
                                @else
                                    <label>مرفق</label>
                                @endif
                                <div class="col-md-12">
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="input-group input-large">
                                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                            <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                            <span class="fileinput-filename"> </span>
                                        </div>
                                        <span class="input-group-addon btn default btn-file">
                                            <span class="fileinput-new"> إختر المرفق </span>
                                            <span class="fileinput-exists"> تغيير </span>
                                            <input type="file" name="attachement"> </span>
                                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                            
                                                            
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <hr>
                            </div>
                                                
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12 text-center">
                            
                            <button type="submit" class="btn green pull-right margin-right-10">إضافة/تعديل</button>
            
                            </div>
                            
                            <div class="clearfix"></div>
                        </form>
                        </div>
                    </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
                
            </div>
            <div class="clearfix"></div>
            <!-- END DASHBOARD STATS 1-->
            
            
            
            
        </div>
        <!-- END CONTENT BODY -->
    </div>
    <!-- END CONTENT -->
@endsection
