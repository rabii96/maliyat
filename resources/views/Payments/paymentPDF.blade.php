<h3 style="text-align: center">بيانات الدفعة</h3>
<hr>
<br><br>

<h4 style="color: #8E44AD">اسم المشروع </h4>
<h4>{{ $realPayment->project->name}}</h4>
 
<h4 style="color: #8E44AD">رقم الدفعة</h4>
<h4>{{ $realPayment->expected_payment->index }}</h4>

<h4 style="color: #8E44AD">المبلغ الأصلي للدفعة</h4>
<h4>{{ $realPayment->expected_payment->value }} ريال</h4>

<h4 style="color: #8E44AD">المبلغ المدفوع في هذه الدفعة</h4>
<h4>{{ $realPayment->paid_value }} ريال</h4>

<h4 style="color: #8E44AD">المبلغ المتبقي للدفعة</h4>
<h4>{{ $realPayment->expected_payment->remaining_value }} ريال</h4>

<h4 style="color: #8E44AD"> طريقة التحويل في هذه الدفعة</h4>
@if($realPayment->transfer_method)
    <h4>إسم طريقة التحويل : 
        {{ $realPayment->transfer_method->name }}
    </h4>
    @if(@$realPayment->transfer_method->name == 'باي بال')
        <h4>الايميل : 
        {{ $realPayment->paypal_email }}</h4>
    @elseif(@$realPayment->transfer_method->name == 'بنك')
        <h4>إسم البنك : 
        {{ @$realPayment->from_bank->name }}</h4>
        <h4>رقم الحساب : 
        {{ $realPayment->from_bank_number }}</h4>
    @elseif(@$realPayment->transfer_method->name == 'شيك')
        <h4>إسم البنك : 
            {{ @$realPayment->from_bank->name }}</h4>
        <h4>رقم الشيك : 
        {{ $realPayment->check_number }}</h4>
    @else
        <h4>رقم الحساب : 
        {{ @$realPayment->from_bank_number }}</h4>
    @endif
@else
    <h4>إسم طريقة التحويل : 
        كاش
    </h4>
    <h4>إسم المحول :
        {{ $realPayment->transferer_name }}
    </h4>
@endif
<?php
    $month = $realPayment->date->format('M');
    $arabic_months = [
        "Jan" => "يناير",
        "Feb" => "فبراير",
        "Mar" => "مارس",
        "Apr" => "أبريل",
        "May" => "مايو",
        "Jun" => "يونيو",
        "Jul" => "يوليو",
        "Aug" => "أغسطس",
        "Sep" => "سبتمبر",
        "Oct" => "أكتوبر",
        "Nov" => "نوفمبر",
        "Dec" => "ديسمبر"
    ];
    $ar_month = $arabic_months[$month];
?>

<h4 style="color: #8E44AD">البنك المحول إليه</h4>
<h4>{{ $realPayment->to_bank->name }}</h4>
<h4 style="color: #8E44AD">رقم حسابه</h4>
<h4>{{ $realPayment->to_bank->account_number }}</h4>

<h4 style="color: #8E44AD">تاريخ الدفعة</h4>
<h4>{{ $realPayment->date->format('d') }} {{$ar_month}} {{ $realPayment->date->format('Y') }}</h4>

@if( $realPayment->attachement)
    <h4 style="color: #8E44AD">الملف المرفق</h4>
    <h4><a dir="rtl" href="{{ asset('storage/attachements/') }}/{{ $realPayment->attachement }}" download>{{ $realPayment->attachement }}</a></h4>
@endif

