@extends('layouts.app')
@section('content')
    <div class="content-container">
<h1>- 404 - </h1>
        <br>
        <!-- hero -->
        <section class="col-md-12">
            <img class="img-medium img-responsive" src="{{asset('img/women-playwright-support.jpg')}}" alt="Close up of Woman
        with sun reflecting in her
        sunglasses">

            <!-- /.hero -->

            <div class="panel panel-body">

                <h2>Oops, that page wasn't found, or you don't have access to that part of the site.</h2>

                <h2>We're sorry for the inconvenience!</h2>

                <h2> Go back, <a href="{{url('/contact')}}">contact us</a> or continue browsing our site :)</h2>
                <div class="text-center">
                    <a class="btn btn-success" href="{{URL::previous()}}">Back</a>
                </div>
            </div>
        </section>

    </div>
@endsection()