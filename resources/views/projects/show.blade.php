@extends('layouts.app')

@section('content')
    <a href="/projects" class="btn btn-default">Go Back</a>
    <h1>{{$project->name}}</h1>
    <hr>
    <small>Created on {{$project->created_at}} </small>
    <hr>
    <a href="/projects/{{$project->id}}/edit" class="btn btn-default">Edit</a>
    <a href="#" class="btn btn-success">Confirm</a>

    {!! Form::open(['action' => ['ProjectsController@destroy', $group->id], 'method' =>'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close() !!}

@endsection