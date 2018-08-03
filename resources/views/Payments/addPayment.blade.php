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
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-layers font-dark"></i>
                                <span class="caption-subject bold uppercase">إضافة دفعة</span>
                            </div>
                            
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                                                            
                                        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="single0">اسم المشروع <span>*</span></label>
                                <select id="single0" class="form-control select2 ">
                                    <option></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            </div>     
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="single1">رقم الدفعة <span>*</span></label>
                                <select id="single1" class="form-control select2 ">
                                    <option></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            </div>                           
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>مبلغ الدفعة <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input type="text" class="form-control" placeholder="" disabled> 
                                </div>
                            </div>
                            </div>                             
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>المبلغ المدفوع <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input type="text" class="form-control" placeholder=""> 
                                </div>
                            </div>
                            </div>        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="payment-type">نوع الدفعة <span>*</span></label>
                                <select id="payment-type" class="form-control select2 select-hide">
                                    <option value="0">-- إختر --</option>
                                    <option value="1">شيك</option>
                                    <option value="2">باى بال</option>
                                    <option value="3">كاش</option>
                                </select>
                            </div>
                            </div>                              
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>الباقى <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input type="text" class="form-control" placeholder="" disabled> 
                                </div>
                            </div>
                            </div> 
                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">                  
                            <div class="form-group">
                                <label for="single4">البنك المحول اليه <span>*</span></label>
                                <select id="single4" class="form-control select2 ">
                                    <option></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            </div>  
                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">                   
                            <div class="form-group">
                                <label for="single">رقم الحساب </label>
                                    <input type="text" class="form-control" placeholder="" disabled> 
                            </div>  
                            </div>
                                        
                                                                
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
                                <select id="single" class="form-control select2 ">
                                    <option></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                                    
                                                                    
                            <div class="form-group">
                                <label for="single">تاريخ <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-calendar font-green "></i>
                                <input type="text" class="form-control date" name="from" placeholder="">
                                </div>
                            </div>
                                                                    
                                                    
                            <div class="form-group">
                                <label for="single">رقم الشيك <span>*</span></label>
                                    <input type="text" class="form-control" placeholder=""> 
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
                                <select id="single3" class="form-control select2 ">
                                    <option></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                                    
                                                                    
                            <div class="form-group">
                                <label for="single">تاريخ <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-calendar font-green "></i>
                                <input type="text" class="form-control date" name="from" placeholder="">
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
                                <input type="email" class="form-control" placeholder=""> 
                            </div>
                            
                            
                            </fieldset> 
                            </div>
                            
                            
                                                
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <hr>
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
                                            <input type="file" name="..."> </span>
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
                            
            <button type="button" class="btn green pull-right margin-right-10">إضافة/تعديل</button>
            
                            </div>
                            
                            <div class="clearfix"></div>
                            
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
