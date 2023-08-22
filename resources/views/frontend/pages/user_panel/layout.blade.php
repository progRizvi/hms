<!DOCTYPE html>
<html lang="zxx">

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Sales</title>


    <link rel="stylesheet" href="{{ url('frontend/userPanel/css/bootstrap1.min.css') }}" />

    <link rel="stylesheet" href="{{ url('frontend/userPanel/css/themify-icons.css') }}" />

    <link rel="stylesheet" href="{{ url('frontend/userPanel/css/nice-select.css') }}" />

    <link rel="stylesheet" href="{{ url('frontend/userPanel/css/owl.carousel.css') }}" />

    <link rel="stylesheet" href="{{ url('frontend/userPanel/css/gijgo.min.css') }}" />

    <link rel="stylesheet" href="{{ url('frontend/userPanel/css/font_awesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ url('frontend/userPanel/css/tagsinput.css') }}" />

    <link rel="stylesheet" href="vendors/datepicker/date-picker.css" />
    <link rel="stylesheet" href="vendors/vectormap-home/vectormap-2.0.2.css" />

    <link rel="stylesheet" href="{{ url('frontend/userPanel/css/scrollable.css') }}" />

    <link rel="stylesheet" href="vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="vendors/datatable/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" href="{{ url('frontend/userPanel/css/summernote-bs4.css') }}" />

    <link rel="stylesheet" href="{{ url('frontend/userPanel/css/morris.css') }}">

    <link rel="stylesheet" href="{{ url('frontend/userPanel/css/material-icons.css') }}" />

    <link rel="stylesheet" href="{{ url('frontend/userPanel/css/metisMenu.css') }}">

    <link rel="stylesheet" href="{{ url('frontend/userPanel/css/style1.css') }}" />
    <link rel="stylesheet" href="{{ url('frontend/userPanel/css/default.css') }}" id="colorSkinCSS">
</head>

<body class="crm_body_bg">


    @include('frontend.pages.user_panel.fixed.navbar')

    <section class="main_content dashboard_part large_header_bg">

        @include('frontend.pages.user_panel.fixed.header')

        <div class="main_content_iner overly_inner ">
            <div class="container-fluid p-0 ">
                @yield('user_panel_content')
            </div>
        </div>

    </section>

    <script src="{{ url('frontend/puserPanel/js/jquery1-3.4.1.min.js') }}"></script>

    <script src="{{ url('frontend/puserPanel/js/popper1.min.js') }}"></script>

    <script src="{{ url('frontend/puserPanel/js/bootstrap.min.js') }}"></script>

    <script src="{{ url('frontend/puserPanel/js/metisMenu.js') }}"></script>
    <script src="{{ url('frontend/puserPanel/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('frontend/puserPanel/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ url('frontend/puserPanel/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ url('frontend/puserPanel/js/buttons.flash.min.js') }}"></script>
    <script src="{{ url('frontend/puserPanel/js/jszip.min.js') }}"></script>
    <script src="{{ url('frontend/puserPanel/js/pdfmake.min.js') }}"></script>
    <script src="{{ url('frontend/puserPanel/js/vfs_fonts.js') }}"></script>
    <script src="{{ url('frontend/puserPanel/js/buttons.html5.min.js') }}"></script>
    <script src="{{ url('frontend/puserPanel/js/buttons.print.min.js') }}"></script>


    <script src="{{ url('frontend/puserPanel/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ url('frontend/puserPanel/scrollable-custom.js') }}"></script>

    <script src="{{ url('frontend/puserPanel/js/dashboard_init.js') }}"></script>
    <script src="{{ url('frontend/puserPanel/js/custom.js') }}"></script>
</body>

</html>
