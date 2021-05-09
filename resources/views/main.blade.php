@extends ('layout')

@section ('content')

<script type="text/javascript" language="javascript">

var page = 1;

function GetMePls(type)
{
  //как получить страницу? 
  $.get
  (
    '/main/'+type+'/'+page,
    {},
    function(data)
    {
      console.log(data["projects"]);
      //let first = JSON.parse(data["projects"][0]);

      $("#img1").attr( "src" , "\\img"+"\\"+data["projects"][0].image);
      $("#name1").html(data["projects"][0].name);
      $("#descr1").html(data["projects"][0].description);
      $("#likes1").html(data["projects"][0].count_likes);
      //пока что автора нет(
      $("#img2").attr( "src" , "\\img"+"\\"+data["projects"][1].image);
      $("#name2").html(data["projects"][1].name);
      $("#descr2").html(data["projects"][1].description);
      $("#likes2").html(data["projects"][1].count_likes);

      $("#img3").attr( "src" , "\\img"+"\\"+data["projects"][2].image);
      $("#name3").html(data["projects"][2].name);
      $("#descr3").html(data["projects"][2].description);
      $("#likes3").html(data["projects"][2].count_likes);
    }
  )
  
}
</script>
<!--
Чтобы сделать кнопку активной, нужно изменить ей цвет bacground-color.  Неактианя кнопка FFFFF, активная кнопка 66FCF1.
-->
<br>
<div class="container">
    <center><div style="display: inline-block; width: 100%">
      <button class="button-sl" onclick = "GetMePls('all')">Все проекты</button>
      <button class="button-sl" onclick = "GetMePls('popular')">Популярные </button>
      <button class="button-sl" onclick = "GetMePls('new')">Новые</button>
      <button class="button-sl" onclick = "GetMePls('soon')">Близкие к завершению</button>
    </div></center>
</div>
<br>

<div class="container" id="ban">
  <div class="container">
  <div class="row">

    <div class="col-md-4">
      <div class="cont-main">
        <img id = "img1" src="/img/собака.png" style="width: 100%; height: 275px;"> 
        <center><p id = "name1" class="cont-text" style="margin-top: 10px">Накормим вместе животных их приюта</p></center>
        <div>
        <p id = "descr1" class="cont-text1" style="margin-left: 10px; min-height: 120px">вфывьфыв фывджльфыжв ьбфыл даьыфвлдаьф ылваьлдывьалдыфвьал дыфвьадл выфьадль ыфаэбы жэадб ЫБЛ ЩЖЗа бэАДывжаь ВАЛДЬыа дьлд ЫВАЬЛЫь лдаывьалдЫ ЬАДыьалЫВ ЖДАЛьал двЬАЭьв аэЫВА ЬЫЛВА ЬВаэд ьЬЫАВЛЭыьа лэЫВЬЛ</p> 
        </div>
        <div style="height: 35px auto;">
        <ul class="hr">
           <li id = "auth1">Алексей Желудев</li>
           <li><div><img  src="/img/собака.png" style="width: 30px; height: 30px; margin-left: 85%; margin-top: -10%;">
            <p id = "likes1" style="margin-left: 85%; margin-bottom: -7%; margin-top: -3%;">123</p> 
           </div></li>
        </ul>
       </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="cont-main">
        <img id = "img2" src="/img/собака.png" style="width: 100%; height: 275px;"> 
        <center><p id = "name2" class="cont-text" style="margin-top: 10px">Накормим вместе животных их приюта</p></center>
        <div>
        <p id = "descr2" class="cont-text1" style="margin-left: 10px; min-height: 120px">вфывьфыв фывджльфыжв ьбфыл даьыфвлдаьф ылваьлдывьалдыфвьал дыфвьадл выфьадль ыфаэбы жэадб ЫБЛ ЩЖЗа бэАДывжаь ВАЛДЬыа дьлд ЫВАЬЛЫь лдаывьалдЫ ЬАДыьалЫВ ЖДАЛьал двЬАЭьв аэЫВА ЬЫЛВА ЬВаэд ьЬЫАВЛЭыьа лэЫВЬЛ</p> 
        </div>
        <div style="height: 35px auto;">
        <ul class="hr">
           <li id = "auth2">Алексей Желудев</li>
           <li><div><img  src="/img/собака.png" style="width: 30px; height: 30px; margin-left: 85%; margin-top: -10%;">
            <p id = "likes2" style="margin-left: 85%; margin-bottom: -7%; margin-top: -3%;">123</p> 
           </div></li>
        </ul>
       </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="cont-main">
        <img id = "img3" src="/img/собака.png" style="width: 100%; height: 275px;"> 
        <center><p id = "name3" class="cont-text" style="margin-top: 10px">Накормим вместе животных их приюта</p></center>
        <div>
        <p id = "descr3" class="cont-text1" style="margin-left: 10px; min-height: 120px">вфывьфыв фывджльфыжв ьбфыл даьыфвлдаьф ылваьлдывьалдыфвьал дыфвьадл выфьадль ыфаэбы жэадб ЫБЛ ЩЖЗа бэАДывжаь ВАЛДЬыа дьлд ЫВАЬЛЫь лдаывьалдЫ ЬАДыьалЫВ ЖДАЛьал двЬАЭьв аэЫВА ЬЫЛВА ЬВаэд ьЬЫАВЛЭыьа лэЫВЬЛ</p> 
        </div>
        <div style="height: 35px auto;">
        <ul class="hr">
           <li id = "auth3">Алексей Желудев</li>
           <li><div><img src="/img/собака.png" style="width: 30px; height: 30px; margin-left: 85%; margin-top: -10%;">
            <p id = "likes3" style="margin-left: 85%; margin-bottom: -7%; margin-top: -3%;">123</p> 
           </div></li>
        </ul>
       </div>
      </div>
    </div>

  </div>

  <center>
    <div style="overflow:hidden; width:200px">
      <div style="width: 100%;">

        <ul class="hr1">
          <li>
            <button class="bt"></button>
          </li>
          <li>
            <button class="bt"></button>
          </li>
          <li>
            <button class="bt"></button>
          </li>
          <li>
            <button class="bt"></button>
          </li>
          <li>
            <button class="bt"></button>  
          </li>
        </ul>

        </div>
      </div>
</center>
</div>
<div class="collapse show" id="collapseExample">
  <img src="/img/syudy.png" style="width: 50px; height: 50px; margin-left: 3%; margin-top: -55%;">
  <img src="/img/tudy.png" style="width: 50px; height: 50px; margin-left: 93%; margin-top: -58%">
</div>
</div>
<br>

<br>



@endsection