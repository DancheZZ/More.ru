@extends ('layout')

@section ('content')
<div style="min-height: calc(100vh - 80px);">

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
                <li class="text-one-prj">{{ $project->collected_money }}</li>
                <li>из {{ $project->money_required }}</li>
              </ul>
            </div>

            <div class="col-md-6">
              <div style=" text-align: right;">
              <ul style="list-style-type:none;">
                <li>{{ count($sponsors) }} спонсора</li>
                <li>осталось {{ $countDays }} дней</li>
              </ul>
              </div>
            </div>

          </div>

          <div class="row">

            <progress value="{{ $procent }}" max="100"></progress>

            <div class="col-md-6">
              <button style="height: 70px; width: 270px; margin-top: 30px"></button>
            </div>

                <div class="col-md-4" style="text-align: right; margin-top: 30px">
                  <img src="/img/like.png" height="60" width="60" style = "margin-top: -30px;">
                  <p style = "margin-right : 20px; margin-top: 30px">{{ $project->count_likes }}</p>
                </div>

                <div class="col-md-2" style="text-align: right; margin-top: 30px">
                  <img src="/img/dislike.png" height="60" width="60">
                  <p style = "text-align: center;">{{ $project->count_dislikes }}</p>
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
              <p>Проект </p>
            </div>

            <div class="col-md-1 color-fr1 text-white" style="margin-right: 60px; margin-top: 10px">
              <p>Комментарии</p>
            </div>

            <div class="col-md-1 color-fr1 text-white" style="margin-top: 10px">
              <p>Спонсоры </p>
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
<div id = "comments">
    <div class="container">
        @for ($i = 0; $i<count($comments); $i++)
        <div style="height: auto; width: 800px auto; border: 1px solid black">
            <p style="font-weight: bold;"><img src="/Images/{{ $commentators[$i]->avatar }}" height="35" width="35" style="margin-right: 12px">{{ $commentators[$i]->name }} {{ $commentators[$i]->surname }}</p>
            <p style="margin-left: 40px; margin-top: -10px"> {{ $comments[$i]->text }}</p>
            <p style="margin-left: 40px;">{{ $comments[$i]->date }}</p>
        </div>
        @endfor
    </div>

</div>

<div id = "sponsors" class="container">
  <div class="row">   
    @for ($j = 0; $j<count($sponsors); $j ++)
        <div class="col-md-4">
            <div style="height: auto; width: 800px auto;">
            <p style="font-weight: bold;"><img src="/Images/{{ $sponsors[$j]->avatar }}" height="35" width="35" style="margin-right: 6px">{{ $sponsors[$j]->name }} {{ $sponsors[$j]->surname }}</p>
            </div>
        </div>
    @endfor
  </div>
</div>

@endsection