@extends('layouts.app')

@section('content')

    <div class="content-container">
        <!-- cover photo -->
        <div class="cover-wallpaper" data-photo="{{'/images/conferences/'. $conference->photo->path}}">

            <!-- heading -->
            <h1>{{$conference->title}}</h1>

            <!-- buttons -->
            @if(count($conference->plays) > 0)
                <div class="col-lg-2 pull-right">
                    <a href="{{route('conference.plays.view', $conference->id)}}" class="btn pull-right btn-success">View
                        Plays</a>
                    @endif
                    @if(count($conference->gallery) > 0)
                        <a class="btn btn-primary pull-right" href="{{route('gallery.view', $conference->gallery->id)}}">View
                            Gallery</a>
                </div>
        @endif
        <!-- /.buttons -->
        </div>

        <!-- /.cover photo -->

        <!-- content -->
        <div class="col-lg-10">
            <hr>
            <div class="panel panel-body">

                <div class="col-lg-8 col-lg-offset-3">
                    <div class="excerpt">
                        <h2 class="lead">{{$conference->excerpt}}
                            <small>({{$conference->year}})</small>
                        </h2>
                        {{-- this syntax doesn't escape html tags, which tinymce stores data as, so we usethis to retain the html structure--}}
                        <div class="excerpt">
                            {!! $conference->details !!}
                        </div>

                        <div class="text-center">
                            <small>Last updated
                                {{$conference->updated_at->diffForHumans()}}</small>
                        </div>
                    </div>

                </div>

            </div>

        </div>
        <!-- /.content -->

    </div>

@endsection

@section('scripts')
    <script>

        $(document).ready(function () {

            $('.cover-wallpaper').each(function () {

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


