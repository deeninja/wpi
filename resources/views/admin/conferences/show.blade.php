@extends('layouts.admin')

@section('content')

    <div class="panel panel-body">
        <h1>Conference | View</h1>

        <!-- notifications -->
        @if(Session::has('conference_updated'))
            <div class="alert alert-success fade in">
                <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
                <h4>{{session('conference_updated')}}</h4>
            </div>
        @endif
        <!-- /.notifications -->
    </div>

    </div>

    <!-- conference details -->
    <div class="panel panel-body">

        <h2>{{$conference->title}}
            <small>(Title)</small>
        </h2>

        <h3>{{$conference->year}}
            <small>(Year)</small>
        </h3>

        <img class="cms-preview-img" src="{{$conference->photo->path ? '/images/conferences/' . $conference->photo->path : 'http://placehold
        .it/50x50'}}">
        <h2>
            {{$conference->excerpt}}
            <small>(Excerpt)</small>
        </h2>

        <div clas="col-md-12">
            <div class="panel panel-body">
                <h2>Details</h2>
                {{-- this syntax doesn't escape html tags, which tinymce stores data as, so we usethis to retain the html structure--}}
                {!! $conference->details !!}
            </div>
        </div>

    </div>
    <!-- /.conference details -->

    <!-- buttons -->
    <div class="panel panel-body">

        <!-- view plays button -->
        <div class="col-lg-6">
            <a class="btn btn-primary btn-block pull-left" href="{{route('plays.conference.show', $conference->id)}}" class="btn
            btn-primary">View Plays</a>
        </div>

        <!-- add play button -->
        <div class="col-lg-6">
            <a class="btn btn-primary btn-block pull-left" href="{{route('plays.create', $conference->id)}}" class="btn
            btn-primary">Add Play</a>
        </div>
        <hr>

        <!-- view plays button -->
        <div class="col-lg-6">
            <a href="{{route('conferences.edit', $conference->id)}}" class="pull-left btn btn-block btn-success">Edit
                Conference</a>
        </div>

        <!-- delete conference button -->
        <div class="col-lg-6">
            {!! Form::open(['method'=>'DELETE','action'=>['ConferencesController@destroy', $conference->id]]) !!}
            {!! Form::submit('Delete Conference', ['class'=>'delete-confirm btn btn-block btn-danger'])!!}
            {!! Form::close() !!}
        </div>

    </div>
    <!-- /.buttons -->

    </div>

@endsection


