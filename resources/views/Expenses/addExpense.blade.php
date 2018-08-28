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
                    <form id="addExpenseForm" action="{{ route('addExpense') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-layers font-dark"></i>
                                <span class="caption-subject bold uppercase">إضافة مصروف</span>
                            </div>
                            
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                                                            
                                        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="single0">اسم المصروف <span>*</span></label>
                                <input autocomplete="off" type="text" name="name" id="name" class="form-control" placeholder=""> 
                            </div>
                            </div>     
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="type">النوع <span>*</span></label>
                                <select id="type" name="type" class="form-control select2 select-hide">
                                    <option disabled selected>-- إختر --</option>
                                    @if($expenseTypes)
                                        @foreach($expenseTypes as $ex)
                                            <option value="{{ $ex->id }}">{{ $ex->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            </div>                           
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>التفاصيل</label>
                                <textarea name="details" class="form-control" rows="5"></textarea>
                            </div>
                            </div>   
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="project_service_id">اسم المشروع/الخدمة <span>*</span></label>
                                <select id="project_service_id" name="project_service_id" class="form-control select2 select-hide">
                                    <option disabled selected value="-1">-- إختر --</option>
                                    
                                </select>
                            </div>
                            </div>   
                            
                            <input autocomplete="off" type="hidden" name="service_id" id="service_id">
                            <input autocomplete="off" type="hidden" name="project_id" id="project_id">
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                <label for="employee_id">صاحب المصروف <span>*</span></label>
                                <select id="employee_id" name="employee_id" class="form-control select2 ">
                                    <option></option>
                                    @if($employees)
                                        @foreach($employees as $e)
                                            <option value="{{ $e->id }}">{{ $e->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if($employees)
                                    @foreach($employees as $e)
                                        <span class="input-group-btn btn-addon">
                                            <button type="button" name="showEmployees" id="showEmployee{{ $e->id }}" class="btn green hidden" data-toggle="modal" data-target="#employee{{ $e->id }}">عرض البيانات</button>
                                        </span>
                                    @endforeach
                                @endif

                                </div>
                            </div>
                            </div>    
                            
                            @if($employees)
                                @foreach($employees as $e)
                            
                            <div class="modal fade" id="employee{{ $e->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title pull-left" id="exampleModalLabel">بيانات صاحب المصروف</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                            
                                            <div class="form-group">
                                                <label class="font-purple">اسم صاحب المصروف </label>
                                                <h4>{{ $e->name }}</h4>
                                            </div>

                                            <div class="form-group">
                                                <label class="font-purple">الايميل </label>
                                                <h4>{{ $e->email }}</h4>
                                            </div>
                                            <div class="form-group">
                                                <label class="font-purple">الجوال </label>
                                                <h4 dir="ltr" style="text-align: right">{{ $e->phone }}</h4>
                                            </div>
                                            @if( $e->description)
                                                <div class="form-group">
                                                    <label class="font-purple">نبذة</label>
                                                    <h4>{{ $e->description }}</h4>
                                                </div>
                                            @endif
                                            <div class="form-group">
                                                    <label class="font-purple">المهمة</label>
                                                    <h4>{{ @$e->task->name }}</h4>
                                            </div>
                                            <div class="form-group">
                                                @if(@$e->employee_accounts)
                                                    <label class="font-purple">طرق التحويل</label>
                                                    @if(@$e->employee_accounts[0]->transfer_method->name != 'أخرى')
                                                        <h5>إسم طريقة التحويل : 
                                                        {{ @$e->employee_accounts[0]->transfer_method->name }}</h5>
                                                    @endif
                                                    @foreach(@$e->employee_accounts as $account)
                                                        @if(@$account->transfer_method->name == 'باي بال')
                                                            <h5>الايميل : 
                                                            {{ $account->paypal_email }}</h5>
                                                        @elseif(@$account->transfer_method->name == 'بنك')
                                                            <h5>إسم البنك : 
                                                            {{ $account->bank_name }}</h5>
                                                            <h5>رقم الحساب : 
                                                            {{ $account->bank_account_number }}</h5>
                                                        @elseif(@$account->transfer_method->name == 'شيك')
                                                            <h5>رقم الشيك : 
                                                            {{ $account->check_number }}</h5>
                                                        @elseif(@$account->transfer_method->name == 'أخرى')
                                                            <h5>إسم طريقة التحويل : 
                                                            {{ $account->other_method_name }}</h5>
                                                            <h5>رقم الحساب : 
                                                            {{ $account->other_method_number }}</h5>
                                                        @else
                                                            <h5>رقم الحساب : 
                                                            {{ @$account->default_number }}</h5>
                                                        @endif
                                                        <hr>
                                                        
                                                    @endforeach
                                                @endif
                                            </div>
                                            @if( $e->attachement)
                                                <div class="form-group">
                                                        <label class="font-purple">الملف المرفق</label>
                                                        <h5><a dir="rtl" href="{{ asset('storage/attachements/') }}/{{ $e->attachement }}" download>{{ $e->attachement }}</a></h5>
                                                </div>
                                            @endif
                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغـلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        @endforeach
                    @endif        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="bank_id">الحساب المحول منه <span>*</span></label>
                                <select id="bank_id" name="bank_id" class="form-control select2 select-hide">
                                    <option value="" disabled selected>-- إختر --</option>
                                    @if($banks)
                                        @foreach($banks as $b)
                                            <option value="{{ $b->id }}">{{ $b->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            </div>              
                                        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="transfer_method_id">طريقة التحويل <span>*</span></label>
                                <select id="transfer_method_id" name="transfer_method_id" class="form-control select2 select-hide">
                                    <option value="" disabled selected>-- إختر --</option>
                                    @if($transferMethods)
                                        @foreach($transferMethods as $t)
                                            @if($t->id != 0)
                                                <option value="{{ $t->id }}">{{ $t->name }}</option>
                                            @endif
                                        @endforeach
                                        <option value="0">أخرى</option>
                                    @endif
                                </select>
                            </div>
                            </div>       
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="value">المبلغ <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input autocomplete="off" dir="ltr" style="text-align: right" type="text" id="value" name="value" class="form-control" placeholder=""> 
                                </div>
                            </div>
                            </div>      
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="percentage_id">إضافة نسبة <span>*</span></label>
                                <select id="percentage_id" name="percentage_id" class="form-control select2 ">
                                    <option value="" disabled selected>-- إختر --</option>
                                    @if($percentages)
                                        @foreach($percentages as $p)
                                            <option data-value="{{ $p->value }}" value="{{ $p->id }}">{{ $p->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            </div>                               
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>إجمالى المبلغ مع النسبة <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input autocomplete="off" name="value_plus_percentage" id="value_plus_percentage" type="text" class="form-control" placeholder="" readonly> 
                                </div>
                            </div>
                            </div>  
                                    
                            
                            
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="date">التاريخ <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-calendar font-green "></i>
                                <input autocomplete="off" name="date" id="date" type="text" class="form-control date" placeholder="">
                                </div>
                            </div>
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
                                <textarea name="remakrs" class="form-control" rows="5"></textarea>
                            </div>
                            </div> 
            
                                        
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <hr>
                            </div>
                            
                            
                                                                                    
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12 text-center">
                            
                            <button type="submit" class="btn btn-lg green pull-right margin-right-10">إضافة/تعديل</button>
            
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