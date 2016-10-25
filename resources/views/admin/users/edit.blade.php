@extends('layouts.admin')

@section('content')

    <h1>Edit User</h1>

    <div class="row">
        <div class="col-md-6">
            {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update', $user->id],
            'files'=>'true' ])
                !!}
            <div class="form-group">
                {!! Form::label('first_name', 'First Name:') !!}
                {!! Form::text('first_name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('last_name', 'Last Name:') !!}
                {!! Form::text('last_name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
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
                {!! Form::label('role_id', 'Role') !!}
                {!! Form::select('role_id', $roles, null, ['placeholder'=>'Choose a role', 'class'=>'form-control']) !!}
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

            <!-- If the user is Active (value in db), present checked checkbox with deactivate option, if user Inactive,
            present unchecked checkbox with option to activate -->
            <div class="togglebutton">

                @if($user->status == 'Active')
                    <label>
                        <input id="checkInput" name="status" type="checkbox" checked>
                    </label>
                @elseif($user->status == 'Inactive')
                    <label>
                        <input id="checkInput" name="status" type="checkbox">
                    </label>
                @endif
                    <label id="checkText"></label>
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Photo:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div>
                <img class="img-responsive img-rounded" width="250" src="{{$user->photo ? '/images/users/' .
            $user->photo->path : ''}}">
            </div>

        </div>
        <!-- right column } -->

        <div class="col-md-12">
            <div class="form-group">
                {!! Form::label('bio','Biography:') !!}
                {!! Form::textarea('bio', null, ['class'=>'form-control','rows'=>'8']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Update User', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
            {{--/form --}}

        </div>

    </div>

    <div>
        {{-- including the errors logic to display validation errors --}}
        @include('includes.form_error')
    </div>
@endsection

@section('footer')
    <script>

        document.getElementById('checkInput').addEventListener('click', function() {

            var checkText = document.getElementById('checkText'),
                    checkInput = document.getElementsByName('status');

            // check if checked
            /*   function isChecked() {
             if ( checkInput.checked == true ) {
             return true;
             } else {
             return false;
             }
             }*/


            if (checkText.innerText === "Activate") {

                document.getElementById('checkText').innerText = "Deactivate";

            } else {
                document.getElementById('checkText').innerText = "Activate";

            }

        });


    </script>
@endsection