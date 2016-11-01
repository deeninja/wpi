<!DOCTYPE html>
<html lang="en">
<head>
    <!-- head content -->
    @include('includes.head-content')
    <title>{{ config('app.name', 'WPI') }}</title>
</head>
<body>
<!-- navbar -->
@include('includes.navigation')

<!-- container -->
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
