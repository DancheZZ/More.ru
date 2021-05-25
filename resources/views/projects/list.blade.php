@extends ('layout')

@section ('content')

<div class="content" style="margin-top: 3%">

  <div class="container" id="ban">


  <div class="container">


<script type="text/javascript" language="javascript">

var pageGlobal = 1;

var typeGlobal = "working";

var MaxPage = 0;
//возможные значения type:
    //working(собирают), только незавершенные проекты начиная новыми
    //completed(завершились), только завершенные проекты 
    //record(рекордсмены). сортировка по собранным деньгам по убыванию

var sortingGlobal = "old";
//возможные значения sorting
    //popular (сначала с наибольшим количеством лайков)
    //unknown (сначала с наименьшим количеством лайков)
    //new (сначала новые)
    //old (сначала старые)

function GetMeList()
{
    let url = '/projects/' + typeGlobal +'/'+ sortingGlobal +'/' + pageGlobal;
    
    $.get
    (
        url,
        {},
        function(data)
        {
        MaxPage = data["countPages"];
        ChangePages();
        if (data["projects"][0])
        {
        //$("#pr1").css('visibility','visible');
        $("#pr1").css('display','');
        $("#img1").attr( "src" , "\\img"+"\\"+data["projects"][0].image);
        $("#name1").html(data["projects"][0].name);
        $("#name1").attr("href","projects/"+data["projects"][0].id);
        $("#descr1").html(data["projects"][0].description);
        $("#likes1").html(data["projects"][0].count_likes);
        $("#auth1").html(data["authors"][0][0].name + " " + data["authors"][0][0].surname ) ;
        }
        else
        {
          //$("#pr1").css('visibility','hidden');
          $("#pr1").css('display','none');
        }

        if(data["projects"][1])
        {
          $("#pr2").css('visibility','visible');
          $("#pr2").css('display','');
          $("#img2").attr( "src" , "\\img"+"\\"+data["projects"][1].image);
          $("#name2").html(data["projects"][1].name);
          $("#name2").attr("href","projects/"+data["projects"][1].id);
          $("#descr2").html(data["projects"][1].description);
          $("#likes2").html(data["projects"][1].count_likes);
          $("#auth2").html(data["authors"][1][0].name + " " + data["authors"][1][0].surname ) ;
        }
        else
        {
          //$("#pr2").css('visibility','hidden');
          $("#pr2").css('display','none');
        }
        
        if(data["projects"][2])
        {
          //$("#pr3").css('visibility','visible');
          $("#pr3").css('display','');
          $("#img3").attr( "src" , "\\img"+"\\"+data["projects"][2].image);
          $("#name3").html(data["projects"][2].name);
          $("#name3").attr("href","projects/"+data["projects"][2].id);
          $("#descr3").html(data["projects"][2].description);
          $("#likes3").html(data["projects"][2].count_likes);
          $("#auth3").html(data["authors"][2][0].name + " " + data["authors"][2][0].surname ) ;
        }
        else
        {
          //$("#pr3").css('visibility','hidden');
          $("#pr3").css('display','none');
        }
        
        if(data["projects"][3])
        {
          //$("#pr4").css('visibility','visible');
          $("#pr4").css('display','');
          $("#img4").attr( "src" , "\\img"+"\\"+data["projects"][3].image);
          $("#name4").html(data["projects"][3].name);
          $("#name4").attr("href","projects/"+data["projects"][3].id);
          $("#descr4").html(data["projects"][3].description);
          $("#likes4").html(data["projects"][3].count_likes);
          $("#auth4").html(data["authors"][3][0].name + " " + data["authors"][3][0].surname ) ;
        }
        else
        {
          //$("#pr4").css('visibility','hidden');
          $("#pr4").css('display','none');
        }

        if(data["projects"][4])
        {
          //$("#pr5").css('visibility','visible');
          $("#pr5").css('display','');
          $("#img5").attr( "src" , "\\img"+"\\"+data["projects"][4].image);
          $("#name5").html(data["projects"][4].name);
          $("#name5").attr("href","projects/"+data["projects"][4].id);
          $("#descr5").html(data["projects"][4].description);
          $("#likes5").html(data["projects"][4].count_likes);
          $("#auth5").html(data["authors"][4][0].name + " " + data["authors"][4][0].surname ) ;
        }
        else
        {
          //$("#pr5").css('visibility','hidden');
          $("#pr5").css('display','none');
        }

        if(data["projects"][5])
        {
          //$("#pr6").css('visibility','visible');
          $("#pr6").css('display','');
          $("#img6").attr( "src" , "\\img"+"\\"+data["projects"][5].image);
          $("#name6").html(data["projects"][5].name);
          $("#name6").attr("href","projects/"+data["projects"][5].id);
          $("#descr6").html(data["projects"][5].description);
          $("#likes6").html(data["projects"][5].count_likes);
          $("#auth6").html(data["authors"][5][0].name + " " + data["authors"][5][0].surname ) ;

        }
        else
        {
          //$("#pr6").css('visibility','hidden');
          $("#pr6").css('display','none');
        }


        
        }
    )
}

function SetType(Type)
{
    typeGlobal = Type;
    pageGlobal = 1;
    GetMeList();
    //ChangePages();
}

function SetSorting(Sorting)
{
    sortingGlobal = Sorting.value;
    GetMeList();
}

function PageForward()
{
  if(pageGlobal < MaxPage)
  {
    pageGlobal++;
    //alert("a"+ pageGlobal);
    GetMeList();
    //ChangePages();
  }
  
}

function PageBack()
{
  if (pageGlobal!=1)
  {
    pageGlobal--;
    GetMeList();
    //ChangePages();
  }
}

function SetPage(page)
{
  pageGlobal = page;
  //ChangePages();
  GetMeList();
}

function ChangePages()
{
  
  if (pageGlobal > 4)
  {
    $("#p1").html(pageGlobal - 3);
    $("#p2").html(pageGlobal - 2);
    $("#p3").html(pageGlobal - 1);
    $("#p4").html(pageGlobal);
    if(pageGlobal+1 <= MaxPage )
    {
      $("#p5").html(pageGlobal+1);
    }
    else
    {
      $("#p5").html("&#160");
      $("#p6").html("&#160");
      return;
    }

    if(pageGlobal+2 <= MaxPage)
    {
      $("#p6").html(pageGlobal+2);
    }
    else
    {
      $("#p6").html("&#160");
    }
    

    $("#p4").css("color","#66FCF1");
  }
  else
  { 
    $("#p1"            ).css("color","black");
    $("#p2"            ).css("color","black");
    $("#p3"            ).css("color","black");
    $("#p4"            ).css("color","black");
    $("#p5"            ).css("color","black");
    $("#p6"            ).css("color","black");
    
    //прописываем кнопки и заполняем содержимым
    $("#p1").html(1);
    //ну хотя бы одна страница то будет....

    //возможно, что страниц будет менее 6
    if(MaxPage >=2)
    {
      $("#p2").css('display','');
      $("#p2").html(2);
    }
    else
    {
      $("#p6").css('display','none');
      $("#p5").css('display','none');
      $("#p4").css('display','none');
      $("#p3").css('display','none');
      $("#p2").css('display','none');
    }

    if(MaxPage >=3)
    {
      $("#p3").css('display','');
      $("#p3").html(3);
    }
    else
    {
      $("#p6").css('display','none');
      $("#p5").css('display','none');
      $("#p4").css('display','none');
      $("#p3").css('display','none');
    }


    if(MaxPage >=4)
    {
      $("#p4").css('display','');
      $("#p4").html(4);
    }
    else
    {
      $("#p6").css('display','none');
      $("#p5").css('display','none');
      $("#p4").css('display','none');
    }


    if(MaxPage >=5)
    {
      $("#p5").css('display','');
      $("#p5").html(5);
    }
    else
    {
      $("#p6").css('display','none');
      $("#p5").css('display','none');
    }


    if(MaxPage >=6)
    {
      $("#p6").css('display','');
      $("#p6").html(6);
    }
    else
    {
       $("#p6").css('display','none');
    }
   

    $("#p" + pageGlobal).css("color","#66FCF1");
  }

}

</script>

<!--Форма для настройки сортировки-->
    <form style="margin-top: -20px;">
        <div style="margin-bottom: 5%;  font-family: Montserrat;">
                <input type="radio" checked = "true" onchange="SetType('working')"   name="btn" value=   "working"   style="vertical-align:middle; margin:0;"> {{ __('layout.working') }}
                <input type="radio"                  onchange="SetType('completed')" name="btn" value=   "completed" style="vertical-align:middle; margin:0;"> {{ __('layout.ended') }}
                <input type="radio"                  onchange="SetType('record')"    name="btn" value=   "record"    style="vertical-align:middle; margin:0;"> {{ __('layout.record') }}
            <br>
            <p style="font-family: Montserrat;">{{ __('layout.sort_by:') }}
                <select onchange="SetSorting(this)">
                    <option  value="popular" checked = "true" onchange="SetSorting('popular')"> {{ __('layout.popularity') }}&#8595;</option>
                    <option value="unknown"                  onchange="SetSorting('unknown')"> {{ __('layout.popularity') }}&#8593;</option>
                    <option value="new"                      onchange="SetSorting('new')"> {{ __('layout.novelty') }}     &#8595;</option>
                    <option value="old"                      onchange="SetSorting('old')"> {{ __('layout.novelty') }}     &#8593;</option>
                </select>
            </p>
        </div>
    </form>
<!---->


  <div class="row">

    <div class="col-md-4">
      <div class="cont-main" id = "pr1">
        <img id = "img1" style="width: 100%; height: 275px;"> 

        <center><a id = "name1" class="cont-text" style=" color : black; margin-top: 10px; min-height: 55px"></a></center>
        
        <div>
        <p id = "descr1" class="cont-text1" style="margin-left: 10px; min-height: 120px"></div>
        <div style="height: 35px auto;">
        <ul class="hr">
           <li id = "auth1"></li>
           <li><div><img src="/img/like.png" style="width: 30px; height: 30px; margin-left: 85%; margin-top: -10%;">
            <p id = "likes1" style="margin-left: 85%; margin-bottom: -7%; margin-top: -3%;"></p> 
           </div></li>
        </ul>
       </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="cont-main" id = "pr2">
        <img id = "img2" style="width: 100%; height: 275px;"> 
        <center><a id = "name2" class="cont-text" style=" color : black; margin-top: 10px; min-height: 55px"></a></center>
        <div>
        <p id = "descr2" class="cont-text1" style="margin-left: 10px; min-height: 120px"></div>
        <div style="height: 35px auto;">
        <ul class="hr">
           <li id = "auth2"></li>
           <li><div><img src="/img/like.png" style="width: 30px; height: 30px; margin-left: 85%; margin-top: -10%;">
            <p id = "likes2" style="margin-left: 85%; margin-bottom: -7%; margin-top: -3%;"></p> 
           </div></li>
        </ul>
       </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="cont-main" id = "pr3">
        <img id = "img3" style="width: 100%; height: 275px;"> 
        <center><a id = "name3" class="cont-text" style=" color : black; margin-top: 10px; min-height: 55px"></a></center>
        <div>
        <p id = "descr3" class="cont-text1" style="margin-left: 10px; min-height: 120px"></div>
        <div style="height: 35px auto;">
        <ul class="hr">
           <li id = "auth3"></li>
           <li><div><img src="/img/like.png" style="width: 30px; height: 30px; margin-left: 85%; margin-top: -10%;">
            <p id = "likes3" style="margin-left: 85%; margin-bottom: -7%; margin-top: -3%;"></p> 
           </div></li>
        </ul>
       </div>
      </div>
    </div>

  </div>
  <br>
  <div class="row">

    <div class="col-md-4">
      <div class="cont-main" id = "pr4">
        <img id = "img4" style="width: 100%; height: 275px;"> 

        <center><a id = "name4" class="cont-text" style=" color : black; margin-top: 10px; min-height: 55px"></a></center>
        
        <div>
        <p id = "descr4" class="cont-text1" style="margin-left: 10px; min-height: 120px"></div>
        <div style="height: 35px auto;">
        <ul class="hr">
           <li id = "auth4"></li>
           <li><div><img src="/img/like.png" style="width: 30px; height: 30px; margin-left: 85%; margin-top: -10%;">
            <p  id = "likes4" style="margin-left: 85%; margin-bottom: -7%; margin-top: -3%;"></p> 
           </div></li>
        </ul>
       </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="cont-main" id = "pr5">
        <img id = "img5" style="width: 100%; height: 275px;"> 
        <center><a id = "name5" class="cont-text" style=" color : black; margin-top: 10px; min-height: 55px"></a></center>
        <div>
        <p  id = "descr5" class="cont-text1" style="margin-left: 10px; min-height: 120px"></div>
        <div style="height: 35px auto;">
        <ul class="hr">
           <li id = "auth5"></li>
           <li><div><img src="/img/like.png" style="width: 30px; height: 30px; margin-left: 85%; margin-top: -10%;">
            <p id = "likes5" style="margin-left: 85%; margin-bottom: -7%; margin-top: -3%;"></p> 
           </div></li>
        </ul>
       </div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="cont-main" id = "pr6">
        <img id = "img6" style="width: 100%; height: 275px;"> 
        <center><a id = "name6" class="cont-text" style=" color : black; margin-top: 10px; min-height: 55px"></a></center>
        <div>
        <p id = "descr6" class="cont-text1" style="margin-left: 10px; min-height: 120px"></div>
        <div style="height: 35px auto;">
        <ul class="hr">
           <li id = "auth6"></li>
           <li><div><img src="/img/like.png" style="width: 30px; height: 30px; margin-left: 85%; margin-top: -10%;">
            <p id = "likes6" style="margin-left: 85%; margin-bottom: -7%; margin-top: -3%;"></p> 
           </div></li>
        </ul>
       </div>
      </div>
    </div>

  </div>
</div>
</div>
</div>

<!--Переключение страниц-->
<div class="container">
  <center><div>
    <button onclick= " PageBack()" style=" margin-right: -5px; border:1px solid black; border-color: #C4C4C4; border-radius: 20px 0px 0px 20px;"><<</button>
   
    <button onclick = "SetPage(this.innerHTML)" id = "p1" style="margin-right: -5px; border:1px solid black; border-color: #C4C4C4; color : #66FCF1"></button>                               
    <button onclick = "SetPage(this.innerHTML)" id = "p2" style="margin-right: -5px; border:1px solid black; border-color: #C4C4C4"></button>
    <button onclick = "SetPage(this.innerHTML)" id = "p3" style="margin-right: -5px; border:1px solid black; border-color: #C4C4C4"></button>
    <button onclick = "SetPage(this.innerHTML)" id = "p4" style="margin-right: -5px; border:1px solid black; border-color: #C4C4C4"></button>
    <button onclick = "SetPage(this.innerHTML)" id = "p5" style="margin-right: -5px; border:1px solid black; border-color: #C4C4C4"></button>
    <button onclick = "SetPage(this.innerHTML)" id = "p6" style="margin-right: -5px; border:1px solid black; border-color: #C4C4C4"></button>
 
    <button onclick = " PageForward()" style=" margin-right: -5px; border:1px solid black; border-color: #C4C4C4; border-radius: 0px 20px 20px 0px;">>></button>     
  </div></center>
</div>


<script>
GetMeList();
//ChangePages();
</script>



@endsection