<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Fatora</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="icon" type="image/x-icon" href="{{asset('adminassets/assets/img/favicon.ico')}}"/>
    <link href="{{asset('adminassets/assets/css/loader.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset('adminassets/assets/js/loader.js')}}"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('adminassets/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('adminassets/assets/css/plugins.css')}}" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('adminassets/plugins/table/datatable/datatables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('adminassets/plugins/table/datatable/dt-global_style.css')}}">
    <link href="{{asset('adminassets/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css"/>
    <link rel="stylesheet" type="text/css" href="{{asset('adminassets/plugins/bootstrap-select/bootstrap-select.min.css')}}">

    <link rel="stylesheet" href="{{asset('adminassets/plugins/font-icons/fontawesome/css/regular.css')}}">
    <link rel="stylesheet" href="{{asset('adminassets/plugins/font-icons/fontawesome/css/fontawesome.css')}}">
    <style>
        body {
            font-family: 'Cairo', sans-serif;
        }

        .layout-px-spacing {
            min-height: calc(100vh - 166px) !important;
        }
    </style>
    <style>
        .feather-icon .icon-section {
            padding: 30px;
        }
        .feather-icon .icon-section h4 {
            color: #3b3f5c;
            font-size: 17px;
            font-weight: 600;
            margin: 0;
            margin-bottom: 16px;
        }
        .feather-icon .icon-content-container {
            padding: 0 16px;
            width: 86%;
            margin: 0 auto;
            border: 1px solid #bfc9d4;
            border-radius: 6px;
        }
        .feather-icon .icon-section p.fs-text {
            padding-bottom: 30px;
            margin-bottom: 30px;
        }
        .feather-icon .icon-container { cursor: pointer; }
        .feather-icon .icon-container svg {
            color: #3b3f5c;
            margin-right: 6px;
            vertical-align: middle;
            width: 20px;
            height: 20px;
            fill: rgba(0, 23, 55, 0.08);
        }
        .feather-icon .icon-container:hover svg {
            color: #1b55e2;
            fill: rgba(27, 85, 226, 0.23921568627450981);
        }
        .feather-icon .icon-container span { display: none; }
        .feather-icon .icon-container:hover span { color: #1b55e2; }
        .feather-icon .icon-link {
            color: #1b55e2;
            font-weight: 600;
            font-size: 14px;
        }


        /*FAB*/
        .fontawesome .icon-section {
            padding: 30px;
        }
        .fontawesome .icon-section h4 {
            color: #3b3f5c;
            font-size: 17px;
            font-weight: 600;
            margin: 0;
            margin-bottom: 16px;
        }
        .fontawesome .icon-content-container {
            padding: 0 16px;
            width: 86%;
            margin: 0 auto;
            border: 1px solid #bfc9d4;
            border-radius: 6px;
        }
        .fontawesome .icon-section p.fs-text {
            padding-bottom: 30px;
            margin-bottom: 30px;
        }
        .fontawesome .icon-container { cursor: pointer; }
        .fontawesome .icon-container i {
            font-size: 20px;
            color: #3b3f5c;
            vertical-align: middle;
            margin-right: 10px;
        }
        .fontawesome .icon-container:hover i { color: #1b55e2; }
        .fontawesome .icon-container span { color: #888ea8; display: none; }
        .fontawesome .icon-container:hover span { color: #1b55e2; }
        .fontawesome .icon-link {
            color: #1b55e2;
            font-weight: 600;
            font-size: 14px;
        }
    </style>

@livewireStyles

@stack('css')
<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
