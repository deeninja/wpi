@extends('layouts.app')

@section('content')

    <div class="col-md-10 col-lg-offset-1 content-container">

        <h1>{{$conference->title}} | <small>{{$conference->year}}</small></h1>
        <hr>

        <div class="panel panel-body">
            <img width="600" src="{{$conference->photo->path ? '/images/conferences/' . $conference->photo->path : 'http://placehold
        .it/50x50'}}">
            <h2 class="lead">{{$conference->excerpt}}</h2>

            <div class="col-md-12">
               <div class="excerpt">
                {{-- this syntax doesn't escape html tags, which tinymce stores data as, so we usethis to retain the html structure--}}
                {!! $conference->details !!}
               </div>
            </div>

            @if(count($conference->plays) > 0)
            <a class="btn btn-primary pull-left" href="{{route('conference.plays.view', $conference->id)}}" class="btn
    btn-primary">View Plays</a>
            @endif

    </div>

    </div>
@endsection


