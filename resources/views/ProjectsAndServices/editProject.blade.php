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
                    <form method="POST" action="{{ route('editProject', ['id' => $project->id ]) }}" enctype="multipart/form-data">
                        @csrf
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-layers font-dark"></i>
                                <span class="caption-subject bold uppercase">تعديل مشروع</span>
                            </div>
                            
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                                                            
                                        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>اسم المشروع <span>*</span></label>
                                <input name="name" id="name" value="{{ $project->name }}" type="text" class="form-control" placeholder="اسم المشروع"> 
                            </div>
                            </div>
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>التاريخ <span>*</span></label>
                                <div class="input-group date-picker input-daterange" data-date="24/02/2018" data-date-format="dd/mm/yyyy">
                                    <input type="text" class="form-control date col-md-6" name="start_date" id="start_date" value="{{ $project->start_date->format('d/m/Y') }}" autocomplete="off" placeholder="من تاريخ">
                                    <span class="input-group-addon small-sp">  </span>
                                    <input type="text" class="form-control date col-md-6" name="end_date" id="end_date" value="{{ $project->end_date->format('d/m/Y') }}" autocomplete="off" placeholder="إلى تاريخ"> 
                                </div>
                            </div>
                            </div>                           
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>التفاصيل</label>
                                <textarea name="details" id="details" class="form-control" rows="5">{{ $project->details }}</textarea>
                            </div>
                            </div>
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="client_id">العميل <span>*</span></label>
                                <select id="client_id" name="client_id" class="form-control select2 ">
                                    <option></option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}" {{ $project->client_id == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>          
                                @php
                                    $nbPayments = 0;
                                    foreach ($project->expected_payments as $exp) {
                                        $nbPayments ++;
                                    }

                                    if($project->real_payments->count()!=0){
                                        $disabled = "disabled";
                                    }else{
                                        $disabled = "" ;
                                    }
                                @endphp                 
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>تكلفة المشروع <span>*</span></label>
                                @if($disabled !='')
                                    <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="لا يمكنك تغيير تكلفة المشروع لأنه سبق أن دفع البعض من مبالغ الدفعات أو كل مبالغها">؟</button>
                                @endif
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input {{ $disabled }} type="text" name="total_cost" dir="ltr" style="text-align: right" id="total_cost" onkeyup="updateLastPayment()" value="{{ $project->total_cost }}" class="form-control" placeholder=""> 
                                    
                                </div>
                            </div>
                            </div>
                            
                            
                            
                            
                            
                            <div class="col-md-6 col-md-offset-3 col-sm-12">                                   
                            <fieldset>
                            <legend>
                                الدفعات
                            </legend>
                                                    
                            <div class="form-group">
                                <div class="col-md-12"> 

                                    <label for="payment-num">عدد الدفعات <span>*</span></label>
                                    @if($disabled !='')
                                        <button type="button" class="btn btn-info" data-toggle="tooltip" data-placement="top" title="لا يمكنك تغيير عدد الدفعات لأنه سبق أن دفع البعض من مبالغها أو كل مبالغها">؟</button>
                                    @endif
                                    <select {{ $disabled }}  id="payment-num" class="form-control select2 select-hide">
                                        <option value="" selected disabled>-- إختر --</option>
                                        <option {{ $nbPayments == 1 ? 'selected' : '' }} value="1">1</option>
                                        <option {{ $nbPayments == 2 ? 'selected' : '' }} value="2">2</option>
                                        <option {{ $nbPayments == 3 ? 'selected' : '' }} value="3">3</option>
                                        <option {{ $nbPayments == 4 ? 'selected' : '' }} value="4">4</option>
                                    </select>
                                    
                                </div>
                            </div>
                            <script>
                                function updateLastPayment(){
                                    var total_cost = parseFloat ($('#total_cost').val());
                                    var last = $('#payment-num :selected').text();
                                    var payments_sum = 0;
                                    $("input[name='paymentValue[]']").each(function(){
                                        if( $(this).attr('id') != 'paymentValue'+last){
                                            var x = parseFloat($(this).val());
                                            if(!isNaN(x)){
                                                payments_sum += x;
                                            }
                                        }
                                    });
                                    if(!isNaN(total_cost)){
                                        var last_payment = total_cost - payments_sum;
                                        if(last_payment >= 0){
                                            $('#paymentValue'+last).val(last_payment);
                                        }else{
                                            $("input[name='paymentValue[]']").each(function(){
                                                if( $(this).attr('id') != 'paymentValue'+last){
                                                    $(this).val('');
                                                }
                                            });
                                            $('#paymentValue'+last).val(total_cost);
                                        }
                                    }
                                }
                                function updateCost(i){
                                    
                                    var last = $('#payment-num :selected').text();
                                    var total_cost = parseFloat ($('#total_cost').val());
                                    
                                    if(last == ''+i){ htop

                                        var payments_sum = 0;
                                        $("input[name='paymentValue[]']").each(function(){
                                            var x = parseFloat($(this).val());
                                            if(!isNaN(x)){
                                                payments_sum += x;
                                            }
                                        });
                                        $('#total_cost').val(payments_sum);
                                        return;
                                    }else{
                                        var payments_sum = 0;
                                        $("input[name='paymentValue[]']").each(function(){
                                            if( $(this).attr('id') != 'paymentValue'+last){
                                                var x = parseFloat($(this).val());
                                                if(!isNaN(x)){
                                                    payments_sum += x;
                                                }
                                            }
                                        });
                                    }
                                    
                                    
                                    if(!isNaN(total_cost)){
                                        var last_payment = total_cost - payments_sum;
                                        if(last_payment >= 0){
                                            $('#paymentValue'+last).val(last_payment);
                                        }else{
                                            $('#paymentValue'+last).val(0);
                                            $('#total_cost').val(payments_sum);
                                        }
                                    }
                                    
                                }
                            </script>
                            <div id="payment-container">
                                <br><br><br>
                                <label>تواريخ الدفعات <span>*</span></label>
                                
                                
                                <ol id="payment-list">
                                    @php
                                        $at_least_one_paid = "false";   
                                    @endphp
                                    @foreach ($project->expected_payments as $exp)

                                        @php
                                            if($exp->real_payments->count()!=0){
                                                $disabled = 'disabled' ;
                                                $at_least_one_paid = "true";
                                            }else{
                                                $disabled = '';
                                            }
                                        @endphp
                                        <li>
                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <label class="sr-only">القيمة</label>
                                                    <div class="input-icon">
                                                        <i class="fa fa-money font-green"></i>
                                                    <input {{ $at_least_one_paid=="true" ? 'disabled' : $disabled }} type="text" dir="ltr" style="text-align: right" name="paymentValue[]" value="{{$exp->value}}" id="paymentValue{{$exp->index}}"onkeyup="updateCost({{$exp->index}});" class="form-control w-100" placeholder="القيمة" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only">تاريخ الدفعة</label>
                                                    <div class="input-icon">
                                                        <i class="fa fa-calendar-check-o font-green "></i>
                                                        <input {{ $disabled }} type="text" name="paymentDate[]" value="{{$exp->date->format('m/d/Y')}}" id="paymentDate{{$exp->index}}" class="form-control date" placeholder="تاريخ الدفعة">
                                                    </div>
                                                </div>
                                                <input type="hidden" name="paymentIndex[]" id="paymentIndex{{ $exp->index }}" value="{{ $exp->index }}" {{ $disabled }}>
                                                @if($disabled !='')
                                                    <p class="btn btn-info" data-toggle="tooltip" data-placement="top" title="لا يمكنك تغييرالدفعة لأنه سبق أن دفع البعض من مبلغها أو كل المبلغ">؟</p>
                                                @else
                                                    @if($at_least_one_paid == "true")
                                                        <p class="btn btn-info" data-toggle="tooltip" data-placement="top" title="لا يمكنك تغيير مبلغ الدفعة لأنه سبق أن دفع البعض من مبلغ الدفعات الأخرى أو كل المبالغ">؟</p>
                                                    @endif
                                                @endif
                                            </div>
                                            <hr>
                                        </li>
                                    @endforeach
                                </ol>
                                <input type="hidden" name="at_least_one_paid" id="at_least_one_paid" value="{{ $at_least_one_paid }}">

                            
                            </div>
                            
                            </fieldset> 
                            </div>    
                            
                            
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                @if($project->attachement)
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
                            <div class="form-group">
                                <label>ملاحظات</label>
                                <textarea name="remarks" id="remarks" class="form-control" rows="5">{{ $project->remarks }}</textarea>
                            </div>
                            </div>
                            
                                                
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <hr>
                            </div>
                            
                                                
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12 text-center">
                            
                                <button type="submit" class="btn green pull-right margin-right-10">إضافة/تعديل</button>
            
                            </div>
                            
                            <div class="clearfix"></div>
                            
                        </div>
                    </div>
                    </form>
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
