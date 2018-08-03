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
                                <span class="caption-subject bold uppercase">إضافة مشروع</span>
                            </div>
                            
            <button type="button" class="btn green pull-right"><i class="icon-check"></i> إستلام المشروع </button>
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                                                            
                                        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>اسم المشروع <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-file font-green "></i>
                                    <input type="text" class="form-control" placeholder="اسم المشروع"> 
                                </div>
                            </div>
                            </div>
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>التاريخ <span>*</span></label>
                                <div class="input-group date-picker input-daterange" data-date="24/02/2018" data-date-format="dd/mm/yyyy">
                                    <input type="text" class="form-control date col-md-6" name="from" placeholder="من تاريخ">
                                    <span class="input-group-addon small-sp">  </span>
                                    <input type="text" class="form-control date col-md-6" name="to" placeholder="إلى تاريخ"> 
                                </div>
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
                                <label for="single">العميل <span>*</span></label>
                                <select id="single" class="form-control select2 ">
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
                                <label>تكلفة المشروع <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input type="text" class="form-control" placeholder=""> 
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
                                <select id="payment-num" class="form-control select2 select-hide">
                                    <option value="0">-- إختر --</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                                </div>
                            </div>
                            
                            <div id="payment-container" style="display: none;">
                                <label>تواريخ الدفعات <span>*</span></label>
                                
                                
                                <ol id="payment-list">
                                    <!--<li>
                                        <div class="form-inline">
                                        <div class="form-group">
                                            <label class="sr-only"> </label>
                                            <div class="input-icon">
                                            <i class="fa fa-money font-green"></i>
                                            <input type="email" class="form-control w-100" placeholder="القيمة" > </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only">تاريخ الدفعة</label>
                                            <div class="input-icon">
                                            <i class="fa fa-calendar-check-o font-green "></i>
                                            <input type="password" class="form-control date" placeholder="تاريخ الدفعة"> </div>
                                        </div>
                                        </div>
                                        <hr>
                                    </li>
                                    <li>
                                        <div class="form-inline">
                                        <div class="form-group">
                                            <label class="sr-only"> </label>
                                            <div class="input-icon">
                                            <i class="fa fa-money font-green"></i>
                                            <input type="email" class="form-control w-100" placeholder="القيمة" > </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="sr-only">تاريخ الدفعة</label>
                                            <div class="input-icon">
                                            <i class="fa fa-calendar-check-o font-green "></i>
                                            <input type="password" class="form-control date" placeholder="تاريخ الدفعة"> </div>
                                        </div>
                                        </div>
                                        <hr>
                                    </li>-->
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

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>