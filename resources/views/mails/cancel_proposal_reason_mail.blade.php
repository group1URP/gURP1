@extends('layouts.app')

@section('content')
    <div class="mail-title">
        Canceling reason for {{$title}}
    </div>
    <div class="mail-content">
        we decided to cancel our proposal for
        the following reasons:  {{$reason}}
    </div>
@endsection