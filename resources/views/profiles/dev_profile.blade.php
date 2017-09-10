@extends('layouts.app')


@section('content')
    @if(!Auth::guest())
        <div class="row">
            <div class="col-md-4 col-sm-4">
                <div class="well">
                    <div class="Username">
                       {{$user->username}} ( <em>Developer</em>)
                    </div>
                    <img src="#" alt="profile pic">
                    @if (Auth::user()->id == $user->developers()->user_id)
                        <small><a class ="btn btn-link" href="#">Edit profile</a></small>
                    @endif
                </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-8">
                <!--here we add other developer information-->
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
