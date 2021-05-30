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
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap&subset=cyrillic,cyrillic-ext,latin-ext" rel="stylesheet">
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
        <a class="nav-link nav-text-size text-white" {{ Request::is('main') ? " id = text-a " :  " "}}  href="/main">{{ __('layout.main') }}</a>
      </li>
      <li class="nav-item">
        <a class="nav-link nav-text-size text-white" {{ Request::is('projects')  ? " id = text-a " : " " }} href="/projects">{{ __('layout.projects') }}</a>
      </li>
      <li class="nav-item"	>
        <a class="nav-link nav-text-size text-white" {{ Request::is('how')  ? " id = text-a " : " " }} href="/how">{{ __('layout.how') }}</a>
      </li>
    </ul>

    <ul  class="nav justify-content-end">

      <li class="nav-item">
      <div class="color-button">
	    <a class="nav-link color-text" href="/create" id="text-prj" >{{ __('layout.create_project') }}</a>
		</div>
	  </li>
	  <li class="nav-item">
      @if(!Auth::user())
	      <a class="nav-link text-white popup-open"  href = "#" >{{ __('layout.enter') }}</a> 
      @endif

      @if(Auth::user())
        <li class="nav-item">
          <a class="nav-link text-white" 
          @if(!Auth::user()->is_admin)
          href="/me"
          @endif
          @if(Auth::user()->is_admin)
            href ="/admin/main"
          @endif
          >{{ Auth::user()->name }} {{ Auth::user()->surname }}</a>
        </li>
        
      @endif
      <div class="popup-fade" style="display: none;">

        <div class="popup" style="display: none;" id = "entry">
                <div style="margin-top: 10px">
                <p style = "font-size: 18px; margin-left: 9%; cursor: pointer" class="text-white" onclick="registr()">{{ __('layout.enter') }}</p>
                <p style = "margin-left: 70%; font-size: 18px; margin-top: -40px; cursor: pointer;" onclick="entry()" class="text-white">{{ __('layout.registration') }}</p>
                </div>

                <div style="border: 1px solid #FFF; width:530px; margin-left: -20px; margin-top: 30px"></div>

                <div style="height: 240px; color: #FFFFFF; margin-top: 30px" >
                <form method = "POST" action = "{{ route('login') }}" >
                @csrf
                  <center><input  style = "height : 30px"  type="email" id = "email" name = "email" placeholder = "{{ __('layout.email') }}" class="btn-reg" ><br><br></center>
                  <center><input  style = "height : 30px"  id = "password" type = "password" name = "password" placeholder = "{{ __('layout.password') }}" class="btn-reg"><br><br>
                  </center>
                  <center><button type = "submit" value = "Зарегистрироваться" class="btn-reg" style="background-color: #66FCF1"> {{ __('layout.enter') }}</button></center>
                  </form>
                </div>
                <div style="border: 1px solid #FFF; width:530px; margin-left: -20px; "></div>
                <center><div style="color: #fff; width:460px;  margin-top: 10px;"><p>{{ __('layout.descr_form') }}</p></div></center>
        </div> 

        <div class="popup1" id = "registr">

                <div style="height : 15px">
                <p style = " cursor: pointer; font-size: 18px; margin-left: 9%;  " class="text-white" onclick="registr()">{{ __('layout.enter') }}</p>
                <p  style = "cursor: pointer; margin-left: 70%; font-size: 18px; margin-top: -40px " class="text-white" onclick="entry()">{{ __('layout.registration') }}</p>
                </div>

                <div style="border: 1px solid #FFF; width:530px; margin-left: -20px; margin-top: 30px"></div>

                <div style="height: 535px; margin-top: 10px; color: #FFF" id = "block_header">
                  <form method = "POST" enctype="multipart/form-data" action = "{{ route('register') }}" >
                  @csrf
                      <center><input style = "height : 30px" type = "text" id = "name" name = "name" placeholder = "{{ __('layout.name') }}" class="btn-reg"><br><br></center>
                      <center><input style = "height : 30px" type="text" id = "surname" name = "surname" placeholder = "{{ __('layout.surname') }}" class="btn-reg"><br><br></center>
                      <p style="margin-left: 40px; margin-top: -2%; height : 30px" >{{ __('layout.avatar') }}</p>
                      <center><input style = "height : 30px" type = "file" id = "avatar" name = "avatar" placeholder = "{{ __('layout.avatar') }}" class="btn-reg" accept="image/png, image/jpeg, image/jpg"><br><br></center>
                      <center><input style = "height : 30px" type="tel" id = 'phone1' name = 'phone' placeholder = "{{ __('layout.number') }}" class="btn-reg" onblur = "validate_phone()"> <br><br></center>
                      <center><input style = "height : 30px" type="email" id = "email1" name = "email" placeholder = "{{ __('layout.email') }}" class="btn-reg" onblur = "validate_email()"><br><br></center>
                      <center><input style = "height : 30px" type="date" id="date" name="date" placeholder = "{{ __('layout.date_birth') }}" class="btn-reg"><br><br>
                      <center><input style = "height : 30px" id = "password1" type = "password" name = "password" placeholder = "{{ __('layout.password') }}" class="btn-reg"><br><br></center>
                      <center><input style = "height : 30px; margin-bottom: 0px" id="password-confirm1" type="password" name="password_confirmation" placeholder = "{{ __('layout.confirm_password') }}" class="btn-reg" onblur = "validate_password()"><br><br></center>
                      <button type = "submit" value = "{{ __('layout.register') }}" class="btn-reg" style="background-color: #66FCF1" onclick = "proverka()" id = "sub"> {{ __('layout.registration') }}</button>
                  </form>
                </div>
                <div style="border: 1px solid #FFF; width:528px; margin-left: -20px;"></div>
                <center><div style="color: #fff; width:460px; height : 80px; margin-top: 10px;"><p>{{ __('layout.descr_form') }}</p></div></center>
              </div> 

      </div>


	  </li>
    <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     @lang('layout.languages') 
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="/setLang/ru" style="color: black">Русский</a>
    <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="/setLang/en" style="color: black">English</a>
    </div>  
    </li>
    @if(Auth::user())
    <li class="nav-item">
          
          <form id = "logout" method = "POST" action = "{{ route('logout') }}">@csrf <a class="nav-link text-white"
                                                href="{{ url('/logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout').submit();" >{{ __('layout.logout') }}</a> </form>
        </li>
    @endif
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
       <p style="margin-bottom: 0.0001rem;font-family: Montserrat;font-size: 18px;font-style: normal;font-weight: 400;line-height: 22px;letter-spacing: 0em; text-align: left">{{ __('layout.crowd') }}</p> 
        <p style="font-family: Montserrat;font-size: 18px;font-style: normal;font-weight: 400;line-height: 22px;letter-spacing: 0em; text-align: left">{{ __('layout.platform') }}</p>
      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-2 mb-md-0 mb-3">

        <!-- Links -->
        <h5 id = "text-footer">{{ __('layout.about_us') }}</h5>

        <ul style="margin-left: -20px">
          <li>
            <a href="/chto">{{ __('layout.what') }}</a>
          </li>
          <li>
            <a href="/contacts"> {{ __('layout.contacts') }}</a>
          </li>
        </ul>

      </div>
      <div class="col-md-4 mb-md-0 mb-3">

        <h5 class="color-text">{{ __('layout.documents') }}</h5>

        <ul style="margin-left: -20px">
          <li>
            <a href="/polz" target="'_blank'">{{ __('layout.polz') }}</a>
          </li>
          <li>
            <a href="/politic" target='_blank'">{{ __('layout.politic') }}</a>
          </li>
        </ul>

      </div>

      <div class="col-md-3 mb-md-0 mb-3">

        <!-- Links -->
        <h5>{{ __('layout.help') }}</h5>

        <ul style="margin-left: -20px">
          <li>
            <a href="/FAQ">{{ __('layout.questions') }}</a>
          </li>
          <li>
            <a href="/regulations" target="'_blank'">{{ __('layout.roulesN') }}</a>
          </li>
          <li>
            <a href="/question" >{{ __('layout.question') }}</a>
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