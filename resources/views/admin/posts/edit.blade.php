@extends('layouts.admin')

@section('content')

    <h1>Edit Post</h1>

    {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'files'=>'true']) !!}

    <div class="form-group">
        {!! Form::label('title', 'Title') !!}
        {!! Form::text('title',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id','Cover Photo:') !!}
        {!! Form::file('photo_id',null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', $categories, null, ['placeholder'=>'Choose Category', 'class'=>'form-control'])
         !!}
    </div>

    <div class="form-group">
        {!! Form::label('date', 'Date') !!}
        {!! Form::date('date', \Carbon\Carbon::now(),['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body','Body:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control','rows'=>'8','id'=>'tinymce']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update Post',['class'=>'btn btn-primary pull-left']) !!}
    </div>
    {!! Form::close() !!}


    {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy', $post->id]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete Post', ['class'=>'pull-right btn btn-danger'])!!}
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