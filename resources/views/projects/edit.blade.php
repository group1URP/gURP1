@extends('layouts.app')

@section('content')
    <h1>Create Project</h1>
    {!! Form::open(['action' => ['ProjectsController@update', $project->id], 'method' => 'POST']) !!}
    <div class=form-group"">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $project->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', $project->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>
    <div class="form_group">
        {{Form::checkbox('private')}}
        {{Form::label('private', 'Private', $project->is_private)}}
    </div> 

    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}



@endsection