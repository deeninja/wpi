{{-- side navbar --}}
<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav navbar-collapse">
        <ul class="nav" id="side-menu">

            <li>
                <a href="{{url('/admin')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
            </li>


            {{-- users --}}
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Users<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('admin.users')}}">All Users</a>
                    </li>

                    <li>
                        <a href="{{route('users.create')}}">Create User</a>
                    </li>

                </ul>
            </li>
            {{-- /.users --}}


            {{-- about --}}
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>About Us<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{route('about.index')}}">View</a>
                    </li>

                    <li>
                        <a href="{{route('about.edit',1)}}">Edit</a>
                    </li>

                </ul>
            </li>
            {{-- /.about --}}


            {{-- conferences --}}
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Conferences<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{route('conferences.index')}}">View</a>
                    </li>

                    <li>
                        <a href="{{route('conferences.create')}}">Add New</a>
                    </li>

                </ul>
            </li>
            {{-- /.conferences --}}


            {{-- gallery --}}
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Gallery<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('galleries.index')}}">View</a>
                    </li>

                    <li>
                        <a href="{{route('galleries.create')}}">Add new</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>
            {{-- /.gallery --}}



            {{-- plays --}}
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i>Plays<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{route('plays.index')}}">View</a>
                    </li>

                    <li>
                        <a href="{{route('plays.create')}}">Add New</a>
                    </li>

                </ul>
            </li>
            {{-- /.plays --}}



            {{-- posts --}}
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Posts<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('posts.index')}}">All Posts</a>
                    </li>

                    <li>
                        <a href="{{route('posts.create')}}">Create Post</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>
            {{-- /.posts --}}

            {{-- comments --}}
            <li>
                <a href="#"><i class="fa fa-wrench fa-fw"></i> Comments<span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="{{route('comments.index')}}">View</a>
                    </li>

                </ul>
                <!-- /.nav-second-level -->
            </li>
            {{-- /.comments --}}

            </ul>

    </div>
    <!-- /.sidebar-collapse -->
</div>
{{-- /.side navbar --}}
