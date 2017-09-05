@extends('layouts.app')

@section('content')
    <a href="/projects" class="btn btn-default">Go Back</a>
    <h1>{{$project->title}}</h1>
    <p>{{$project->description}}</p>
    @if ($project->extra_details != null)
        <h2>Extra Details</h2>
        <p>{{$project->extra_details}}</p>
    @endif
    <hr>

    <small>Posted on {{$project->created_at}}  Created by <a class ="btn btn-link" href="/client/{{$project->user->id}}">{{$project->user->username}}</a> </small>
    <hr>

    @if (!Auth::guest())
        @if (!Auth::user()->is_client)
            @foreach($proposalsForDeveloper as $proposalForDeveloper)
                {!! Form::open(['action' => ['ProjectsController@cancelProposal', $project->id, $proposalForDeveloper->id], 'method' =>'POST'])!!}
                {{Form::hidden('_method', 'PATCH')}}
                {{Form::hidden('_method', 'DELETE')}}
                <h3 class="pull-left">{{ $proposalForDeveloper->group->name }} - {{ $proposalForDeveloper->details }}</h3>
                {{Form::submit('Cancel', ['class' => 'pull-right btn btn-danger'])}}
                {!!Form::close() !!}
            @endforeach
        @endif



        @if (Auth::user()->id == $project->user_id)
            <a href="/projects/{{$project->id}}/edit" class="btn btn-default">Edit</a>
            <a href="#" class="btn btn-success">Confirm</a>

            {!! Form::open(['action' => ['ProjectsController@destroy', $project->id], 'method' =>'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close() !!}
            
            @if ($project->has_group)
               <h3>Development Group: {{ $proposal->group->name }} </h3>         
               
            @elseif (count($proposals) > 0)
                <h2>Proposals</h2>
                @foreach ($proposals as $proposal)
                    <h3>{{ $proposal->group->name }} - {{ $proposal->details }} <a href="/projects/proposal/accept/{{$project->id}}/{{$proposal->group->id}}" class="btn btn-success pull-right">Accept</a></h3>
                    <p>{{ $proposal->details }}</p>
                @endforeach

            @endif
        
        @elseif (!Auth::user()->is_client && count($groups) > 0)
            {!! Form::open(['action' => ['ProjectsController@submitProposal', $project->id], 'method' =>'POST'])!!}
            <h2>Project Proposal</h2>
            <div class="form-group">
            {{Form::label('group', 'Group')}}
            <select name="group" class="form-control">
                @foreach ($groups as $group)               

                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                @endforeach  
            </select>
            </div>
            
            <div class="form-group">
                {{Form::label('details', 'Why should they choose you?')}}
                {{ Form::textarea('details',"",['class' => 'form-control','placeholder'=>'Proposal']) }}
            </div>

            {{Form::submit('Submit Proposal', ['class' => 'btn btn-success'])}}
            {!!Form::close() !!}
        @endif


    @endif

   

@endsection