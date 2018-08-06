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
                    <form method="POST" action="<?php echo e(route('addEmployee')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="portlet light ">

                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-layers font-dark"></i>
                                    <span class="caption-subject bold uppercase">إضافة مقدم خدمة</span>
                                </div>
                                
                                <div class="tools"> </div>
                            </div>

                            <?php echo $__env->make('includes.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <div class="portlet-body">
                                                                
                                            
                                                                                        
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="single0">الاسم <span>*</span></label>
                                        <input id="name" name="name" type="text" class="form-control" placeholder=""> 
                                    </div>
                                </div>     

                                                                                
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label for="employee_task">مهامه <span>*</span></label>
                                    <select id="employee_task" name="employee_task" class="form-control select2 select-hide">
                                        <option value="" disabled selected>-- إختر --</option>
                                        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($task->id); ?>"><?php echo e($task->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                </div>      
                                
                                
                                                                    
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                    <div class="form-group">
                                        <label>نبذة</label>
                                        <textarea name="description" class="form-control" rows="5"></textarea>
                                    </div>
                                </div> 
                                
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="single0">الجوال <span>*</span></label>
                                            <input dir="ltr" style="text-align: right" id="phone" name="phone" type="text" class="form-control" placeholder=""> 
                                        </div>
                                </div>

                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="single0">الايميل <span>*</span></label>
                                            <input id="email" name="email" type="text" class="form-control" placeholder=""> 
                                        </div>
                                </div>
                                            
                                                                                        
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label for="transferMethodSelect">طريقة التحويل <span>*</span></label>
                                    <select id="transferMethodSelect" name="transferMethodSelect" class="form-control select2 select-hide">
                                        <option disabled selected>-- إختر --</option>
                                        <?php $__currentLoopData = $transferMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $transferMethod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($transferMethod->id); ?>"><?php echo e($transferMethod->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <option value="0">أخرى</option>
                                    </select>
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
                                <fieldset id="paypal" style="display: none;">
                                <legend class="font-purple">باى بال </legend>
                                
                                    
                                <div class="form-group">
                                    <label>الايميل <span>*</span></label>
                                    <div class="input-icon">
                                        <i class="fa fa-envelope font-green "></i>
                                        <input name="paypal_email" type="text" class="form-control" placeholder=""> 
                                    </div>
                                </div>
                            
                            
                                
                                    
                                    <div class="col-md-12">
                                    <div class="form-group text-center">
                                    
                                    <button id="add_paypal_email" type="button" class="btn green margin-right-10">إضافة</button>
                
                                    </div>
                                    </div>
                            
                                    
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th> # </th>
                                                            <th> الايميل </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="paypal_emails_table">
                                                        <tr>
                                                            <td>1</td>
                                                            <td>paypal@exemple.com</td>
                                                            <input type="hidden" name="paypal_emails[]" value="paypal@exemple.com">
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>paypal2@exemple.com</td>
                                                            <input type="hidden" name="paypal_emails[]" value="paypal2@exemple.com">
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        
                                    </div>
                            
                                </fieldset> 
                                </div> 
                                                                                            
                                


                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <fieldset id="bank" style="display: none;">
                                <legend class="font-purple">بـنـك</legend>
                                
                                <div class="form-group">
                                    <label>اسم البنك </label>
                                    <div class="input-icon">
                                        <i class="fa fa-bank font-green "></i>
                                        <input name="bank_name" id="bank_name" type="text" class="form-control" placeholder=""> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>رقم الحساب </label>
                                    <div class="input-icon">
                                        <i class="fa fa-barcode font-green "></i>
                                        <input name="bank_account_number" id="bank_account_number" type="text" class="form-control" placeholder=""> 
                                    </div>
                                </div>
                            
                            
                                
                                    
                                    <div class="col-md-12">
                                    <div class="form-group text-center">
                                    
                                    <button id="add_employee_bank" type="button" class="btn green margin-right-10">إضافة</button>
                
                                    </div>
                                    </div>
                            
                                    
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> اسم البنك </th>
                                                <th> رقم الحساب </th>
                                            </tr>
                                        </thead>
                                        <tbody id="bank_accounts_table">
                                                <tr>
                                                    <td>1</td>
                                                    <td>bank 1</td>
                                                    <input type="hidden" name="employee_bank_names[]" value="bank 1">
                                                    <td>111111</td>
                                                    <input type="hidden" name="employee_bank_numbers[]" value="111111">
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>bank 2</td>
                                                    <input type="hidden" name="employee_bank_names[]" value="bank 2">
                                                    <td>222222</td>
                                                    <input type="hidden" name="employee_bank_numbers[]" value="222222">
                                                </tr>
                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                        
                                    </div>
                            
                            
                                </fieldset> 
                                </div>
                                                                                            
                                


                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <fieldset id="other" style="display: none;">
                                <legend class="font-purple">أخــرى</legend>
                                
                                <div class="form-group">
                                    <label>طريقة التحويل </label>
                                    <div class="input-icon">
                                        <i class="fa fa-random font-green "></i>
                                        <input name="employee_transfer_method_name" id="employee_transfer_method_name" type="text" class="form-control" placeholder=""> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>الرقم </label>
                                    <div class="input-icon">
                                        <i class="fa fa-barcode font-green "></i>
                                        <input name="employee_transfer_method_number" id="employee_transfer_method_number" type="text" class="form-control" placeholder=""> 
                                    </div>
                                </div>
                            
                            
                                
                                    
                                    <div class="col-md-12">
                                    <div class="form-group text-center">
                                    
                                    <button id="add_employee_transfer_method" type="button" class="btn green margin-right-10">إضافة</button>
                
                                    </div>
                                    </div>
                            
                                    
                                    <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th> # </th>
                                                <th> طريقة التحويل </th>
                                                <th> رقم الحساب </th>
                                            </tr>
                                        </thead>
                                        <tbody id="employee_transfer_methods">
                                            
                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                        
                                    </div>
                            
                            
                            
                                </fieldset> 
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