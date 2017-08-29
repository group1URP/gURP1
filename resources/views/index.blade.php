
@extends('layouts.app')

@section('content')



    <div class="jumbotron text-center">
        <h1>Random Projects</h1>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <h2>Create a new group</h2>
            <p>Create a new group and add random developers to work on projects together</p>
            <a class="btn btn-primary" href="/groups/create">Create Group</a>
        </div>

        <div class="col-md-6 col-sm-6">
            <h2>Create a new project</h2>
            <p>Create a new project and find a group to help you making it</p>
            <a class="btn btn-primary" href="/groups/create">Create Project</a>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-md-6 col-sm-6">
            <h2>Explore Groups</h2>
            <p>you can check all the groups here</p>
            <a class="btn btn-primary" href="/groups">Explore Groups</a>
        </div>
        <div class="col-md-6 col-sm-6">
            <h2>Explore Projects</h2>
            <p>you can check all the projects here</p>
            <a class="btn btn-primary" href="/projects">Explore Projects</a>
        </div>
    </div>
@endsection
