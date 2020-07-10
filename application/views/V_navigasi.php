<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>APOLO RSUD TUGUREJO</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css');?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css');?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css');?>">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2/css/select2.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css');?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css');?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css');?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<style>
.overlay {
  height: 100%;
  width: 100%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-y: hidden;
  transition: 0.5s;
  display: none;
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
  
}
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #dc3545;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  position: fixed;
  z-index: 100;
  right: 50%;
  left: 45%;
  top: 50%;
  bottom: 0px;
  display: block;
}
/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
  </style>
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
        <a href="<?= site_url("Dashboard")?>" class="nav-link">Home</a>
      </li>
    </ul>


    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
          <?php echo $this->session->userdata('username')?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="position: absolute;">
          <a href="<?php echo site_url('signout')?>" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBoZWlnaHQ9IjEyOHB4IiB2aWV3Qm94PSItNDQgMCA1MTIgNTEyIiB3aWR0aD0iMTI4cHgiPjxwYXRoIGQ9Im0yMTEuODYzMjgxIDUxMmMtMTE2LjgyMDMxMiAwLTIxMS44NjMyODEtOTUuMDM1MTU2LTIxMS44NjMyODEtMjExLjg2MzI4MSAwLTk1LjE1MjM0NCA2NC4wMDc4MTItMTc5LjE3MTg3NSAxNTUuNjY0MDYyLTIwNC4zMjgxMjUgOS4zODY3MTktMi41MzEyNSAxOS4xMDkzNzYgMi45NDkyMTggMjEuNjk5MjE5IDEyLjM2MzI4MSAyLjU3NDIxOSA5LjM5ODQzNy0yLjk0OTIxOSAxOS4xMjEwOTQtMTIuMzU1NDY5IDIxLjY5MTQwNi03Ni4zNTkzNzQgMjAuOTY0ODQ0LTEyOS42OTkyMTggOTAuOTgwNDY5LTEyOS42OTkyMTggMTcwLjI3MzQzOCAwIDk3LjM0Mzc1IDc5LjE5OTIxOCAxNzYuNTU0Njg3IDE3Ni41NTQ2ODcgMTc2LjU1NDY4NyA5Ny4zNTE1NjMgMCAxNzYuNTUwNzgxLTc5LjIxMDkzNyAxNzYuNTUwNzgxLTE3Ni41NTQ2ODcgMC03Ny40Mjk2ODgtNTEuNzU3ODEyLTE0Ni45OTYwOTQtMTI1Ljg2MzI4MS0xNjkuMTcxODc1LTkuMzQzNzUtMi43OTI5NjktMTQuNjQ0NTMxLTEyLjYzNjcxOS0xMS44NTE1NjItMjEuOTgwNDY5IDIuODAwNzgxLTkuMzI4MTI1IDEyLjY2NDA2Mi0xNC42MjEwOTQgMjEuOTcyNjU2LTExLjg0Mzc1IDg4LjkzNzUgMjYuNjE3MTg3IDE1MS4wNTA3ODEgMTEwLjA4MjAzMSAxNTEuMDUwNzgxIDIwMi45OTYwOTQgMCAxMTYuODI4MTI1LTk1LjAzOTA2MiAyMTEuODYzMjgxLTIxMS44NTkzNzUgMjExLjg2MzI4MXptMCAwIiBmaWxsPSIjMDAwMDAwIi8+PHBhdGggZD0ibTIxMS44NjMyODEgMjI5LjUxNTYyNWMtOS43NSAwLTE3LjY1NjI1LTcuODk0NTMxLTE3LjY1NjI1LTE3LjY1MjM0NHYtMTk0LjIwNzAzMWMwLTkuNzYxNzE5IDcuOTA2MjUtMTcuNjU2MjUgMTcuNjU2MjUtMTcuNjU2MjVzMTcuNjUyMzQ0IDcuODk0NTMxIDE3LjY1MjM0NCAxNy42NTYyNXYxOTQuMjA3MDMxYzAgOS43NTc4MTMtNy45MDIzNDQgMTcuNjUyMzQ0LTE3LjY1MjM0NCAxNy42NTIzNDR6bTAgMCIgZmlsbD0iIzAwMDAwMCIvPjwvc3ZnPgo="
                alt="User Avatar" class="img-size-50 mr-3 img-circle" style="height: 20px;">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Signout
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                </div>
            </div>
            <!-- Message End -->
          </a>
        </div>
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
    <a href="<?= site_url("Dashboard")?>" class="brand-link">
      <img src="<?php echo base_url('assets/dist/img/AdminLTELogo.png');?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">APOLLO</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="<?= site_url('Dashboard')?>" class="nav-link <?php if($this->uri->segment(1)=="Dashboard"  && $this->uri->segment(2)==""){echo "active";}?>">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                HALAMAN UTAMA
              </p>
            </a>
          </li>
          <?php foreach ($menu as $m) : ?>
              <li class='nav-item'>
                <a href='<?= site_url($m['CONTROLLER'].'/'.$m['URL']);?>' class='nav-link <?php if($this->uri->segment(2)==$m['URL']){echo "active";}?>'>
                  <i class='nav-icon fas <?= $m['ICON'];?>'></i>
                  <p><?= $m['TITLE'];?></p>
                </a>
              </li>
          <?php endforeach; ?>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>