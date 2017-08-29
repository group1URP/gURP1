@extends('layouts.app')

@section('content')
    <h1>projects</h1>
    @if(count($projects) > 0)
        @foreach($projects as $project)
            <h3><a href="/groups/{{$project->id}}">{{$project->title}}</a></h3>
            <br>
            <p>{{$project->description}}</p>
            <small>Created on {{$project->created_at}}
        @endforeach
    @else
        <p>No projects found</p>
    @endif

@endsection