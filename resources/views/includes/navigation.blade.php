<nav id="nav-non-home" class="navbar navbar-default navbar-fixed-top">

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
        <!-- Left Side Of Navbar -->
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
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        @if(Auth::user())
                            <li><a href="{{ url('/home') }}">Home</a></li>
                        @endif()
                        <li><a href="{{ route('user.profile') }}"><span class="fa fa-user"></span>Profile</a></li>

                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                                <span class="fa fa-arrow-circle-right"></span>
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