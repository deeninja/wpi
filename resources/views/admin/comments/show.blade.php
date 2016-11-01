@extends('layouts.admin')

@section('content')

    <h1>View Comment</h1>

    <h2><strong>Comment #{{$comment->id}}</strong></h2>
    <div class="well">
        <div class="panel panel-body">
                <ul class="list-unstyled">
                    <li><strong>Post ID - {{$comment->post->id}}</strong></li>
                    <li><img class="avatar-photo" src="{{$author->photo ? '/images/users/' . $author->photo->path :
                    '/img/default-profile-pic-female.jpg'}}"></li>
                    <li><strong>Commenter - {{$author->first_name . '' . $author->last_name}}</strong></li>
                    <li><strong>Commenter Email - {{$author->email}}</strong></li>
                </ul>
        </div>
        <div class="panel panel-body">
            <h4>Comment Content:</h4>
            <strong class="pull-right">{{$comment->created_at->diffForHumans()}}</strong>
            <p>{{$comment->content}}</p></div>


        <div class="panel panel-body">
            {!! Form::open(['method'=>'DELETE','action'=>['CommentsController@destroy', $comment->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Comment', ['class'=>'delete-confirm pull-right btn btn-danger'])!!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection