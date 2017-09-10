@extends('layouts.app')

@section('content')
    <h1>Edit Client Profile</h1>
    {!! Form::open(['action' => ['UsersController@updateClientProfile', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
        {{Form::label('business_name', 'Business Name')}}
        {{Form::text('business_name', $user->client->business_name, ['class' => 'form-control', 'placeholder' => 'Business Name'])}}
    </div>

    <div class="form-group">
        {{Form::label('business_type', 'Business Type')}}
        {{Form::text('business_type', $user->client->business_type, ['class' => 'form-control', 'placeholder' => 'Business Type'])}}
    </div>
    <div class="form-group">
        {{Form::label('profile_picture', 'Profile Picture')}}
        {{Form::file('profile_picture')}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}



@endsection