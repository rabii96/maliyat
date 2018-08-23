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
                    <form method="POST" action="{{ route('editService', ['id' => $service->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-layers font-dark"></i>
                                <span class="caption-subject bold uppercase">تعديل خدمة</span>
                            </div>
                            
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                                                            
                                        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>اسم الخدمة <span>*</span></label>
                                <input type="text" name="name" value="{{ $service->name }}" class="form-control" placeholder="اسم الخدمة"> 
                            </div>
                            </div>

                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label>التاريخ</label>
                                    <div class="input-group date-picker input-daterange" data-date="24/02/2018" data-date-format="dd/mm/yyyy">
                                        @if($service->start_date)
                                            <input type="text" class="form-control date col-md-6" name="start_date" id="start_date" value="{{ $service->start_date->format('d/m/Y') }}" autocomplete="off" placeholder="من تاريخ">
                                            <span class="input-group-addon small-sp">  </span>
                                            <input type="text" class="form-control date col-md-6" name="end_date" id="end_date" value="{{ $service->end_date->format('d/m/Y') }}" autocomplete="off" placeholder="إلى تاريخ"> 
                                        @else
                                            <input type="text" class="form-control date col-md-6" name="start_date" id="start_date" autocomplete="off" placeholder="من تاريخ">
                                            <span class="input-group-addon small-sp">  </span>
                                            <input type="text" class="form-control date col-md-6" name="end_date" id="end_date" autocomplete="off" placeholder="إلى تاريخ"> 
                                        @endif
                                    </div>
                                </div>
                                </div> 
                                                                
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>التكلفة الاجمالية </label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input type="text" name="total_cost" value="{{ $service->total_cost }}" class="form-control" placeholder=""> 
                                </div>
                            </div>
                            </div>
                                                            
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>التفاصيل</label>
                                <textarea name="details" class="form-control" rows="5">{{ $service->details }}</textarea>
                            </div>
                            </div>
                            
                            
                            
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                @if($service->attachement)
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
                                <textarea name="remarks" class="form-control" rows="5">{{ $service->remarks }}</textarea>
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