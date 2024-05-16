
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Sistem Informasi Kantor</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome-free/css/all.min.css/')}}">

  <!-- bootstrap 5.0 -->
  <link rel="stylesheet" href="{{asset('plugins/bootstrap-5.0/css/bootstrap.css/')}}">


  <link rel="stylesheet" href="{{asset('plugins/jqvmap/jqvmap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.css')}}">
  <!-- asset-tambahan -->
  <link rel="stylesheet" href="{{asset('asset-tambahan/style.css')}}">
  <link rel="stylesheet" href="{{asset('asset-tambahan/style-user-managemant.css')}}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  @include('layout/navbar-atas')

@include('layout/sidebar-kiri')

@include('layout/user-managemant/konten-user-managemant')

</div>


  <!-- input target jual -->
<div class="modal fade" id="modalinputtarget" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Input Target Office</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

      <form class="tambah-data" action="{{route('simpan-target')}}" method="post">
        @csrf
            <div class="mb-3">
                <label for="target_name" class="form-label">Kode Target</label>
                <input type="text" class="form-control" name="target_name" value="{{old('target_name')}}" id="target_name" placeholder="cth: tg-mei">
                @if ($errors->has('target_name'))
                  <div style="background-color: blue;" class="badge text-bg-danger">{{$errors->first('target_name')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="bulan_name" class="form-label">Bulan</label>
                <input type="date" class="form-control" name="bulan_name" value="{{old('bulan_name')}}" id="bulan_name" placeholder="input bulan saja">
                @if ($errors->has('bulan_name'))
                  <div style="background-color: blue;" class="badge text-bg-danger">{{$errors->first('bulan_name')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="nominal_name" class="form-label">Target</label>
                <input type="text" class="form-control" name="nominal_name" value="{{old('nominal_name')}}" id="nominal_name" placeholder="Nominal Rupiah">
                @if ($errors->has('nominal_name'))
                  <div style="background-color: blue;" class="badge text-bg-danger">{{$errors->first('nominal_name')}}</div>
                @endif
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
    </div>
  </div>
</div>

  <!-- /.content-wrapper -->
@include('layout/footer')
  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('plugins/jquery-ui/jquery-ui.min.js')}}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- ChartJS -->
<script src="{{asset('plugins/chart.js/Chart.min.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('plugins/sparklines/sparkline.js')}}"></script>
<!-- JQVMap -->
<script src="{{asset('plugins/jqvmap/jquery.vmap.min.js')}}"></script>
<script src="{{asset('plugins/jqvmap/maps/jquery.vmap.usa.js')}}"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('plugins/jquery-knob/jquery.knob.min.js')}}"></script>
<!-- daterangepicker -->
<script src="{{asset('plugins/moment/moment.min.js')}}"></script>
<script src="{{asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('dist/js/pages/dashboard.js')}}"></script>

<script src="{{asset('plugins/bootstrap-5.0/js/bootstrap.min.js')}}"></script>



<!-- fontawesome -->
<script src="{{asset('assets/plugins/fontawesome-free/js/all.min.js')}}"></script>


<!-- Your existing scripts are above this line -->


<!-- Your existing scripts are below this line -->


</body>
</html>
