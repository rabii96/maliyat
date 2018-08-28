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
                    <form id="addExpenseForm" action="<?php echo e(route('addExpense')); ?>" method="POST" enctype="multipart/form-data">
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
                                <input autocomplete="off" type="text" name="name" id="name" class="form-control" placeholder=""> 
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
                            
                            <input autocomplete="off" type="hidden" name="service_id" id="service_id">
                            <input autocomplete="off" type="hidden" name="project_id" id="project_id">
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <div class="input-group">
                                <label for="employee_id">صاحب المصروف <span>*</span></label>
                                <select id="employee_id" name="employee_id" class="form-control select2 ">
                                    <option></option>
                                    <?php if($employees): ?>
                                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($e->id); ?>"><?php echo e($e->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                                <?php if($employees): ?>
                                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <span class="input-group-btn btn-addon">
                                            <button type="button" name="showEmployees" id="showEmployee<?php echo e($e->id); ?>" class="btn green hidden" data-toggle="modal" data-target="#employee<?php echo e($e->id); ?>">عرض البيانات</button>
                                        </span>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>

                                </div>
                            </div>
                            </div>    
                            
                            <?php if($employees): ?>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $e): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                            <div class="modal fade" id="employee<?php echo e($e->id); ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                                <h4><?php echo e($e->name); ?></h4>
                                            </div>

                                            <div class="form-group">
                                                <label class="font-purple">الايميل </label>
                                                <h4><?php echo e($e->email); ?></h4>
                                            </div>
                                            <div class="form-group">
                                                <label class="font-purple">الجوال </label>
                                                <h4 dir="ltr" style="text-align: right"><?php echo e($e->phone); ?></h4>
                                            </div>
                                            <?php if( $e->description): ?>
                                                <div class="form-group">
                                                    <label class="font-purple">نبذة</label>
                                                    <h4><?php echo e($e->description); ?></h4>
                                                </div>
                                            <?php endif; ?>
                                            <div class="form-group">
                                                    <label class="font-purple">المهمة</label>
                                                    <h4><?php echo e(@$e->task->name); ?></h4>
                                            </div>
                                            <div class="form-group">
                                                <?php if(@$e->employee_accounts): ?>
                                                    <label class="font-purple">طرق التحويل</label>
                                                    <?php if(@$e->employee_accounts[0]->transfer_method->name != 'أخرى'): ?>
                                                        <h5>إسم طريقة التحويل : 
                                                        <?php echo e(@$e->employee_accounts[0]->transfer_method->name); ?></h5>
                                                    <?php endif; ?>
                                                    <?php $__currentLoopData = @$e->employee_accounts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $account): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php if(@$account->transfer_method->name == 'باي بال'): ?>
                                                            <h5>الايميل : 
                                                            <?php echo e($account->paypal_email); ?></h5>
                                                        <?php elseif(@$account->transfer_method->name == 'بنك'): ?>
                                                            <h5>إسم البنك : 
                                                            <?php echo e($account->bank_name); ?></h5>
                                                            <h5>رقم الحساب : 
                                                            <?php echo e($account->bank_account_number); ?></h5>
                                                        <?php elseif(@$account->transfer_method->name == 'شيك'): ?>
                                                            <h5>رقم الشيك : 
                                                            <?php echo e($account->check_number); ?></h5>
                                                        <?php elseif(@$account->transfer_method->name == 'أخرى'): ?>
                                                            <h5>إسم طريقة التحويل : 
                                                            <?php echo e($account->other_method_name); ?></h5>
                                                            <h5>رقم الحساب : 
                                                            <?php echo e($account->other_method_number); ?></h5>
                                                        <?php else: ?>
                                                            <h5>رقم الحساب : 
                                                            <?php echo e(@$account->default_number); ?></h5>
                                                        <?php endif; ?>
                                                        <hr>
                                                        
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
                                            </div>
                                            <?php if( $e->attachement): ?>
                                                <div class="form-group">
                                                        <label class="font-purple">الملف المرفق</label>
                                                        <h5><a dir="rtl" href="<?php echo e(asset('storage/attachements/')); ?>/<?php echo e($e->attachement); ?>" download><?php echo e($e->attachement); ?></a></h5>
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
                                    <option value="" disabled selected>-- إختر --</option>
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
                                    <option value="" disabled selected>-- إختر --</option>
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
                                    <input autocomplete="off" dir="ltr" style="text-align: right" type="text" id="value" name="value" class="form-control" placeholder=""> 
                                </div>
                            </div>
                            </div>      
                                                                                    
                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                            <div class="form-group">
                                <label for="percentage_id">إضافة نسبة <span>*</span></label>
                                <select id="percentage_id" name="percentage_id" class="form-control select2 ">
                                    <option value="" disabled selected>-- إختر --</option>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>