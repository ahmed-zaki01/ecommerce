<!DOCTYPE html>
<html dir="{{ app()->getLocale() }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ !empty($title) ? $title : trans('site.titles.home') }} </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{asset('dashboard')}}/dist/img/favicon.png" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins')}}/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    @if (app()->getLocale() == 'ar')
    <link rel="stylesheet" href="{{asset('dashboard/dist')}}/css/rtl/adminlte.min.css">
    <link rel="stylesheet" href="{{asset('dashboard/dist')}}/css/rtl/custom.css">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;400;700&display=swap" rel="stylesheet">

    <style>
        html,
        body {
            font-family: 'Cairo', sans-serif;
        }
    </style>

    @else
    <link rel="stylesheet" href="{{asset('dashboard/dist')}}/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    @endif
    {{-- <!-- Tempusdominus Bbootstrap 4 -->
        <link rel="stylesheet" href="{{asset('dashboard/plugins')}}/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins')}}/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins')}}/jqvmap/jqvmap.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins')}}/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins')}}/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins')}}/summernote/summernote-bs4.css"> --}}
    <!-- dataTables style sheet -->
    {{-- <link rel="stylesheet" href="http://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"> --}}

    {{-- <link rel="stylesheet" href="{{asset('dashboard/plugins')}}/datatables/css/jquery.dataTables.min.css"> --}}

    <link rel="stylesheet" href="{{asset('dashboard/plugins')}}/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{asset('dashboard/plugins')}}/datatables-responsive/css/responsive.bootstrap4.min.css">

    <!-- Noty -->
    <link rel="stylesheet" href="{{asset('dashboard/plugins')}}/noty/noty.min.css">
    <!-- custom style -->
    <link rel="stylesheet" href="{{asset('dashboard/dist')}}/css/style.css">
    <!-- Noty -->
    <script src="{{asset('dashboard/plugins')}}/noty/noty.min.js"></script>

    {{-- styles stack within laravel --}}
    @stack('styles')

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">@lang('site.home')</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">@lang('site.contact') </a>
                </li>
            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="@lang('site.search')" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">

                        <span class="" style="cursor: pointer;"><i class="fas fa-globe"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">

                        <a href="{{route('dashboard.get_lang', 'ar')}}" class="dropdown-item">
                            <i class="fas fa-flag mr-2"></i> Arabic
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="{{route('dashboard.get_lang', 'en')}}" class="dropdown-item">
                            <i class="fas fa-flag mr-2"></i> English
                        </a>

                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard.logout')}}">
                        <i class="fa fa-sign-out-alt"></i> @lang('site.logout')
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->
