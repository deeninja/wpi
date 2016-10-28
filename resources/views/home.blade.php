@extends('layouts.app')

@section('content')
    <div class="content-container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-center">WPI Dashboard</h1>
                <!-- hero -->
                <section class="col-md-12 profile-hero">
                    <img class="profile-photo" src="{{$user->photo ? '/images/users/' .
                            $user->photo->path  : '/img/default-profile-pic-female.jpg'}}" alt="">
                    <h2 class="cover-overlay page-heading text-center"><strong>Welcome to your dashboard, {{$user->first_name . '
                 ' . $user->last_name}}</strong></h2>
                    <a class="pull-right btn btn-primary" href="{{route('user.profile')}}">View Profile</a>
                    <a autofocus class="pull-right btn btn-success" href="{{route('user.profile.edit',$user->id)}}">Edit
                        Profile</a>
                </section>

                    {{--<div class="feature-box">
                        <img src="{{asset('img/IWP-Logo-Medium.gif')}}" alt="IWP Logo">
                    </div>--}}


                    <div class="home-dashboard col-lg-12">
                        @if(is_null($user->bio))
                            <div class="alert alert-danger">
                                <p>Please click on edit profile and update your profile information, so that you have a profile.
                                </p>
                            </div>
                        @endif

                        <p>You can view your profile by clicking on the "View Profile" button below.
                        </p>


                        <p>You can update your profile at anytime by clicking on "Edit Profile".
                        </p>
                    </div>

            </div>
        </div>
    </div>
    </div>
@endsection