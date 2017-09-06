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

                    <h2>Groups</h2>
                    @if (count($groups) > 0)
                        <table class="table table-striped">
                            <tbody> 
                                @foreach ($groups as $group)
                                    <tr> <td><a href="/groups/{{$group->id}}">{{$group->name}}</a></td> <td><a class="btn btn-warning" href="/groups/{{ $group->id }}/edit">Edit</a></td> 
                                    <td>
                                        {!! Form::open(['action' => ['GroupsController@destroy',$group->id], 'method' => 'POST']) !!}     
                                        {{ Form::hidden('_method',"DELETE") }} 
                                        {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
                                        {!! Form::close() !!}

                                    </td> </tr>  
                                @endforeach
                            </tbody> 
                        </table>    
                    @else
                        <h3>You have no groups</h3>
                    @endif


                    <h2>Proposals</h2>
                    @if (count($proposals) > 0)
                        <table class="table table-striped">
                            <tbody> 
                                @foreach ($proposals as $proposal)
                                    <tr> <td><a href="/proposal/{{$proposal->id}}">{{$proposal->details}}</a></td> <td><a class="btn btn-warning" href="/proposal/{{ $group->id }}/edit">Edit</a></td> 
                                    <td>
                                        {!! Form::open(['action' => ['DashboardController@cancelProposal',$proposal->id], 'method' => 'POST']) !!}
                                        {{ Form::hidden('_method',"DELETE") }} 
                                        {{ Form::submit('Delete',['class'=>'btn btn-danger']) }}
                                        {!! Form::close() !!}

                                    </td> </tr>  
                                @endforeach
                            </tbody> 
                        </table>    
                    @else
                        <h3>You have no proposals</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
