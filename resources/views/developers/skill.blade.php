@extends('layouts.app')


@section('content')
    @if(!Auth::guest())
        <div class="row">
           <div class="col-md-8 col-sm-8">
                <h2>Developers with {{ $skillDevs->skill }} skill</h2>
                @foreach ($skillDevs->developers as $developer)
                   <h2><a href="/developer/{{ $developer->user->id }}"> {{ $developer->user->username }}</a></h2>
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
