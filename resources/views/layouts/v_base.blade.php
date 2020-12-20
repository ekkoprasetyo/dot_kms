<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ $title }} | Knowledge Management System</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        @yield('app_style')

        <!-- default css -->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/fontawesome-free/css/all.min.css ') }}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css ') }}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/dist/css/adminlte.min.css') }}">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/plugins/overlayScrollbars/css/OverlayScrollbars.min.css ') }}">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ URL::asset('theme/adminlte305/dist/css/adminlte.min.css') }}">
        <!-- default css -->

        <link rel="shortcut icon" href="{{ URL::asset('favicon/favicon.ico') }}">
        <link rel="icon" sizes="16x16 32x32 64x64" href="{{ URL::asset('favicon/favicon.ico') }}">
        <link rel="icon" type="image/png" sizes="196x196" href="{{ URL::asset('favicon/favicon-192.png') }}">
        <link rel="icon" type="image/png" sizes="160x160" href="{{ URL::asset('favicon/favicon-160.png') }}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ URL::asset('favicon/favicon-96.png') }}">
        <link rel="icon" type="image/png" sizes="64x64" href="{{ URL::asset('favicon/favicon-64.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ URL::asset('favicon/favicon-32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ URL::asset('favicon/favicon-16.png') }}">
        <link rel="apple-touch-icon" href="{{ URL::asset('favicon/favicon-57.png') }}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ URL::asset('favicon/favicon-114.png') }}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ URL::asset('favicon/favicon-72.png') }}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::asset('favicon/favicon-144.png') }}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ URL::asset('favicon/favicon-60.png') }}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ URL::asset('favicon/favicon-120.png') }}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ URL::asset('favicon/favicon-76.png') }}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ URL::asset('favicon/favicon-152.png') }}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ URL::asset('favicon/favicon-180.png') }}">
        <meta name="msapplication-TileColor" content="#FFFFFF">
        <meta name="msapplication-TileImage" content="{{ URL::asset('favicon/favicon-144.png') }}">
        <meta name="msapplication-config" content="{{ URL::asset('favicon/browserconfig.xml') }}">

    </head>
    <body class="hold-transition sidebar-mini layout-fixed text-sm accent-orange">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-dark navbar-primary">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <!-- SEARCH FORM -->
        {{--        <form class="form-inline ml-3">--}}
        {{--            <div class="input-group input-group-sm">--}}
        {{--                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">--}}
        {{--                <div class="input-group-append">--}}
        {{--                    <button class="btn btn-navbar" type="submit">--}}
        {{--                        <i class="fas fa-search"></i>--}}
        {{--                    </button>--}}
        {{--                </div>--}}
        {{--            </div>--}}
        {{--        </form>--}}
                <ul class="navbar-nav ml-auto">
                    <!-- Notification Dropdown Menu -->
                    <li class="nav-item dropdown notifications-menu">
                    </li>
                    <!-- Profile Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#"><strong>{{ Session::get('users_fullname') }} </strong></a>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                            <a href="/change_profile" class="dropdown-item">
                                <!-- Message Start -->
                                <div class="media">
                                    <div class="media-body">
                                        <p class="dropdown-item-title text-info">
                                            {{ Session::get('users_position') }}
                                        </p>
                                        <p class="text-sm">{{ Session::get('users_role') }}</p>
                                        <p class="text-sm text-success"><i class="far fa-clock mr-1"></i> {{ Session::get('users_last_login_date') }}</p>
                                        <p class="text-sm text-danger"><i class="fas fa-laptop-code"></i> {{ Session::get('users_last_login_ip') }}</p>
                                    </div>
                                </div>
                                <!-- Message End -->
                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="/change_profile/change_password" class="dropdown-item dropdown-footer">Change Password</a>
                            <div class="dropdown-divider"></div>
                            <a href="{{ route('login.destroy') }}" class="dropdown-item dropdown-footer">Log Out !</a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar elevation-4 sidebar-light-primary">
                <!-- Brand Logo -->
                <a href="index3.html" class="brand-link navbar-light">
                    <img src="{{ URL::asset('theme/adminlte305/dist/img/user2-160x160.jpg') }} " alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                         style="opacity: .8">
                    <span class="brand-text font-weight-light">KMS</span>
                </a>

                @include('layouts.v_sidebar')

            </aside>

            @yield('content')

            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2020-{{ date('Y') }} <a href="http://arms.railink.co.id">KMS</a>.</strong>
                All rights reserved.
                <div class="float-right d-none d-sm-inline-block">
                    <b>dunski</b> 1.0
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-light">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
        <!-- ./wrapper -->

        <!-- default js -->
        <!-- jQuery -->
        <script src="{{ URL::asset('theme/adminlte305/plugins/jquery/jquery.min.js ') }} "></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ URL::asset('theme/adminlte305/plugins/jquery-ui/jquery-ui.min.js ') }} "></script>
        <!-- MomentJS -->
        <script src="{{ URL::asset('theme/adminlte305/plugins/moment/moment.min.js') }}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{ URL::asset('theme/adminlte305/plugins/bootstrap/js/bootstrap.bundle.min.js ') }} "></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ URL::asset('theme/adminlte305/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js ') }} "></script>
        <!-- overlayScrollbars -->
        <script src="{{ URL::asset('theme/adminlte305/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js ') }} "></script>
        <!-- AdminLTE App -->
        <script src="{{ URL::asset('theme/adminlte305/dist/js/adminlte.min.js ') }} "></script>
        <!-- default js -->

        @yield('app_js')

        @if (Session::has('success_notification'))
            <script type="text/javascript">
                $(document).Toasts('create', {
                    class: 'bg-success',
                    title: 'Success',
                    position: 'bottomRight',
                    body: '{{ Session::get('success_notification') }}',
                    icon: 'fas fa-envelope fa-lg',
                    autohide: true,
                    delay: 10000,
                });
            </script>
        @endif

        @if (Session::has('warning_notification'))
            <script type="text/javascript">
                $(document).Toasts('create', {
                    class: 'bg-warning',
                    title: 'Warning',
                    position: 'bottomRight',
                    body: '{{ Session::get('warning_notification') }}',
                    icon: 'fas fa-envelope fa-lg',
                    autohide: true,
                    delay: 10000,
                });
            </script>
        @endif

        @if (Session::has('error_notification'))
            <script type="text/javascript">
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    title: 'Error',
                    position: 'bottomRight',
                    body: '{{ Session::get('error_notification') }}',
                    icon: 'fas fa-envelope fa-lg',
                    autohide: true,
                    delay: 10000,
                });
            </script>
        @endif

        @if (Session::has('auth_error_notification'))
            <script type="text/javascript">
                $(document).Toasts('create', {
                    class: 'bg-warning',
                    title: 'Authorization Error',
                    position: 'bottomRight',
                    body: '{{ Session::get('auth_error_notification') }}',
                    icon: 'fas fa-envelope fa-lg',
                    autohide: true,
                    delay: 10000,
                });
            </script>
        @endif

        @if (Session::has('info_notification'))
            <script type="text/javascript">
                $(document).Toasts('create', {
                    class: 'bg-info',
                    title: 'Info',
                    position: 'bottomRight',
                    body: '{{ Session::get('info_notification') }}',
                    icon: 'fas fa-envelope fa-lg',
                    autohide: true,
                    delay: 10000,
                });
            </script>
        @endif

    </body>
</html>
