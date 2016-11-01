@extends('layouts.admin')

@section('content')

    <div class="panel panel-body">

        <h1>About Us | Edit</h1>
        @include('includes.form_error')
        <hr>

        <img class="img-responsive img-rounded" width="250"
             src="{{$about->cover_image ? '/images/about/' . $about->cover_image : 'http://placehold.it/50x50'}}">


        {{-- ['action'=>['ConferencesController@update', $conference->id] appends current rec ID to URL use in controller--}}
        {!! Form::model($about,['method'=>'PATCH','action'=>['AdminAboutSection@update', $about->id],'files'=>'true' ])
         !!}

        <div class="form-group">
            {!! Form::label('cover_image', 'Cover Image:') !!}
            {!! Form::file('cover_image', null, ['class'=>'form-control']) !!}
        </div>

        <fieldset>

            <legend><strong>About Us: Section 1</strong></legend>

            <div class="form-group">
                {!! Form::label('title1','Title:') !!}
                {!! Form::text('title1', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body1','Description:') !!}
                {!! Form::textarea('body1', null, ['class'=>'form-control','rows'=>'8', 'id'=>'tinymce']) !!}
            </div>

        </fieldset>


        <br>

        <fieldset>

            <legend><strong>About Us: Section 2</strong></legend>

            <div class="form-group">
                {!! Form::label('title2','Title:') !!}
                {!! Form::text('title2', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('body2','Description:') !!}
                {!! Form::textarea('body2', null, ['class'=>'form-control','rows'=>'8', 'id'=>'tinymce2']) !!}
            </div>

        </fieldset>

        <div class="form-group">
            {!! Form::submit('Update',['class'=>'btn btn-success']) !!}
        </div>


        {!! Form::close() !!}


    </div>
@endsection
