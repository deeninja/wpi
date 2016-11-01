@extends('layouts.admin')

@section('content')
    <div class="panel panel-body">
        <div class="col-md-12">
            <h1>{{$gallery->name}} | Add Photos</h1>
            @include('includes.form_error')
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
        {!! Form::model($gallery,['method'=>'PATCH','action'=>['GalleriesController@update', $gallery->id],
        'files'=>'true']) !!}
        <div class="form-group">
            {!! Form::label('name', 'Name:') !!}
            {!! Form::text('name',$gallery->name, ['class'=>'form-control input-lg']) !!}
        </div>


        <div class="form-group">
            {!! Form::label('cover_image', 'Cover Photo:') !!}
            {!! Form::file('cover_image', null, ['class'=>'form-control']) !!}
            <span id="helpBlock" class="help-block">A cover photo for the gallery.</span>
        </div>


        <div class="form-group">
            {!! Form::submit('Save', ['class'=>'btn btn-success']) !!}
        </div>


    {!! Form::close() !!}
    <!-- /.gallery name update form -->

        <!-- cover-image -->
        <div class="img-rounded text-center col-md-12">
            <img class="gallery-cover" src="{{$gallery->cover_image ? '/gallery/images/' . $gallery->cover_image : ''}}"
                 alt="Gallery Cover
            Image">
            <br><br>
            <br>
        </div>

        <!-- /.cover-image -->

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
        <div class="col-lg-12 panel panel-body">
            <hr>
            <br>
            <div id="gallery-images">
                <div class="panel panel-body">
                    @foreach($gallery->photos as $photo)
                        <div class="img-remove col-md-3">
                            <a class="" href="{{ 'gallery/images/' . $photo->path}}" data-lightbox="roadtrip">
                                <img class="thumb img-thumbnail img-responsive img-height" src="{{
                            '/gallery/images/' . $photo->path}}" alt="">
                                <a href="{{route('galleries.imageRemove',$photo->id)}}"
                                   class="btn x-remove-image">&times;</a>
                            </a>
                        </div>
                    @endforeach
                    <small>You can delete images by clicking on the x on the thumbnail.</small>
                </div>
            </div>
            <!-- /.images display -->

            <!-- buttons -->
            <div class="col-lg-12">
                <div class="col-lg-6">
                    <a class="pull-left btn btn-block btn-primary" href="{{route('galleries.show',$gallery->id)}}">Back</a>
                </div>
                <div class="col-lg-6">
                    {!! Form::open(['method'=>'DELETE','action'=>['GalleriesController@destroy', $gallery->id],
                    'id'=>'deleteBtn']) !!}
                    <div class="btn-block pull-left">
                        {!! Form::submit('Delete Gallery', ['class'=>'btn-block btn btn-danger'])!!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
            <!-- /.buttons -->
        </div>
    </div>
    <script>
        // confirm deletion function
        document.getElementById('deleteBtn').addEventListener('submit', function (e) {

            var confirmation = confirm('Deleting this gallery is permanent. Proceed?');

            // if they click no, prevent the default (form from submitting)
            if ( !confirmation ) {
                e.preventDefault();
            }
            return true;
        });
    </script>

@endsection