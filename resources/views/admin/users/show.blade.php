@extends('layouts.admin')

@section('content')

    <! -- { left column -->
    <div class="col-md-4">
        <div class="pull-left">
            <img src="{{$user->photo->path ? '/images/users/' . $user->photo->path : 'http://placehold.it/250x250'}}" class="img-responsive img-rounded">
        </div>

    </div>
    <! -- left column } -->


    <! -- { right column -->
    <div class="col-md-8">


    </div>
    <! -- right column } -->

@endsection