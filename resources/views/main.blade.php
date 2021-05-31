@extends ('layout')

@section ('content')

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active container-icon" style="align: center">
      <img class="d-block w-100" src="/img/fon.png" alt="Первый слайд">
      <button class="btn" onclick = "document.location.href ='/create'">{{ __('layout.create_project') }}</button>
    </div>
    <div class="carousel-item container-icon">
      <img class="d-block w-100" src="/img/2баннер.png" alt="Второй слайд">
    </div>
    <div class="carousel-item container-icon">
      <img class="d-block w-100" src="/img/баннер_3.png" alt="Третий слайд">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>



  <nav class="navbar navbar-expand-lg navbar-white color-nav">
  <div class="container">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent1" style="margin-left: auto; margin-right: auto; width: 100px">

      <div class="col-md-2 mb-md-0 mb-3" style="margin-left: -40px"></div>

      <div class="col-md-1 mb-md-0 mb-3">
          <center><img src="/img/т6.png" alt="Лого" width = "67" height = "67"></center>
      </div>

      <div class="col-md-2 mb-md-0 mb-3">

        <center><h4 style="margin-top: 22px;">{{ $people }}</h4></center>

        <ul style="margin-top: -10px; margin-left: -40px">
          <li>
            <center><p class="text-white">{{ __('layout.people') }}</p></center>
          </li>
        </ul>
      </div>

      
      <div style="margin-left: 50px"></div>

      <div class="col-md-1 mb-md-0 mb-3">
          <img src="/img/т2.png" alt="Лого" width = "67" height = "67">
      </div>

      <div class="col-md-2 mb-md-0 mb-3" style="margin">

        <h4 style="margin-top: 22px; margin-left: 30px">{{ $projects }}</h4>

        <ul style="margin-top: -10px; margin-left: -100px">
          <li>
            <center><p class="text-white">{{ __('layout.prj') }}</p></center>
          </li>
        </ul>
      </div>


      <div class="col-md-1 mb-md-0 mb-3">
          <img src="/img/т8.png" alt="Лого" width = "67" height = "67">
      </div>

      <div class="col-md-2 mb-md-0 mb-3">

        <h4 style="margin-top: 22px; margin-left: 30px">{{ $comments }}</h4>
        <ul style="margin-top: -10px; margin-left: -40px">
          <li>
            <p class="text-white">{{ __('layout.comments') }}</p>
          </li>
        </ul>

      </div>
      <div class="col-md-1 mb-md-0 mb-3"></div>
    

  </div>

</div>
</nav>

<script type="text/javascript" language="javascript">

var page = 1;

var typeGlobal = 'all';

function GetMePls(type)
{
  let get = '/main/'+type+'/'+page;
  $.get
  (
    '/main/'+type+'/'+page,
    {},
    function(data)
    {
      //let first = JSON.parse(data["projects"][0]);
      
      $("#img1").attr( "src" , "\\img"+"\\"+data["projects"][0].image);
      $("#name1").html(data["projects"][0].name);
      $("#name1").attr("href","projects/"+data["projects"][0].id);
      $("#descr1").html(data["projects"][0].description);
      $("#likes1").html(data["projects"][0].count_likes);
      $("#auth1").html(data["authors"][0][0].name + " " + data["authors"][0][0].surname ) ;


      $("#img2").attr( "src" , "\\img"+"\\"+data["projects"][1].image);
      $("#name2").html(data["projects"][1].name);
      $("#name2").attr("href","projects/"+data["projects"][1].id);
      $("#descr2").html(data["projects"][1].description);
      $("#likes2").html(data["projects"][1].count_likes);
      $("#auth2").html(data["authors"][1][0].name + " " + data["authors"][1][0].surname ) ;


      $("#img3").attr( "src" , "\\img"+"\\"+data["projects"][2].image);
      $("#name3").html(data["projects"][2].name);
      $("#name3").attr("href","projects/"+data["projects"][2].id);
      $("#descr3").html(data["projects"][2].description);
      $("#likes3").html(data["projects"][2].count_likes);
      $("#auth3").html(data["authors"][2][0].name + " " + data["authors"][2][0].surname ) ;
    }
  )
  
}

function GoChangePage(pageToChange)
{
  page = pageToChange;
  $("#but"+pageToChange).css("background","#FFFF00");
  if (pageToChange!=1)
  {
    $("#but1").css("background","#FFFFFF");
  }

  if (pageToChange!=2)
  {
    $("#but2").css("background","#FFFFFF");
  }

  if (pageToChange!=3)
  {
    $("#but3").css("background","#FFFFFF");
  }

  if (pageToChange!=4)
  {
    $("#but4").css("background","#FFFFFF");
  }

  if (pageToChange!=5)
  {
    $("#but5").css("background","#FFFFFF");
  }

  GetMePls(typeGlobal);
}

function GetFirst(type)
{
  page = 1;
  typeGlobal = type;
  GoChangePage(1);
  /*switch(typeGlobal)
  {
    case 'all':
      $("#all").css("background","#66FCF1");
      break;
    case 'popular':
      $("#popular").css("background","#66FCF1");
      break;
    case 'new':
      $("#new").css("background","#66FCF1");
      break;
    case 'soon':
      $("#soon").css("background","#66FCF1");
      break;
  }*/

  $("#"+type).css("background","#66FCF1");

  if ("all"!=type)
  {
    $("#all").css("background","#FFFFFF");
  }

  if ("popular"!=type)
  {
    $("#popular").css("background","#FFFFFF");
  }

  if ("new"!=type)
  {
    $("#new").css("background","#FFFFFF");
  }

  if ("soon"!=type)
  {
    $("#soon").css("background","#FFFFFF");
  }
 
  GetMePls(type);
}

function GoBack()
{
  if (page!=1)
  {
    page--;
    GoChangePage(page);
  }
    
  
}

function GoForward()
{
  if (page!=5)
  {
    page++;
    GoChangePage(page);
  }
    
}

</script>


<!--
Чтобы сделать кнопку активной, нужно изменить ей цвет bacground-color.  Неактивная кнопка FFFFF, активная кнопка 66FCF1.
-->
<br>
<div class="container">
    <center><div style="display: inline-block; width: 100%">
      <button id = "all"      class="button-sl" onclick = "GetFirst('all')">{{ __('layout.projects') }}</button>
      <button id = "popular"  class="button-sl" onclick = "GetFirst('popular')">{{ __('layout.popular') }} </button>
      <button id = "new"      class="button-sl" onclick = "GetFirst('new')">{{ __('layout.new') }}</button>
      <button id = "soon"     class="button-sl" onclick = "GetFirst('soon')">{{ __('layout.close') }}</button>
    </div></center>
</div>
<br>

<div class="container" id="ban">
  <div class="container">
  <div class="row">

    <div class="col-md-4">
      <div class="cont-main">
        <img id = "img1"  style="width: 100%; height: 275px;"> 
        <center><a id = "name1" class="cont-text" style="color : black; margin-top: 10px min-height: 55px"></a></center>
        <div>
        <p id = "descr1" class="cont-text1" style="margin-left: 10px; min-height: 120px"> </div>
        <div style="height: 35px auto;">
        <ul class="hr">
           <li id = "auth1"></li>
           <li><div><img  src="/img/like.png" style="  width: 30px; height: 30px; margin-left: 85%; margin-top: -10%;">
            <p id = "likes1" style="text-align: center; margin-left: 80%; margin-bottom: -7%; margin-top: -3%;"></p> 
           </div></li>
        </ul>
       </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="cont-main">
        <img id = "img2"  style="width: 100%; height: 275px;"> 
        <center><a id = "name2" class="cont-text" style="color : black; margin-top: 10px min-height: 55px"></a></center>
        <div>
        <p id = "descr2" class="cont-text1" style="margin-left: 10px; min-height: 120px"></div>
        <div style="height: 35px auto;">
        <ul class="hr">
           <li id = "auth2"></li>
           <li><div><img  src="/img/like.png" style="width: 30px; height: 30px; margin-left: 85%; margin-top: -10%;">
            <p id = "likes2" style="text-align: center; margin-left: 80%; margin-bottom: -7%; margin-top: -3%;"></p> 
           </div></li>
        </ul>
       </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="cont-main">
        <img id = "img3"  style="width: 100%; height: 275px;"> 
        <center><a id = "name3" class="cont-text" style=" color : black; margin-top: 10px min-height: 55px"></a></center>
        <div>
        <p id = "descr3" class="cont-text1" style="margin-left: 10px; min-height: 120px"></div>
        <div style="height: 35px auto;">
        <ul class="hr">
           <li id = "auth3"></li>
           <li><div><img src="/img/like.png" style="width: 30px; height: 30px; margin-left: 85%; margin-top: -10%;">
            <p id = "likes3" style="text-align: center; margin-left: 80%; margin-bottom: -7%; margin-top: -3%;"></p> 
           </div></li>
        </ul>
       </div>
      </div>
    </div>
    </div>
</div>
  </div>

  <center>
    <div style="overflow:hidden; width:200px">
      <div style="width: 100%;">

        <ul class="hr1">
          <li>
            <button id = "but1" onclick = "GoChangePage(1)" class="bt"></button>
          </li>
          <li>
            <button id = "but2" onclick = "GoChangePage(2)" class="bt"></button>
          </li>
          <li>
            <button id = "but3" onclick = "GoChangePage(3)" class="bt"></button>
          </li>
          <li>
            <button id = "but4" onclick = "GoChangePage(4)" class="bt"></button>
          </li>
          <li>
            <button id = "but5" onclick = "GoChangePage(5)" class="bt"></button>  
          </li>
        </ul>

        </div>
      </div>
</center>

<nav class="navbar navbar-expand-lg navbar-white color-nav1">

  <div class="container">

  <div class="collapse navbar-collapse" id="navbarSupportedContent1" style="margin-left: auto; margin-right: auto; width: 100px">
    <ul style="width: 100%; list-style-type:none;">

      <li>
        <center><div class="color-fr"><p>{{ __('layout.banner_title') }}</p></div></center>
      </li>

      <li style="margin-left: 10%">
        <div class="row">

        <div class="col-md-3 color-fr1">
          <center><img src="/img/т4.png" alt="Лого" width = "67" height = "67">
          <p>{{ __('layout.smi') }}</p></center>
        </div>

        <div class="col-md-3 color-fr1">
          <center><img src="/img/т3.png" alt="Лого" width = "67" height = "67">
          <p>{{ __('layout.test') }}</p></center>
        </div>

        <div class="col-md-3 color-fr1">
          <center><img src="/img/т5.png" alt="Лого" width = "67" height = "67">
          <p>{{ __('layout.invest') }}</p></center>
        </div>

        <div class="col-md-3 color-fr1">
          <center><img src="/img/т1.png" alt="Лого" width = "67" height = "67">
          <p>{{ __('layout.back') }}</p></center>
        </div>

        </div>
      </li>
    </ul>

  </div>
  </div>
  </nav>



</div>
<div class="collapse show" id="collapseExample">
  <img onclick = "GoBack()" src="/img/syudy.png" style="width: 50px; height: 50px; margin-left: 3%; margin-top: -55%; cursor: pointer;"> 
  <img onclick = "GoForward()" src="/img/tudy.png" style="width: 50px; height: 50px; margin-left: 93%; margin-top: -58%; cursor: pointer;"> 
</div>
</div>
<br>

<br>

<script>
GetFirst('all');
</script>

@endsection