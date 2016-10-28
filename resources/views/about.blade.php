@extends('layouts.app')

@section('content')

    <!--  content container 1 -->
    <div class="content-container">

        <div class="col-md-12 about-page">

            <div class="panel panel-body">

                <div>

                    <!-- cover image -->
                    <div class="panel">
                        <div class="cover-image">
                            <img class="cover-image img-responsive img-rounded"
                                 src="{{$about->cover_image ? '/images/about/' . $about->cover_image : ''}}">
                            <div class="cover-filter"></div>
                            <div class="cover-overlay">
                                <h1>Women Playwrights International - About Us</h1>
                            </div>
                        </div>
                    </div>
                    <!-- /.cover image -->


                    <div class="col-md-8 col-lg-offset-2">

                        <!-- intro -->
                        <div>

                            <div>
                                <p class="text-center excerpt">ICWP began in 1988 in Buffalo, New York, with the mission of
                                    supporting and promoting women playwrights around the world and bringing attention to
                                    their works. Recently we have published books of scripts and given awards to theatres
                                    operating gender equity in the annual season.</p>

                                <p class="text-center excerpt"> Our membership is made of people with a longtime commitment
                                    to writing plays. In a recent survey, exactly 200 playwrights responded, with over half
                                    reported writing plays for more than 11 years.</p>

                            </div>
                        </div>
                        <!-- /.intro -->

                        <!-- about content 1 -->
                        <div class="panel panel-body">
                            <div>

                                <div class="feature-box">
                                    <img class="feature-image" src="{{asset('img/IWP-Logo-Medium.gif')}}" alt="IWP Logo">
                                </div>
                                <h2 class="text-center"><strong>{{$about->title1}}</strong></h2>
                                <div>
                                    <p class="excerpt">{{strip_tags($about->body1)}}</p>
                                </div>
                            </div>
                            <!-- /.about content 1 -->

                            <!-- about content 2 -->
                            <div>
                                <h2><strong>{{$about->title2}}</strong></h2>
                                <div>
                                    <p class="excerpt">{{strip_tags($about->body2)}}</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.about content 2 -->

                    </div>
                </div>
            </div>
        </div>
        <!-- /.content container 1 -->


        <!-- mission hero -->
        <section class="col-md-12 mission-hero">
            <h2 class="page-heading text-center"><strong>Our mission is to support playwrights around
                    the world:</strong></h2>
        </section>
        <br>
        <br>
        <!-- /.mission hero -->

        <!-- content container 2 -->
        <div class="col-md-12 about-page">

            <div class="content-container goals panel panel-body col-md-8 col-md-offset-2">

                <!-- goals -->
                <h1 class="text-center">Our Goals</h1>

                <div class="text-center col-md-4">
                    <i class="fa fa-group"></i>
                    <h3>To extend opportunities for meeting, international networking and artistic exchange.</h3>
                </div>

                <div class="text-center col-md-4">
                    <i class="fa fa-pencil"></i>
                    <h3>To increase and further production opportunities for women’s writing for the stage.</h3>
                </div>

                <div class="text-center col-md-4">
                    <i class="fa fa-graduation-cap"></i>
                    <h3>To encourage, create and assist the education and development of women playwrights and
                        their craft.</h3>
                </div>

                <div class="text-center col-md-4">
                    <i class="fa fa-female"></i>
                    <h3>To defend the right of women playwrights to engender their own artistic forms and
                        critical standards.</h3>
                </div>

                <div class="text-center col-md-4">
                    <i class="fa fa-comments"></i>
                    <h3>To encourage study and informed critique of the work of women playwrights</h3>
                </div>

                <div class="text-center col-md-4">
                    <i class="fa fa-lightbulb-o"></i>
                    <h3>To support women playwrights against censorship and political persecution for the
                        expression of their ideas.</h3>
                </div>


            </div>
            <!-- /.content container 2 - /.goals -->


        </div>

    </div>
    <!-- /.content container -->

    </div>
    </div>

@endsection