@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>

    <div>
        <img class="img-responsive img-rounded" width="160" src="{{$user->photo ? $user->photo->path : ''}}">
    </div>

    {!! Form::model($user, ['method' => 'PATCH', 'action'=> ['AdminUsersController@update', $user->id], 'files'=>'true']) !!}



    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('first_name', 'First Name:') !!}
        {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('last_name', 'Last Name:') !!}
        {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('role_id', 'Role') !!}
        {!! Form::select('role_id', $roles, null, ['placeholder'=>'Choose a role', 'class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('status', 'Status:') !!}
        {!! Form::select('status', ['Active'=>'Active','Inactive'=>'Inactive'], null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Edit User', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
    {{--/form --}}

    {{-- including the errors logic to display validation errors --}}
    @include('includes.form_error')


@stop