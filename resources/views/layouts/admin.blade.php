<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>@yield('title', 'Admin Panel')</title>

    <link rel="stylesheet" href="{{ asset('staradmin/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/simple-line-icons/css/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('staradmin/css/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('staradmin/images/favicon.png') }}" />
</head>
<body class="with-welcome-text">
    <div class="container-scroller">

        @include('partials.nav-bar')

        <div class="container-fluid page-body-wrapper">
            @include('partials.side-bar')

            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>

                @include('partials.footer')
            </div>
        </div>
    </div>

    <script src="{{ asset('staradmin/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('staradmin/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('staradmin/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('staradmin/vendors/progressbar.js/progressbar.min.js') }}"></script>

    <script src="{{ asset('staradmin/js/off-canvas.js') }}"></script>
    <script src="{{ asset('staradmin/js/template.js') }}"></script>
    <script src="{{ asset('staradmin/js/settings.js') }}"></script>
    <script src="{{ asset('staradmin/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('staradmin/js/todolist.js') }}"></script>
    <script src="{{ asset('staradmin/js/jquery.cookie.js') }}"></script>
    <script src="{{ asset('staradmin/js/dashboard.js') }}"></script>

    @stack('scripts')
</body>
</html>