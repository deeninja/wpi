@extends('layouts.admin')

@section('content')

    <div class="col-md-12">
        <h1 class="page-header">Galleries | Add New</h1>
    </div>

    <div class="col-md-12">
        {!! Form::open(['method'=>'POST','action'=>'GalleriesController@store_gallery','files'=>'true']) !!}

        <div class="form-group">
            {!! Form::text('name', null, ['id'=>'name', 'placeholder'=>'Name of Gallery',
            'class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('cover_image', 'Cover Photo:') !!}
            {!! Form::file('cover_image', null, ['class'=>'form-control']) !!}
            <span id="helpBlock" class="help-block">A cover photo for the gallery.</span>
        </div>

        <div class="form-group">
            {!! Form::submit('Create', ['class'=>'btn btn-primary']) !!}
        </div>
        {!! Form::close() !!}

        <h4>Create Gallery <small>On the next page we'll upload images.</small></h4>
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif()
    </div>

@endsection