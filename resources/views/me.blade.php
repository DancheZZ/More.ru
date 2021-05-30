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
  <div class="col-md-6"  style="width: 50px; margin-top: 5%">
    <img style = "margin-left : auto;" width ="240px" height = "240px" src = "/Images/{{ Auth::user()->avatar }}">
    <br>  <br>
    <p style = " font-family: Montserrat; font-size : 20px"> {{ Auth::user()->name }} {{ Auth::user()->surname }}</p>
   
    <a onclick = "DisplayProject()" style="font-family: Montserrat; cursor : pointer">{{ __('layout.projectsLk') }}</a>
    <br>
    <a onclick = "DisplaySettngs()" style="font-family: Montserrat; cursor : pointer">{{ __('layout.settingsLk') }}</a>
    <h1></h1>
    <form id = "logout" method = "POST" action = "{{ route('logout') }}">@csrf <a 
                                                href="{{ url('/logout') }}"
                                                onclick="event.preventDefault();
                                                document.getElementById('logout').submit();" 
                                                style = "color: black; font-family: Montserrat;"
                                                >{{ __('layout.logoutLk') }}</a> </form>
  </div>

  <div id = "projects" class="col-md-6"  style="margin-top: 5%;">
        <center>
            <table style="border: 1px solid black;" align="right" width="850" height = "100">
                <tr>
                    <th style="width: 150px"><center>{{ __('layout.lk_name') }}</center></th>
                    <th style="width: 100px"><center>{{ __('layout.required_money') }}</center></th>
                    <th style="width: 100px"><center>{{ __('layout.need_money') }}</center></th>
                    <th style="width: 100px"><center>{{ __('layout.statusLk') }}</center></th>
                    <th style="width: 200px"><center>{{ __('layout.commAdm') }}</center></th>
                </tr>
                @for($i = 0; $i<count($projects); $i++)
                <tr>
                    <td><center><a style = "color: black;" href = "projects/{{ $projects[$i]->id }}">{{ $projects[$i]->name }}</a></center></td>
                    <td><center>{{ $projects[$i]->collected_money }}</center></td>
                    <td><center>{{ $projects[$i]->money_required }}</center></td>
                    <td>
                    <center>
                        @if($projects[$i]->published)
                            {{ __('layout.statusYes') }}
                        @endif
                        @if (!$projects[$i]->published)
                            {{ __('layout.statusNo') }}
                        @endif
                    </center>
                    </td>
                <td><center>{{ $projects[$i]->comment_moderator }}</center></td>
                </tr>
                @endfor
            </table>
        </center>
    </div>

<div id = "change" class="col-md-6"  style="margin-top: 5%;  display: none">
    <form action = "/changeMe" method = "POST">
        @csrf
        <strong><p style="font-family: Montserrat;">{{ __('layout.changePr') }}:</p></strong>
        <br>
        <p style="font-family: Montserrat;">{{ __('layout.name') }}:</p>
        <input type = "text" value = "{{ Auth::user()->name }}" id = "name" name = "name" class="btn-reg" style="margin-top: -20px"><br><br>
        <p style="font-family: Montserrat;">{{ __('layout.surname') }}:</p>
        <input type="text" value = "{{ Auth::user()->surname }}" id = "surname" name = "surname" class="btn-reg" style="margin-top: -20px"><br><br>
        <input value = "{{ __('layout.sendLk') }}" type = "submit" class="button-prj"  ><br><br><br><br>
    </form>
    <form action = "/changeAva" method = "POST" enctype="multipart/form-data">
        @csrf
        <p style="font-family: Montserrat;">{{ __('layout.photoLk') }}:</p>
        <input type="file" id = "file" name = "avatar"  style="margin-top: -20px" accept=".jpg, .jpeg, .png"><br><br> 
        <input value = "{{ __('layout.sendLk') }}" type = "submit" class="button-prj"><br><br>
        
    </form>
    
  </div>

</div>
</div>
</div>

@endsection