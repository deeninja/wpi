<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{asset('vendor/lightbox.js')}}" type="text/javascript"></script>
<script src="{{asset('js/libs.js')}}"></script>
<script>
    //Initialise Material Theme Javascript
    $.material.init()
</script>
<script src="/js/app.js"></script>
<div id="fb-root"></div>
<script>
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[ 0 ];
        if ( d.getElementById(id) ) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7&appId=1567224333529106";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>