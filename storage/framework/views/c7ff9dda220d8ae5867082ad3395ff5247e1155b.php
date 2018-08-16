<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- END SIDEBAR -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200"><!-- page-sidebar-menu-hover-submenu-->
            <li class="nav-item start <?php echo e(Request::is('/') ? 'active' : ''); ?>">
                <a href="<?php echo e(route('dashboard')); ?>" class="nav-link nav-toggle">
                    <i class="icon-home"></i>
                    <span class="title">الرئيسية</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li class="nav-item  <?php echo e(Request::is('projects-and-services' , 'projects/*' , 'services/*') ? 'active open' : ''); ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">المشاريع والخدمات</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  <?php echo e(Request::is('projects-and-services') ? 'active open' : ''); ?>">
                        <a href="<?php echo e(route('allProjectsAndServices')); ?>" class="nav-link ">
                            <span class="title">كل المشاريع والخدمات</span>
                        </a>
                    </li>
                    <li class="nav-item  <?php echo e(Request::is('projects/add') ? 'active open' : ''); ?>">
                        <a href="<?php echo e(route('addProject')); ?>" class="nav-link ">
                            <span class="title">إضافة مشروع</span>
                        </a>
                    </li>
                    <li class="nav-item  <?php echo e(Request::is('services/add') ? 'active open' : ''); ?>">
                        <a href="<?php echo e(route('addService')); ?>" class="nav-link ">
                            <span class="title">إضافة خدمة</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  <?php echo e(Request::is('payments*') ? 'active open' : ''); ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-wallet"></i>
                    <span class="title">المدفوعات</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  <?php echo e(Request::is('payments') ? 'active open' : ''); ?>">
                        <a href="<?php echo e(route('allPayments')); ?>" class="nav-link ">
                            <span class="title">كل المدفوعات</span>
                        </a>
                    </li>
                    <li class="nav-item  <?php echo e(Request::is('payments/add') ? 'active open' : ''); ?>">
                        <a href="<?php echo e(route('addPayment')); ?>" class="nav-link ">
                            <span class="title">إضافة دفعة</span>
                        </a>
                    </li>
                </ul>
                
            </li>
            <li class="nav-item  <?php echo e(Request::is('expenses*') ? 'active open' : ''); ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-wallet"></i>
                    <span class="title">المصروفات</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  <?php echo e(Request::is('expenses') ? 'active open' : ''); ?>">
                        <a href="<?php echo e(route('allExpenses')); ?>" class="nav-link ">
                            <span class="title">كل المصروفات</span>
                        </a>
                    </li>
                    <li class="nav-item  <?php echo e(Request::is('expenses/add') ? 'active open' : ''); ?>">
                        <a href="<?php echo e(route('addExpense')); ?>" class="nav-link ">
                            <span class="title">إضافة مصروف</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item  <?php echo e(Request::is('settings', 'bankTransfer*') ? 'active open' : ''); ?>">
                <a href="<?php echo e(route('settings')); ?>" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">الإعدادات</span>
                </a>
            </li>
            <li class="nav-item  <?php echo e(Request::is('users*', 'employees*' , 'clients*') ? 'active open' : ''); ?>">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-users"></i>
                    <span class="title">المستخدمين</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  <?php echo e(Request::is('users') ? 'active open' : ''); ?>">
                        <a href="<?php echo e(route('allUsers')); ?>" class="nav-link ">
                            <span class="title">كل المستخدمين</span>
                        </a>
                    </li>
                    <li class="nav-item  <?php echo e(Request::is('clients/add') ? 'active open' : ''); ?>">
                        <a href="<?php echo e(route('addClient')); ?>" class="nav-link ">
                            <span class="title">إضافة عميل</span>
                        </a>
                    </li>
                    <li class="nav-item  <?php echo e(Request::is('employees/add') ? 'active open' : ''); ?>">
                        <a href="<?php echo e(route('addEmployee')); ?>" class="nav-link ">
                            <span class="title">إضافة مقدم خدمة</span>
                        </a>
                    </li>
                    <li class="nav-item  <?php echo e(Request::is('users/add') ? 'active open' : ''); ?>">
                        <a href="<?php echo e(route('addUser')); ?>" class="nav-link ">
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