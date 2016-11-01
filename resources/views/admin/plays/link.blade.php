@extends('layouts.admin')

@section('content')

    <!-- header -->
    <div class="col-md-12">
        <h1 class="page-header">Play | Link to Conference</h1>
        @include('includes.form_error')
    </div>
    <!-- /.header -->


    <div class="row">

        <div class="col-md-12">
            <h1>Play | {{$play->name}}</h1>
        </div>

        <div class="col-md-12">
            {!! Form::model($conferences, ['method'=>'POST','action'=>'PlaysController@do_link']) !!}

            <div class="form-group">
                {!! Form::select('conference_id', $conferences, null, ['class'=>'form-control','placeholder'=>'Choose
                Conference']) !!}
            </div>

            {!! Form::hidden('play_id', $play->id) !!}

            <div class="form-group">
                {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}


        </div>

        <div class="col-md-12">
            <a class="btn btn-primary" href="{{URL::previous()}}">Back</a>
        </div>

    </div>

@endsection