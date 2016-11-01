@extends('layouts.app')

@section('content')
    <div class="content-container">

        <h1 class="text-center">Galleries</h1>
        <h4 class="text-center">View all our Galleries of Conferences and Playwrights.</h4>
        <div class="panel panel-body">

            <hr>

            <div class="well-sm">

                <div class="col-12">
                    @foreach($galleries as $gallery)
                        <div class="col-lg-4">

                            <div class="table-wallpaper" data-photo="{{'/gallery/images/'.
                        $gallery->cover_image}}">

                                <div class="col-4">
                                    <p class="pull-right"><strong><i>{{count($gallery->photos)}} Photos</i></strong></p>
                                </div>

                                <div class="col-8">
                                    <h3 class="con-feature-title">{{$gallery->name}}</h3>
                                </div>

                                @if(count($gallery->conference) > 0)

                                    <a href="{{route('conference.show',$gallery->conference->id)}}">{{$gallery->conference->title}}</a>

                                @endif
                                <div class="col-6 pull-right view-conference-button">
                                    <a href="{{route('gallery.view', $gallery->id)}}" class="btn btn-primary">View</a>
                                </div>

                            </div>

                        </div>
                    @endforeach
                </div>
                <div class="col-lg-12">
                    <div class="text-center">
                        {{$galleries->links()}}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@section('scripts')
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