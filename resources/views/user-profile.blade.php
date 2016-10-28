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
            <img class="profile-photo" src="{{$user->photo ? '/images/users/' . $user->photo->path  :
            '/img/default-profile-pic-female.jpg'}}"
                 alt="">
            <h2 class="cover-overlay page-heading text-center"><strong>{{$user->first_name . ' ' . $user->last_name}}</strong></h2>
        </section>
        <!-- /.hero -->

        <div class="panel panel-body">

            <!-- profile info -->
            <section class="profile-info col-lg-6 col-lg-offset-3">

                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><span class="icon-box pull-left"><i class="fa fa-user"></i></span>&nbsp; &nbsp;Role:
                            {{$user->role->name}}</li>
                        <li><span class="icon-box pull-left"><i class="fa fa-paper-plane"></i></span>&nbsp; &nbsp;Country:
                            {{$user->country->name}}</li>
                        <li><span class="icon-box pull-left"><i class="fa fa-user"></i></span>&nbsp; &nbsp;First Name:
                            {{$user->first_name}}</li>
                        <li><span class="icon-box pull-left"><i class="fa fa-user"></i></span>&nbsp; &nbsp;Last Name:
                            {{$user->last_name}}</li>
                        <li><span class="icon-box pull-left"><i class="fa fa-briefcase"></i></span>&nbsp; &nbsp;
                            Profession:
                            {{$user->profession}}</li>
                    </ul>

                </div>

                <div class="col-lg-6">

                    <ul class="list-unstyled">
                        <li><span class="icon-box pull-left"><i class="fa fa-mail-forward"></i></span>&nbsp; &nbsp;Email:
                            {{$user->email}}</li>
                        <li><span class="icon-box pull-left"><i class="fa fa-phone"></i></span>&nbsp;&nbsp;Phone:
                            {{$user->phone}}</li>
                        <li><span class="icon-box pull-left"><i class="fa fa-star"></i></span>&nbsp;&nbsp;Plays:
                            {{$user->plays}}</li>
                        <li><span class="icon-box pull-left"><i class="fa fa-globe"></i></span>&nbsp;&nbsp;Website:
                            {{$user->website}}</li>
                        <li><span class="icon-box pull-left"><i class="fa fa-clock-o"></i></span>&nbsp;&nbsp;Member
                            Since: {{$user->created_at->diffForHumans()}}</li>
                    </ul>

                </div>
                <div class="col-lg-12 panel">
                    <div class="profile-bio-box">
                        <h3 class="text-center text-primary">Biography:</h3>
                        <p>{{$user->bio}}</p>

                    </div>
                </div>

                <div class="col-lg-12 panel">
                    <a class="text-center btn btn-block btn-primary" href="{{route('user.profile.edit',$user->id)}}">Edit</a>
                </div>
            </section>
            <!-- /.profile info -->
        </div>


    </div>

@endsection