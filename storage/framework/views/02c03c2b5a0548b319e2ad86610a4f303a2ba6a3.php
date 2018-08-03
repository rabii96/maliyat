<?php $__env->startSection('content'); ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            
                <?php echo $__env->make('includes.pageHeader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- BEGIN DASHBOARD STATS 1-->
            <div class="row clearfix">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
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
                                <input type="text" class="form-control" placeholder=""> 
                            </div>
                            </div>     
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="single1">النوع <span>*</span></label>
                                <select id="single1" class="form-control select2 select-hide">
                                    <option>-- إختر --</option>
                                    <option value="1">مشروع</option>
                                    <option value="2">خدمة</option>
                                    <option value="3">مكافئة</option>
                                </select>
                            </div>
                            </div>                           
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>التفاصيل</label>
                                <textarea class="form-control" rows="5"></textarea>
                            </div>
                            </div>   
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="single0">اسم المشروع/الخدمة <span>*</span></label>
                                <select id="single0" class="form-control select2 select-hide">
                                    <option>-- إختر --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            </div>      
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                <label for="single2">صاحب المصروف <span>*</span></label>
                                <select id="single2" class="form-control select2 ">
                                    <option></option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                <span class="input-group-btn btn-addon">
                                    <button type="button" class="btn green" data-toggle="modal" data-target="#exampleModal">عرض البيانات</button>
                                </span>
                                </div>
                            </div>
                            </div>      
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="single33">الحساب المحول منه <span>*</span></label>
                                <select id="single33" class="form-control select2 select-hide">
                                    <option>-- إختر --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            </div>                      
                                        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="single3">طريقة التحويل <span>*</span></label>
                                <select id="single3" class="form-control select2 select-hide">
                                    <option>-- إختر --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            </div>       
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="single11">الميلغ <span>*</span></label>
                                <select id="single11" class="form-control select2 select-hide">
                                    <option>-- إختر --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            </div>      
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="single10">إضافة نسبة <span>*</span></label>
                                <select id="single10" class="form-control select2 " multiple>
                                    <option>-- إختر --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            </div>                               
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>إجمالى المبلغ مع النسبة <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input type="text" class="form-control" placeholder="" disabled> 
                                </div>
                            </div>
                            </div>  
                                    
                            
                            
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="single">التاريخ <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-calendar font-green "></i>
                                <input type="text" class="form-control date" name="from" placeholder="">
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
                                            <input type="file" name="..."> </span>
                                        <a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput"> حذف </a>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>                         
                                        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>ملاحظات</label>
                                <textarea class="form-control" rows="5"></textarea>
                            </div>
                            </div> 
            
                                        
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <hr>
                            </div>
                            
                            
                                                                                    
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12 text-center">
                            
            <button type="button" class="btn btn-lg green pull-right margin-right-10">إضافة/تعديل</button>
            
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>