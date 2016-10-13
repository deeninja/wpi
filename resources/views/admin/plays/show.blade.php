@extends('layouts.admin')

@section('content')

    <h1>Conference | Plays</h1>

      <div class="table-responsive">
              <table class="table">
                  <thead>
                  <tr>
                      <th>Id</th>
                      <th>Title</th>
                      <th>Abstract</th>
                      <th>Authors</th>
                      <th>URL</th>
                  </tr>
                  </thead>
                  <tbody>

                  @foreach($conference_plays as $play)
                  <tr>
                      <td>{{$play->id}}</td>
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