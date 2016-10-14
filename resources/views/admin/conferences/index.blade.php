@extends('layouts.admin')

@section('content')

    <h1>Conferences</h1>

    @if(Session::has('conference_updated'))
        <div>
            <div class="alert-success panel panel-green">
                <h4 class="text-success"><i>{{session('conference_updated')}}</i></h4>
            </div>
        </div>
    @endif

        @if(Session::has('conference_created'))
    <div>
        <div class="alert-success panel panel-green">
            <h4 class="text-success"><i>{{session('conference_created')}}</i></h4>
        </div>
    </div>
    @endif

    @if(Session::has('conference_deleted'))
        <div>
            <div class="alert-danger panel panel-red">
                <h4 class="text-danger"><i>{{session('conference_deleted')}}</i></h4>
            </div>
        </div>
    @endif

      <div class="table-responsive">
              <table class="table table-striped table-responsive table-hover">
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
              </table>
          </div>
          </div>

@stop