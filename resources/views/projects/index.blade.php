@extends('layouts.app')

@section('content')
    <h1>Projects</h1>
    @if(count($projects) > 0)
        @foreach($projects as $project)
            <h3><a href="/projects/{{$project->id}}">{{$project->title}}</a> 
            @if ($project->is_private)
                <span class="private pull-right">Private</span>
            @endif
            </h3>
            <br>
            <p>{{$project->description}}</p>
            <small>Posted on {{$project->created_at}} Created by <a class ="btn btn-link" href="/client/{{$project->user->id}}">{{$project->user->username}}</a></small>
        @endforeach
    @else
        <p>No projects found</p>
    @endif

@endsection
