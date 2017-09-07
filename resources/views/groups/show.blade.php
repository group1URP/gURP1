@extends('layouts.app')

@section('content')
    <a href="/groups" class="btn btn-default">Go Back</a>
    <h1>{{$group->name}}</h1>
    <hr>
    @if ($group->description)
        <p>{{$group->description}}</p>
    @endif
    <hr>
    <a href="/groups/{{$group->id}}/edit" class="btn btn-default">Edit</a>
    
    {!!Form::open(['action' => ['GroupsController@destroy', $group->id], 'method' =>'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close() !!}

    <h2>Proposals</h2>
    @foreach ($group->proposals as $proposal)
        <div class="well">
            <p style="margin:0px">Project: <a href="/projects/{{ $proposal->project->id }}">{{ $proposal->project->title }}</a><br>Status: {{ $proposal->is_accepted == 0 ? 'Not Accepted' : 'Accepted' }} </p>
        </div>
    @endforeach

@endsection