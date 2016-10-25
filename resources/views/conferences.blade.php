@extends('layouts.app')

@section('content')
    <div class="content-container">

        <div class="panel panel-body">

            <h1 class="text-center">Conferences</h1>
            <hr>

            <div class="well-sm">

                <div class="col-12">
                    @foreach($conferences as $conference)
                        <div class="col-md-4">

                            <div class="table-wallpaper" data-photo="{{'/images/conferences/'.
                        $conference->photo->path}}">

                                <div class="col-4">
                                    <p class="pull-right"><strong><i>{{$conference->year}}</i></strong></p>
                                </div>

                                <div class="col-8">
                                    <h2 class="con-feature-title">{{$conference->title}}</h2>
                                </div>

                                <div class="excerpt">{{str_limit($conference->excerpt,125)}}</div>

                                <div class="col-6 pull-right view-conference-button">
                                    <a href="{{route('conference.show', $conference->id)}}" class="btn btn-primary">View</a>
                                </div>

                                @if($current_year > $conference->year )
                                    <span class='label label-l label-primary'>Past</span>
                                @elseif($current_year < $conference->year)
                                    <span class='label label-success'>Upcoming</span>
                                @endif
                            </div>

                        </div>
                    @endforeach
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