@extends('layouts.admin')

@section('content')

    <h1>Conference | View</h1>

    <!-- same as conferences/9/plays (check route)-->
    <div class="row">
        <div class="col-md-6">
            <a class="btn btn-primary pull-left" href="{{route('plays.conference.show', $conference->id)}}" class="btn
    btn-primary">View Plays</a>
        </div>
        <div class="col-md-6">
            <a class="btn btn-primary pull-right" href="{{route('plays.create', $conference->id)}}" class="btn
    btn-primary">Add Play</a>
        </div>
    </div>

    @if(Session::has('conference_updated'))
        <div class="alert-success panel panel-green">
            <h4 class="text-success"><i>{{session('conference_updated')}}</i></h4>
        </div>
    @endif

    <h2>Title: {{$conference->title}}</h2>
    <h3>Year: {{$conference->year}}</h3>
    <img width="600" src="{{$conference->photo->path ? '/images/conferences/' . $conference->photo->path : 'http://placehold
    .it/50x50'}}">
    <h2>Excerpt: {{$conference->excerpt}}</h2>
    <div>
        <h2>Details:</h2>
        {{-- this syntax doesn't escape html tags, which tinymce stores data as, so we usethis to retain the html structure--}}
        {!! $conference->details !!}
    </div>
    <a href="{{route('conferences.edit', $conference->id)}}" class="pull-left btn btn-success">Edit</a>


    {!! Form::open(['method'=>'DELETE','action'=>['ConferencesController@destroy', $conference->id]]) !!}


    <div class="form-group">
        {!! Form::submit('Delete Conference', ['class'=>'pull-right btn btn-danger'])!!}

    </div>

    {!! Form::close() !!}

@endsection


