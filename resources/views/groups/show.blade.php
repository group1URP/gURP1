@extends('layouts.app')

@section('content')
    <a href="/groups" class="btn btn-default">Go Back</a>
    <h1>{{$group->name}}</h1>
    <hr>
    @if ($group->description)
        <p>{{$group->description}}</p>
    @endif
    <hr>
    <a href="/groups/{{$group->id}}/edit" class="btn btn-default">Edit</a>
    
    {!!Form::open(['action' => ['GroupsController@destroy', $group->id], 'method' =>'POST', 'class' => 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
    {!!Form::close() !!}


    @if (Auth::user()->id == $group->user_id)
        <h2>Join Requests</h2>

        @foreach ($group->groupRequests as $req)
            @if (!$req->is_approved)
                <div class="well">
                    <p style="margin:0px">User: <a href="/developers/{{ $req->developer_id }}">View User Profile</a><br>Reason: {{ $req->reason }} </p>
                    
                    {!!Form::open(['action' => ['GroupsController@requestOutcome',$group->id, $req->id, 1], 'method' =>'POST','style' => 'display:inline;'])!!}                
                    {{Form::submit('Accept', ['class' => 'btn btn-success'])}}
                    {!!Form::close() !!}

                    {!!Form::open(['action' => ['GroupsController@requestOutcome',$group->id, $req->id, 0], 'method' =>'POST','style' => 'display:inline;'])!!}                
                    {{Form::submit('Reject', ['class' => 'btn btn-danger'])}}
                    {!!Form::close() !!}
                </div>
            @endif            
        @endforeach
    @endif

    <h2>Proposals</h2>
    @foreach ($group->proposals as $proposal)
        <div class="well">
            <p style="margin:0px">Project: <a href="/projects/{{ $proposal->project->id }}">{{ $proposal->project->title }}</a><br>Status: {{ $proposal->is_accepted == 0 ? 'Not Accepted' : 'Accepted' }} </p>
        </div>
    @endforeach
    
    @if (Auth::user()->id != $group->user_id && count($group->users) < $group->max_size)
        <h2>Request to join group</h2>
        {!!Form::open(['action' => ['GroupsController@requestToJoin', $group->id], 'method' =>'POST'])!!}
        <div class="form-group">
            {{Form::label('reason', 'Reason to be accepted')}}
            {{ Form::textarea('reason',"",['class' => 'form-control','placeholder'=>'Reason']) }}
        </div>
        {{Form::submit('Request', ['class' => 'btn btn-success'])}}
        {!!Form::close() !!}
    @endif

@endsection