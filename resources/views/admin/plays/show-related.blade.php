@extends('layouts.admin')

@section('content')

    <h1>{{$conference->title}} | <small>Plays</small></h1>

    <div class="table-responsive">
        <table class="table table-hover table-responsive table-striped">
            <thead>
            <tr>
                <th>Cover Image</th>
                <th>Play Id</th>
                <th>Title</th>
                <th>Abstract</th>
                <th>Authors</th>
                <th>URL</th>
            </tr>
            </thead>
            <tbody>

            @foreach($conference_plays as $play)
                <tr>
                    <td><img class="img-rounded img-responsive" width="100" src="{{$play->photo->path ? '/images/plays/' . $play->photo->path : ''}}"></td>
                    <td>{{$play->id}}</td>
                    <td>{{$play->title}}</td>
                    <td>{{$play->abstract}}</td>
                    <td>{{$play->authors}}</td>
                    <td><a href="{{$play->url}}">{{$play->url}}</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <a href="{{URL::previous() }}" class="btn btn-primary">Back</a>
    </div>
  


@endsection