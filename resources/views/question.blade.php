@extends ('layout')

@section ('content')
<div class = "container content">
  <div class="row">

  <div class="col-md-2 mt-md-0 pt-0">
  </div>

  <div class="col-md-9 mt-md-0 pt-0">
		<p class="articl">
			Связаться со службой поддержки
		</p>
		<h1></h1>
    <br>

  <form action="domato@mail.ru" method="post">
    <p>Напишите свой вопрос или предложение:</p>
    <textarea rows="10" cols="45" name="text" class="message-text-area"></textarea></p>
    <br>
    <p>Укажите свой e-mail::</p>
    <input type="text" class="e-mail"></input></p>
    <br>
    <center><button type="submit" value="Отправить" class="button-prj">Задать вопрос</button></center>
	  </form>

  </div>
  <div class="col-md-1 mt-md-0 pt-0">
  </div>
  </div>
</div>


@endsection
