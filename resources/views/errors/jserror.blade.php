<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-bottom-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }


    @if($errors -> any())
        @foreach($errors -> all() as $error)
        toastr["error"]("{!! $error !!}");
        @endforeach
    @endif


    @if(Session::has('success'))
        toastr["success"]("{!! Session::get('success')  !!}");
    @endif

</script>
