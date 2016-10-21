@extends('layouts.admin')

@section('content')

    <h1>View All Galleries</h1>

    <!-- notifications -->
    @if(Session::has('gallery_linked'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            {{session('gallery_linked')}}
        </div>
    @endif
    @if(Session::has('gallery_deleted'))
        <div class="alert alert-danger fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            {{session('gallery_deleted')}}
        </div>
    @endif
    <!-- /.notifications -->


    <div class="col-md-12">

        <!-- table -->
        <div class="table-responsive">
            <table class="table table-striped table-responsive table-hover">

                <!-- table headers -->
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Gallery Name</th>
                    <th>Photos</th>
                    <th>Conference ID</th>
                    <th>Created By</th>
                    <th>Updated At</th>
                    <th>Created At</th>
                </tr>
                </thead>
                <!-- /.table headers -->

                <!-- table content -->
                <tbody>
                @foreach($galleries as $gallery)
                    <tr>
                        <td>{{$gallery->id}}</td>
                        <td>{{$gallery->name}}</td>
                        @if (count($gallery->photos) > 0)
                            <td>{{count($gallery->photos)}}</td>
                        @elseif(count($gallery->photos) === 0)
                            <td><a class="btn btn-success" href="{{route('galleries.show',$gallery->id)}}">Add Photos</a>
                            </td>
                        @endif

                        @if(count($gallery->conference) > 0)

                            <td>{{$gallery->conference->title}}</td>

                            @elseif( count($gallery->conference) === 0 )

                                <td><a class="btn btn-info" href="{{route('galleries.link', $gallery->id)}}">Assign</a></td>
                            
                            @endif
                        <td>{{$gallery->created_by}}</td>
                        <td>{{$gallery->updated_at}}</td>
                        <td>{{$gallery->created_at}}</td>
                        <td><a href="{{route('galleries.show', $gallery->id)}}" class="btn
                        btn-primary">View</a></td>

                    </tr>
                @endforeach
                </tbody>
                <!-- /.table content -->

            </table>
        </div>
        <!-- /.table -->

    </div>

    <!-- quick create -->
    <div class="col-md-4">

        <!-- form -->
        {!! Form::open(['method'=>'POST','action'=>'GalleriesController@store_gallery']) !!}

            <div class="form-group">
                {!! Form::text('name', null, ['id'=>'name', 'placeholder'=>'Name of Gallery',
                'class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Quick Create',['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}
        <!-- /.form -->

        <!-- errors -->
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
    <!-- /.quick create -->

@endsection