
@include('sweet::alert')

<!-- Plugin scripts -->
<script src="{{asset('admin/vendors/bundle.js')}}"></script>

<!-- Chartjs -->
<script src="{{asset('admin/vendors/charts/chartjs/chart.min.js')}}"></script>

<!-- Circle progress -->
<script src="{{asset('admin/vendors/circle-progress/circle-progress.min.js')}}"></script>

<!-- Peity -->
<script src="{{asset('admin/vendors/charts/peity/jquery.peity.min.js')}}"></script>
<script src="{{asset('admin/assets/js/examples/charts/peity.js')}}"></script>

<!-- Datepicker -->
<script src="{{asset('admin/vendors/datepicker/daterangepicker.js')}}"></script>

<!-- Slick -->
<script src="{{asset('admin/vendors/slick/slick.min.js')}}"></script>

<!-- Vamp -->
<script src="{{asset('admin/vendors/vmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('admin/vendors/vmap/maps/jquery.vmap.usa.js')}}"></script>
<script src="{{asset('admin/assets/js/examples/vmap.js')}}"></script>

<!-- Dashboard scripts -->
<script src="{{asset('admin/assets/js/examples/dashboard.js')}}"></script>
<div class="colors">
    <!-- To use theme colors with Javascript -->
    <div class="bg-primary"></div>
    <div class="bg-primary-bright"></div>
    <div class="bg-secondary"></div>
    <div class="bg-secondary-bright"></div>
    <div class="bg-info"></div>
    <div class="bg-info-bright"></div>
    <div class="bg-success"></div>
    <div class="bg-success-bright"></div>
    <div class="bg-danger"></div>
    <div class="bg-danger-bright"></div>
    <div class="bg-warning"></div>
    <div class="bg-warning-bright"></div>
</div>

<!-- App scripts -->
<script src="{{asset('admin/assets/js/app.js')}}"></script>

@livewireScripts
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<x-livewire-alert::scripts />

</body>

</html>
