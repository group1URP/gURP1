@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <h2>Projects</h2>
                    @if (count($projects) > 0)
                        <table class="table table-striped">
                            <tbody> 
                                @foreach ($projects as $project)
                                    <tr> <td><a href="/projects/{{$project->id}}">{{$project->title}}</a></td> <td><a class="btn btn-warning" href="/projects/{{ $project->id }}/edit">Edit</a></td> 
                                    <td>
                                        {!! Form::open(['action' => ['ProjectsController@destroy',$project->id], 'method' => 'POST']) !!}     
                                        {{ Form::hidden('_method',"DELETE") }} 
                                        {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
                                        {!! Form::close() !!}

                                    </td> </tr>  
                                @endforeach
                            </tbody> 
                        </table>    
                    @else
                        <h3>You have no projects</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
