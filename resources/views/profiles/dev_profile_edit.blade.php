@extends('layouts.app')

@section('content')
    <h1>Edit Developer Profile</h1>
    {!! Form::open(['action' => ['UsersController@updateDeveloperProfile', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <!--todo:add some other infos here--> 
    <div class="form-group">
        {{Form::label('profile_picture', 'Profile Picture')}}
        {{Form::file('profile_picture')}}
    </div>
    <div class="form-group">
        {{Form::label('skills[]', 'Skills')}}
        {{ Form::select('skills[]', $skills, null,['multiple' => 'multiple', 'class' => 'form-control']) }}
    </div>


    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}

@endsection