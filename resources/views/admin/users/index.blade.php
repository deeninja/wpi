@extends('layouts.admin')

@section('content')
    {{-- if there is a session variable called deleted_user, echo it --}}
    @if(Session::has('deleted_user'))
        <div class="alert-danger panel panel-red">
            <h4 class="text-warning"><i>{{session('deleted_user')}}</i></h4>
        </div>
    @endif

    @if(Session::has('updated_message'))
        <div class="alert-success panel panel-green">
            <h4 class="text-success"><i>{{session('updated_message')}}</i></h4>
        </div>
    @endif
    <h1>Users</h1>

    <div class="table-responsive">
        <table class="table table-striped table-responsive table-hover">
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
                </tr>
            </thead>
            <tbody>

                @if($users)

                    @foreach($users as $user)

                <tr>
                    <td>{{$user->id}}</td>
                    <td><img class="img-rounded img-responsive" width="100" src="{{$user->photo ? '/images/' . $user->photo->path : 'http://placehold.it/50x50'}}"></td>
                    <td>{{$user->first_name}}</td>
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->role->name}}</td>
                    <td>{{$user->status}}</td>
                    <td>{{$user->created_at->diffForHumans()}}</td>
                    <td>{{$user->updated_at->diffForHumans()}}</td>
                    <td><a href="{{route('users.edit', $user->id)}}" class="btn btn-primary">Edit</a></td>
                </tr>

                    @endforeach

                @endif
            </tbody>
        </table>
    </div>
    </div>

@stop