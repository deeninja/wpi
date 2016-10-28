<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    {{-- <link href="/css/all.css" rel="stylesheet">--}}
    <link href="../../../css/bootstrap-material-design.css" rel="stylesheet">
    <link href="../../../css/ripples.css" rel="stylesheet">
    <link href="../../../css/custom.css" rel="stylesheet">
    <link href="../../../css/font-awesome.min.css" rel="stylesheet">


    <title>{{ config('app.name', 'WPI') }}</title>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
                'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<nav id="nav-non-home" class="navbar navbar-default navbar-fixed-top">

    <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'WPI') }}
        </a>

        {{--<a class="navbar-brand" href="{{ url('/') }}">
            <img src="../../../public/img/IWP-Logo-small.gif" alt="Small Internationall Women Playwrights Logo">
        </a>--}}
    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
            &nbsp;
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::user())
                <li><a href="{{ url('/home') }}">Home</a></li>
            @endif()
            <li><a href="{{ url('/about-us') }}">About</a></li>
            <li><a href="{{ url('/conferences') }}">Conferences</a></li>

            <li>
                <a href="{{ url('/blog') }}">News</a>
            </li>
            <li><a href="{{ url('/members') }}">Members</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
            <!-- Authentication Links -->
            @if (Auth::guest())
                <li><a href="{{ url('/login') }}">Login</a></li>
                <li><a href="{{ url('/register') }}">Register</a></li>
            @else
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li><span class="fa fa-user-circle"></span><a href="{{ route('user.profile') }}">Profile</a></li>

                        <li><span class="fa fa-arrow-circle-right"></span>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</nav>
<div class="container-fluid">
    @yield('content')
</div>

<!-- footer -->
@include('includes.footer')
<!-- /.footer -->

@include('includes.scripts')
<!-- scripts -->

<!-- Scripts -->
@yield('scripts')


</body>
</html>
