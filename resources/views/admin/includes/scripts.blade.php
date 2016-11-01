<!-- jQuery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="{{asset('vendor/lightbox.js')}}" type="text/javascript"></script>
<script src="{{asset('js/libs.js')}}"></script>

<!-- dropzone cdn -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

<!-- dropzone -->
<script>

    Dropzone.options.addImages = {
        maxFilesize: 2,
        acceptedFiles: 'image/*',
        success: function (file, response) {
            if ( file.status == 'success' ) {
                handleDropzoneFileUpload.handleSuccess(file);
            } else {
                handleDropzoneFileUpload.handleError(response);
            }
        }
    };

    //Dropzone adds uploaded image to page without reload
    Dropzone.options.addImages = {
        maxFilesize: 2,
        acceptedFiles: 'image/*',
        success: function (file, response) {
            if ( file.status == 'success' ) {
                handleDropzoneFileUpload.handleSuccess(file);
            } else {
                handleDropzoneFileUpload.handleError(response);
            }
        }
    };

    var handleDropzoneFileUpload = {
        handleError: function (response) {
            console.log(response);
        },
        handleSuccess: function (file) {
            var imageList = $('#gallery-images');

            $(imageList).append('<div class="col-md-3 inner"><img class="img-thumbnail" src="/gallery/images/' + file.name +
                    '"></div>');
        }
    };


    $('.deleteGroup').on('submit', function (e) {
        if ( !confirm('Do you want to delete this item?') ) {
            e.preventDefault();
        }
    });


</script>

<!-- delete confirm -->
<script>

    $('.delete-confirm').on('click', function (e) {
        if ( confirm('Do you want to delete this item?') ) {

            return true;
        } else {
            e.preventDefault();
            return false;

        }
    });

</script>

<script>
    $.material.init()
</script>