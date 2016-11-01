@extends('layouts.admin')

@section('content')

    <h1>Add Play</h1>
    @include('includes.form_error')

    <div class="panel panel-body">
    {!! Form::open(['method'=>'POST','action'=>'PlaysController@store','files'=>'true']) !!}

    <div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','Cover Photo:') !!}
        {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('author1','Author 1:') !!}
        {!! Form::text('author1', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('author2','Author 2:') !!}
        {!! Form::text('author2', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('author3','Author 3:') !!}
        {!! Form::text('author3', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('author4','Author 4:') !!}
        {!! Form::text('author4', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('url','Link:') !!}
        {!! Form::text('url',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('conference_id', 'Conference:') !!}
        {!! Form::select('conference_id', $conferences, null, ['placeholder'=>'Choose Conference', 'class'=>'form-control'])
         !!}
    </div>

    <div class="form-group">
        {!! Form::label('abstract','Abstract:') !!}
        {!! Form::textarea('abstract', null, ['class'=>'form-control','rows'=>'8','id'=>'tinymce']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add Play',['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

</div>
@endsection