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
                    <form method="POST" action="{{ route('editClient' , ['id' => $client->id ]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-layers font-dark"></i>
                                    <span class="caption-subject bold uppercase">تعديل عميل</span>
                                </div>
                                
                                <div class="tools"> </div>
                            </div>
                            <div class="portlet-body">
                                                                
                                            
                                                                                        
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label for="single0">الاسم <span>*</span></label>
                                    <input value="{{ $client->name }}" name="name" type="text" class="form-control" placeholder=""> 
                                </div>
                                </div>     
                                                                                                                
                                                                    
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label>نبذة</label>
                                    <textarea name="description" class="form-control" rows="5">{{ $client->description }}</textarea>
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