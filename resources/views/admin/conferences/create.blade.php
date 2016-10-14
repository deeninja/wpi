@extends('layouts.admin')

@section('content')

    <h1>Conference | Add</h1>

    {{-- ['action'=>['ConferencesController@update', $conference->id] appends current rec ID to URL use in controller--}}
    {!! Form::open(['method'=>'POST','action'=>'ConferencesController@store','files'=>'true' ]) !!}


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
        {!! Form::label('photo_id', 'Cover Photo:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('details','Details:') !!}
        {!! Form::textarea('details', null, ['class'=>'form-control','rows'=>'8','id'=>'tinymce']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Add Conference', ['class'=>'btn btn-primary'])!!}
    </div>

    {!! Form::close() !!}


    @if(count($errors) > 0)

        <div class="panel alert-danger">
            <ul>
                @foreach($errors->all() as $error)

                    <li>{{$error}}</li>

                @endforeach
            </ul>
        </div>

    @endif

@endsection
