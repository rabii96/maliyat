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
                                <span class="caption-subject bold uppercase">خدمة رقم <?php echo e($service->id); ?></span>
                            </div>
                            <?php if($service->finished == false): ?>
                                <a href="<?php echo e(route('receiveService' , [ 'id' => $service->id])); ?>" class="btn green pull-right"><i class="icon-check"></i> إستلام الخدمة </a>
                            <?php endif; ?>

                            <div class="tools"> </div>
                        </div>
                        <div class="portlet-body">
                                                            
                                        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>اسم الخدمة <span>*</span></label>
                                <div class="input-icon">
                                    <i class="fa fa-file font-green "></i>
                                    <input type="text" class="form-control" value="<?php echo e($service->name); ?>" placeholder="اسم الخدمة" disabled> 
                                </div>
                            </div>
                            </div>

                            <?php if($service->start_date && $service->end_date): ?>
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                    <div class="form-group">
                                        <label>التاريخ </label>
                                        <div class="input-group date-picker input-daterange" data-date="24/02/2018" data-date-format="dd/mm/yyyy">
                                            <?php
                                                $start_month = $service->start_date->format('M');
                                                $end_month = $service->end_date->format('M');
                                                $arabic_months = [
                                                    "Jan" => "يناير",
                                                    "Feb" => "فبراير",
                                                    "Mar" => "مارس",
                                                    "Apr" => "أبريل",
                                                    "May" => "مايو",
                                                    "Jun" => "يونيو",
                                                    "Jul" => "يوليو",
                                                    "Aug" => "أغسطس",
                                                    "Sep" => "سبتمبر",
                                                    "Oct" => "أكتوبر",
                                                    "Nov" => "نوفمبر",
                                                    "Dec" => "ديسمبر"
                                                ];
                                                $st_month = $arabic_months[$start_month];
                                                $e_month = $arabic_months[$end_month];
                                            ?>
                                            <input type="text" class="form-control date col-md-6" name="from" value="<?php echo e($service->start_date->format('d')); ?> <?php echo e($st_month); ?> <?php echo e($service->start_date->format('Y')); ?>" disabled>
                                            <span class="input-group-addon small-sp">  </span>
                                            <input type="text" class="form-control date col-md-6" name="to" value="<?php echo e($service->end_date->format('d')); ?> <?php echo e($e_month); ?> <?php echo e($service->end_date->format('Y')); ?>" disabled> 
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                                                                
                           <?php if($service->total_cost): ?>                                     
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label>التكلفة الاجمالية </label>
                                    <div class="input-icon">
                                        <i class="fa fa-money font-green "></i>
                                        <input type="text" class="form-control" value="<?php echo e($service->total_cost); ?> ريال" disabled> 
                                    </div>
                                </div>
                                </div>
                            <?php endif; ?>
                                                            
                                    
                            <?php if($service->details): ?>
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label>التفاصيل</label>
                                    <textarea class="form-control" rows="5" disabled><?php echo e($service->details); ?></textarea>
                                </div>
                                </div>
                            <?php endif; ?>
                            
                                                
                            <?php if($service->remarks): ?>                                   
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label>ملاحظات</label>
                                    <textarea class="form-control" rows="5" disabled><?php echo e($service->remarks); ?></textarea>
                                </div>
                                </div>
                            <?php endif; ?>

                            <?php if($service->attachement): ?>
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                    <div class="form-group">
                                        <label>مرفق</label>
                                        <a class="form-control" dir="ltr" href="<?php echo e(asset('storage/attachements/')); ?>/<?php echo e($service->attachement); ?>" download><?php echo e($service->attachement); ?></a>
                                    </div>
                                </div>
                            <?php endif; ?>

                            
                                                
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <hr>
                            </div>
                            
                                                
                                                                
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label>إجمالى المبلغ المصروف</label>
                                <div class="col-md-12">
                                
                                    <input type="text" class="form-control" value="xx ريال" disabled>
                                    
                                </div>
                            </div>
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