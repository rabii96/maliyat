<!-- BEGIN PAGE HEADER-->
<h3 class="page-title"> المشاريع والخدمات
    <small></small>
</h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="icon-home"></i>
            <a href="{{ route('dashboard')}}">الرئيسية</a>
            <i class="fa fa-angle-left"></i>
        </li>
            @if(Request::is('projects-and-services' , 'projects/*' , 'services/*'))
                <li>
                    <a href="#">المشاريع و الخدمات</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                @if(Request::is('projects/add'))
                    <li class="active">
                            <span>إضافة مشروع</span>
                    </li>
                @elseif(Request::is('services/add'))
                    <li class="active">
                            <span>إضافة خدمة</span>
                    </li>
                @elseif(Request::is('projects-and-services'))
                    <li class="active">
                            <span>كل المشاريع والخدمات</span>
                    </li>
                @endif
            @elseif(Request::is('/'))
                <li class="active">
                        <span>الرئيسية</span>
                </li>
            @elseif(Request::is('payments*'))
                <li>
                    <a href="#">المدفوعات</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                @if(Request::is('payments'))
                    <li class="active">
                            <span>كل المدفوعات</span>
                    </li>
                @elseif(Request::is('payments/add'))
                    <li class="active">
                            <span>إضافة دفعة</span>
                    </li>
                @endif
            @elseif(Request::is('expenses*'))
                <li>
                    <a href="#">المصروفات</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                @if(Request::is('expenses'))
                    <li class="active">
                            <span>كل المصروفات</span>
                    </li>
                @elseif(Request::is('expenses/add'))
                    <li class="active">
                            <span>إضافة مصروف</span>
                    </li>
                @endif
            @elseif(Request::is('settings'))
                <li class="active">
                        <span>الإعدادات</span>
                </li>
            @elseif(Request::is('users*', 'employees*' , 'clients*'))
                <li>
                    <a href="#">المستخدمين</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                @if(Request::is('users'))
                    <li class="active">
                            <span>كل المستخدمين</span>
                    </li>
                @elseif(Request::is('clients/add'))
                    <li class="active">
                            <span>إضافة عميل</span>
                    </li>
                @elseif(Request::is('employees/add'))
                    <li class="active">
                            <span>إضافة مقدم خدمة</span>
                    </li>
                @elseif(Request::is('users/add'))
                    <li class="active">
                            <span>إضافة مستخدم</span>
                    </li>
                @endif
            @endif
    </ul>
</div>
<!-- END PAGE HEADER-->