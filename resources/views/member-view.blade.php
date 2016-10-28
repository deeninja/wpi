@extends('layouts.app')
@section('content')

    <div class="content-container">

        <!-- notifications -->
        @if(Session::has('profile_updated'))
            <div class="alert alert-success fade in">
                <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
                <h4>{{session('profile_updated')}}</h4>
            </div>
    @endif
    <!-- /.notifications -->

        <!-- hero -->
        <section class="col-md-12 profile-hero">
            <img class="profile-photo" src="{{$member->photo ? '/images/users/' . $member->photo->path  : ''}}" alt="">
            <h2 class="cover-overlay page-heading text-center"><strong>{{$member->first_name . ' ' .
                    $member->last_name}}</strong></h2>
        </section>
        <!-- /.hero -->

        <div class="panel panel-body">

            <!-- profile info -->
            <section class="profile-info col-lg-6 col-lg-offset-3">

                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><span class="icon-box pull-left"><i class="fa fa-user"></i></span>&nbsp; &nbsp;Role:
                            {{$member->role->name}}</li>
                        <li><span class="icon-box pull-left"><i class="fa fa-paper-plane"></i></span>&nbsp; &nbsp;Country:
                            {{$member->country->name}}</li>
                        <li><span class="icon-box pull-left"><i class="fa fa-user"></i></span>&nbsp; &nbsp;First Name:
                            {{$member->first_name}}</li>
                        <li><span class="icon-box pull-left"><i class="fa fa-user"></i></span>&nbsp; &nbsp;Last Name:
                            {{$member->last_name}}</li>
                        <li><span class="icon-box pull-left"><i class="fa fa-briefcase"></i></span>&nbsp; &nbsp;
                            Profession:
                            {{$member->profession}}</li>
                    </ul>

                </div>

                <div class="col-lg-6">

                    <ul class="list-unstyled">
                        <li><span class="icon-box pull-left"><i class="fa fa-mail-forward"></i></span>&nbsp; &nbsp;Email:
                            {{$member->email}}</li>
                        <li><span class="icon-box pull-left"><i class="fa fa-star"></i></span>&nbsp;&nbsp;Plays:
                            {{$member->plays}}</li>
                        <li><span class="icon-box pull-left"><i class="fa fa-globe"></i></span>&nbsp;&nbsp;Website:
                            {{$member->website}}</li>
                        <li><span class="icon-box pull-left"><i class="fa fa-clock-o"></i></span>&nbsp;&nbsp;Member
                            Since: {{$member->created_at->diffForHumans()}}</li>
                    </ul>

                </div>
                <div class="col-lg-12 panel">
                    <div class="profile-bio-box">
                        <h3 class="text-center text-primary">Biography:</h3>
                        <p>{{$member->bio}}</p>

                    </div>
                </div>


            </section>
            <!-- /.profile info -->
        </div>


    </div>

@endsection