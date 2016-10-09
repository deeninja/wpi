@extends('layouts.admin')

@section('content')

    <h1>Users</h1>

    <div class="table-responsive">
        <table class="table">
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
                    <td><img class="img-rounded img-responsive" width="50" src="{{$user->photo ? $user->photo->path : 'http://placehold.it/50x50'}}"></td>
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