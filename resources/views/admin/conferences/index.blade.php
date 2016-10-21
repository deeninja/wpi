@extends('layouts.admin')

@section('content')

    <h1>Conferences</h1>

    <!-- notifications -->
    @if(Session::has('conference_updated'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            <h4>{{session('conference_updated')}}</h4>
        </div>
    @endif

    @if(Session::has('conference_created'))
        <div class="alert alert-success fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            <h4>{{session('conference_created')}}</h4>
        </div>
    @endif

    @if(Session::has('conference_deleted'))
        <div class="alert alert-danger fade in">
            <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
            <h4>{{session('conference_deleted')}}</h4>
        </div>
    @endif
    <!-- /.notifications -->

    <!-- table -->
    <div class="table-responsive">
        <table class="table table-striped table-responsive table-hover">

            <!-- table headers -->
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Photo</th>
                    <th>Year</th>
                    <th>Title</th>
                    <th>Excerpt</th>
                    <th>Updated</th>
                    <th>Created</th>
                </tr>
            </thead>
            <!-- /.table headers -->

            <!-- table content -->
            <tbody>
                @foreach($conferences as $conference)
                    <tr>
                        <td>{{$conference->id}}</td>
                        <td><img class="img-rounded img-responsive" width="50" src="{{'/images/conferences/'.
                      $conference->photo->path}}"></td>
                        <td>{{$conference->year}}</td>
                        <td>{{$conference->title}}</td>
                        <td>{{str_limit($conference->excerpt,28)}}</td>
                        <td>{{$conference->updated_at->diffForHumans()}}</td>
                        <td>{{$conference->created_at}}</td>
                        <td><a href="{{route('conferences.show', $conference->id)}}" class="btn btn-primary">View</a></td>
                    </tr>
                @endforeach
            </tbody>
            <!-- /.table content -->
        </table>
    </div>
    <!-- /.table -->

@stop