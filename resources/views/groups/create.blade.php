@extends('layouts.app')

@section('content')
    <h1>Create Group</h1>
    {!! Form::open(['action' => 'GroupsController@store', 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('description', 'Group Description')}}
        {{ Form::textarea('description',"",['class' => 'form-control','placeholder'=>' Description']) }}
    </div>
    <div class="form-group">
        {{ Form::label('max_size', 'Max Group Size') }}        
        {{ Form::number('max_size', 2,['class' => 'form-control', 'id'=>'max_size', 'min'=>'2']) }}
    </div>

    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}



@endsection