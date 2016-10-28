@extends('layouts.app')
@section('content')

    <div class="content-container">


        <!-- hero -->
        <section class="col-md-12 profile-hero">
            <img class="profile-photo"
                 src="{{$user->photo ? '/images/users/' . $user->photo->path  : '/img/default-profile-pic-female.jpg'}}"
                 alt="">
            <h2 class="cover-overlay page-heading text-center"><strong>{{$user->first_name . ' ' .
                    $user->last_name}}</strong></h2>
        </section>
        <!-- /.hero -->

        <!-- notifications -->
        @if(Session::has('profile_updated'))
            <div class="alert alert-success fade in">
                <a href="#" class="close" aria-label="close" data-dismiss="alert">&times;</a>
                <h4>{{session('profile_updated')}}</h4>
            </div>
    @endif
    <!-- /.notifications -->
        <section class="panel panel-body">
            <!-- profile info -->
            <section class="profile-info col-lg-6 col-lg-offset-3">
                <div class="col-md-6">
                    {!! Form::model($user,['method'=>'PATCH','action'=>['PagesController@profile_update', $user->id],
                    'files'=>'true' ])
                        !!}
                    <div class="form-group">
                        {!! Form::label('first_name', 'First Name:') !!}
                        {!! Form::text('first_name', null, ['class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('last_name', 'Last Name:') !!}
                        {!! Form::text('last_name', null, ['class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('email', 'Email:') !!}
                        {!! Form::text('email', null, ['class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password', 'Password:') !!}
                        {!! Form::password('password', ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('password_confirmation', 'Confirm Password:') !!}
                        {!! Form::password('password_confirmation', ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('plays','Plays:') !!}
                        {!! Form::textarea('plays', null, ['class'=>'form-control','rows'=>'6']) !!}
                    </div>

                </div>

                <!-- { right column  -->
                <div class="col-md-6">

                    <div class="form-group">
                        {!! Form::label('profession', 'Profession:') !!}
                        {!! Form::select('profession', ['Choreographer'=>'Choreographer','Designer'=>'Designer',
                        'Director'=>'Director','Other'=>'Other','Playwright'=>'Playwright','Producer'=>'Producer'], null,
                        ['placeholder'=>'Choose a Profession', 'class'=>'form-control','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('country_id', 'Country:') !!}
                        {!! Form::select('country_id', $countries, null, ['placeholder'=>'Choose a country', 'class'=>'form-control'])
                         !!}
                    </div>


                    <div class="form-group">
                        {!! Form::label('website', 'Website:') !!}
                        {!! Form::text('website', null, ['class'=>'form-control']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::label('photo_id', 'Photo:') !!}
                        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
                    </div>

                    <div>
                        <img class="img-responsive img-rounded" width="250" src="{{$user->photo ? '/images/users/' .
            $user->photo->path : '/img/default-profile-pic-female.jpg'}}">
                    </div>

                </div>
                <!-- right column } -->

                <div class="col-md-12">
                    <div class="form-group">
                        {!! Form::label('bio','Biography:') !!}
                        {!! Form::textarea('bio', null, ['class'=>'form-control','rows'=>'8','required']) !!}
                    </div>

                    <div class="form-group">
                        {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
                    </div>
                    {!! Form::close() !!}
                    {{--/form --}}
                </div>

            </section>
        </section>
    </div>

@endsection
