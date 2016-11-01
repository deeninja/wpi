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

<!-- Lightbox -->
<link rel="stylesheet" type="text/css" href="{{asset('css/lightbox.css')}}">

<!-- Scripts -->
<script>
    window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
    ]); ?>
</script>