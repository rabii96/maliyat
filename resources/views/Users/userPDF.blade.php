<style>
    table {
        border-collapse: collapse;
        border: 1px solid black;
    }

    th,td {
        border: 1px solid black;
        padding-top: 5px;
        padding-bottom: 5px;
    }
</style>
<h3 style="text-align: center">بيانات المستخدم</h3>
<hr>
<br>
<table>
    <tr>
        <th><label style="color: #8E44AD">اسم المستخدم </label></th>
        <td><h4>{{ $user->username}}</h4></td>
    </tr>
    <tr>
        <th><label style="color: #8E44AD">الصورة</label></th>
        <td><br><img src="{{ asset('storage/photos') }}/{{ $user->photo }}" width="150px" alt="photo"></td>
    </tr>
    <tr>
        <th><label style="color: #8E44AD">الايميل </label></th>
        <td><h4>{{ $user->email }}</h4></td>
    </tr>
    <tr>
        <th><label style="color: #8E44AD">الجوال </label></th>
        <td><h4 dir="ltr" style="text-align: right">{{ $user->phone }}</h4></td>
    </tr>
    @if( $user->description)
    <tr>
        <th><label style="color: #8E44AD">نبذة</label></th>
        <td><h4>{{ $user->description }}</h4></td>
    </tr>
    @endif
    <?php
        $permissions = unserialize($user->permissions);
    ?>
    <tr>
        <th><label style="color: #8E44AD">الصلاحيات</label></th>
        <td>
            @if($permissions)
                @foreach($permissions as $permission)
                <h4>- {{ __('permissions.'.$permission) }}</h4>
                @endforeach
            @else
                <h4>لا توجد</h4>
            @endif
        </td>
    </tr>
</table>

