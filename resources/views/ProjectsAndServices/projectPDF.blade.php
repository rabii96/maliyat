<h3 style="text-align: center">بيانات المشروع</h3>
<hr>
<br><br>

<label style="color: #8E44AD">رقم المشروع </label>
<h4>مشروع رقم {{ $project->id }}</h4>

<label style="color: #8E44AD">اسم المشروع </label>
<h4>{{ $project->name}}</h4>

<?php
    $start_month = $project->start_date->format('M');
    $end_month = $project->end_date->format('M');
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
    $st_month = $arabic_months[$start_month];
    $e_month = $arabic_months[$end_month];
?>

<label style="color: #8E44AD">تاريخ البداية</label>
<h4>{{ $project->start_date->format('d') }} {{ $st_month }} {{ $project->start_date->format('Y') }}</h4>

<label style="color: #8E44AD">تاريخ النهاية</label>
<h4>{{ $project->end_date->format('d') }} {{ $e_month }} {{ $project->end_date->format('Y') }}</h4>


@if($project->details)
    <label style="color: #8E44AD">التفاصيل</label>
    <h4>{{ $project->details }}</h4>
@endif


<label style="color: #8E44AD">العميل</label>
<h4>{{ $project->client->name }}</h4>


<label style="color: #8E44AD">تكلفة المشروع</label>
<h4>{{ $project->total_cost }} ريال</h4>


<label style="color: #8E44AD">عدد الدفعات</label>
<h4>{{ $project->expected_payments->count() }}</h4>

<?php
    $total_paid = 0;
    $total_remaining = 0;
    foreach($project->expected_payments as $p){
        $total_paid += $p->paid_value;
        $total_remaining += $p->remaining_value;
    }
?>
<label style="color: #8E44AD">إجمالى المبلغ المستلم</label>
<h4>{{ $total_paid }} ريال</h4>

<label style="color: #8E44AD">إجمالى المبلغ المتبقي</label>
<h4>{{ $total_remaining }} ريال</h4>

@php
    $expenses = 0;
    if($project->expenses){
        foreach ($project->expenses as $ex) {
            $expenses += $ex->value_plus_percentage;
        }
    }
    $net_profit = $total_paid - $expenses;
@endphp

<label style="color: #8E44AD">إجمالى المبلغ المصروف</label>
<h4>{{ $expenses }} ريال</h4>

<label style="color: #8E44AD">تفاصيل الدفعات</label>
@foreach($project->expected_payments as $p)
<br><br>
<hr>
    @if($p->state == 'Paid')
        <h4 style="color: #8E44AD">تاريخ الدفعة</h4>
        <h4> {{ $p->date->format('d/m/Y') }}</h4>
        <h4 style="color: #8E44AD">قيمتها :</h4>
        <h4>{{ $p->value }} ريال</h4>
        <h4 style="color: #8E44AD">حالتها :</h4>
        <h4>تم الدفع</h4>
    @elseif($p->state == 'Unpaid')
        @if(strtotime($p->date) >= strtotime((new Date('-1 day'))))
            <h4 style="color: #8E44AD">تاريخ الدفعة</h4>
            <h4> {{ $p->date->format('d/m/Y') }}</h4>
            <h4 style="color: #8E44AD">قيمتها :</h4>
            <h4>{{ $p->value }} ريال</h4>
            <h4 style="color: #8E44AD">حالتها :</h4>
            <h4>متأخر عن تاريخ الدفع</h4>
        @else
            <h4 style="color: #8E44AD">تاريخ الدفعة</h4>
            <h4> {{ $p->date->format('d/m/Y') }}</h4>
            <h4 style="color: #8E44AD">قيمتها :</h4>
            <h4>{{ $p->value }} ريال</h4>
            <h4 style="color: #8E44AD">حالتها :</h4>
            <h4>لم يتم الدفع</h4>
        @endif
    @endif
@endforeach
<hr>

@if( $project->attachement)
        <label style="color: #8E44AD">الملف المرفق</label>
        <h4><a dir="rtl" href="{{ asset('storage/attachements/') }}/{{ $project->attachement }}" download>{{ $project->attachement }}</a></h4>
@endif

@if($project->remarks)
    <label style="color: #8E44AD">ملاحظات</label>
    <h4>{{ $project->remarks }}</h4>
@endif
 

