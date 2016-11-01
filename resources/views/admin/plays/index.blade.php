@extends('layouts.admin')

@section('content')

    <h1>View All Plays</h1>

    <!-- notifications -->
    @if(Session::has('play_updated'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            <h4>{{session('play_updated')}}</h4>
        </div>
    @endif

    @if(Session::has('gallery_linked'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            <h4>{{session('gallery_linked')}}</h4>
        </div>
    @endif

    @if(Session::has('play_deleted'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            <h4>{{session('play_deleted')}}</h4>
        </div>
    @endif
    <!-- /.notifications -->

    <!-- table -->
    <div class="table-responsive">
        <table class="table table-striped table-responsive table-hover">
            <thead>

            <!-- table headings -->
            <tr>
                <th>Id</th>
                <th>Image</th>
                <th>Conference</th>
                <th>Title</th>
                <th>Author1</th>
                <th>Author2</th>
                <th>Author3</th>
                <th>Author4</th>
                <th>Url</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <!-- /.table headings -->

            </thead>

            <!-- play data -->
            <tbody>
            @foreach($plays as $play)
                <tr>
                    <td>{{$play->id}}</td>
                    <td>
                        <img class="img-rounded img-responsive" width='100'
                             src="{{$play->photo ? '/images/plays/' . $play->photo->path : 'http://placehold.it/50x50'}}">
                    </td>

                    <td>

                        @if(count($play->conferences) > 0)
                            <ul>
                                @foreach($play->conferences as $conference)
                                    <li class="list-unstyled">
                                        <a class="pull-left"
                                           href="{{route('conferences.show', $conference->id)}}">{{$conference->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <ul>
                                <li class="list-unstyled pull-left">
                                    None
                                </li>
                            </ul>
                        @endif

                    </td>

                    <td>{{$play->title}}</td>
                    <td>{{$play->author1}}</td>
                    <td>{{$play->author2}}</td>
                    <td>{{$play->author3}}</td>
                    <td>{{$play->author4}}</td>

                    <!-- buttons -->
                    <td><a href="{{$play->url}}">{{$play->url}}</a></td>
                    <td><a class="btn btn-primary" href="{{route('plays.show', $play->id)}}">View</a></td>
                    @if(count($play->conferences) > 0)
                        @foreach($play->conferences as $conference)
                            <td><a class="btn btn-primary" href="{{route('conferences.show', $conference->id)
                          }}">View Conference</a></td>
                        @endforeach
                    @elseif(count($play->conferences) == 0)
                        <td><a class="btn btn-primary" href="{{route('play.link', $play->id)
                          }}">Link Conference</a></td>
                @endif
                <!-- /.buttons -->

                </tr>

            @endforeach

            </tbody>
            <!-- /.play data -->

        </table>
    </div>
    <!-- /.table -->

@endsection