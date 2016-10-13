@extends('layouts.admin')

@section('content')

  <div class="table-responsive">
          <table class="table">
              <thead>
              <tr>
                  <th>Id</th>
                  <th>Conference Id</th> {{-- TODO:: Or conference name? decide --}}
                  <th>Title</th>
                  <th>Abstract</th>
                  <th>Authors</th>
                  <th>Url</th>
              </tr>
              </thead>
              <tbody>
              @foreach($plays as $play)
              <tr>
                  <td>{{$play->id}}</td>
                  <td>{{$play->conference->id}}</td>
                  <td>{{$play->title}}</td>
                  <td>{{$play->abstract}}</td>
                  <td>{{$play->authors}}</td>
                  <td><a href="{{$play->url}}">{{$play->url}}</a></td>
              </tr>
              @endforeach
              </tbody>
          </table>
      </div>
      </div>


@endsection