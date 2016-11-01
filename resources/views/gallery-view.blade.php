@extends('layouts.app')

@section('content')

    <div class="content-container">
        <div class="panel panel-body">
            <div class="table-wallpaper" data-photo="{{'/gallery/images/'.
                        $gallery->cover_image}}">
            </div>
        </div>
        <div class="col-md-12" id="cms_gallery">
            <div class="col-md-12">
                <h1>{{$gallery->name}}</h1>
            </div>

            <h4 class="text-center"><small>Click on image to open in a lightbox.</small>.</h4>

            <!-- images display -->
            <div id="gallery-images">
                <div class="panel panel-body">

                    @foreach($gallery->photos as $photo)
                        <div class="col-md-3">
                            <a href="{{ '/gallery/images/' . $photo->path}}" data-lightbox="{{'image-' . $photo->id}}">
                                <img data-lightbox="{{'image-' . $photo->id}}"
                                     class="thumb img-thumbnail img-responsive img-height"
                                     src="{{
                            '/gallery/images/' . $photo->path}}" alt="">
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- /.images display -->
            <div class="panel panel-body">

                <div class="col-lg-12">

                        <a class="btn btn-primary pull-right" href="{{URL::previous()}}">Back</a>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection


@section('scripts')

    <script>
        lightbox.option({
            'resizeDuration': 200,
            'wrapAround': true,
            'positionFromTop': 50
        })
    </script>

    <script>

        $(document).ready(function () {

            $('.table-wallpaper').each(function () {

                // get the currently iterating row
                var row = $(this);

                // assign the row's data (image link) to a photo variable
                var photo = row.data('photo');

                $(this).css('background', 'linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)),' +
                        ' url("' + photo + '")' + '')
                        .addClass('bg-fit');

            });


        });
    </script>



@endsection
