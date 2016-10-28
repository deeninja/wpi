@extends('layouts.admin')

@section('content')


    <!-- notifications -->
    @if(Session::has('about_updated'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            <h4>{{session('about_updated')}}</h4>
        </div>
    @endif
    <!-- /.notifications -->


    <div class="panel panel-body">

        <h1>About Us | View</h1>
        <hr>

        <p>Last Updated at: {{$about->updated_at}}</p>

        <hr>
        <div class="panel">
            <img width="500" class="img-responsive" src="{{$about->cover_image ? '/images/about/' . $about->cover_image :
            ''}}">
        </div>
        <div class="panel panel-body">
            <h2>About Us - Content Section 1</h2>
            <hr>


            <h2>{{$about->title1}} <small>(<strong><i> Title </i></strong>)</small></h2>

            <div>
                <h2><strong>Content</strong></h2>
                <p class="excerpt">{{strip_tags($about->body1)}}</p>
            </div>
        </div>
        <div class="panel panel-body">
            <h2>About Us - Content Section 2</h2>
            <hr>


            <h2>{{$about->title2 ? $about->title2 : "Add Title, click edit below"}} <small>(<strong><i> Title </i></strong>)
                </small></h2>
            <div>
                <h2><strong>Content</strong></h2>
                <p class="excerpt">{{$about->body2 ? strip_tags($about->body2) : "Add Content, click edit below"}}
                   </p>
            </div>

            <a class="btn btn-primary pull-left" href="{{route('about.edit',$about->id)}}">Edit</a>
        </div>
    </div>


@endsection