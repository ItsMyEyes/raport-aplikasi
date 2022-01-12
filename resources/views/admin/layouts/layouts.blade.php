@php $logo = "data:image/png;base64,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"; @endphp
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>RKKM | @yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.min.css">
  
  <!-- DataTables -->
  <link rel="stylesheet" href="/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ $logo }}" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="/admin/dashboard" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}">
          <i class="fa fa-sign-out-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/dashboard" class="brand-link">
      <img src="{{ $logo }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">RKKM</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="https://cdn.icon-icons.com/icons2/2506/PNG/512/user_icon_150670.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ auth()->user()->nama }} ( {{ Session::get('ta')['ta'] }} )</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{ route('dashboard') }}" class="nav-link {{ Request::segment('2') == 'dashboard' ? ' active' : '' }}">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
          @if (auth()->user()->akses == 'tata_usaha' || auth()->user()->akses == "wakil_kurikulum")
          <li class="nav-item">
            <a href="{{ route('user.index') }}" class="nav-link {{ Request::segment('2') == 'user' ? ' active' : '' }}">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Users / Guru
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('kelas.index') }}" class="nav-link {{ Request::segment('2') == 'kelas' ? ' active' : '' }}">
              <i class="nav-icon fa fa-building"></i>
              <p>
                Kelas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('siswa.index') }}" class="nav-link {{ Request::segment('2') == 'siswa' ? ' active' : '' }}">
              <i class="nav-icon fa fa-user"></i>
              <p>
                Siswa
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('matpel.index') }}" class="nav-link {{ Request::segment('2') == 'matpel' ? ' active' : '' }}">
              <i class="nav-icon fa fa-book"></i>
              <p>
                Mata pelajaran
              </p>
            </a>
          </li>
          @else
          <li class="nav-item">
            <a href="{{ route('nilai.index') }}" class="nav-link {{ Request::segment('2') == 'nilai' ? ' active' : '' }}">
              <i class="nav-icon fa fa-edit"></i>
              <p>
                Input Nilai
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cas.index') }}" class="nav-link {{ Request::segment('2') == 'cas' ? ' active' : '' }}">
              <i class="nav-icon fa fa-sticky-note"></i>
              <p>
                Input Cas
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('cetak') }}" class="nav-link {{ Request::segment('2') == 'cetak' ? ' active' : '' }}">
              <i class="nav-icon fa fa-file"></i>
              <p>
                Cetak
              </p>
            </a>
          </li>
          @endif
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">@yield('title')</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">@yield('breadcrumb')</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2021 <a href="/admin/dashboard">RKKM</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.1.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/dist/js/pages/dashboard.js"></script>
<!-- DataTables  & Plugins -->
<script src="/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="/plugins/jszip/jszip.min.js"></script>
<script src="/plugins/pdfmake/pdfmake.min.js"></script>
<script src="/plugins/pdfmake/vfs_fonts.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="/plugins/toastr/toastr.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
@if($errors->any())
<script>
    $(document).Toasts('create', {
        class: 'bg-danger',
        title: 'Danger',
        subtitle: 'Error message',
        body: '{{$errors->first()}}'
    })
</script>
@endif
<script>
  $(function () {
    $('.select2').select2()
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
  });
</script>
@yield('script')
</body>
</html>
