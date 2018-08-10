<h3 style="text-align: center">بيانات مقدم الخدمة</h3>
<hr>
<br><br>
<label style="color: #8E44AD">اسم مقدم الخدمة </label>
<h4>{{ $employee->name}}</h4>

<label style="color: #8E44AD">الإيميل</label>
<h4>{{ $employee->email}}</h4>

<label style="color: #8E44AD">الجوال</label>
<h4>{{ $employee->phone}}</h4>

@if( $employee->description)
<label style="color: #8E44AD">نبذة</label>
<h4>{{ $employee->description }}</h4>
@endif

<label style="color: #8E44AD">المهمة</label>
<h4>{{ $employee->task->name}}</h4>

@if(@$employee->employee_accounts)
        <label style="color: #8E44AD">طرق التحويل</label>
        @if(@$employee->employee_accounts[0]->transfer_method->name != 'أخرى')
                <h5>إسم طريقة التحويل : 
                {{ @$employee->employee_accounts[0]->transfer_method->name }}</h5>
        @endif
        @foreach(@$employee->employee_accounts as $account)
                @if($account->transfer_method->name == 'باي بال')
                        <h5>الايميل : 
                        {{ $account->paypal_email }}</h5>
                @elseif($account->transfer_method->name == 'بنك')
                        <h5>إسم البنك : 
                        {{ $account->bank_name }}</h5>
                        <h5>رقم الحساب : 
                        {{ $account->bank_account_number }}</h5>
                @elseif($account->transfer_method->name == 'شيك')
                        <h5>رقم الشيك : 
                        {{ $account->check_number }}</h5>
                @elseif($account->transfer_method->name == 'أخرى')
                        <h5>إسم طريقة التحويل : 
                        {{ $account->other_method_name }}</h5>
                        <h5>رقم الحساب : 
                        {{ $account->other_method_number }}</h5>
                @else
                        <h5>رقم الحساب : 
                        {{ $account->default_number }}</h5>
                @endif
                <hr>
                
        @endforeach
@endif

@if( $employee->attachement)
        <label style="color: #8E44AD">الملف المرفق</label>
        <h4><a dir="rtl" href="{{ asset('storage/attachements/') }}/{{ $employee->attachement }}" download>{{ $employee->attachement }}</a></h4>
@endif


