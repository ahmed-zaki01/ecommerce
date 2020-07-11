@include('dashboard.inc.header')
@include('dashboard.inc.aside')

@include('partials._session')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @yield('content')
</div>
<!-- /.content-wrapper -->

@include('dashboard.inc.footer')
