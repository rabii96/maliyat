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
                    <form method="POST" action="{{ route('editUser' , ['id' => $user->id]) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="portlet light ">
                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-layers font-dark"></i>
                                    <span class="caption-subject bold uppercase">تعديل مستخدم</span>
                                </div>

                                <div class="tools"> </div>
                            </div>

                            <div class="portlet-body">
                                                                
                                            
                                                                                        
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label for="single0">اسم المستخدم <span>*</span></label>
                                    <input type="text" name="username" value="{{ $user->username }}" class="form-control" placeholder=""> 
                                </div>
                                </div>             
                                                                                        
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label for="single0">الايميل <span>*</span></label>
                                    <input type="text" name="email" value="{{ $user->email }}" class="form-control" placeholder=""> 
                                </div>
                                </div>              
                                                                                        
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label for="single0">رقم الجوال <span>*</span></label>
                                    <input type="text" value="{{ $user->phone }}" dir="ltr" style="text-align: right" name="phone" class="form-control" placeholder=""> 
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
                                    <textarea name="description"class="form-control" rows="5">{{ $user->description }}</textarea>
                                </div>
                                </div>       
                                                                                                                                                                
                                <?php
                                    $permissions = unserialize($user->permissions);
                                    if($permissions==null){
                                        $permissions = [];
                                    }
                                ?>


                            <div class="col-md-10 col-md-offset-1 col-sm-12">
                                <fieldset>
                                <legend class="font-purple">الصلاحية</legend>
                                
                                
                                
                                <div class="form-group">
                                    <label class="font-purple"><h4>المشاريع</h4></label>
                                    <div class="input-group">
                                    <div class="icheck-inline">
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="projectAdd" {{ in_array('projectAdd',$permissions) ? 'checked' : ''}}> إضافة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="projectEdit" {{ in_array('projectEdit',$permissions) ? 'checked' : ''}}> تعديل </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="projectDelete" {{ in_array('projectDelete',$permissions) ? 'checked' : ''}}> حذف </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="projectShow" {{ in_array('projectShow',$permissions) ? 'checked' : ''}}> عرض </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="projectDownload" {{ in_array('projectDownload',$permissions) ? 'checked' : ''}}> تحميل </label>
                                    </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="font-purple"><h4>الخدمات</h4></label>
                                    <div class="input-group">
                                    <div class="icheck-inline">
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="serviceAdd" {{ in_array('serviceAdd',$permissions) ? 'checked' : ''}}> إضافة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="serviceEdit" {{ in_array('serviceEdit',$permissions) ? 'checked' : ''}}> تعديل </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="serviceDelete" {{ in_array('serviceDelete',$permissions) ? 'checked' : ''}}> حذف </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="serviceShow" {{ in_array('serviceShow',$permissions) ? 'checked' : ''}}> عرض </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="serviceDownload" {{ in_array('serviceDownload',$permissions) ? 'checked' : ''}}> تحميل </label>
                                    </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="font-purple"><h4>المدفوعات</h4></label>
                                    <div class="input-group">
                                    <div class="icheck-inline">
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="paymentAdd" {{ in_array('paymentAdd',$permissions) ? 'checked' : ''}}> إضافة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="paymentEdit" {{ in_array('paymentEdit',$permissions) ? 'checked' : ''}}> تعديل </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="paymentDelete" {{ in_array('paymentDelete',$permissions) ? 'checked' : ''}}> حذف </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="paymentShow" {{ in_array('paymentShow',$permissions) ? 'checked' : ''}}> عرض </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="paymentDownloadPaid" {{ in_array('paymentDownloadPaid',$permissions) ? 'checked' : ''}}> تحميل سند صرف </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="paymentDownloadReceived" {{ in_array('paymentDownloadReceived',$permissions) ? 'checked' : ''}}> تحميل سند قبض </label>
                                    </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="font-purple"><h4>المصروفات</h4></label>
                                    <div class="input-group">
                                    <div class="icheck-inline">
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="expenseAdd" {{ in_array('expenseAdd',$permissions) ? 'checked' : ''}}> إضافة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="expenseEdit" {{ in_array('expenseEdit',$permissions) ? 'checked' : ''}}> تعديل </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="expenseDelete" {{ in_array('expenseDelete',$permissions) ? 'checked' : ''}}> حذف </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="expenseShow" {{ in_array('expenseShow',$permissions) ? 'checked' : ''}}> عرض </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="expenseDownloadPain" {{ in_array('expenseDownloadPain',$permissions) ? 'checked' : ''}}> تحميل سند صرف </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="expenseDownloadReceived" {{ in_array('expenseDownloadReceived',$permissions) ? 'checked' : ''}}> تحميل سند قبض </label>
                                    </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="font-purple"><h4>الاعدادات</h4></label>
                                    <div class="input-group">
                                    <div class="icheck-inline">
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="settingsGeneralAdd" {{ in_array('settingsGeneralAdd',$permissions) ? 'checked' : ''}}> إضافة فى عام </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="settingsGeneralEdit" {{ in_array('settingsGeneralEdit',$permissions) ? 'checked' : ''}}> تعديل فى عام </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="settingsBankAdd" {{ in_array('settingsBankAdd',$permissions) ? 'checked' : ''}}> إضافة فى حسابات الشركة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="settingsBankEdit" {{ in_array('settingsBankEdit',$permissions) ? 'checked' : ''}}> تعديل فى حسابات الشركة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="settingsTransfer" {{ in_array('settingsTransfer',$permissions) ? 'checked' : ''}}> عمل تحويل بين الحسابات </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="settingsPercentageAdd" {{ in_array('settingsPercentageAdd',$permissions) ? 'checked' : ''}}> إضافة نسبة </label>
                                    </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-group">
                                    <label class="font-purple"><h4>المستخدمين</h4></label>
                                    <div class="input-group">
                                    <div class="icheck-inline">
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersUserAdd" {{ in_array('usersUserAdd',$permissions) ? 'checked' : ''}}> إضافة مستخدم </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersClientAdd" {{ in_array('usersClientAdd',$permissions) ? 'checked' : ''}}> إضافة عميل </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersEmployeeAdd" {{ in_array('usersEmployeeAdd',$permissions) ? 'checked' : ''}}> إضافة مقدم خدمة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersUserEdit" {{ in_array('usersUserEdit',$permissions) ? 'checked' : ''}}> تعديل مستخدم </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersClientEdit" {{ in_array('usersClientEdit',$permissions) ? 'checked' : ''}}> تعديل عميل </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersEmployeeEdit" {{ in_array('usersEmployeeEdit',$permissions) ? 'checked' : ''}}> تعديل مقدم خدمة </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersUserDelete" {{ in_array('usersUserDelete',$permissions) ? 'checked' : ''}}> حذف مستخدم </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersClientDelete" {{ in_array('usersClientDelete',$permissions) ? 'checked' : ''}}> حذف عميل </label>
                                        <label><input type="checkbox" name="permissions[]" class="icheck" data-checkbox="icheckbox_square-purple" value="usersEmployeeDelete" {{ in_array('usersEmployeeDelete',$permissions) ? 'checked' : ''}}> حذف مقدم خدمة </label>
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
                                
                                    <button type="submit" class="btn btn-lg green margin-right-10">تعديل</button>
                
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