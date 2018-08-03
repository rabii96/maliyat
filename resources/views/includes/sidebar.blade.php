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
            <li class="nav-item  {{Request::is('projects-and-services' , 'projects/*' , 'services/*') ? 'active open' : ''}}">
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
                    <li class="nav-item  {{Request::is('projects/add') ? 'active open' : ''}}">
                        <a href="{{ route('addProject') }}" class="nav-link ">
                            <span class="title">إضافة مشروع</span>
                        </a>
                    </li>
                    <li class="nav-item  {{Request::is('services/add') ? 'active open' : ''}}">
                        <a href="{{ route('addService') }}" class="nav-link ">
                            <span class="title">إضافة خدمة</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  {{Request::is('payments*') ? 'active open' : ''}}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-wallet"></i>
                    <span class="title">المدفوعات</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  {{Request::is('payments') ? 'active open' : ''}}">
                        <a href="{{ route('allPayments') }}" class="nav-link ">
                            <span class="title">كل المدفوعات</span>
                        </a>
                    </li>
                    <li class="nav-item  {{Request::is('payments/add') ? 'active open' : ''}}">
                        <a href="{{ route('addPayment') }}" class="nav-link ">
                            <span class="title">إضافة دفعة</span>
                        </a>
                    </li>
                </ul>
                
            </li>
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
                    <li class="nav-item  {{Request::is('expenses/add') ? 'active open' : ''}}">
                        <a href="{{ route('addExpense') }}" class="nav-link ">
                            <span class="title">إضافة مصروف</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  {{Request::is('settings') ? 'active open' : ''}}">
                <a href="{{ route('settings') }}" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">الإعدادات</span>
                </a>
            </li>
            <li class="nav-item  {{Request::is('users*', 'employees*' , 'clients*') ? 'active open' : ''}}">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">المستخدمين</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  {{Request::is('users') ? 'active open' : ''}}">
                        <a href="{{ route('allUsers') }}" class="nav-link ">
                            <span class="title">كل المستخدمين</span>
                        </a>
                    </li>
                    <li class="nav-item  {{Request::is('clients/add') ? 'active open' : ''}}">
                        <a href="{{ route('addClient') }}" class="nav-link ">
                            <span class="title">إضافة عميل</span>
                        </a>
                    </li>
                    <li class="nav-item  {{Request::is('employees/add') ? 'active open' : ''}}">
                        <a href="{{ route('addEmployee') }}" class="nav-link ">
                            <span class="title">إضافة مقدم خدمة</span>
                        </a>
                    </li>
                    <li class="nav-item  {{Request::is('users/add') ? 'active open' : ''}}">
                        <a href="{{ route('addUser') }}" class="nav-link ">
                            <span class="title">إضافة مستخدم</span>
                        </a>
                    </li>
                </ul>
            </li>
                                    
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->