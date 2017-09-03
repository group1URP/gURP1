@extends('layouts.app')

@section('content')
    <h1>Edit Client Profile</h1>
    {!! Form::open(['action' => ['UsersController@updateClientProfile', $user->id], 'method' => 'POST']) !!}
    <div class="form-group">
        {{Form::label('business_name', 'Business Name')}}
        {{Form::text('business_name', $user->client->business_name, ['class' => 'form-control', 'placeholder' => 'Business Name'])}}
    </div>

    <div class="form-group">
        {{Form::label('business_type', 'Business Type')}}
        {{Form::text('business_Type', $user->client->business_type, ['class' => 'form-control', 'placeholder' => 'Business Type'])}}
    </div>

    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}



@endsection 