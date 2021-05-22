@extends('layout')

@section('content')

<script type="text/javascript" language="javascript">

    function DisplayProject()
    {
        $("#projects").css("display","");
        $("#change").css("display","none");
    } 

    function DisplaySettngs()
    {
        $("#projects").css("display","none");
        $("#change").css("display","");
    }

</script>

<div style="min-height: calc(100vh - 80px);">
<div class="container">
<div class="row">
  <div class="col-md-6" style="margin-top: 5%">
    <a onclick = "DisplayProject()" style="font-family: Montserrat; cursor : pointer">Проекты</a>
    <br>
    <a onclick = "DisplaySettngs()" style="font-family: Montserrat; cursor : pointer">Настройки</a>
    <h1></h1>
    <form id = "logout" method = "POST" action = "{{ route('logout') }}">@csrf <a 
                                                href="{{ url('/logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout').submit();" 
                                                style = "color: black;"
                                                >Выход</a> </form>
  </div>

  <div id = "projects" class="col-md-6"  style="margin-top: 5%;">
        <center>
            <table style="border: 1px solid black;" align="right" width="850" height = "100">
                <tr>
                    <th style="width: 250px"><center>Название</center></th>
                    <th style="width: 200px"><center>Собранная сумма</center></th>
                    <th style="width: 200px"><center>Необходимая сумма</center></th>
                    <th style="width: 200px"><center>Статус</center></th>
                </tr>
                @for($i = 0; $i<count($projects); $i++)
                <tr>
                    <td><center><a style = "color: black;" href = "projects/{{ $projects[$i]->id }}">{{ $projects[$i]->name }}</a></center></td>
                    <td><center>{{ $projects[$i]->collected_money }}</center></td>
                    <td><center>{{ $projects[$i]->money_required }}</center></td>
                    <td>
                    <center>
                        @if($projects[$i]->published)
                            Опубликован
                        @endif
                        @if (!$projects[$i]->published)
                            Не опубликован
                        @endif
                    </center>
                    </td>
                </tr>
                @endfor
            </table>
        </center>
    </div>

<div id = "change" class="col-md-6"  style="margin-top: 5%;  display: none">
    <form action = "/changeMe" method = "POST">
        @csrf
        <strong><p style="font-family: Montserrat;">Изменение профиля:</p></strong>
        <br>
        <p style="font-family: Montserrat;">Имя:</p>
        <input type = "text" value = "{{ Auth::user()->name }}" id = "name" name = "name" class="btn-reg" style="margin-top: -20px"><br><br>
        <p style="font-family: Montserrat;">Фамилия:</p>
        <input type="text" value = "{{ Auth::user()->surname }}" id = "surname" name = "surname" class="btn-reg" style="margin-top: -20px"><br><br>
        <input type = "submit" class="button-prj"  ><br><br><br><br>
    </form>
    <form action = "/changeAva" method = "POST" enctype="multipart/form-data">
        @csrf
        <p style="font-family: Montserrat;">Фото профиля:</p>
        <input type="file" id = "file" name = "avatar"  style="margin-top: -20px"><br><br> 
        <input type = "submit" class="button-prj"><br><br>
        
    </form>
  </div>

</div>
</div>
</div>

@endsection