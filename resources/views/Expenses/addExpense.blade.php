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
                    <form action="{{ route('addExpense') }}" method="POST" enctype="multipart/form-data">
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
                                <input type="text" name="name" id="name" class="form-control" placeholder=""> 
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
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                <label for="client_id">صاحب المصروف <span>*</span></label>
                                <select id="client_id" name="client_id" class="form-control select2 ">
                                    <option></option>
                                    @if($clients)
                                        @foreach($clients as $c)
                                            <option value="{{ $c->id }}">{{ $c->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                                @if($clients)
                                    @foreach($clients as $c)
                                        <span class="input-group-btn btn-addon">
                                            <button type="button" name="showClients" id="showClient{{ $c->id }}" class="btn green hidden" data-toggle="modal" data-target="#client{{ $c->id }}">عرض البيانات</button>
                                        </span>
                                    @endforeach
                                @endif

                                </div>
                            </div>
                            </div>    
                            
                            @if($clients)
                                @foreach($clients as $c)
                            
                            <div class="modal fade" id="client{{ $c->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <h4>{{ $c->name }}</h4>
                                            </div>

                                            @if( $c->description)
                                                <div class="form-group">
                                                    <label class="font-purple">نبذة</label>
                                                    <h4>{{ $c->description }}</h4>
                                                </div>
                                            @endif
                                            @if( $c->attachement)
                                                <div class="form-group">
                                                        <label class="font-purple">الملف المرفق</label>
                                                        <h5><a dir="ltr" href="{{ asset('storage/attachements/') }}/{{ $c->attachement }}" download>{{ $c->attachement }}</a></h5>
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
                                    <option>-- إختر --</option>
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
                                    <option>-- إختر --</option>
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
                                    <input type="text" id="value" name="value" class="form-control" placeholder=""> 
                                </div>
                            </div>
                            </div>      
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="percentage_id">إضافة نسبة <span>*</span></label>
                                <select id="percentage_id" name="percentage_id" class="form-control select2 " multiple>
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
                                    <input name="value_plus_percentage" id="value_plus_percentage" type="text" class="form-control" placeholder="" readonly> 
                                </div>
                            </div>
                            </div>  
                                    
                            
                            
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="date">التاريخ <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-calendar font-green "></i>
                                <input name="date" id="date" type="text" class="form-control date" placeholder="">
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