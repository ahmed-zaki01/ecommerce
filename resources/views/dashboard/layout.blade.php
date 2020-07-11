@include('dashboard.inc._header')
@include('dashboard.inc._aside')

@include('partials._session')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    @yield('content')
</div>
<!-- /.content-wrapper -->

@include('dashboard.inc._footer')
