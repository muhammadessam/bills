<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('adminassets/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('adminassets/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('adminassets/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('adminassets/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('adminassets/assets/js/app.js')}}"></script>
<script src="{{asset('adminassets/plugins/font-icons/feather/feather.min.js')}}"></script>
<script>
    $(document).ready(function () {
        App.init();
    });
    feather.replace();
</script>
<script src="{{asset('adminassets/assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{asset('adminassets/plugins/table/datatable/datatables.js')}}"></script>
<script src="{{asset('adminassets/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>

@include('sweetalert::alert')
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
@stack('js')
