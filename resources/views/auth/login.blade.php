@extends('layout')

@section('content')
<form method = "POST" action = "{{ route('login') }}" >
@csrf
<p>Почта</p>
<input type="email" id = "email" name = "email"><br><br>
<p>Пароль</p> 
<input id = "password" type = "password" name = "password"><br><br>
<button type = "submit" value = "Зарегистрироваться" > Регистрация</button>
</form>
@endsection
