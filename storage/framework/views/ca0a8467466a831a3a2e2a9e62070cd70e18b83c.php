<?php $__env->startSection('content'); ?>
    <!-- BEGIN CONTENT -->
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            
            
                <?php echo $__env->make('includes.pageHeader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- BEGIN DASHBOARD STATS 1-->
            <div class="row clearfix">
                <div class="col-md-12">
                    <?php echo $__env->make('includes.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <form method="POST" action="<?php echo e(route('addService')); ?>" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="portlet light ">
                        <div class="portlet-title">
                            <div class="caption font-dark">
                                <i class="icon-layers font-dark"></i>
                                <span class="caption-subject bold uppercase">إضافة خدمة</span>
                            </div>
                            
                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                                                            
                                        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>اسم الخدمة <span>*</span></label>
                                <input type="text" name="name" value="<?php echo e(old('name')); ?>" class="form-control" placeholder="اسم الخدمة"> 
                            </div>
                            </div>

                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label>التاريخ</label>
                                    <div class="input-group date-picker input-daterange" data-date="24/02/2018" data-date-format="dd/mm/yyyy">
                                        <input type="text" class="form-control date col-md-6" name="start_date" id="start_date" value="<?php echo e(old('start_date')); ?>" autocomplete="off" placeholder="من تاريخ">
                                        <span class="input-group-addon small-sp">  </span>
                                        <input type="text" class="form-control date col-md-6" name="end_date" id="end_date" value="<?php echo e(old('end_date')); ?>" autocomplete="off" placeholder="إلى تاريخ"> 
                                    </div>
                                </div>
                                </div> 
                                                                
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>التكلفة الاجمالية </label>
                                <div class="input-icon">
                                    <i class="fa fa-money font-green "></i>
                                    <input type="text" name="total_cost" value="<?php echo e(old('total_cost')); ?>" class="form-control" placeholder=""> 
                                </div>
                            </div>
                            </div>
                                                            
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>التفاصيل</label>
                                <textarea name="details" class="form-control" rows="5"><?php echo e(old('details')); ?></textarea>
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
                                <textarea name="remarks" class="form-control" rows="5"></textarea>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>