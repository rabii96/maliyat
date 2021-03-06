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
                    <form id="addProjectForm" method="POST" action="{{ route('addProject') }}" enctype="multipart/form-data">
                        @csrf
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-layers font-dark"></i>
                                <span class="caption-subject bold uppercase">إضافة مشروع</span>
                            </div>
                            
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                                                            
                                        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>اسم المشروع <span>*</span></label>
                                <input autocomplete="off" name="name" id="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="اسم المشروع"> 
                            </div>
                            </div>
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>التاريخ <span>*</span></label>
                                <div class="input-group date-picker input-daterange" data-date="24/02/2018" data-date-format="dd/mm/yyyy">
                                    <input autocomplete="off" type="text" class="form-control date col-md-6" name="start_date" id="start_date" value="{{ old('start_date') }}" autocomplete="off" placeholder="من تاريخ">
                                    <span class="input-group-addon small-sp">  </span>
                                    <input autocomplete="off" type="text" class="form-control date col-md-6" name="end_date" id="end_date" value="{{ old('end_date') }}" autocomplete="off" placeholder="إلى تاريخ"> 
                                </div>
                            </div>
                            </div>                           
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>التفاصيل</label>
                                <textarea name="details" id="details" class="form-control" rows="5">{{ old('details') }}</textarea>
                            </div>
                            </div>
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="client_id">العميل <span>*</span></label>
                                <select id="client_id" name="client_id" class="form-control select2 ">
                                    <option></option>
                                    @foreach($clients as $client)
                                        <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : '' }}>{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            </div>                           
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>تكلفة المشروع <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input autocomplete="off" type="text" name="total_cost" dir="ltr" style="text-align: right" id="total_cost" onkeyup="updateLastPayment()" value="{{ old('total_cost') }}" class="form-control" placeholder=""> 
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
                                <select id="payment-num" name="payment_num" class="form-control select2 select-hide">
                                    <option value="" selected disabled>-- إختر --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                </div>
                            </div>
                            <script>
                                function updateLastPayment(){
                                    var total_cost = parseFloat ($('#total_cost').val());
                                    var last = $('#payment-num :selected').text();
                                    var payments_sum = 0;
                                    $("input[name^='paymentValue']").each(function(){
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
                                            $("input[name^='paymentValue']").each(function(){
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
                                    
                                    if(last == ''+i){
                                        var payments_sum = 0;
                                        $("input[name^='paymentValue']").each(function(){
                                            var x = parseFloat($(this).val());
                                            if(!isNaN(x)){
                                                payments_sum += x;
                                            }
                                        });
                                        $('#total_cost').val(payments_sum);
                                        return;
                                    }else{
                                        var payments_sum = 0;
                                        $("input[name^='paymentValue']").each(function(){
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
                            <div id="payment-container" style="display: none;">
                                <br><br><br>
                                <label>تواريخ الدفعات <span>*</span></label>
                                
                                
                                <ol id="payment-list" name="payment_list">
                                    @for($i=1 ; $i<5 ; $i++)
                                        <li>
                                            <div class="form-inline">
                                                <div class="form-group">
                                                    <label class="sr-only">القيمة</label>
                                                    <div class="input-icon">
                                                        <i class="fa fa-money font-green"></i>
                                                        <input type="text" dir="ltr" style="text-align: right" name="paymentValue[{{$i}}]" id="paymentValue1"autocomplete="off"  onkeyup="updateCost({{$i}});" class="form-control w-100" placeholder="القيمة" >
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only">تاريخ الدفعة</label>
                                                    <div class="input-icon">
                                                        <i class="fa fa-calendar-check-o font-green "></i>
                                                        <input type="text" name="paymentDate[{{$i}}]" id="paymentDate1" class="form-control date" placeholder="تاريخ الدفعة">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                        </li>
                                    @endfor
                        
                                </ol>
                            
                            
                            </div>
                            
                            </fieldset> 
                            </div>    
                            
                            
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>مرفق</label>
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
                                            <input autocomplete="off" type="file" name="attachement"> </span>
                                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>                     
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>ملاحظات</label>
                                <textarea name="remarks" id="remarks" class="form-control" rows="5">{{ old('remarks') }}</textarea>
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
