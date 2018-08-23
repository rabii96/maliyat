<!-- BEGIN PAGE HEADER-->
@if(Request::is('/'))
    <h3 class="page-title">الرئيسية</h3>
@endif
@if(Request::is('projects-and-services' , 'project*' , 'service*'))
    <h3 class="page-title">المشاريع والخدمات</h3>
@endif
@if(Request::is('payments*'))
    <h3 class="page-title">الدفعات</h3>
@endif
@if(Request::is('expenses*'))
    <h3 class="page-title">المصروفات</h3>
@endif
@if(Request::is('settings*', 'bankTransfer*'))
    <h3 class="page-title">الإعدادات</h3>
@endif
@if(Request::is('users*', 'employees*' , 'clients*'))
    <h3 class="page-title">المستخدمين</h3>
@endif
<div class="page-bar">
    <ul class="page-breadcrumb">
        @if(!Request::is('/'))
            <li>
                <i class="icon-home"></i>
                <a href="{{ route('dashboard')}}">الرئيسية</a>
                <i class="fa fa-angle-left"></i>
            </li>
        @endif

            @if(Request::is('projects-and-services' , 'project*' , 'service*'))
                <li>
                    <a href="#">المشاريع و الخدمات</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                @if(Request::is('projects/add'))
                    <li class="active">
                            <span>إضافة مشروع</span>
                    </li>
                @elseif(Request::is('project/edit/*'))
                    <li class="active">
                            <span>تعديل مشروع</span>
                    </li>
                @elseif(Request::is('project/*'))
                    <li class="active">
                            <span>عرض مشروع</span>
                    </li>
                @elseif(Request::is('services/add'))
                    <li class="active">
                            <span>إضافة خدمة</span>
                    </li>
                @elseif(Request::is('service/edit/*'))
                    <li class="active">
                            <span>تعديل خدمة</span>
                    </li>
                @elseif(Request::is('service/*'))
                    <li class="active">
                            <span>عرض خدمة</span>
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
                    <a href="#">الدفعات</a>
                    <i class="fa fa-angle-left"></i>
                </li>
                @if(Request::is('payments'))
                    <li class="active">
                            <span>كل الدفعات</span>
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
            @elseif(Request::is('settings', 'bankTransfer*'))
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