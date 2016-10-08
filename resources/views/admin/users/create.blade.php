@extends('layouts.admin')

@section('content')

    <h1>Create User</h1>

    {{--  <form action="{{'AdminUsersController@store'}}" method="POST">

          {{csrf_field()}}

          <div class="form-group">
              <label for="name">Name:</label>
              <input class="form-control" type="text" name="name" id="name">

          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input class="form-control" type="email" name="email" id="email">
          </div>

          <div class="form-group">
              <label for="password">Password</label>
              <input class="form-control" type="password" name="password" id="password">
          </div>

          <div class="form-group">
              <label for="role_id">Role:</label>
              <select class="form-control" name="role_id" id="role_id">
                  @foreach($roles as $role)
                  <option value="{{$role->id}}">{{$role->name}}</option>
                  @endforeach
              </select>
          </div>

          <div class="form-group">
              <label>Status:</label>
              <select class="form-control" name="role_id">
                  <option value="Active">Active</option>
                  <option value="Inactive">Inactive</option>
              </select>
          </div>



          <div class="form-group">
              <input type="submit" name="{{csrf_token()}}" value="Create" class="btn btn-primary">
          </div>

      </form>--}}


    {!! Form::open(['method' => 'POST', 'action'=> 'AdminUsersController@store', 'files'=>'true']) !!}

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control']) !!}
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
        {!! Form::select('status', array(1 => 'Active', 2 =>'Not Active'), 0, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}
    {{--/form --}}

    {{-- including the errors logic to display validation errors --}}
    @include('includes.form_error')


@stop