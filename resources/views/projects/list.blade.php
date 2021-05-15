@extends ('layout')

@section ('content')

@foreach ($projects as $project)
    {{ $project->id }}
 @endforeach


@endsection