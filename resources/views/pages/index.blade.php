@extends('layouts.app')

@section('content')
    <div id='cover' class='white-text'>
        <h1 class='text-center'>{{$title}}</h1>
        <p class='text-center'>this is the home page</p>
        <div class='text-center'>
            <button type='button' class='btn signUp'><a href="{{ route('register') }}">Join A Team</a></button>
            <button type='button' class='btn signUp'><a href="{{ route('register') }}">Post A Project</a></button>
        </div>
    </div>
@endsection