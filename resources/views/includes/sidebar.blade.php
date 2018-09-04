<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200"><!-- page-sidebar-menu-hover-submenu-->
            <li class="nav-item start {{Request::is('/') ? 'active' : ''}}">
                <a href="{{ route('dashboard')}}" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">الرئيسية</span>
                    <span class="selected"></span>
                </a>
            </li>
            @php
                $permissions = unserialize(Auth::user()->permissions);
                if($permissions == null){
                    $permissions = [];
                }
            @endphp 

            @if((in_array('projectShow',$permissions))||(in_array('projectAdd',$permissions)) ||
            (in_array('projectEdit',$permissions)) ||(in_array('projectDelete',$permissions)) ||
            (in_array('projectDownload',$permissions)) ||(in_array('serviceAdd',$permissions)) ||
            (in_array('serviceEdit',$permissions)) ||(in_array('serviceDelete',$permissions)) ||
            (in_array('serviceShow',$permissions)) ||(in_array('serviceDownload',$permissions)))
                <li class="nav-item  {{Request::is('projects-and-services' , 'project*' , 'service*') ? 'active open' : ''}}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-layers"></i>
                        <span class="title">المشاريع والخدمات</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  {{Request::is('projects-and-services') ? 'active open' : ''}}">
                            <a href="{{ route('allProjectsAndServices')}}" class="nav-link ">
                                <span class="title">كل المشاريع والخدمات</span>
                            </a>
                        </li>
                        @if(in_array('projectAdd',$permissions))
                            <li class="nav-item  {{Request::is('projects/add') ? 'active open' : ''}}">
                                <a href="{{ route('addProject') }}" class="nav-link ">
                                    <span class="title">إضافة مشروع</span>
                                </a>
                            </li>
                        @endif
                        @if(in_array('serviceAdd',$permissions))
                            <li class="nav-item  {{Request::is('services/add') ? 'active open' : ''}}">
                                <a href="{{ route('addService') }}" class="nav-link ">
                                    <span class="title">إضافة خدمة</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if((in_array('paymentAdd',$permissions))||(in_array('paymentEdit',$permissions)) ||
            (in_array('paymentDelete',$permissions)) ||(in_array('paymentShow',$permissions)) ||
            (in_array('paymentDownloadPaid',$permissions)) ||(in_array('paymentDownloadReceived',$permissions)))
                <li class="nav-item  {{Request::is('payments*') ? 'active open' : ''}}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-wallet"></i>
                        <span class="title">الدفعات</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  {{Request::is('payments') ? 'active open' : ''}}">
                            <a href="{{ route('allPayments') }}" class="nav-link ">
                                <span class="title">كل الدفعات</span>
                            </a>
                        </li>
                        @if((in_array('paymentAdd',$permissions)))
                            <li class="nav-item  {{Request::is('payments/add') ? 'active open' : ''}}">
                                <a href="{{ route('addPayment') }}" class="nav-link ">
                                    <span class="title">إضافة دفعة</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                    
                </li>
            @endif
            @if((in_array('expenseAdd',$permissions))||(in_array('expenseEdit',$permissions)) ||
            (in_array('expenseDelete',$permissions)) ||(in_array('expenseShow',$permissions)) ||
            (in_array('expenseDownloadPain',$permissions)) ||(in_array('expenseDownloadReceived',$permissions)))
                <li class="nav-item  {{Request::is('expenses*') ? 'active open' : ''}}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-wallet"></i>
                        <span class="title">المصروفات</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <li class="nav-item  {{Request::is('expenses') ? 'active open' : ''}}">
                            <a href="{{ route('allExpenses') }}" class="nav-link ">
                                <span class="title">كل المصروفات</span>
                            </a>
                        </li>
                        @if((in_array('expenseAdd',$permissions)))
                            <li class="nav-item  {{Request::is('expenses/add') ? 'active open' : ''}}">
                                <a href="{{ route('addExpense') }}" class="nav-link ">
                                    <span class="title">إضافة مصروف</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
            @if((in_array('settingsGeneralAdd',$permissions))||(in_array('settingsGeneralEdit',$permissions)) ||
            (in_array('settingsBankAdd',$permissions)) ||(in_array('settingsBankEdit',$permissions)) ||
            (in_array('settingsTransfer',$permissions)) ||(in_array('settingsPercentageAdd',$permissions)))
                <li class="nav-item  {{Request::is('settings', 'bankTransfer*') ? 'active open' : ''}}">
                    <a href="{{ route('settings') }}" class="nav-link nav-toggle">
                        <i class="icon-settings"></i>
                        <span class="title">الإعدادات</span>
                    </a>
                </li>
            @endif
            @if((in_array('usersUserAdd',$permissions))||(in_array('usersClientAdd',$permissions)) ||
            (in_array('usersEmployeeAdd',$permissions)) ||(in_array('usersUserEdit',$permissions)) ||
            (in_array('usersClientEdit',$permissions)) ||(in_array('usersEmployeeEdit',$permissions)) ||
            (in_array('usersUserDelete',$permissions)) ||(in_array('usersClientDelete',$permissions)) ||
            (in_array('usersEmployeeDelete',$permissions)))
                <li class="nav-item  {{Request::is('users*', 'employees*' , 'clients*') ? 'active open' : ''}}">
                    <a href="javascript:;" class="nav-link nav-toggle">
                        <i class="icon-users"></i>
                        <span class="title">المستخدمين</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        @if((in_array('usersUserEdit',$permissions)))
                            <li class="nav-item  {{Request::is('users') ? 'active open' : ''}}">
                                <a href="{{ route('allUsers') }}" class="nav-link ">
                                    <span class="title">كل المستخدمين</span>
                                </a>
                            </li>
                        @endif
                        @if((in_array('usersClientAdd',$permissions)))
                            <li class="nav-item  {{Request::is('clients/add') ? 'active open' : ''}}">
                                <a href="{{ route('addClient') }}" class="nav-link ">
                                    <span class="title">إضافة عميل</span>
                                </a>
                            </li>
                        @endif
                        @if((in_array('usersEmployeeAdd',$permissions)))
                            <li class="nav-item  {{Request::is('employees/add') ? 'active open' : ''}}">
                                <a href="{{ route('addEmployee') }}" class="nav-link ">
                                    <span class="title">إضافة مقدم خدمة</span>
                                </a>
                            </li>
                        @endif
                        @if((in_array('usersUserAdd',$permissions)))
                            <li class="nav-item  {{Request::is('users/add') ? 'active open' : ''}}">
                                <a href="{{ route('addUser') }}" class="nav-link ">
                                    <span class="title">إضافة مستخدم</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </li>
            @endif
                                    
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->