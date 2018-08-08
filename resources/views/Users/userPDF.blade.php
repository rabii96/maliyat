<h3 style="text-align: center">بيانات المستخدم</h3>
<hr>
<br>
<label style="color: #8E44AD">اسم المستخدم </label>
<h4>{{ $user->username}}</h4>
<br>
<label style="color: #8E44AD">الصورة</label><br><br>
<img src="{{ asset('storage/photos') }}/{{ $user->photo }}" width="150px" alt="photo">
<br>
<label style="color: #8E44AD">الايميل </label>
<h4>{{ $user->email }}</h4>
<br>
<label style="color: #8E44AD">الجوال </label>
<h4 dir="ltr" style="text-align: right">{{ $user->phone }}</h4>
<br>
@if( $user->description)
<label style="color: #8E44AD">نبذة</label>
<h4>{{ $user->description }}</h4>
@endif
<br>
<?php
$permissions = unserialize($user->permissions);
?>
<label style="color: #8E44AD">الصلاحيات</label>
@if($permissions)
@foreach($permissions as $permission)
<h4>- {{ __('permissions.'.$permission) }}</h4>
@endforeach
@else
<h4>لا توجد</h4>
@endif
