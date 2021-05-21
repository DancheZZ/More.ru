@extends('layout')

@section('content')

<div style="min-height: calc(100vh - 80px);">
    <div class="container" style="margin-top: 2%">
        <form method = "POST" action = "/admin/response/{{ $id }}">
            @csrf
            <div>
                <p style="margin-left: 23%; margin-bottom: -1px">Причина отказа:</p>
                <center><textarea name = "text" style="width: 600px; height: 200px; border-radius: 15px; border: 1px solid black;"></textarea></center>
            </div>
            <center>
                <button class="button-ad" style="margin-top: 20px">Отправить</button>
            </center>
        </form>
    </div>
</div>

@endsection

