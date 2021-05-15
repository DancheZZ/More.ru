<!DOCTYPE html>

<html lang="ru">

<head>

     <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Эта ссылка загружает с CDN все необходимые файлы Bootstrap -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel = "stylesheet" type = "text/css" href="/css/main2.css">
    <script src="/js/foto.js"></script>
</head>

<!--  
за подчеркивание отвечает .collapse ul li a#text-a
-->

<body>
  <nav class="navbar navbar-expand-lg navbar-white color-nav">
  	<div class="container">
  <a href="/main"><img src="/img/Логотип.png" alt="Лого" width = "auto" height = "67"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item ">
        <a class="nav-link nav-text-size text-white" {{ Request::is('main') ? " id = text-a " :  " "}}  href="/main">Главная</a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-text-size text-white" {{ Request::is('projects/*')  ? " id = 'text-a' " : " " }} href="/projects">Все проекты</a>
      </li>
      <li class="nav-item"	>
        <a class="nav-link nav-text-size text-white" {{ Request::is('hz')  ? " id = 'text-a' " : " " }} href="#">Как это работает?</a>
      </li>
    </ul>

    <ul  class="nav justify-content-end">

      <li class="nav-item">
      <div class="color-button">
	    <a class="nav-link color-text" href="/create" id="text-prj">Создать проект</a>
		</div>
	  </li>
	  <li class="nav-item">
	    <a class="nav-link text-white popup-open" href = "#" >Вход</a> 

      <div class="popup-fade" style="display: none;">

        <div class="popup" style="display: none;" id = "entry">

                <div style="margin-top: 10px">
                <p style = "font-size: 18px; margin-left: 9%" class="text-white" onclick="registr()">Войти</p>
                <p style = "margin-left: 70%; font-size: 18px; margin-top: -40px" onclick="entry()" class="text-white">Регистрация</p>
                </div>

                <div style="border: 1px solid #FFF; width:530px; margin-left: -20px; margin-top: 30px"></div>

                <div style="height: 240px; color: #FFFFFF; margin-top: 30px" >
                <form method = "POST" action = "{{ route('login') }}" >
                @csrf
                  <center><input type="email" id = "email" name = "email" placeholder = "Логин" class="btn-reg" ><br><br></center>
                  <center><input id = "password" type = "password" name = "password" placeholder = "Пароль" class="btn-reg"><br><br>
                  </center>
                  <center><button type = "submit" value = "Зарегистрироваться" class="btn-reg" style="background-color: #66FCF1"> Войти</button></center>
                  </form>
                </div>
                <div style="border: 1px solid #FFF; width:530px; margin-left: -20px; "></div>
                <center><div style="color: #fff; width:460px;  margin-top: 10px;"><p>Нажав кнопку регистрации, вы принимаете условия пользовательского соглашения и условия политики конфиденциальности и даете согласие на обработку персональных данных</p></div></center>
        </div> 

        <div class="popup1" id = "registr">

                <div style="margin-top: 10px">
                <p style = "font-size: 18px; margin-left: 9%" class="text-white" onclick="registr()">Войти</p>
                <p href="" style = "margin-left: 70%; font-size: 18px; margin-top: -40px" class="text-white" onclick="entry()">Регистрация</p>
                </div>

                <div style="border: 1px solid #FFF; width:530px; margin-left: -20px; margin-top: 30px"></div>

                <div style="height: 670px; color: #FFFFFF; margin-top: 30px" >
                 <form method = "POST" enctype="multipart/form-data" action = "{{ route('register') }}" >
                 @csrf
                      <center><input type = "text" id = "name" name = "name" placeholder = "Имя" class="btn-reg"><br><br></center>
                      <center><input type="text" id = "surname" name = "surname" placeholder = "Фамилия" class="btn-reg"><br><br></center>
                      <center><input type = "file" id = "avatar" name = "avatar" placeholder = "Фото профиля" class="btn-reg"><br><br></center>
                      <center><input type="tel" id = 'phone' name = 'phone' placeholder = "Телефон" class="btn-reg"> <br><br></center>
                      <center><input type="email" id = "email" name = "email" placeholder = "Почта" class="btn-reg"><br><br></center>
                      <center><input type="date" id="date" name="date" placeholder = "Дата рождения" class="btn-reg"><br><br>
                      <center><input id = "password" type = "password" name = "password" placeholder = "Пароль" class="btn-reg"><br><br></center>
                      <center><input id="password-confirm" type="password" name="password_confirmation" placeholder = "Подтверждение пароля" class="btn-reg"><br><br></center>
                      <button type = "submit" value = "Зарегистрироваться" class="btn-reg" style="background-color: #66FCF1"> Регистрация</button>
                  </form>
                </div>
                <div style="border: 1px solid #FFF; width:528px; margin-left: -20px;"></div>
                <center><div style="color: #fff; width:460px;  margin-top: 10px;"><p>Нажав кнопку регистрации, вы принимаете условия пользовательского соглашения и условия политики конфиденциальности и даете согласие на обработку персональных данных</p></div></center>
              </div> 

      </div>


	  </li>
    </ul>

  </div>
</div>
</nav>
<!--конец шапки -->

<body>


<div style = "min-height: calc(100vh - 80px);">

@yield ('content')

</div>


<br>
<!-- Footer -->
<footer class="page-footer font-small color-nav pt-4">
  <div class="container text-center text-md-left">
    <div class="row">
      <div class="col-md-3 mt-md-0 pt-0">
        <a href="/main"><img src="/img/Логотип.png" alt="Лого" width = "auto" height = "67"></a>
       <p style="margin-bottom: 0.0001rem;font-family: Montserrat;font-size: 18px;font-style: normal;font-weight: 400;line-height: 22px;letter-spacing: 0em; text-align: left">Краудфандинговая</p> 
        <p style="font-family: Montserrat;font-size: 18px;font-style: normal;font-weight: 400;line-height: 22px;letter-spacing: 0em; text-align: left">платформа</p>
      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-2 mb-md-0 mb-3">

        <!-- Links -->
        <h5 id = "text-footer">О нас</h5>

        <ul style="margin-left: -20px">
          <li>
            <a href="#!">Что такое МО₽Е?</a>
          </li>
          <li>
            <a href="#!">Контакты</a>
          </li>
        </ul>

      </div>
      <div class="col-md-4 mb-md-0 mb-3">

        <h5 class="color-text">Документы</h5>

        <ul style="margin-left: -20px">
          <li>
            <a href="/polz" target="'_blank'">Пользовательское соглашение</a>
          </li>
          <li>
            <a href="/politic" target='_blank'">Политика конфиденциальности</a>
          </li>
        </ul>

      </div>

      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5>Помощь</h5>

        <ul style="margin-left: -20px">
          <li>
            <a href="#!">Частые вопросы</a>
          </li>
          <li>
            <a href="/regulations" target="'_blank'">Правила сервиса</a>
          </li>
          <li>
            <a href="/question" >Задать вопрос</a>
          </li>
        </ul>

      </div>
      <!-- Grid column -->

    </div>
    <!-- Grid row -->

  </div>

</footer>
<!-- Footer -->


    <!-- Перед закрывающим тегом <body> подключаем jQuery, Popper и Bootstrap JS, чтобы работали интерактивные компоненты  -->     

    

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous" ></script>


</body>

</html>