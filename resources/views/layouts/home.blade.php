<!DOCTYPE html>
<html lang="en">
<head>
    <!-- head content -->
    @include('includes.head-content')
    <title>{{ config('app.name', 'WPI') }}</title>
</head>

<body>

<!-- navbar -->
<nav id="nav-home" class="navbar navbar-default navbar-fixed-top">

    <div class="navbar-header">

        <!-- hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <!-- logo -->
        <a href="{{ url('/') }}">

        </a>

        <a class="navbar-brand" href="{{ url('/') }}">
            <img class="pull-left logo" src="{{asset('img/IWP-Logo-small.gif')}}" alt="Small International Women Playwrights
            Logo">&nbsp;
            {{ config('app.name', 'WPI') }}
        </a>


    </div>

    <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- navbar left -->
        <ul class="nav navbar-nav">
            &nbsp;
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">

            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ url('/about-us') }}">About</a></li>
            <li><a href="{{ url('/conferences') }}">Conferences</a></li>
            <li><a href="{{ url('/plays') }}">Plays</a></li>
            <li><a href="{{ url('/galleries') }}">Galleries</a></li>

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
                        {{ Auth::user()->first_name . ' ' .  Auth::user()->last_name}} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        @if(Auth::user())
                            <li><a href="{{ url('/home') }}">Home</a></li>
                        @endif()
                        <li><a href="{{ route('user.profile')
                        }}"><span class="pull-left fa fa-user"></span>Profile</a></li>

                        <!-- dashboard link (only if admin) -->
                        @if(Auth::user()->isAdmin())
                            <li><a href="{{ url('/admin') }}"><span class="pull-left fa fa-user"></span>Admin
                                    Dashboard</a></li>
                        @endif()

                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"><span class="pull-left fa fa-arrow-circle-right"></span>
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
<!-- header (outside container as wanting full width) a-->
<header class="header-main-desktop">
    <div class="header-hero">
        <h1 class="">Welcome to International Woman Playwrights</h1>
        <h4><strong>We support women playwrights around the world.</strong></h4>
    </div>
</header>
<!-- /.header -->
<!-- container -->
<div class="container-fluid">
    @yield('content')
</div>
</main>

<!-- origin hero (outside container as wanting full width) -->
<div class="origin-hero">
    <div class="overlay">
        <h2>We've been supporting Talented Women Playwrights for 28 years</h2>
        <p>The first conference was held in Buffalo, USA in 1988. It gathered more than 200 women from 30 countries
            around the world. 1991, the
            second conference was held in Toronto, Canada, followed by Adelaide, Australia 1994, Galway, Ireland
            1997,
            Athens and Delphi, Greece 2000, Manila, Philippines 2003, Jakarta and Bali, Indonesia 2006, and Mumbai,
            India
            2009.</p>
        <p>
            ICWP began in 1988 in Buffalo, New York, with the mission of supporting and promoting women playwrights
            around the world and bringing attention to their works. Recently we have published books of scripts and
            given
            awards to theatres operating gender equity in the annual season.
        </p>
    </div>
</div>
<!-- /.origin hero -->

@include('includes.footer')

<!-- Scripts -->
@include('includes.scripts')

@yield('scripts')

</body>

</html>