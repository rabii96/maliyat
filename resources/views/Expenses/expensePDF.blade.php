<h3 style="text-align: center">بيانات المصروف</h3>
<hr>
<br><br>


        <h4 style="color: #8E44AD">اسم المصروف</h4>
        <h4>{{ $ex->name }}</h4>
    

    
        <h4 style="color: #8E44AD">نوع المصروف</h4>
        <h4>{{ @$ex->expense_type->name }}</h4>
    

    @if ($ex->details)
        
            <h4 style="color: #8E44AD">التفاصيل</h4>
            <h4>{{ $ex->details }}</h4>
        
    @endif

    @if($ex->project)
        
            <h4 style="color: #8E44AD">اسم المشروع </h4>
            <h4>{{ $ex->project->name}}</h4>
        
    @endif

    @if($ex->service)
        
            <h4 style="color: #8E44AD">اسم الخدمة </h4>
            <h4>{{ $ex->service->name}}</h4>
        
    @endif
    
    
        <h4 style="color: #8E44AD">رقم المصروف</h4>
        <h4>{{ $ex->id }}</h4>
    

    
        <h4 style="color: #8E44AD">صاحب المصروف</h4>
        <h4>{{ $ex->employee->name }}</h4>
    

    
        <h4 style="color: #8E44AD">المبلغ</h4>
        <h4>{{ $ex->value }} ريال</h4>
    

    
        <h4 style="color: #8E44AD">النسبة</h4>
        <h4>{{ $ex->percentage->name }} ({{ $ex->percentage->value}}%)</h4>
    

    
        <h4 style="color: #8E44AD">إجمالى المبلغ مع النسبة</h4>
        <h4>{{ $ex->value_plus_percentage }} ريال</h4>
    

    
        <h4 style="color: #8E44AD">طريقة التحويل</h4>
        <h4>{{ $ex->transfer_method->name }}</h4>
    

    
        <h4 style="color: #8E44AD">الحساب المحول منه</h4>
        <h4>{{ $ex->bank->name }}</h4>
    

    <?php
        $month = $ex->date->format('M');
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

    
            <h4 style="color: #8E44AD">تاريخ المصروف</h4>
            <h4>{{ $ex->date->format('d') }} {{$ar_month}} {{ $ex->date->format('Y') }}</h4>
    

    @if ($ex->remarks)
        
            <h4 style="color: #8E44AD">ملاحظات</h4>
            <h4>{{ $ex->remarks }}</h4>
        
    @endif

    @if( $ex->attachement)
        
            <h4 style="color: #8E44AD">الملف المرفق</h4>
            <h4><a dir="rtl" href="{{ asset('storage/attachements/') }}/{{ $ex->attachement }}" download>{{ $ex->attachement }}</a></h4>
        
    @endif