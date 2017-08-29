@extends('layouts.app')

@section('content')
    <h1>Create Project</h1>
    {!! Form::open(['action' => 'ProjectsController@store', 'method' => 'POST']) !!}
    <div class=form-group"">
        {{Form::label('title', 'Title')}}
        {{Form::text('title', $project->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Description')}}
        {{Form::textarea('description', $project->description, ['class' => 'form-control', 'placeholder' => 'Description'])}}
    </div>

    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}



@endsection