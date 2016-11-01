@extends('layouts.admin')

@section('content')

    <h1>Conference | Edit</h1>

    <!-- form errors -->
    @include('includes.form_error')

    <!-- cover image -->
    <div class="panel col-md-12">
        <img class="img-responsive img-rounded" width="250" src="{{$conference->photo ? '/images/conferences/' . $conference->photo->path : 'http://placehold.it/50x50'}}">
    </div>

    <!-- form -->
    {!! Form::model($conference,['method'=>'PATCH','action'=>['ConferencesController@update', $conference->id],'files'=>'true' ])
     !!}

    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('year','Year:') !!}
        {!! Form::text('year', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('excerpt','Excerpt:') !!}
        {!! Form::text('excerpt', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('details','Details:') !!}
        {!! Form::textarea('details', null, ['class'=>'form-control','rows'=>'8', 'id'=>'tinymce']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update', ['class'=>'btn btn-primary'])!!}

    </div>

    {!! Form::close() !!}
    <!-- /.form -->

    <!-- buttons -->
    <div class="panel panel-body">

        <!-- view plays button -->
        <div class="col-lg-6">
            <a class="btn btn-success btn-block pull-left" href="{{route('plays.conference.show', $conference->id)}}" class="btn
            btn-primary">View Plays</a>
        </div>

        <!-- add play button -->
        <div class="col-lg-6">
            <a class="btn btn-success btn-block pull-left" href="{{route('plays.create', $conference->id)}}" class="btn
            btn-primary">Add Play</a>
        </div>
        <hr>

    </div>
    <!-- /.buttons -->

@endsection
