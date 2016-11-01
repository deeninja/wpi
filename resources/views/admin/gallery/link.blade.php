@extends('layouts.admin')

@section('content')

        <!-- header -->
        <div class="col-md-12">
            <h1 class="page-header">Galleries | Link</h1>
            @include('includes.form_error')
        </div>
        <!-- /.header -->


    <div class="row">

        <div class="col-md-12">
            <h1>Gallery | {{$gallery->name}}</h1>
        </div>

        <div class="col-md-12">
            {!! Form::model($conferences, ['method'=>'POST','action'=>'GalleriesController@do_link']) !!}

            <div class="form-group">
                {!! Form::select('conference_id', $conferences, null, ['class'=>'form-control','placeholder'=>'Choose
                Conference']) !!}
            </div>

            {!! Form::hidden('gallery_id', $gallery->id) !!}

            <div class="form-group">
                {!! Form::submit('Update', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}


        </div>

        <div class="col-md-12">
            <a class="btn btn-primary" href="{{url('gallery/list')}}">Back</a>
        </div>

    </div>

@endsection