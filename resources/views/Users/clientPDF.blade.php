<h3 style="text-align: center">بيانات العميل</h3>
<hr>
<br><br>
<label style="color: #8E44AD">اسم العميل </label>
<h4>{{ $client->name}}</h4>


@if( $client->description)
        <label style="color: #8E44AD">نبذة</label>
        <h4>{{ $client->description }}</h4>
@endif

@if( $client->attachement)
        <label style="color: #8E44AD">الملف المرفق</label>
        <h4><a dir="rtl" href="{{ asset('storage/attachements/') }}/{{ $client->attachement }}" download>{{ $client->attachement }}</a></h4>

@endif
 

