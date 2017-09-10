@extends('layouts.app')
@section('content')
    @if (!Auth::guest())
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="well">
                    <div class="Username">
                        {{ $user->username }} ( <em>Client</em>)
                    </div>
                    <img style="width:100%" src="/storage/profile_pictures/{{$user->client->profile_picture}}" alt="profile picture">
                </div>
                @if (Auth::user()->id == $user->client->user_id)
                    <a class ="btn btn-link" href="/client/edit/{{$user->id}}"><small>Edit profile</small></a>
                @endif
            </div>
            <div class="col-md-8 col-sm-8">
                <!--here we add other client information-->

                <div class="well">
                    <strong>Business Name: </strong> {{$user->client->business_name}}<br>
                    <strong>Business Type: </strong> {{$user->client->business_type}}<br>
                </div>
            </div>
        </div>
    @else
        <div class="container">
            <h1>Only registered users can see profiles</h1>
            <h3>register or log in to see this page!</h3>
            <a class ="btn btn-link" href='/'> Back to home page</a>
        </div>
    @endif

@endsection
