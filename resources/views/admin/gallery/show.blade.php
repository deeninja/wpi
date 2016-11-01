@extends('layouts.admin')

@section('content')

    <div class="col-md-12" id="cms_gallery">
        <div class="col-md-12">
            <h1 class="text-center">View | {{$gallery->name}}</h1>
            <img src="{{$gallery->cover_image ? '/gallery/images/' . $gallery->cover_image : ''}}" alt="Gallery Cover
            Image">
            <br>
            <br>
        </div>

        <div class="panel panel-body">

            <div class="col-lg-12">
                <div class="col-lg-6">
                    <a class="btn btn-primary btn-block" href="{{route('galleries.index')}}">Back</a>
                </div>
                <div class="col-lg-6">
                    <a class="btn btn-success btn-block" href="{{route('galleries.edit',$gallery->id)}}">Edit</a>
                </div>
            </div>
        </div>

        <br>

        <!-- images display -->
        <div id="gallery-images">
            <div class="panel panel-body">

            @foreach($gallery->photos as $photo)
                <div class="col-md-3">
                    <a href="{{ '/gallery/images/' . $photo->path}}" data-lightbox="{{'image-' . $photo->id}}">
                        <img data-lightbox="{{'image-' . $photo->id}}" class="thumb img-thumbnail img-responsive img-height"
                             src="{{
                            '/gallery/images/' . $photo->path}}" alt="">
                    </a>
                </div>
            @endforeach
            </div>
        </div>
        <!-- /.images display -->

    </div>

@endsection

@section('footer')

    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'positionFromTop': 50
        })
    </script>

@endsection
