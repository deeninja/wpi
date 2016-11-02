@extends('layouts.app')
@section('content')
    <div class="content-container">
        <h1>- Confirm success - </h1>
        <br>
        <!-- hero -->
        <section class="col-md-12">
            <img class="img-medium img-responsive" src="{{asset('img/women-playwright-support.jpg')}}" alt="Close up of Woman
        with sun reflecting in her
        sunglasses">

            <!-- /.hero -->

            <div class="panel panel-body">

                <h2>Thank you for confirming, you are now subscribed to our newsletters!</h2>

                <div class="text-center">
                    <a class="btn btn-success" href="{{url('/')}}">Home</a>
                </div>
            </div>
        </section>

    </div>
@endsection()