<h3 style="text-align: center">بيانات التحويل</h3>
<hr>
<br><br>

<?php
    $month = $bankTransfer->created_at->format('M');
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
<label style="color: #8E44AD">تاريخ التحويل</label>
<h4>{{ $bankTransfer->created_at->format('d') }} {{$ar_month}} {{ $bankTransfer->created_at->format('Y') }}</h4>


<label style="color: #8E44AD">من البنك</label>
<h4>{{ $bankTransfer->from_bank->name}}</h4>



<label style="color: #8E44AD">إلى البنك</label>
<h4>{{ $bankTransfer->to_bank->name}}</h4>



<label style="color: #8E44AD">المبلغ المحول</label>
<h4>{{ $bankTransfer->transfer_amount}} ريال</h4>


@if($bankTransfer->percentage)
    <label style="color: #8E44AD">النسبة المقتطعة</label>
    <h4>{{ $bankTransfer->percentage->name}} ({{ $bankTransfer->percentage->value}}%)</h4>

    <label style="color: #8E44AD">قيمة النسبة المقتطعة</label>
    <h4>{{ $bankTransfer->transfer_percentage}} ريال</h4>

    <label style="color: #8E44AD">صافي المبلغ المحول</label>
    <h4>{{ $bankTransfer->net_transfer_amount}} ريال</h4>
@endif

@if( $bankTransfer->attachement)
    <label style="color: #8E44AD">الملف المرفق</label>
    <h5><a dir="ltr" href="{{ asset('storage/attachements/') }}/{{ $bankTransfer->attachement }}" download>{{ $bankTransfer->attachement }}</a></h5>
@endif

