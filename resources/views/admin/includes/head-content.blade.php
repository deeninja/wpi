<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">



<!-- dropzone styles -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" rel="stylesheet">

<!-- bootstrap core CSS -->
<link href="{{asset('css/libs.css')}}" rel="stylesheet">
<link href="{{asset('css/app.css')}}" rel="stylesheet">
{{--<link href="{{asset('css/all.css')}}" rel="stylesheet">--}}
{{--<link href="../../../public/css/custom.css" rel="stylesheet">--}}
{{--<link href="{{asset('css/custom.css')}}" rel="stylesheet">--}}

<link rel="stylesheet" type="text/css" href="{{asset('css/lightbox.css')}}">


<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700|Raleway:400,400i,700" rel="stylesheet">

<! -- tiny mce -->
{{-- tiny mce --}}
<script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>
<script>
    tinymce.init({

        selector: '#tinymce',
        content_css : "{{asset('css/custom_content.css')}}",
        theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
        font_size_style_values : "10px,12px,13px,14px,16px,18px,20px",

    });
</script>

<script>
    tinymce.init({
        selector: '#tinymce2',
        content_css : "{{asset('css/custom_content.css')}}",
        theme_advanced_font_sizes: "10px,12px,13px,14px,16px,18px,20px",
        font_size_style_values : "10px,12px,13px,14px,16px,18px,20px",

    });
</script>