@if(count($errors) > 0)

    <div class="alert alert-danger">


            @foreach($errors->all() as $error)

                <p><span class="fa fa-exclamation"></span> {{$error}}</p>

            @endforeach


    </div>

@endif