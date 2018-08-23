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
                    <form method="POST" action="{{ route('addEmployee') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="portlet light ">

                            <div class="portlet-title">
                                <div class="caption font-dark">
                                    <i class="icon-layers font-dark"></i>
                                    <span class="caption-subject bold uppercase">إضافة مقدم خدمة</span>
                                </div>
                                
                                <div class="tools"> </div>
                            </div>

                            <div class="portlet-body">
                                                                
                                            
                                                                                        
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                    <div class="form-group">
                                        <label for="single0">الاسم <span>*</span></label>
                                        <input id="name" name="name" value="{{ old('name') }}" type="text" required class="form-control" placeholder=""> 
                                    </div>
                                </div>     

                                                                                
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label for="employee_task">مهامه <span>*</span></label>
                                    <select id="employee_task" name="employee_task" required class="form-control select2 select-hide">
                                        <option value="" disabled selected>-- إختر --</option>
                                        @foreach($tasks as $task)
                                            <option value="{{ $task->id }}">{{ $task->name }}</option>
                                        @endforeach
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
                                            <input dir="ltr" style="text-align: right" id="phone" name="phone" required type="text" class="form-control" placeholder=""> 
                                        </div>
                                </div>

                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                        <div class="form-group">
                                            <label for="single0">الايميل <span>*</span></label>
                                            <input id="email" name="email" value="{{ old('email') }}" required type="text" class="form-control" placeholder=""> 
                                        </div>
                                </div>
                                            
                                                                                        
                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                <div class="form-group">
                                    <label for="transferMethodSelect">طريقة التحويل <span>*</span></label>
                                    <select id="transferMethodSelect" name="transferMethodSelect" required class="form-control select2 select-hide">
                                        <option disabled selected>-- إختر --</option>
                                        @if($transferMethods)
                                            @foreach($transferMethods as $transferMethod)
                                                @if( $transferMethod->id  != 0 )  
                                                    <option value="{{ $transferMethod->id }}">{{ $transferMethod->name }}</option>
                                                @endif
                                            @endforeach
                                            <option value="0">أخرى</option>
                                        @endif
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
                                    <label>الايميل </label>
                                    <div class="input-icon">
                                        <i class="fa fa-envelope font-green "></i>
                                        <input name="paypal_email" id="paypal_email" type="text" class="form-control" placeholder=""> 
                                    </div>
                                </div>
                            
                            
                                
                                    
                                    <div class="col-md-12">
                                    <div class="form-group text-center">
                                    
                                    <button id="add_paypal_email" type="button" class="btn green margin-right-10">إضافة</button>
                                    <button id="delete_paypal_emails" type="button" class="btn red margin-right-10">حذف كل الحسابات</button>

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
                                                    <script>var j=0;</script>
                                                    <tbody id="paypal_emails_table">
                                                        
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
                                            <input name="bank_account_number" dir="ltr" style="text-align: right" id="bank_account_number" dir="ltr" style="text-align: right" type="text" class="form-control" placeholder=""> 
                                        </div>
                                    </div>
                                
                                
                                    
                                        
                                        <div class="col-md-12">
                                        <div class="form-group text-center">
                                        
                                        <button id="add_employee_bank" type="button" class="btn green margin-right-10">إضافة</button>
                                        <button id="delete_employee_banks" type="button" class="btn red margin-right-10">حذف كل الحسابات</button>
                    
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
                                            <script>var i = 0;</script>
                                            <tbody id="bank_accounts_table">
                                                    
                                            </tbody>
                                        </table>
                                    </div>
                                        </div>
                                            
                                        </div>
                                
                                
                                    </fieldset> 
                            </div>




                            <div class="col-md-6 col-md-offset-3 col-sm-12">
                                    <fieldset id="check" style="display: none;">
                                    <legend class="font-purple">شيك</legend>
                                    

                                    <div class="form-group">
                                        <label>رقم الشيك </label>
                                        <div class="input-icon">
                                            <i class="fa fa-barcode font-green "></i>
                                            <input name="check_number" dir="ltr" style="text-align: right" id="check_number" dir="ltr" style="text-align: right" type="text" class="form-control" placeholder=""> 
                                        </div>
                                    </div>
                                
                                
                                    
                                        
                                        <div class="col-md-12">
                                        <div class="form-group text-center">
                                        
                                        <button id="add_check" type="button" class="btn green margin-right-10">إضافة</button>
                                        <button id="delete_checks" type="button" class="btn red margin-right-10">حذف كل الشيكات</button>
                    
                                        </div>
                                        </div>
                                
                                        
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th> # </th>
                                                    <th> رقم الشيك </th>
                                                </tr>
                                            </thead>
                                            <script>var k = 0;</script>
                                            <tbody id="checks_table">
                                                    
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
                                            <input name="other_method_name" id="other_method_name" type="text" class="form-control" placeholder=""> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>الرقم </label>
                                        <div class="input-icon">
                                            <i class="fa fa-barcode font-green "></i>
                                            <input name="other_method_number" dir="ltr" style="text-align: right" id="other_method_number" dir="ltr" style="text-align: right" type="text" class="form-control" placeholder=""> 
                                        </div>
                                    </div>
                                
                                
                                    
                                        
                                        <div class="col-md-12">
                                        <div class="form-group text-center">
                                        
                                        <button id="add_other_method" type="button" class="btn green margin-right-10">إضافة</button>
                                        <button id="delete_other_methods" type="button" class="btn red margin-right-10">حذف الكل </button>

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
                                            <script>var l=0;</script>
                                            <tbody id="other_methods_table">
                                                
                                            </tbody>
                                        </table>
                                    </div>
                                        </div>
                                            
                                        </div>
                                
                                
                                
                                    </fieldset> 
                                </div>
                            




                                <div class="col-md-6 col-md-offset-3 col-sm-12">
                                        <fieldset id="default" style="display: none;">
                                        <legend class="font-purple" id="default_name">...</legend>
                                        
                                        <div class="form-group">
                                            <label>رقم الحساب </label>
                                            <div class="input-icon">
                                                <i class="fa fa-barcode font-green "></i>
                                                <input name="default_account_number" dir="ltr" style="text-align: right" id="default_account_number" dir="ltr" style="text-align: right" type="text" class="form-control" placeholder=""> 
                                            </div>
                                        </div>
                                    
                                    
                                        
                                            
                                            <div class="col-md-12">
                                            <div class="form-group text-center">
                                            
                                            <button id="add_default" type="button" class="btn green margin-right-10">إضافة</button>
                                            <button id="delete_defaults" type="button" class="btn red margin-right-10">حذف كل الحسابات</button>
                        
                                            </div>
                                            </div>
                                    
                                            
                                            <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th> # </th>
                                                        <th> رقم الحساب </th>
                                                    </tr>
                                                </thead>
                                                <script>var m = 0;</script>
                                                <tbody id="defaults_table">
                                                        
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
@endsection