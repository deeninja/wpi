@extends('layouts.app')

@section('content')

    <div class="col-lg-12 blog-container">



    <!-- /.notifications -->
        <section class="blog-page col-md-8 col-md-offset-2 content-container">


                <!-- notifications -->
                @if(Session::has('comment_success'))
                <div class="panel panel-body well">
                    <div class="alert alert-success fade in">
                        <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
                        <p>{{session('comment_success')}}</p>
                    </div>
                </div>
                @endif


            <div class="well panel panel-body">
                <div class="panel panel-body">
                    <h1>{{$post->title}} |
                        <small>{{$post->updated_at}}</small>
                    </h1>
                    <hr>
                    <img class="blog-image img-rounded img-responsive" src="{{$post->photo->path ? '/images/posts/' .
                    $post->photo->path :
                    'http://placehold
                .it/50x50'}}">


                    <div class="col-lg-12">

                        {{-- this syntax doesn't escape html tags, which tinymce stores data as, so we usethis to retain the html structure--}}
                        {!! $post->body !!}
                    </div>
                </div>
            </div>
            <footer class="well clearfix">
                <div class="author-section">
                    <div class="panel panel-body">
                        @if(isset($user_photo))
                            <img class="pull-left author-photo"
                                 src="{{$user_photo->path ? '/images/users/' . $user_photo->path : '' }}"
                                 alt="Author Profile Photo">
                        @endif

                        <div class="col-lg-9 pull-left author-content">
                            <h4>Author</h4>
                            <h4>{{$post->user->first_name . ' ' . $post->user->last_name }}</h4>

                            @if($post->user->bio)
                                <p>{{$post->user->bio}}</p>
                            @endif
                        </div>
                    </div>
                </div>

            </footer>

            <section class="well col-lg-12">
                <div class="panel panel-body">
                    <h4>Leave a Comment</h4>

                    @if(Auth::user())
                        <form action="{{route('comments.store')}}" method="POST">
                            {{ csrf_field() }}

                            <div class="form-group">
                                <input name="user_id" type="hidden" value="{{Auth::user() ? Auth::user()->id : ''}}">
                                <input name="post_id" type="hidden" value="{{$post->id}}">
                                <textarea class="form-control" name="content" cols="30" rows="10" placeholder="Write here..
                        ."></textarea>
                            </div>

                            <input type="submit" class="btn btn-primary" value="Comment">
                        </form>

                    @elseif(!Auth::user())

                    <form action="{{route('login')}}" method="GET">


                        <div class="form-group">
                            <input name="user_id" type="hidden" value="{{Auth::user() ? Auth::user()->id : ''}}">
                            <input name="post_id" type="hidden" value="{{$post->id}}">

                            <textarea class="form-control" name="content" cols="30" rows="10" placeholder="Write here..
                        ."></textarea>
                            <span id="helpBlock" class="help-block">You need to be logged in to comment.</span>
                            <br>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Comment">
                    </form>
                    @endif
                </div>

                <section class="col-lg-12">
                    <div class="panel panel-body">
                        <h3>Comments</h3>
                        @include('includes.form_error')
                        <hr>
                        @foreach($post_comments as $comment)
                            <div class="panel panel-body">
                                <img class="avatar-photo" src="{{$comment->user->photo ? '/images/users/' . $comment->user->photo->path :
                        '/img/default-profile-pic-female.jpg'}}" alt="Profile photo of the commenter.">
                                <h4>{{$comment->user->first_name . ' ' . $comment->user->last_name}}- </h4>
                                <p class="alert-default">{{$comment->content}}</p>

                            </div>
                        @endforeach
                    </div>
                </section>

            </section>

        </section>

    </div>

@endsection


