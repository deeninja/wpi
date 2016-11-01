@extends('layouts.admin')

@section('content')

    <h1>View All posts</h1>

    <!-- notifications -->
    @if(Session::has('post_updated'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            <h4>{{session('post_updated')}}</h4>
        </div>
    @endif
    @if(Session::has('post_deleted'))
        <div class="alert alert-danger fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            <h4>{{session('post_deleted')}}</h4>
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
                    <th>Feature Image</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Date Created</th>
                    <th>Date Updated</th>
                    <th>&nbsp;</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <!-- /.table headings -->

            <!-- table content -->
            <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>
                        <img class="img-rounded img-responsive" width='100'
                             src="{{$post->photo ? '/images/posts/' . $post->photo->path : 'http://placehold.it/50x50'}}">
                    </td>

                    <td>{{$post->user->first_name . ' ' . $post->user->last_name}}</td>


                    <td>{{$post->title}}</td>
                    <td>{{$post->created_at}}</td>
                    <td>{{$post->updated_at}}</td>
                    <td><a class="btn btn-success" href="{{route('posts.edit', $post->id)}}">Edit</a></td>
                    <td><a class="btn btn-primary" href="{{route('posts.show', $post->id)}}">View</a></td>
                </tr>
            @endforeach
            </tbody>
            <!-- /.table content -->

        </table>
    </div>
    <!-- /.table -->

@endsection