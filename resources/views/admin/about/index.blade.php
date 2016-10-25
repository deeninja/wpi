@extends('layouts.admin')

@section('content')


    <!-- notifications -->
    @if(Session::has('about_updated'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            <h4>{{session('conference_updated')}}</h4>
        </div>
    @endif
    <!-- /.notifications -->


    <div class="panel panel-body">

        <h1>About</h1>
        <hr>

        <p>Last Updated at: {{$about->updated_at}}</p>

        <h1>View About Us</h1>
        <hr>
        <div class="panel">
            <img width="500" class="img-responsive" src="{{$about->cover_image ? '/images/about/' . $about->cover_image :
            ''}}">
        </div>

        <h2>About Us - Content Section 1</h2>
        <hr>

        <h2>{{$about->title1}}</h2>

        <div>
            <h2><strong>Content</strong></h2>
            <p class="excerpt">{{$about->body1}}</p>
        </div>

        <h2>About Us - Content Section 2</h2>
        <hr>

        <h2><strong>Title:</strong>{{$about->title2}}</h2>
        <div>
            <h2><strong>Content</strong></h2>
            <p class="excerpt">{{$about->body2}}</p>
        </div>

        <a class="btn btn-primary pull-left" href="{{route('about.edit',$about->id)}}">Edit</a>

    </div>


@endsection