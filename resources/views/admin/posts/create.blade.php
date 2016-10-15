{{--
@extends('layouts.admin)

@section('content')

    @extends('layouts.admin')

@section('content')

    <h1>Create Post</h1>

    {!! Form::open(['method'=>'POST','action'=>'AdminPostsController@store','files'=>'true']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','Cover Photo:') !!}
        {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Conference:') !!}
        {!! Form::select('category_id', $conferences, null, ['placeholder'=>'Choose Conference', 'class'=>'form-control'])
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

@endsection
--}}
