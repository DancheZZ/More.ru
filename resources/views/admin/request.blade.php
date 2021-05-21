@extends ('layout')

@section ('content')
<div style="min-height: calc(100vh - 80px);">

<script type="text/javascript" language="javascript">

function descrUp()
{
  $("#comments").css("display","none");
  $("#sponsors").css("display","none");
  $("#descr").css("display","");
} 

function commUp()
{
  $("#sponsors").css("display","none");
  $("#descr").css("display","none");
  $("#comments").css("display","");
}

function sponsUp()
{
  $("#comments").css("display","none");
  $("#descr").css("display","none");
  $("#sponsors").css("display","");
}


</script>

<div class="container">
    <div class="row">

        <div class="col-md-6">
          <img src="/img/{{ $project->image }}" width="530" height="auto" style="margin-top: 10%;">
        </div>

        <div class="col-md-6">
          <center><p class="text-one-prj">{{ $project->name }}</p></center>
          <br>
          <p style="margin-left: 10"><img src = "/Images/{{ $author[0]->avatar }}"  height="30" width="30"> {{ $author[0]->name }} {{ $author[0]->surname }}  </p>
          <br>
          <br>
          <br>
          <br>

          <div class="row">

            <div class="col-md-6">
                <ul style="list-style-type:none; margin-top: -30px">
                    <li class="text-one-prj">0</li>
                    <li>из {{ $project->money_required }}</li>
                </ul>
            </div>

            <div class="col-md-6">
                <div style=" text-align: right;">
                <ul style="list-style-type:none;">
                <li> 0 спонсора</li>
                <li>осталось {{ $countDays }} дней</li>
                </ul>
                </div>
            </div>

            </div>

            <div class="row">

            <progress value="0" max="100"></progress>

            <div class="col-md-6">
                <button class="btn-one-prj">Поддержать</button>
            </div>

                <div class="col-md-4" style="text-align: right; margin-top: 30px">
                <img src="/img/like.png" height="60" width="60" style = "margin-top: -30px; cursor: pointer;">
                <p id = "likes" 
                style = "margin-right : 20px; margin-top: 30px">0</p>
                </div>

                <div class="col-md-2" style="text-align: right; margin-top: 30px">
                <img 
                src="/img/dislike.png" 
                height="60" 
                width="60">
                <p id = "dislikes" 
                style = "text-align: center;">0</p>
                </div>

          </div>
        </div>

    </div>                        
</div>

<nav class="navbar navbar-expand-lg navbar-white color-nav">

  <div class="container" style="height: 20px">

  <div class="collapse navbar-collapse" id="navbarSupportedContent1" style="margin-left: auto; margin-right: auto; width: 100px;">
    

        <div class="row" style="width: 100%">

            <div class="col-md-1 color-fr1 text-white" style="margin-top: 10px">
              <p style ="cursor: pointer;" onclick = "descrUp();">Проект </p>
            </div>

            <div class="col-md-1 color-fr1 text-white" style="margin-right: 60px; margin-top: 10px">
              <p style ="cursor: pointer;" onclick = "commUp();">Комментарии</p>
            </div>

            <div class="col-md-1 color-fr1 text-white" style="margin-top: 10px">
              <p style ="cursor: pointer;" onclick = "sponsUp();">Спонсоры </p>
            </div>

        </div>

  </div>
  </div>
  </nav>

<br>
<div id = "descr" class="container">
  <p>{{ $description }}</p>
</div>

<br>
<div id = "comments" style = "display: none">
    <div class="container">
        
    </div>

</div>

<div id = "sponsors" class="container" style = "display: none">
  <div class="row">   
    
  </div>
</div>

<div class="container">
    <center>
    <div style="display: inline-block; width: 100%; margin-top: 15%;">
        <button onClick='location.href="/admin/response/{{ $project->id }}" ' class="button-ad" style="margin-right: 5%">Вернуть на доработку</button>
        <button onClick='location.href="/admin/accept/{{ $project->id }}" ' class="button-ad">Одобрить проект</button>
    </div>
    </center>
</div>


@endsection