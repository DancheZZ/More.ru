@extends('layout')

@section('content')
<div style="min-height: calc(100vh - 80px);">

    <script type="text/javascript" language="javascript">
    function ChooseProjects()
    {
        //let url = '/projects/' + typeGlobal +'/'+ sortingGlobal +'/' + pageGlobal;
    
        /*$.get
        (
            url,
            {},
            function(data)
            {
                /*
                <tr>
                <td id = "id1"><center></center></td>
                <td id = "text"><center></center></td>
                <td id = "email"><center></center></td>
                <td id = "date"><center></center></td>
                <td id = "status1"><center></center></td>
                </tr>
                
                
            }       
        )*/
        $("#quest").css("display","none");
        $("#projects").css("display","");
        $("#punct1").css("text-decoration","underline");
        $("#punct2").css("text-decoration","none");
    }

    function ChooseQuest()
    {
        $("#quest").css("display","");
        $("#projects").css("display","none");
        $("#punct1").css("text-decoration","none");
        $("#punct2").css("text-decoration","underline");
    }

    </script>

  <div class="container" style="margin-top: 50px">
    <div class="row">
      <div class="col-md-4">
        <a id = "punct1" onclick = "ChooseProjects()" style = "text-decoration :underline; cursor: pointer;" >Проекты</a>
        <br>
        <a id = "punct2" style = "cursor: pointer;" onclick = "ChooseQuest()">Вопросы пользователей</a>
        <h1></h1>
        <form id = "logout" method = "POST" action = "{{ route('logout') }}">@csrf <a 
                                                href="{{ url('/logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout').submit();" >Выход</a> </form>
      </div>
      <div  id = "quest" style = "display: none;" class="col-md-8">
          <center><table id ="quest_table" style="border: 1px solid black;" align="right" width="800" height = "100">
            <tr>
                <th><center>id</center></th>
                <th style="width: 250px"><center>Текст вопроса</center></th>
                <th style="width: 200px"><center>Email</center></th>
                <th style="width: 150px"><center>Дата поступления</center></th>
                <th style="width: 100px"><center>Статус</center></th>
            </tr>
            @for($i = 0; $i<count($quests); $i++)
                <tr> 
                    <td><center>{{ $quests[$i]->id }}<center></td>
                    <td><center>{{ $quests[$i]->text }}<center></td>
                    <td><center>{{ $quests[$i]->email }}<center></td>
                    <td><center>{{ $quests[$i]->date }}<center></td>
                    @if($quests[$i]->status)
                        <td><center>Отвечено<center></td>
                    @endif
                    @if(!$quests[$i]->status)
                        <td><center>Не отвечено<center></td>
                    @endif
                </tr>

            @endfor
            </table></center>
        </div>

       <div id = "projects" class="col-md-8">
          <center><table style="border: 1px solid black;" align="right" width="500" height = "100">
            <tr>
              <th><center>id</center></th>
              <th><center>Название проекта</center></th>
              <th><center>Статус</center></th>
            </tr>
             @for($i = 0; $i<count($projects); $i++)
                <tr> 
                    <td>{{ $projects[$i]->id }}</td>
                    <td><a href = "/admin/request/{{ $projects[$i]->id }}">{{ $projects[$i]->name }}</a></td>
                    @if($projects[$i]->published)
                        <td>Опубликован</td>
                    @endif
                    @if(!$projects[$i]->published)
                        <td>Не опубликован</td>
                    @endif
                </tr>
            @endfor
          </table></center>
    </div>
  </div>
</div>
<br>



@endsection