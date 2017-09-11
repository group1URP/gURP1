@extends('layouts.app')


@section('content')
    @if(!Auth::guest())
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="well">
                    <div class="Username">
                       {{$user->username}} ( <em>Developer</em>)
                    </div>
                    <img style="width:100%" src="/storage/profile_pictures/{{$user->developer->profile_picture}}" alt="profile picture">
                    @if (Auth::user()->id == $user->developer->user_id)
                        <small><a class ="btn btn-link" href="/developer/edit/{{ $user->id }}">Edit profile</a></small>
                    @endif
                </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <h2>Skills</h2>
                @foreach ($user->developer->skills as $skill)
                    <span style="border-radius: 10px;
                            padding: 5px 10px;
                            background-color: darkseagreen;
                            font-size: 18px;
                            font-weight: bold;
                            margin-right: 8px;
                            color: white;">{{ $skill->skill }}</span>
                @endforeach
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
