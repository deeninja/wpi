@extends('layouts.admin')

@section('content')

    <h1>Users</h1>

    <!-- notifications -->
    @if(Session::has('deleted_user'))
        <div class="alert alert-danger fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            <h4>{{session('deleted_user')}}</h4>
        </div>
    @endif

    @if(Session::has('updated_message'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            <h4>{{session('updated_message')}}</h4>
        </div>
    @endif
    <!-- /.notifications -->

    <!-- table -->
    <div class="table-responsive">
        <table class="table table-striped table-responsive table-hover">

            <!-- table headings -->
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Active</th>
                    <th>Created</th>
                    <th>Updated</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <!-- table headings -->

            <!-- table content -->
            <tbody>

            @if($users)
                @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td><img class="img-rounded img-responsive" width="100"
                                 src="{{$user->photo ? '/images/users/' . $user->photo->path : 'http://placehold.it/50x50'}}">
                        </td>
                        <td>{{$user->first_name}}</td>
                        <td>{{$user->last_name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->role->name}}</td>
                        <td>{{$user->status}}</td>
                        <td>{{$user->created_at->diffForHumans()}}</td>
                        <td>{{$user->updated_at->diffForHumans()}}</td>
                        <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-success">Edit</a></td>
                        <td><a href="{{route('users.show', $user->id)}}" class="btn btn-primary">View</a></td>
                    </tr>
                @endforeach
            @endif
            </tbody>
            <!-- /.table content -->

        </table>
    </div>
    <!-- /.table -->

@stop