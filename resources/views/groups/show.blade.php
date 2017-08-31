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

@endsection