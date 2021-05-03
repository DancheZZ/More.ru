@extends ('layout')

@section ('content')
<form method = "POST" enctype="multipart/form-data" action = "{{ route('register') }}" >
@csrf
<p>Имя</p>
<input type = "text" id = "name" name = "name">
<p>Фамилия </p>
<input type="text" id = "surname" name = "surname"><br><br>
<p>Фото профиля </p>
<input type = "file" id = "avatar" name = "avatar">

<p>Телефон </p>
<input type="tel" id = 'phone' name = 'phone'> <br><br>
<p>Почта</p>
<input type="email" id = "email" name = "email"><br><br>
<p>Дата рождения</p>
 <input type="date" id="date" name="date"/>
<p>Пароль</p> 
<input id = "password" type = "password" name = "password"><br><br>
<p>Подтверждение пароля</p>
<input id="password-confirm" type="password" name="password_confirmation">

<button type = "submit" value = "Зарегистрироваться" > Регистрация</button>
</form>
@endsection

