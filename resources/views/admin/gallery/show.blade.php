@extends('layouts.admin')

@section('content')

    <div class="col-md-12" id="cms_gallery">
        <div class="col-md-12">
            <h1>{{$gallery->name}}</h1>
        </div>

        <!-- images display -->
        <div id="gallery-images">

            @foreach($gallery->photos as $photo)
                <div class="col-md-3">
                    <a class="img-remove" href="{{ 'gallery/images/' . $photo->path}}" data-lightbox="roadtrip">
                        <img class="thumb img-thumbnail img-responsive img-height" src="{{
                            '/gallery/images/' .
                            $photo->path}}" alt="">
                        <a href="{{route('galleries.imageRemove',$photo->id)}}" class="btn x-remove-image">&times;</a>
                    </a>
                </div>
            @endforeach

        </div>
        <!-- /.images display -->
        <div class="col-md-6">
            <a class="btn btn-primary btn-block" href="{{url('gallery/list')}}">Back</a>
        </div>
        <div class="col-md-6">
            <a class="btn btn-success btn-block" href="{{route('galleries.edit',$gallery->id)}}">Edit</a>
        </div>

    </div>

@endsection

@section('footer')

    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'positionFromTop': 200
        })
    </script>

@endsection
