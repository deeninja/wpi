@extends('layouts.admin')

@section('content')

    <h1>Conference | Edit</h1>

    <div class="panel col-md-12">
        <img class="img-responsive img-rounded" width="250" src="{{$conference->photo ? '/images/conferences/' . $conference->photo->path : 'http://placehold.it/50x50'}}">
    </div>

    {{-- ['action'=>['ConferencesController@update', $conference->id] appends current rec ID to URL use in controller--}}
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

@if(count($errors) > 0)

    <div class="alert-danger panel">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>

@endif

@endsection
