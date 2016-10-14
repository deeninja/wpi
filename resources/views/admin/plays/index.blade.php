@extends('layouts.admin')

@section('content')

    <h1>View All Plays</h1>
    @if(Session::has('play_updated'))
        <div class="alert-success panel panel-green">
            <h4 class="text-success"><i>{{session('play_updated')}}</i></h4>
        </div>
    @endif
    @if(Session::has('play_deleted'))
        <div class="alert-danger panel panel-red">
            <h4 class="text-success"><i>{{session('play_deleted')}}</i></h4>
        </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped table-responsive table-hover">
            <thead>
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
            </tr>
            </thead>

            <tbody>
            @foreach($plays as $play)
                <tr>
                    <td>{{$play->id}}</td>
                    <td><img class="img-rounded img-responsive" width='100'
                             src="{{$play->photo ? '/images/plays/' . $play->photo->path : 'http://placehold.it/50x50'}}">
                    </td>

                    <td>
                        <ul>
                            @if(count($play->conferences) > 0)
                            @foreach($play->conferences as $conference)
                                <li class="list-unstyled">
                                    <a class="pull-left" href="{{route('conferences.show', $conference->title)}}">{{$conference->title}}</a>
                                </li>
                            @endforeach
                            @else
                                @foreach($play->conferences as $conference)
                                <a class="pull-left" href="{{route('conferences.show', $conference->title)}}">{{$conference->title}}</a>
                                @endforeach
                                @endif
                        </ul>
                    </td>

                    <td>{{$play->title}}</td>
                    <td>{{$play->author1}}</td>
                    <td>{{$play->author2}}</td>
                    <td>{{$play->author3}}</td>
                    <td>{{$play->author4}}</td>
                    <td><a href="{{$play->url}}">{{$play->url}}</a></td>
                    <td><a class="btn btn-primary" href="{{route('plays.show', $play->id)}}">View</a></td>
                    @foreach($play->conferences as $conference)
                        <td><a class="btn btn-primary" href="{{route('conferences.show', $conference->id)
                      }}">View Conference</a></td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    </div>


@endsection