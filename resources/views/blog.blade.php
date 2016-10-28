@extends('layouts.app')

@section('content')
    <div class="content-container">

        <div class="panel panel-body">

            <!-- hero -->
            <section class="col-md-12 blog-hero">
                <h2 class="cover-overlay page-heading text-center"><strong>News</strong></h2>
            </section>
            <!-- /.hero -->

            <div class="well-sm">
                <div class="blog-content-container col-md-12">

                    <!-- posts -->
                    <div id="blog-listing" class="col-md-10">



                            @foreach($posts as $post)
                                <div class="col-lg-4">

                                    <div class="table-wallpaper" data-photo="{{'/images/posts/' . $post->photo->path}}">

                                        <div class="col-10">
                                            <h2 class="con-feature-title">{{$post->title}}</h2>
                                        </div>

                                        <div class="excerpt">{{str_limit(strip_tags($post->body,125))}}</div>

                                        <div class="col-8">
                                            <p class="pull-left"><i>{{$post->user->first_name . ' ' .
                                            $post->user->last_name . ' | ' . $post->updated_at}}</i></p>
                                        </div>


                                        <div class="col-6 pull-right view-conference-button">
                                            <a href="{{route('post.show', $post->id)}}" class="btn btn-primary">View</a>
                                        </div>

                                    </div>

                                </div>
                            @endforeach



                    </div>
                    <!-- /.posts -->

                    <!-- /.sidebar -->
                    <aside class="well blog-sidebar col-md-2">
                        <div class="panel">

                            <header>
                                <h2 class="text-primary"><i>Categories</i></h2>
                            </header>

                            <ul>
                                @foreach($categories as $category)
                                    <li><span class="fa fa-square-o"></span><a href="{{route('posts.by.category',
                                        $category->id)
                                        }}">{{$category->name}}</a>
                                    </li>
                                @endforeach()
                            </ul>

                        </div>
                    </aside>
                    <!-- /.sidebar -->

                </div>
            </div>

        </div>
    </div>

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