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
                    <form method="POST" action="<?php echo e(route('addUser')); ?>" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-layers font-dark"></i>
                                    <span class="caption-subject bold uppercase">إضافة مستخدم</span>
                                </div>

                                <div class="tools"> </div>
                            </div>
                            <?php echo $__env->make('includes.messages', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>


                            <div class="portlet-body">
                                                                
                                            
                                                                                        
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label for="single0">اسم المستخدم <span>*</span></label>
                                    <input type="text" name="username" class="form-control" placeholder=""> 
                                </div>
                                </div>             
                                                                                        
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label for="single0">الايميل <span>*</span></label>
                                    <input type="text" name="email" class="form-control" placeholder=""> 
                                </div>
                                </div>              
                                                                                        
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label for="single0">رقم الجوال <span>*</span></label>
                                    <input type="text" dir="ltr" style="text-align: right" name="phone" class="form-control" placeholder=""> 
                                </div>
                                </div>              
                                                                                        
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label for="single0">كلمة المرور <span>*</span></label>
                                    <input type="password" name="password" class="form-control" placeholder=""> 
                                </div>
                                </div>                          
                                                                    
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label>نبذة</label>
                                    <textarea name="description" class="form-control" rows="5"></textarea>
                                </div>
                                </div>       
                                                                                                                                                                
                                


                            <div class="col-md-10 col-md-offset-1 col-sm-12">
                                <fieldset>
                                <legend class="font-purple">الصلاحية</legend>
                                
                                
                                
                                <div class="form-group">
                                    <label class="font-purple"><h4>المشاريع</h4></label>
                                    <div class="input-group">
                                    <div class="icheck-inline">
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="projectAdd"> إضافة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="projectEdit"> تعديل </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="projectDelete"> حذف </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="projectShow"> عرض </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="projectDownload"> تحميل </label>
                                    </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="font-purple"><h4>الخدمات</h4></label>
                                    <div class="input-group">
                                    <div class="icheck-inline">
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="serviceAdd"> إضافة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="serviceEdit"> تعديل </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="serviceDelete"> حذف </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="serviceShow"> عرض </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="serviceDownload"> تحميل </label>
                                    </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="font-purple"><h4>المدفوعات</h4></label>
                                    <div class="input-group">
                                    <div class="icheck-inline">
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="paymentAdd"> إضافة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="paymentEdit"> تعديل </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="paymentDelete"> حذف </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="paymentShow"> عرض </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="paymentDownloadPaid"> تحميل سند صرف </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="paymentDownloadReceived"> تحميل سند قبض </label>
                                    </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="font-purple"><h4>المصروفات</h4></label>
                                    <div class="input-group">
                                    <div class="icheck-inline">
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="expenseAdd"> إضافة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="expenseEdit"> تعديل </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="expenseDelete"> حذف </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="expenseShow"> عرض </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="expenseDownloadPain"> تحميل سند صرف </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="expenseDownloadReceived"> تحميل سند قبض </label>
                                    </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="font-purple"><h4>الاعدادات</h4></label>
                                    <div class="input-group">
                                    <div class="icheck-inline">
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="settingsGeneralAdd"> إضافة فى عام </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="settingsGeneralEdit"> تعديل فى عام </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="settingsBankAdd"> إضافة فى حسابات الشركة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="settingsBankEdit"> تعديل فى حسابات الشركة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="settingsTransfer"> عمل تحويل بين الحسابات </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="settingsPercentageAdd"> إضافة نسبة </label>
                                    </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="font-purple"><h4>المستخدمين</h4></label>
                                    <div class="input-group">
                                    <div class="icheck-inline">
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersUserAdd"> إضافة مستخدم </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersClientAdd"> إضافة عميل </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersEmployeeAdd"> إضافة مقدم خدمة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersUserEdit"> تعديل مستخدم </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersClientEdit"> تعديل عميل </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersEmployeeEdit"> تعديل مقدم خدمة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersUserDelete"> حذف مستخدم </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersClientDelete"> حذف عميل </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersEmployeeDelete"> حذف مقدم خدمة </label>
                                    </div>
                                    </div>
                                </div>
                                    <hr>
                            
                            
                            
                            
                                </fieldset> 
                                </div>
                            
                            
                            
                            
                            
                            
                                
                                
                                
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label>صـورة</label>
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
                                                <input type="file" name="photo"> </span>
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
                                
                                    <button type="submit" class="btn btn-lg green margin-right-10">إضافة</button>
                
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