@extends('layouts.app')

@section('content')
    <h1>Groups</h1>
    @if(count($groups) > 0)
        @foreach($groups as $group)
            <h3><a href="/groups/{{$group->id}}">{{$group->name}}</a></h3>
            <small>Created on {{$group->created_at}}</small>
        @endforeach
    @else
        <p>No groups found</p>
    @endif

@endsection