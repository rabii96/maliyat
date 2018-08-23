<h3 style="text-align: center">بيانات الخدمة</h3>
<hr>
<br><br>
<label style="color: #8E44AD">اسم الخدمة </label>
<h4>{{ $service->name}}</h4>



@if( $service->start_date)
    <?php
        $month = $service->start_date->format('M');
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
        <label style="color: #8E44AD">تاريخ البداية</label>
        <h4>{{ $service->start_date->format('d') }} {{ $ar_month }} {{ $service->start_date->format('Y') }}</h4>
@endif

@if( $service->end_date)
    <?php
        $month = $service->end_date->format('M');
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
        <label style="color: #8E44AD">تاريخ النهاية</label>
        <h4>{{ $service->end_date->format('d') }} {{ $ar_month }} {{ $service->end_date->format('Y') }}</h4>
@endif



@if($service->total_cost)
    <label style="color: #8E44AD">التكلفة الاجمالية</label>
    <h4>{{ $service->total_cost }} ريال</h4>
@endif

@if($service->details)
    <label style="color: #8E44AD">التفاصيل</label>
    <h4>{{ $service->details }}</h4>
@endif

@if( $service->attachement)
        <label style="color: #8E44AD">الملف المرفق</label>
        <h4><a dir="rtl" href="{{ asset('storage/attachements/') }}/{{ $service->attachement }}" download>{{ $service->attachement }}</a></h4>
@endif

@if($service->remarks)
    <label style="color: #8E44AD">ملاحظات</label>
    <h4>{{ $service->remarks }}</h4>
@endif
 

