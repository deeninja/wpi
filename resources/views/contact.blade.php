@extends('layouts.app')

@section('content')

    <div class="content-container">

        <div class="col-md-offset-3 col-md-6">

            <hr>

            <div class="contact-form-container" id="box">

                <h2 class="text">Contact Us!</h2>
                <hr>
                <form class="contact-form form-horizontal" action="{{url('/contact')}}" method="POST" id="contact_form">
                    {{csrf_field()}}
                    <!-- text input-->

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input name="first_name" placeholder="Your Name" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <!-- text input-->

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input name="last_name" placeholder="Your Last Name" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <!-- text input-->
                    <div class="form-group">

                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                <input name="email" placeholder="Your E-Mail" class="form-control" type="text">
                            </div>
                        </div>
                    </div>


                    <!-- text input-->

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input name="phone" placeholder="(005)501-120101" class="form-control" type="text">
                            </div>
                        </div>
                    </div>


                    <!-- text input-->

                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-arrow-circle-right"></i></span>
                                <input name="subject" placeholder="Subject" class="form-control" type="text">
                            </div>
                        </div>
                    </div>

                    <!-- text input-->

                    <div class="form-group">
                        <div class="col-md-12 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil"></i></span>
                                <textarea class="form-control" name="message" placeholder="Message"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary pull-right">Send <span
                                        class="fa fa-send"></span></button>
                        </div>
                    </div>

                </form>

            </div>

            <hr>

        </div>

    </div>

@endsection()