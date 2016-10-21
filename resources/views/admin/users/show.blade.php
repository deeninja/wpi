@extends('layouts.admin')

@section('content')

    <! -- { left column -->
    <div class="col-md-12">

        <div>
            <img class="img-rounded img-responsive" width="100" src="{{$user->photo ? '/images/users/' . $user->photo->path : 'http://placehold.it/50x50'}}">
        </div>
        <dl class="list-inline">
            <dt>Id</dt>
            <dd>{{$user->id}}</dd>

            <dt>First Name</dt>
            <dd>{{$user->first_name}}</dd>

            <dt>Last Name</dt>
            <dd>{{$user->last_name}}</dd>

            <dt>Email</dt>
            <dd>{{$user->email}}</dd>

            <dt>Status</dt>
            <dd>{{$user->status}}</dd>

            <dt>Phone</dt>
            <dd>{{$user->phone}}</dd>

            <dt>Country</dt>
            <dd>{{$user->country ? $user->country->name : ''}}</dd>

            <dt>Role</dt>
            <dd>{{$user->role->name}}</dd>

            <dt>Bio</dt>
            <dd>{{$user->bio}}</dd>


            <dt>Plays</dt>
            <dd>{{$user->plays}}</dd>

            <dt>Website</dt>
            <dd>{{$user->website}}</dd>
        </dl>

    </div>
    <! -- left column } -->

    <a href="{{route('users.edit', $user->id)}}" class="pull-left btn btn-success">Edit</a>

    {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy', $user->id]]) !!}
        <div class="form-group">
            {!! Form::submit('Delete User', ['class'=>'pull-right btn btn-danger'])!!}
        </div>
    {!! Form::close() !!}



@endsection