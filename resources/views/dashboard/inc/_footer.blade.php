<footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="{{route('dashboard.index')}}">Ecommerce</a>.</strong>
    All rights reserved
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('dashboard/plugins')}}/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('dashboard/plugins')}}/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('dashboard/plugins')}}/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('dashboard/dist')}}/js/adminlte.min.js"></script>
{{-- <!-- ChartJS -->
<script src="{{asset('dashboard/plugins')}}/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('dashboard/plugins')}}/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('dashboard/plugins')}}/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('dashboard/plugins')}}/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('dashboard/plugins')}}/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('dashboard/plugins')}}/moment/moment.min.js"></script>
<script src="{{asset('dashboard/plugins')}}/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('dashboard/plugins')}}/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('dashboard/plugins')}}/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('dashboard/plugins')}}/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- dataTbles script --> --}}
<script src="{{asset('dashboard/plugins')}}/datatables/jquery.dataTables.min.js"></script>
<script src="{{asset('dashboard/plugins')}}/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="{{asset('dashboard/plugins')}}/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{asset('dashboard/plugins')}}/datatables-responsive/js/responsive.bootstrap4.min.js"></script>





@stack('scripts')

</body>

</html>
