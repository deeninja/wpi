@extends('layouts.admin')

@section('content')

    <h1>Conference | Add</h1>
    @include('includes.form_error')
    <!-- form -->
    {!! Form::open(['method'=>'POST','action'=>'ConferencesController@store','files'=>'true' ]) !!}

    <div class="form-group">
        {!! Form::label('title','Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
        <span id="helpBlock" class="help-block">The conference title.</span>
    </div>

    <div class="form-group">
        {!! Form::label('year','Year:') !!}
        {!! Form::text('year', null, ['class'=>'form-control']) !!}
        <span id="helpBlock" class="help-block">The year of the conference.</span>
    </div>

    <div class="form-group">
        {!! Form::label('excerpt','Excerpt:') !!}
        {!! Form::text('excerpt', null, ['class'=>'form-control']) !!}
        <span id="helpBlock" class="help-block">An excerpt from the conference.</span>
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Cover Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
        <span id="helpBlock" class="help-block">A cover photo for the conference.</span>
    </div>


    <div class="row">
            <div class="form-group col-md-8">
                {!! Form::label('details','Conference Details:') !!}
                {!! Form::textarea('details', null, ['class'=>'form-control','rows'=>'8','id'=>'tinymce','cols'=>'10',
                'rows'=>'10']) !!}
            </div>
    </div>

    {!! Form::submit('Add Conference', ['class'=>'btn btn-primary'])!!}

    {!! Form::close() !!}
    <!-- /.form -->




@endsection
