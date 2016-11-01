@extends('layouts.app')

@section('content')

    <div class="content-container">

        <div class="col-lg-6 col-lg-offset-3">

        <div class="panel panel-body">

            <h1 class="page-header">{{$play->title}}</h1>

            <div class="panel">
                <img width="500" class="img-responsive"
                     src="{{$play->photo->path ? '/images/plays/' . $play->photo->path : ''}}">
            </div>

            <h2><strong>From Conference: </strong>
                @foreach($play->conferences as $conference)
                    {{$conference->title}}</h2>
            @endforeach()
            <h2 class="text-left"><strong>Authors</strong></h2>
            <ul class="list-unstyled">
                <li>{{$play->author1}}</li>
                <li>{{$play->author2}}</li>
                <li>{{$play->author3}}</li>
                <li>{{$play->author4}}</li>
            </ul>
            <p><strong>Link to Play: </strong><a href="{{$play->url}}">{{$play->url}}</a></p>


            <h3><strong>Abstract:</strong></h3>
            <p>{{strip_tags($play->abstract)}}</p>


        </div>
        </div>
    </div>
@endsection