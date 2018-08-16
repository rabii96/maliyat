<!-- BEGIN PAGE HEADER-->
<?php if(Request::is('/')): ?>
    <h3 class="page-title">الرئيسية</h3>
<?php endif; ?>
<?php if(Request::is('projects-and-services' , 'projects/*' , 'services/*')): ?>
    <h3 class="page-title">المشاريع والخدمات</h3>
<?php endif; ?>
<?php if(Request::is('payments*')): ?>
    <h3 class="page-title">المدفوعات</h3>
<?php endif; ?>
<?php if(Request::is('expenses*')): ?>
    <h3 class="page-title">المصروفات</h3>
<?php endif; ?>
<?php if(Request::is('settings*', 'bankTransfer*')): ?>
    <h3 class="page-title">الإعدادات</h3>
<?php endif; ?>
<?php if(Request::is('users*', 'employees*' , 'clients*')): ?>
    <h3 class="page-title">المستخدمين</h3>
<?php endif; ?>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <?php if(!Request::is('/')): ?>
            <li>
                <i class="icon-home"></i>
                <a href="<?php echo e(route('dashboard')); ?>">الرئيسية</a>
                <i class="fa fa-angle-left"></i>
            </li>
        <?php endif; ?>

            <?php if(Request::is('projects-and-services' , 'projects/*' , 'services/*')): ?>
                <li>
                    <a href="#">المشاريع و الخدمات</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <?php if(Request::is('projects/add')): ?>
                    <li class="active">
                            <span>إضافة مشروع</span>
                    </li>
                <?php elseif(Request::is('services/add')): ?>
                    <li class="active">
                            <span>إضافة خدمة</span>
                    </li>
                <?php elseif(Request::is('projects-and-services')): ?>
                    <li class="active">
                            <span>كل المشاريع والخدمات</span>
                    </li>
                <?php endif; ?>
            <?php elseif(Request::is('/')): ?>
                <li class="active">
                        <span>الرئيسية</span>
                </li>
            <?php elseif(Request::is('payments*')): ?>
                <li>
                    <a href="#">المدفوعات</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <?php if(Request::is('payments')): ?>
                    <li class="active">
                            <span>كل المدفوعات</span>
                    </li>
                <?php elseif(Request::is('payments/add')): ?>
                    <li class="active">
                            <span>إضافة دفعة</span>
                    </li>
                <?php endif; ?>
            <?php elseif(Request::is('expenses*')): ?>
                <li>
                    <a href="#">المصروفات</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <?php if(Request::is('expenses')): ?>
                    <li class="active">
                            <span>كل المصروفات</span>
                    </li>
                <?php elseif(Request::is('expenses/add')): ?>
                    <li class="active">
                            <span>إضافة مصروف</span>
                    </li>
                <?php endif; ?>
            <?php elseif(Request::is('settings', 'bankTransfer*')): ?>
                <li class="active">
                        <span>الإعدادات</span>
                </li>
            <?php elseif(Request::is('users*', 'employees*' , 'clients*')): ?>
                <li>
                    <a href="#">المستخدمين</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                <?php if(Request::is('users')): ?>
                    <li class="active">
                            <span>كل المستخدمين</span>
                    </li>
                <?php elseif(Request::is('clients/add')): ?>
                    <li class="active">
                            <span>إضافة عميل</span>
                    </li>
                <?php elseif(Request::is('employees/add')): ?>
                    <li class="active">
                            <span>إضافة مقدم خدمة</span>
                    </li>
                <?php elseif(Request::is('users/add')): ?>
                    <li class="active">
                            <span>إضافة مستخدم</span>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
    </ul>
</div>
<!-- END PAGE HEADER-->