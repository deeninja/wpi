@extends('layouts.app')

@section('content')

    <div class="col-lg-12 blog-container">

        <div class="blog-page col-md-8 col-md-offset-2 content-container">

            <h1>{{$post->title}} |
                <small>{{$post->updated_at}}</small>
            </h1>
            <hr>

            <div class="panel panel-body">
                <img width="600" src="{{$post->photo->path ? '/images/posts/' . $post->photo->path : 'http://placehold
        .it/50x50'}}">


                <div class="col-lg-12">

                    {{-- this syntax doesn't escape html tags, which tinymce stores data as, so we usethis to retain the html structure--}}
                    {!! $post->body !!}
                </div>
            </div>

            <footer class="author-section clearfix">

                @if(isset($user_photo))
                    <img class="pull-left author-photo"
                         src="{{$user_photo->path ? '/images/users/' . $user_photo->path : '' }}"
                         alt="Author Profile Photo">
                @endif

                <div class="pull-left author-content">
                    <h4><strong>Author: </strong>{{$post->user->first_name . ' ' . $post->user->last_name }}</h4>

                    @if($post->user->bio)
                        <p>{{$post->user->bio}}</p>
                    @endif
                </div>

            </footer>

            <div class="panel panel-body col-lg-12">
                <h4>Leave a Comment</h4>
                <form action="{{route('comments.store')}}" method="POST">
                    {{ csrf_field() }}

                    <div class="form-group">
                        <input name="user_id" type="hidden" value="{{Auth::user()->id}}">
                        <input name="post_id" type="hidden" value="{{$post->id}}">
                        <textarea class="form-control" name="content" cols="30" rows="10" placeholder="Write here..
                        ."></textarea>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Comment">
                </form>


                <div class="panel panel-body col-lg-12">
                    <h4>Comments</h4>
                    @foreach($post_comments as $comment)
                        <div class="panel panel-body">
                            <img class="avatar-photo" src="{{$comment->user->photo ? '/images/users/' . $comment->user->photo->path :
                    '/img/default-profile-pic-female.jpg'}}" alt="Profile photo of the commenter.">
                            <h4>{{$comment->user->first_name . ' ' . $comment->user->last_name}}- </h4>
                            <p class="alert-default">{{$comment->content}}</p>

                        </div>
                    @endforeach

                </div>

            </div>

        </div>

    </div>

@endsection


