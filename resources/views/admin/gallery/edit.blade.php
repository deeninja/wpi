@extends('layouts.admin')

@section('content')

    <div class="col-md-12">
        <h1>{{$gallery->name}} | Add Photos</h1>
    </div>

    <!-- notifications -->
    @if(Session::get('image_deleted'))
        <div class="col-md-12 alert alert-success fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            <h4>{{session('image_deleted')}}</h4>
        </div>
    @endif
    @if(Session::get('gallery_updated'))
        <div class="col-md-12 alert alert-success fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            <h4>{{session('gallery_updated')}}</h4>
        </div>
    @endif
    <!-- /.notifications -->


    <!-- gallery name update form -->
    {!! Form::model($gallery,['method'=>'PATCH','action'=>['GalleriesController@update', $gallery->id]]) !!}
    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name',$gallery->name, ['class'=>'form-control input-lg']) !!}
    </div>
    <div class="form-group">
        {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
    </div>

    {!! Form::close() !!}
    <!-- /.gallery name update form -->

    <!-- dropzone -->
    <div class="col-md-12">
        <div class="well">
            <form action="{{ url('admin/gallery/do-image-upload') }}" class="dropzone" id="addImages">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="gallery_id"></label>
                    <input type="hidden" name="gallery_id" value="{{ $gallery->id }}">
                </div>
            </form>


        </div>
    </div>
    <!-- /.dropzone -->


    <!-- images display -->
    <div id="gallery-images">

        @foreach($gallery->photos as $photo)
            <div class="col-md-3">
                <a class="img-remove" href="{{ 'gallery/images/' . $photo->path}}" data-lightbox="roadtrip">
                    <img class="thumb img-thumbnail img-responsive img-height" src="{{
                            '/gallery/images/' . $photo->path}}" alt="">
                    <a href="{{route('galleries.imageRemove',$photo->id)}}" class="btn x-remove-image">&times;</a>
                </a>
            </div>
        @endforeach

    </div>
    <!-- /.images display -->

    <div class="col-md-12">
        <a class="pull-left btn btn-primary" href="{{url('gallery/list')}}">Back</a>

        {!! Form::open(['method'=>'DELETE','action'=>['GalleriesController@destroy', $gallery->id],
        'id'=>'deleteBtn']) !!}
        <div class="pull-left form-group">
            {!! Form::submit('Delete Gallery', ['class'=>'pull-right btn btn-danger'])!!}
        </div>
        {!! Form::close() !!}
    </div>

    <script>
        // confirm deletion function
        document.getElementById('deleteBtn').addEventListener('submit', function(e) {

            var confirmation = confirm('Deleting this gallery is permanent. Proceed?');

            // if they click no, prevent the default (form from submitting)
            if ( !confirmation ) {
                e.preventDefault();
            }
            return true;
        });
    </script>

@endsection