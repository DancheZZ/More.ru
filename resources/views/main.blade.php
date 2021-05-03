@extends ('layout')

@section ('content')

@auth
<h2>{{ Auth::user()->name }}  </h2>
@endif

@endsection