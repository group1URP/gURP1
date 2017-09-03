@extends('layouts.app)


@section('content')
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
                <!--here we add other developer informations-->
            </div>
        </div>


@endsection
