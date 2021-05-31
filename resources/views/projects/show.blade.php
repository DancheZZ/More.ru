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

function deleteComment(id)
{
  let url = "/admin/deleteComment/" + id;
  $.get
  (
    url,
    {},
    function(data)
    {
      $("#comment"+id).remove();
    }
  )
}

function setGrade(opinion)
{
  let url = '/grade/' + {{ $project->id }} + '/' + opinion;
  $.get
  (
    url,
    {},
    function(data)
    {
      console.log(data['result']);
      if (data['result'] == 'change')
      {
        if (opinion == 1)
        {
          $('#likes').css('color','#66FCF1');
          $('#dislikes').css('color','#000000');        }
        if (opinion == 0)
        {
          $('#dislikes').css('color','#66FCF1');
          $('#likes').css('color','#000000')
        }
      }
      else
      {
        if (opinion == 1)
        {
          $('#likes').css('color','#66FCF1');
          $('#dislikes').css('color','#000000');        }
        if (opinion == 0)
        {
          $('#dislikes').css('color','#66FCF1');
          $('#likes').css('color','#000000')
        }
      }
    }
  )
}



</script>

<div class="container">
    <div class="row">

        <div class="col-md-6">
          <img src="/img/{{ $project->image }}" width="530" height="auto" style="margin-top: 10%;" class = "options1">
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
                <li class="text-one-prj">{{ $project->collected_money }}₽</li>
                <li>{{ __('layout.from') }} {{ $project->money_required }}₽</li>
              </ul>
            </div>

            <div class="col-md-6">
              <div style=" text-align: right;">
              <ul style="list-style-type:none;">
                <li>{{ count($sponsors) }} {{ __('layout.sponsors1') }}</li>
                <li>{{ __('layout.late1') }} 
                @if($countDays < 0)
                  0
                @endif 
                @if ( $countDays >0 )
                  {{ $countDays }}
                @endif
                {{ __('layout.days1') }}</li>
              </ul>
              </div>
            </div>

          </div>

          <div class="row">

            <div class="container" style="margin-left: 20px;">
              <div class="progress" style="height: 25px; border-radius: 30px;">
                <div class="progress-bar" style="width : 
                @if($procent <= 5)
                  {{ 5 }} %
                @endif
                @if($procent > 5)
                {{ $procent }}%
                @endif
               ; background-color:#66FCF1A3; color: black; border-radius: 30px;">{{ $procent }}%</div>
            </div>
          </div>
            <div class="col-md-6">
              <button class="btn-one-prj options2" id = "titel">{{ __('layout.support1') }}</button>
            </div>

                <div class="col-md-4" style="text-align: right; margin-top: 30px">
                  <img
                  @if(Auth::User())
                    onclick = "setGrade(1)" 
                  @endif
                  src="/img/like.png" height="60" width="60" style = "margin-top: -30px; cursor: pointer;">
                  <strong><p id = "likes" class = "options3"
                  
                  @if(! Auth::User()) 
                    style = "margin-left : 95px; margin-top: 30px;  color : #000000;  text-align: center;"
                  @endif
                  
                  @if(Auth::User())
                    @if ($grade != null)
                      @if ($grade[0]->opinion == 0)
                        style = "margin-left : 95px; margin-top: 30px; color : #000000; text-align: center;"
                      @endif
                      @if($grade[0]->opinion == 1)
                        style = "margin-left : 95px; margin-top: 30px; color : #66FCF1; text-align: center;"
                      @endif
                    @endif
                    
                    @if ($grade == null)
                      style = "color : #000000; margin-top: 30px; margin-left : 95px; text-align: center;"
                    @endif
                  @endif
                  >{{ $project->count_likes }}</p></strong>
                </div>
                
                <div class="col-md-2" style="text-align: right; margin-top: 30px">
                  <img
                  @if(Auth::User())
                    onclick = "setGrade(0)" 
                  @endif
                  style = "cursor: pointer;"
                  src="/img/dislike.png" 
                  height="60" 
                  width="60">
                  <strong><p id = "dislikes" class = "options3"
                  @if(! Auth::User()) 
                    style = "text-align: center;"
                  @endif
                  @if(Auth::User())
                    @if ($grade != null)
                      @if ($grade[0]->opinion == 1)
                        style = "text-align: center; color : #000000; text-align: center;"
                      @endif
                      @if($grade[0]->opinion == 0)
                        style = "text-align: center; color : #66FCF1; text-align: center;"
                      @endif
                    @endif
                    
                    @if ($grade == null)
                      style = "text-align: center; text-align: center;"
                    @endif
                  @endif
                  >{{ $project->count_dislikes }}</p></strong>
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
              <p style ="cursor: pointer;" onclick = "descrUp();">{{ __('layout.prj1') }} </p>
            </div>

            <div class="col-md-1 color-fr1 text-white" style="margin-right: 60px; margin-top: 10px">
              <p style ="cursor: pointer;" onclick = "commUp();">{{ __('layout.comm1') }}</p>
            </div>

            <div class="col-md-1 color-fr1 text-white" style="margin-top: 10px">
              <p style ="cursor: pointer;" onclick = "sponsUp();">{{ __('layout.sponsors2') }} </p>
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

    @if(Auth::User())
    <div class="container">
      <form method = "POST" action = "/comment/add/{{ $project->id }}">
        @csrf
        <p>{{ __('layout.comment1') }}<br><textarea name = "text" style="height: auto; width: 1100px; height: 150px; border: 1px solid black; border-radius: 15px"></textarea>
        <br>
        <center><button class="btn-one-prj1">{{ __('layout.sendComm') }}</button></center></p>
      </form>
    </div>
    @endif
    <div class="container">
        @if(count($comments) == 0)
            <p>{{ __('layout.noComments') }} </p>
        @endif
        @for ($i = 0; $i<count($comments); $i++)
        <div id = "comment{{ $comments[$i]->id }}" style="height: auto; width: 800px auto; border: 1px solid black; border-radius: 15px">
            <p style="font-weight: bold;"><img src="/Images/{{ $commentators[$i]->avatar }}" height="35" width="35" style="margin-right: 12px; border-radius: 15px; padding: 3px">{{ $commentators[$i]->name }} {{ $commentators[$i]->surname }}</p>
            <p style="margin-left: 40px; margin-top: -10px"> {{ $comments[$i]->text }}</p>
            <div style="overflow: hidden; margin-left: 40px;">
              <p style="float: left;">{{ $comments[$i]->date }}</p>
            @if(Auth::user())
              @if(Auth::user()->is_admin)
                <a onclick = "deleteComment({{ $comments[$i]->id }})" style="float: left; margin-left: 2%; cursor: pointer;">{{ __('layout.delete') }}</a>
              @endif
            @endif
              
            </div>
        </div>
        <br>  
        @endfor
    </div>

</div>

<div id = "sponsors" class="container" style = "display: none">
  <div class="row"> 
   @if(count($sponsors) == 0)
      <p>{{ __('layout.noSpons') }}</p>
    @endif  
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