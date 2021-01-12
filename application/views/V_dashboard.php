<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="shortcut icon" type="ico" href="<?= base_url()?>assets/images/logo.ico">
  <title>APOLLO</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/dist/css/adminlte.min.css');?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/toastr/toastr.min.css');?>">
  <!-- Resources -->
  <script src="https://www.amcharts.com/lib/4/core.js"></script>
  <script src="https://www.amcharts.com/lib/4/charts.js"></script>
  <script src="https://www.amcharts.com/lib/4/themes/kelly.js"></script>
  <script src="https://www.amcharts.com/lib/4/themes/material.js"></script>
  <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>

  <style>
  /* Style the form */
  .my-custom-scrollbar {
    position: relative;
    height: 550px;
    overflow: auto;
  }
  .table-wrapper-scroll-y {
    display: block;
  }

/* Style the input fields */
/* input {
  padding: 10px;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
} */

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

.cardku {
  background-color: #ffdddd;
}
/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}


.font-badge{
  font-size: 19px;
  background-color: white;
}

#chartdiv {
  width: 100%;
  height: 300px;
}

#chartASN {
  width: 100%;
  height: 250px;
}

#chartNONASN {
  width: 100%;
  height: 250px;
}

#chartPemakaianApollo {
  width: 100%;
  height: 400px;
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
/* Back to top button */
.back-to-top {
  position: fixed;
  display: none;
  background: #18d26e;
  color: #fff;
  display: inline-block;
  width: 44px;
  height: 44px;
  text-align: center;
  line-height: 1;
  font-size: 16px;
  border-radius: 50%;
  right: 15px;
  bottom: 15px;
  transition: background 0.5s;
  z-index: 11;
}

.back-to-top i {
  padding-top: 12px;
  color: #fff;
}
.title-total{
    font-size:90px;
}
@media (max-width: 768px) {
  .back-to-top {
    bottom: 15px;
  }
}
@media (max-width: 1400px) {
  .title-totaliso {
    margin: -12px;
  }
}
@media(max-width: 375px){
  .title-total{
    font-size:64px;
  }
}
@media(max-width: 1920px){
  .title-tota1l{
    font-size:54px;
  }
}
.body-padding{
  padding : 7px;
}
.body-padding2{
  padding : 10px;
}
.font-badge{
  font-size: 30px;
  background-color: white;
}
@media(max-width : 1420px){
  .badge-sembuh{
    font-size: 19px;
  }
  .badge-iso{
    font-size: 19px;
  }
  .badge-drawat{
    font-size: 19px;
  }
  .badge-mnggl{
    font-size: 19px;
  }
 
}

.badge-sembuh{
  
  color: #28a745;
}
.badge-iso{
  
  color: #6c84f1;
}
.badge-drawat{
  
  color: #ffa500;
}
.badge-mnggl{
  
  color: #dc3545;
}
  </style>

<script>
  am4core.ready(function() {

  // Themes begin
  am4core.useTheme(am4themes_kelly);
  am4core.useTheme(am4themes_animated);

  // Create chart
  // var chart = am4core.create("chartdiv", am4charts.PieChart3D);
  var chart = am4core.create("chartdiv", am4charts.PieChart);
  // chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
  // chart.legend = new am4charts.Legend();
  chart.data = [
  {
    Hasil: "APOLLO",
    Pengguna: <?php foreach ($dashboard as $dt){
                  echo $dt['TOT_PEG_APOLLO'];
                }?>
  },
  {
    Hasil: "BELUM APOLLO",
    Pengguna: <?php foreach ($dashboard as $dt){
                  echo $dt['TOT_PEG_BLM_APOLLO'];
                }?>
  }
  ];

  chart.radius = am4core.percent(70);
  chart.innerRadius = am4core.percent(40);
  chart.startAngle = 180;
  chart.endAngle = 360;  
  
  
  var series = chart.series.push(new am4charts.PieSeries());
  series.dataFields.value = "Pengguna";
  series.dataFields.category = "Hasil";

  series.slices.template.cornerRadius = 5;
  series.slices.template.innerCornerRadius = 7;
  series.slices.template.draggable = true;
  series.slices.template.inert = true;
  series.alignLabels = false;

  series.hiddenState.properties.startAngle = 90;
  series.hiddenState.properties.endAngle = 90;
  series.colors.list = [
      am4core.color("#637f26"),
      am4core.color("#ff6600")
    ];
  chart.legend = new am4charts.Legend();

  });

  //=================================CHART ASN===============================/
  am4core.ready(function() {

  // Themes begin
  am4core.useTheme(am4themes_kelly);
  am4core.useTheme(am4themes_animated);
  // Themes end

  var chart = am4core.create("chartASN", am4charts.PieChart3D);
  chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
  
  chart.legend = new am4charts.Legend();

  chart.data = [
    {
      Hasil: "APOLLO",
      Pengguna: <?php foreach ($dashboard as $dt){
                    echo $dt['ASN_APOLLO'];
                  }?>
    },
    {
      Hasil: "BELUM APOLLO",
      Pengguna: <?php foreach ($dashboard as $dt){
                    echo $dt['ASN_BLM_APOLLO'];
                  }?>
    }
  ];

  // chart.innerRadius = 100;

  var series = chart.series.push(new am4charts.PieSeries3D());
  series.dataFields.value = "Pengguna";
  series.dataFields.category = "Hasil";
  series.colors.list = [
      am4core.color("#92d050"),
      am4core.color("#ff6600")
    ];
  // series.alignLabels = false;
  // series.labels.template.bent = true;
  // series.labels.template.radius = 22;
  // series.labels.template.padding(0,0,0,0);
  // series.ticks.template.disabled = true;

  }); // end am4core.ready()

  //=================================CHART NON ASN============================/
  am4core.ready(function() {

  // Themes begin
  am4core.useTheme(am4themes_kelly);
  am4core.useTheme(am4themes_animated);
  // Themes end

  // var chart = am4core.create("chartNONASN", am4charts.PieChart3D);
  // chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

  // chart.legend = new am4charts.Legend();

  var chart = am4core.create("chartNONASN", am4charts.PieChart3D);

  // Add a legend
  chart.legend = new am4charts.Legend();


  chart.data = [
    {
      Hasil: "APOLLO",
      Pengguna: <?php foreach ($dashboard as $dt){
                    echo $dt['NONASN_APOLLO'];
                  }?>
    },
    {
      Hasil: "BELUM APOLLO",
      Pengguna: <?php foreach ($dashboard as $dt){
                    echo $dt['NONASN_BLM_APOLLO'];
                  }?>
    }
  ];

  // chart.innerRadius = 100;

  var series = chart.series.push(new am4charts.PieSeries3D());
  series.dataFields.value = "Pengguna";
  series.dataFields.category = "Hasil";
  series.colors.list = [
      am4core.color("#92d050"),
      am4core.color("#ff6600")
    ];
  // series.alignLabels = false;
  // series.labels.template.bent = true;
  // series.labels.template.radius = 22;
  // series.labels.template.padding(0,0,0,0);


  }); // end am4core.ready()


  //=========================================GRAFIK PEMAKAIAN APOLLO=======================//
  am4core.ready(function() {

  // Themes begin
  am4core.useTheme(am4themes_kelly);
  am4core.useTheme(am4themes_animated);
  // Themes end



  // Create chart instance
  var chart = am4core.create("chartPemakaianApollo", am4charts.XYChart);

  // Add data
  chart.data = [
    <?php for ($a = 0; $a < count($grafik); $a++) { ?>
    {
      date: "<?php echo $grafik[$a]['TGLABSEN']?> ",
      jml: <?php echo $grafik[$a]['JMLPEMAKAI']?>
    },
    <?php } ?>
  ];

  // Create axes
  var dateAxis = chart.xAxes.push(new am4charts.DateAxis());
  dateAxis.renderer.grid.template.location = 0;
  dateAxis.renderer.minGridDistance = 50;

  var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
  valueAxis.logarithmic = true;
  valueAxis.renderer.minGridDistance = 20;

  // Create series
  var series = chart.series.push(new am4charts.LineSeries());
  series.dataFields.valueY = "jml";
  series.dataFields.dateX = "date";
  series.tensionX = 0.8;
  series.strokeWidth = 3;

  var bullet = series.bullets.push(new am4charts.CircleBullet());
  bullet.circle.fill = am4core.color("#fff");
  bullet.circle.strokeWidth = 3;

  // Add cursor
  chart.cursor = new am4charts.XYCursor();
  chart.cursor.fullWidthLineX = true;
  chart.cursor.xAxis = dateAxis;
  chart.cursor.lineX.strokeWidth = 0;
  chart.cursor.lineX.fill = am4core.color("#000");
  chart.cursor.lineX.fillOpacity = 0.1;

  // Add scrollbar
  chart.scrollbarX = new am4core.Scrollbar();

  // Add a guide
  let range = valueAxis.axisRanges.create();
  range.value = 400;
  range.grid.stroke = am4core.color("#396478");
  range.grid.strokeWidth = 1;
  range.grid.strokeOpacity = 1;
  range.grid.strokeDasharray = "3,3";
  range.label.inside = true;
  range.label.text = "Average";
  range.label.fill = range.grid.stroke;
  range.label.verticalCenter = "bottom";

  }); // end am4core.ready()
  </script>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?php echo base_url('');?>" class="navbar-brand">
        <img src="<?php echo base_url('assets/dist/img/logo.png');?>" alt="RSUD TUGUREJO" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light" style="font-size: larger;"><strong>APOLLO</strong> RSUD Tugurejo</span>
      </a>
      <ul class="menu navbar-nav ml-auto">
        <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <?php echo $this->session->userdata('username')?>
          <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgd2lkdGg9IjUxMnB4Ij48Zz48cGF0aCBkPSJtMjU2IDAtMTYwLjM5OCAyNTYgMTYwLjM5OCAyNTZjMTQxLjM4NSAwIDI1Ni0xMTQuNjE1IDI1Ni0yNTZzLTExNC42MTUtMjU2LTI1Ni0yNTZ6IiBmaWxsPSIjMjhhYmZhIi8+PHBhdGggZD0ibTAgMjU2YzAgMTQxLjM4NSAxMTQuNjE1IDI1NiAyNTYgMjU2di01MTJjLTE0MS4zODUgMC0yNTYgMTE0LjYxNS0yNTYgMjU2eiIgZmlsbD0iIzE0Y2ZmZiIvPjxwYXRoIGQ9Im0yNTYgNjAtNjUuNzg4IDEwNSA2NS43ODggMTA1YzU3Ljk5IDAgMTA1LTQ3LjAxIDEwNS0xMDVzLTQ3LjAxLTEwNS0xMDUtMTA1eiIgZmlsbD0iIzM3M2U5ZiIvPjxwYXRoIGQ9Im0xNTEgMTY1YzAgNTcuOTkgNDcuMDEgMTA1IDEwNSAxMDV2LTIxMGMtNTcuOTkgMC0xMDUgNDcuMDEtMTA1IDEwNXoiIGZpbGw9IiM2MjQxZWEiLz48cGF0aCBkPSJtNDI0LjY0OSAzMzUuNDQzYy0xOS45MzMtMjIuNTI1LTQ4LjYtMzUuNDQzLTc4LjY0OS0zNS40NDNoLTkwbC02MCA3NiA2MCA3NmM3MC4zMjIgMCAxMzUuNjM2LTM4LjAxIDE3MC40NTQtOTkuMTk4bDUuMzA2LTkuMzI1eiIgZmlsbD0iIzM3M2U5ZiIvPjxwYXRoIGQ9Im0xNjYgMzAwYy0zMC4wNDkgMC01OC43MTYgMTIuOTE4LTc4LjY0OSAzNS40NDNsLTcuMTEgOC4wMzUgNS4zMDYgOS4zMjVjMzQuODE3IDYxLjE4NyAxMDAuMTMxIDk5LjE5NyAxNzAuNDUzIDk5LjE5N3YtMTUyeiIgZmlsbD0iIzYyNDFlYSIvPjwvZz48L3N2Zz4K"
          alt="RSUD TUGUREJO" class="brand-image img-circle elevation-3" style="opacity: .8" />
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="position: absolute;">
            <a href="<?php echo site_url('login')?>" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <img src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pgo8IS0tIEdlbmVyYXRvcjogQWRvYmUgSWxsdXN0cmF0b3IgMTkuMC4wLCBTVkcgRXhwb3J0IFBsdWctSW4gLiBTVkcgVmVyc2lvbjogNi4wMCBCdWlsZCAwKSAgLS0+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayIgdmVyc2lvbj0iMS4xIiBpZD0iQ2FwYV8xIiB4PSIwcHgiIHk9IjBweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDUxMiA1MTI7IiB4bWw6c3BhY2U9InByZXNlcnZlIiB3aWR0aD0iNTEycHgiIGhlaWdodD0iNTEycHgiPgo8Zz4KCTxwYXRoIHN0eWxlPSJmaWxsOiMxMTM4Rjc7IiBkPSJNMjU1LjE1LDUxMS4xNUg2My43ODdDMjguNjE5LDUxMS4xNSwwLDQ4Mi41MywwLDQ0Ny4zNjJWNjQuNjM4QzAsMjkuNDcsMjguNjE5LDAuODUsNjMuNzg3LDAuODUgICBIMjU1LjE1YzExLjczNywwLDIxLjI2Miw5LjUyNiwyMS4yNjIsMjEuMjYycy05LjUyNiwyMS4yNjItMjEuMjYyLDIxLjI2Mkg2My43ODdjLTExLjcxNiwwLTIxLjI2Miw5LjU0Ny0yMS4yNjIsMjEuMjYydjM4Mi43MjQgICBjMCwxMS43MzcsOS41NDcsMjEuMjYyLDIxLjI2MiwyMS4yNjJIMjU1LjE1YzExLjczNywwLDIxLjI2Miw5LjUwNCwyMS4yNjIsMjEuMjYyQzI3Ni40MTIsNTAxLjY0NSwyNjYuODg2LDUxMS4xNSwyNTUuMTUsNTExLjE1eiIvPgoJPHBhdGggc3R5bGU9ImZpbGw6IzExMzhGNzsiIGQ9Ik00NDYuNTEyLDI3Ny4yNjJoLTI1NS4xNWMtMTEuNzM3LDAtMjEuMjYyLTkuNTA0LTIxLjI2Mi0yMS4yNjIgICBjMC0xMS43MzcsOS41MjYtMjEuMjYyLDIxLjI2Mi0yMS4yNjJoMjU1LjE1YzExLjc1OCwwLDIxLjI2Miw5LjUyNiwyMS4yNjIsMjEuMjYyQzQ2Ny43NzQsMjY3Ljc1OCw0NTguMjcsMjc3LjI2Miw0NDYuNTEyLDI3Ny4yNjIgICB6Ii8+Cgk8cGF0aCBzdHlsZT0iZmlsbDojMTEzOEY3OyIgZD0iTTM2MS40NjIsNDA0LjgzN2MtNS40ODYsMC0xMC45NzEtMi4xMjYtMTUuMTM5LTYuMzM2Yy04LjI1LTguMzU2LTguMTY1LTIxLjgxNSwwLjIxMy0zMC4wNjUgICBMNDYwLjQ2LDI1NkwzNDYuNTM2LDE0My41NjRjLTguMzc3LTguMjUtOC40NDEtMjEuNzA5LTAuMjEzLTMwLjA4NmM4LjIyOS04LjM3NywyMS43My04LjQ0MSwzMC4wNjUtMC4xOTFsMTI5LjI3NiwxMjcuNTc1ICAgYzQuMDQsMy45OTcsNi4zMzYsOS40NDEsNi4zMzYsMTUuMTM5cy0yLjI3NSwxMS4xMi02LjMzNiwxNS4xMzlMMzc2LjM4OCwzOTguNzE0QzM3Mi4yNjMsNDAyLjc5NiwzNjYuODYyLDQwNC44MzcsMzYxLjQ2Miw0MDQuODM3ICAgeiIvPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+CjxnPgo8L2c+Cjwvc3ZnPgo="
                 alt="User Avatar" class="img-size-50 mr-3 img-circle" style="height: 20px;">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Sign In
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                 </div>
              </div>
              <!-- Message End -->
            </a>
        </div>
        </li>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <div class="container">
    <!-- Content Header (Page header) -->
    <div class="content-header" style="padding-top: 8px;
    padding-right: 0.5rem;
    padding-bottom: 8px;
    padding-left: 0.5rem;">
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <!-- <div class="container-fluid"> -->
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-md-12">
            <div class="card card-success card-outline">
              <div class="card-header" style="text-align: center;align-items: center;display: grid;font-family: fantasy;">
                  <h1 class="card-title m-0" style="text-align: center;font-size: 20px;">GRAFIK PENGGUNA APOLLO KESELURUHAN</h1>
              </div>
              <div class="card-body">
              <!-- One "tab" for each step in the form: -->
                <div class="row">
                  <div class="col-md-12">
                    <!-- HTML -->
                    <div id="chartdiv"></div>
                    <table style="font-weight:bold">
                    <tr><td><u>Keterangan :</u></td><td></td><td></td></tr>
                    <tr><td>Total Pegawai</td><td>:</td><td><?php foreach ($dashboard as $dt){echo $dt['PEGAWAI'];}?></td></tr>
                    <tr><td>Pengguna Apollo</td><td>:</td><td><?php foreach ($dashboard as $dt){echo $dt['TOT_PEG_APOLLO'];}?></td></tr>
                    <tr><td>Yang Belum Apollo</td><td>:</td><td><?php foreach ($dashboard as $dt){echo $dt['TOT_PEG_BLM_APOLLO'];}?></td></tr>
                    </table>
                  </div>
                </div>
              </div>
            </div>                       
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title" style="font-weight:bold;">
                  <i class="fas fa-user mr-1"></i>
                  PEGAWAI ASN
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="chartASN"></div>
                <table style="font-weight:bold">
                <tr><td><u>Keterangan :</u></td><td></td><td></td></tr>
                <tr><td>Total Pegawai ASN</td><td>:</td><td><?php foreach ($dashboard as $dt){echo $dt['ASN'];}?></td></tr>
                <tr><td>Pengguna Apollo</td><td>:</td><td><?php foreach ($dashboard as $dt){echo $dt['ASN_APOLLO'];}?></td></tr>
                <tr><td>Yang Belum Apollo</td><td>:</td><td><a href="javascript:void(0)"><span class="badge badge-danger rincianNonApollo" style="font-color:white; font-weight:bold; font-size:15px" data-toggle="modal" data-target="#datarincian" data-status="ASN"><i class="fas fa-exclamation-circle text-sm"></i><?php foreach ($dashboard as $dt){echo ' '.$dt['ASN_BLM_APOLLO'];}?></span></a>
                </td></tr>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-6 col-12">
            <div class="card">
              <div class="card-header border-0">
                <h3 class="card-title" style="font-weight:bold;">
                  <i class="fas fa-users mr-1"></i>
                  PEGAWAI NON ASN
                </h3>
                <div class="card-tools">
                  <button type="button" class="btn bg-success btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <div id="chartNONASN"></div>
                <table style="font-weight:bold">
                <tr><td><u>Keterangan :</u></td><td></td><td></td></tr>
                <tr><td>Total Pegawai NON ASN</td><td>:</td><td><?php foreach ($dashboard as $dt){echo $dt['NONASN'];}?></td></tr>
                <tr><td>Pengguna Apollo</td><td>:</td><td><?php foreach ($dashboard as $dt){echo $dt['NONASN_APOLLO'];}?></td></tr>
                <tr><td>Yang Belum Apollo</td><td>:</td><td><a href="javascript:void(0)"><span class="badge badge-danger rincianNonApollo" style="font-color:white; font-weight:bold; font-size:15px" data-toggle="modal" data-target="#datarincian" data-status="NONASN"><i class="fas fa-exclamation-circle text-sm"></i><?php foreach ($dashboard as $dt){echo ' '.$dt['NONASN_BLM_APOLLO'];}?></span></a></td></tr>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- ./col -->
          <div class="col-md-12">
            <div class="card card-success card-outline">
              <div class="card-header" style="text-align: center;align-items: center;display: grid;font-family: fantasy;">
                  <h1 class="card-title m-0" style="text-align: center;font-size: 20px;">GRAFIK PEMAKAIAN APOLLO</h1>
              </div>
              <div class="card-body">
              <!-- One "tab" for each step in the form: -->
                <div class="row">
                  <div class="col-md-12">
                    <!-- HTML -->
                    <div id="chartPemakaianApollo"></div>
                  </div>
                </div>
              </div>
            </div>                       
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      <!-- </div> -->
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
  </div>
  <!-- /.content-wrapper -->
  
  <div class="modal fade" id="dataBelumApollo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="status">Pegawai yang Belum Apollo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-bordered table-responsive" id="tabelNonApollo">
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Footer -->
  <footer class="main-footer text-center">
    <!-- Default to the left -->
    <h4>Copyright &copy; 2020 <a href="https://rstugurejo.jatengprov.go.id">RSUD Tugurejo Provinsi Jawa Tengah</a>.</h4>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js');?>"></script>
<!-- Toastr -->
<script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js');?>"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

<script>
 $(document).ready(function(){
    toastr.info('Versi Apollo : <?php foreach ($dashboard as $dt){
                  echo ' '.$dt['APOLLO'];
                }?>');
 });
</script>

</body>
</html>
