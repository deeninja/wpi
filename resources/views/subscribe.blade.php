@extends('layouts.app')
@section('content')
    <div class="content-container">
        <h1>- You're almost there :) One click on the e-mail on it's way to your inbox, and you'll be a part of our
            happy newsletter subscription - </h1>
        <br>
        <!-- hero -->
        <section class="col-md-12">
            <img class="img-medium img-responsive" src="{{asset('img/women-playwright-support.jpg')}}" alt="Close up of Woman
        with sun reflecting in her
        sunglasses">

            <!-- /.hero -->

            <div class="panel panel-body">

                <div class="text-center">
                    <a class="btn btn-success" href="{{url('https://mail.google.com/mail/u/0/#inbox')}}">Go to your Email
                        Inbox
                    </a>
                </div>
            </div>
        </section>

    </div>
@endsection()