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
                    <form action="<?php echo e(route('addExpense')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
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
                                    <?php if($expenseTypes): ?>
                                        <?php $__currentLoopData = $expenseTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ex): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($ex->id); ?>"><?php echo e($ex->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
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
                                    <?php if($clients): ?>
                                        <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($c->id); ?>"><?php echo e($c->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <?php if($clients): ?>
                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="input-group-btn btn-addon">
                                            <button type="button" name="showClients" id="showClient<?php echo e($c->id); ?>" class="btn green hidden" data-toggle="modal" data-target="#client<?php echo e($c->id); ?>">عرض البيانات</button>
                                        </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                </div>
                            </div>
                            </div>    
                            
                            <?php if($clients): ?>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $c): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <div class="modal fade" id="client<?php echo e($c->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <h4><?php echo e($c->name); ?></h4>
                                            </div>

                                            <?php if( $c->description): ?>
                                                <div class="form-group">
                                                    <label class="font-purple">نبذة</label>
                                                    <h4><?php echo e($c->description); ?></h4>
                                                </div>
                                            <?php endif; ?>
                                            <?php if( $c->attachement): ?>
                                                <div class="form-group">
                                                        <label class="font-purple">الملف المرفق</label>
                                                        <h5><a dir="ltr" href="<?php echo e(asset('storage/attachements/')); ?>/<?php echo e($c->attachement); ?>" download><?php echo e($c->attachement); ?></a></h5>
                                                </div>
                                            <?php endif; ?>
                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">إغـلاق</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="bank_id">الحساب المحول منه <span>*</span></label>
                                <select id="bank_id" name="bank_id" class="form-control select2 select-hide">
                                    <option>-- إختر --</option>
                                    <?php if($banks): ?>
                                        <?php $__currentLoopData = $banks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($b->id); ?>"><?php echo e($b->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            </div>              
                                        
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="transfer_method_id">طريقة التحويل <span>*</span></label>
                                <select id="transfer_method_id" name="transfer_method_id" class="form-control select2 select-hide">
                                    <option>-- إختر --</option>
                                    <?php if($transferMethods): ?>
                                        <?php $__currentLoopData = $transferMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($t->id != 0): ?>
                                                <option value="<?php echo e($t->id); ?>"><?php echo e($t->name); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <option value="0">أخرى</option>
                                    <?php endif; ?>
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
                                    <?php if($percentages): ?>
                                        <?php $__currentLoopData = $percentages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option data-value="<?php echo e($p->value); ?>" value="<?php echo e($p->id); ?>"><?php echo e($p->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>