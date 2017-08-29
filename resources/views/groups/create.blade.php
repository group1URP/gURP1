@extends('layouts.app')

@section('content')
    <h1>Create Group</h1>
    {!! Form::open(['action' => 'GroupsController@store', 'method' => 'POST']) !!}
    <div class=form-group"">
        {{Form::label('name', 'Name')}}
        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
    </div>
    <div class="form-group">
        {{Form::label('max_size', 'Max Size')}}
        {{Form::text('max_size', '', ['class' => 'form-control', 'placeholder' => 'Max_size'])}}
    </div>
    <div class="form-group">
        {{Form::label('is_full', 'Is Full')}}
        {{Form::checkbox('is_full', '', ['class' => 'form-control'])}}
    </div>
    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}



@endsection