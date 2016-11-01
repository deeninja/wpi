@extends('layouts.home')

@section('content')

    <main>

        <!-- mission section -->
        <section class="col-md-12 about-page mission-section">
            <div class="goals panel panel-body col-md-8 col-md-offset-2">

                <h1>Mission</h1>
                <!-- about content 1 -->
                <div class="panel panel-body">
                    <div>

                        <div class="feature-box">
                            <img class="feature-image" src="{{asset('img/IWP-Logo-Medium.gif')}}" alt="IWP Logo">
                        </div>
                        <h2 class="text-center"><strong>{{$about->title1}}</strong></h2>

                        <div class="excerpt">{{strip_tags($about->body1)}}</div>

                    </div>
                    <!-- /.about content 1 -->

                    <!-- about content 2 -->
                    <div>
                        <h2><strong>{{$about->title2}}</strong></h2>

                        <div class="excerpt">{{strip_tags($about->body2)}}</div>

                    </div>
                </div>
                <!-- /.about content 2 -->
                <h4 class="text-primary">We support Women Playwrights around the world by striving:</h4>

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

        </section>
        <!-- /.mission section -->


        <!-- latest conferences -->
        <div class="panel panel-body">
            <h1 class="text-center">Some of our Conferences</h1>
            <h4 class="text-primary text-center"><i>Proudly taken place in many beautiful countries, all over the world.</i></h4>
            <hr>
            <div class="col-12">

                @foreach($conferences as $conference)

                    <div class="col-lg-4">

                        <div class="table-wallpaper" data-photo="{{'/images/conferences/'.
                        $conference->photo->path}}">

                            <div class="col-4">
                                <p class="pull-right"><strong><i>{{$conference->year}}</i></strong></p>
                            </div>

                            <div class="col-8">
                                <h2 class="con-feature-title">{{$conference->title}}</h2>
                            </div>

                            <div class="excerpt">{{str_limit($conference->excerpt,125)}}</div>

                            <div class="col-6 pull-right view-conference-button">
                                <a href="{{route('conference.show', $conference->id)}}" class="btn btn-primary">View</a>
                            </div>

                            @if($current_year > $conference->year )
                                <span class='label label-l label-primary'>Past</span>
                            @elseif($current_year < $conference->year)
                                <span class='label label-info'>Upcoming</span>
                            @endif
                        </div>


                    </div>
                @endforeach
                    <div class="text-center">
                        <a href="{{url('/conferences')}}" class="btn btn-success">View More</a>
                    </div>
            </div>
        </div>
        <!-- /.latest conferences -->
</main>

@endsection


@section('scripts')
    <script>

        $(document).ready(function () {

            $('.table-wallpaper').each(function () {

                // get the currently iterating row
                var row = $(this);

                // assign the row's data (image link) to a photo variable
                var photo = row.data('photo');

                $(this).css('background', 'linear-gradient(rgba(0, 0, 0, 0.45), rgba(0, 0, 0, 0.45)),' +
                        ' url("' + photo + '")' + '')
                        .addClass('bg-fit');

            });


        });
    </script>

@endsection