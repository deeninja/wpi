@extends('layouts.admin')

@section('content')

    <h1>View Play</h1>

    <h2><strong>Title:</strong>{{$play->title}}</h2>
    <div class="panel">
        <img width="500" class="img-responsive" src="{{$play->photo->path ? '/images/plays/' . $play->photo->path : ''}}">
    </div>
    <div class="row">
        <div class="panel panel-body">
            <h2><strong>From Conference: </strong>
                @foreach($play->conferences as $conference)
                    {{$conference->title}}</h2>
            @endforeach()
            <h2><strong>Authors</strong></h2>
            <ul class="list-unstyled">
                <li>{{$play->author1}}</li>
                <li>{{$play->author2}}</li>
                <li>{{$play->author3}}</li>
                <li>{{$play->author4}}</li>
            </ul>
            <p><strong>Link to Play: </strong><a href="{{$play->url}}">{{$play->url}}</a></p>
        </div>


        <div class="panel panel-body">
            <h3><strong>Abstract:</strong></h3>
            <p>{{strip_tags($play->abstract)}}</p>
        </div>

        <div class="panel panel-body">
            <a class="btn btn-primary pull-left" href="{{route('plays.edit',$play->id)}}">Edit</a>
            {!! Form::open(['method'=>'DELETE','action'=>['PlaysController@destroy', $play->id]]) !!}
            <div class="form-group">
                {!! Form::submit('Delete Play', ['class'=>'pull-right btn btn-danger'])!!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>
@endsection