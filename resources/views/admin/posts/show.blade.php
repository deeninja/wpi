@extends('layouts.admin')

@section('content')

    <div class="col-md-10">
        <article>
            <div class="img-row">
                <img class="img-responsive" src="{{$post->photo ? '/images/posts/' . $post->photo->path : ''}}">
            </div>
            <h1>{{$post->title}}</h1>

            <h2><strong>Published: </strong>{{$post->created_at}}</h2>

            <p>{{strip_tags($post->body)}}</p>
            <a href="{{$post->url}}">{{$post->url}}</a>
        </article>
        <footer>
            <cite><strong>By: </strong>{{$post->user->first_name . ' ' . $post->user->last_name }}</cite>
        </footer>

        <a class="pull-left btn btn-success" href="{{route('posts.edit', $post->id)}}">Edit</a>

        {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy', $post->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Post', ['class'=>'pull-right btn btn-danger'])!!}
            </div>
        {!! Form::close() !!}
    </div>

@endsection