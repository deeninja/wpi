@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name" class="col-md-4 control-label">First Name</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" required autofocus>

                                @if ($errors->has('first_name'))

                                    <p class="text-danger">{{ $errors->first('first_name') }}</p>

                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('last_name"') ? ' has-error' : '' }}">
                            <label for="last_name" class="col-md-4 control-label">Last Name</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" required autofocus>

                                @if ($errors->has('last_name'))

                                    <p class="text-danger">{{ $errors->first('last_name') }}</p>

                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('profession"') ? ' has-error' : '' }}">
                            <label for="profession" class="col-md-4 control-label">Primary Profession</label>

                            <div class="col-md-6">

                                <select class="form-control" name="profession" id="profession" required >
                                    <option value="" disabled selected style="display: none;">Choose a Profession</option>
                                    <option value="Playwright">Playwright</option>
                                    <option value="Producer">Producer</option>
                                    <option value="Designer">Designer</option>
                                    <option value="Choreographer">Choreographer</option>
                                    <option value="Other">Other</option>
                                </select>


                                @if ($errors->has('profession'))

                                    <p class="text-danger">{{ $errors->first('profession') }}</p>

                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">

                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">

                                <input id="email" type="email" class="form-control" name="email" value="{{ old('emails')
                                }}" required>

                                @if ($errors->has('email'))

                                    <p class="text-danger">{{ $errors->first('email') }}</p>

                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Phone</label>
                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control" name="phone" value="{{ old('phone') }}">

                                @if ($errors->has('phone'))

                                    <p class="text-danger">{{ $errors->first('phone') }}</p>

                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))

                                    <p class="text-danger">{{ $errors->first('password') }}</p>

                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))

                                    <p class="text-danger">{{ $errors->first('password_confirmation') }}</p>

                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
