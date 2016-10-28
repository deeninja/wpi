@extends('layouts.admin')

@section('content')

    <h1>Comments</h1>

    <!-- notifications -->
    @if(Session::has('deleted_comment'))
        <div class="alert alert-danger fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            <h4>{{session('deleted_comment')}}</h4>
        </div>
    @endif
    <!-- /.notifications -->

    <!-- table -->
    <div class="table-responsive">
        <table class="table table-striped table-responsive table-hover">

            <!-- table headings -->
            <thead>
            <tr>
                <th>#</th>
                <th>Post ID</th>
                <th>Commenter Name</th>
                <th>Commenter Email</th>
                <th>Comment</th>
                <th>Created</th>
                <th>Updated</th>
            </tr>
            </thead>
            <!-- table headings -->

            <!-- table content -->
            <tbody>

            @if($comments)
                @foreach($comments as $comment)
                    <tr>

                        <td>{{$comment->id}}</td>
                        <td><a target="_blank" href="{{route('post.show',$comment->post_id)
                        }}">{{$comment->post->id}}</a></td>
                        <td>{{$comment->user->first_name . ' ' . $comment->user->last_name}}</td>
                        <td>{{$comment->user->email}}</td>
                        <td>{{$comment->content}}</td>
                        <td>{{$comment->created_at->diffForHumans()}}</td>
                        <td>{{$comment->updated_at->diffForHumans()}}</td>
                        <td><a href="{{route('comments.show', $comment->id)}}" class="btn btn-success">View</a></td>

                    </tr>
                @endforeach
            @endif
            </tbody>
            <!-- /.table content -->

        </table>
    </div>
    <!-- /.table -->

@stop