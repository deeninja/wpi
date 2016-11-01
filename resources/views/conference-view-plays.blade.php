@extends('layouts.app')

@section('content')

    <div class="content-container">


        <div class="panel panel-body">

            <h1>{{$conference->title}} |
                <small>Plays</small>
            </h1>
            <hr>

            <div class="col-12">

                @foreach($conference_plays as $play)
                    <div class="col-md-4">

                        <div class="table-wallpaper" data-photo="{{'/images/plays/'.
                        $play->photo->path}}">

                            <div class="col-8">
                                <h2 class="con-feature-title">{{$play->title}}</h2>
                            </div>

                            <div class="excerpt">{{str_limit($play->abstract,125)}}</div>


                            <div class="col-6 pull-right view-conference-button">
                                <a href="{{route('conference.play', $play->id)}}" class="btn btn-primary">View</a>
                            </div>


                        </div>

                    </div>
                        @endforeach


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