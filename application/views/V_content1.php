<script>
  am4core.ready(function() {

  // Themes begin
  am4core.useTheme(am4themes_kelly);
  am4core.useTheme(am4themes_animated);

  // Create chart
  var chart = am4core.create("chartdiv", am4charts.PieChart3D);
  chart.hiddenState.properties.opacity = 0; // this creates initial fade-in
  chart.legend = new am4charts.Legend();
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

  var series = chart.series.push(new am4charts.PieSeries3D());
  series.dataFields.value = "Pengguna";
  series.dataFields.category = "Hasil";

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
  // series.alignLabels = false;
  // series.labels.template.bent = true;
  // series.labels.template.radius = 22;
  // series.labels.template.padding(0,0,0,0);


  }); // end am4core.ready()

  
  </script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">DASHBOARD</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-12">
            <div class="callout callout-warning">
              <h4><i class="fas fa-info"></i> VERSI :</h4>
                <h4><strong><?php foreach ($dashboard as $dt){
                  echo $dt['APOLLO'];
                }?></strong></h4>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-success card-outline">
              <div class="card-header" style="text-align: center;align-items: center;display: grid;font-family: fantasy;">
                  <h1 class="card-title m-0" style="text-align: center;font-size: 20px;">GRAFIK PENGGUNA APOLLO</h1>
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
          <!-- <div class="col-lg-3 col-6"> -->
            <!-- small box -->
            <!-- <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div> -->
          <!-- </div> -->
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
                <tr><td>Yang Belum Apollo</td><td>:</td><td><?php foreach ($dashboard as $dt){echo $dt['ASN_BLM_APOLLO'];}?></td></tr>
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
                <tr><td>Yang Belum Apollo</td><td>:</td><td><?php foreach ($dashboard as $dt){echo $dt['NONASN_BLM_APOLLO'];}?></td></tr>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- ./col -->

          <!-- <div class="col-lg-6 col-12">
            <div class="small-box bg-primary" style="padding-top: 10px; padding-right: 30px;padding-bottom: 10px; padding-left: 10px;">
              <div class="inner">
                <p style="font-size:80px; text-align:center; margin-bottom:0px"><strong><?php foreach ($dashboard as $dt){
                  echo $dt['PEGAWAI'];
                }?></strong>
                <p style="font-size:19px; text-align:center"><strong>TOTAL PEGAWAI</strong></p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div> -->
          <!-- ./col -->
          <!-- <div class="col-lg-6 col-12">
            <div class="small-box bg-warning" style="padding-top: 10px; padding-right: 30px;padding-bottom: 10px; padding-left: 10px;">
              <div class="inner">
                <p style="font-size:80px; text-align:center; margin-bottom:0px"><strong><?php foreach ($dashboard as $dt){
                  echo $dt['TOT_PEG_APOLLO'];
                }?></strong><sub><span class="badge float-center font-badge" style="font-size:20px;"><?php echo round($dt['PROSEN_TOT_PEG_APOLLO'], 2); ?> %</span></sub>
                <p style="font-size:19px; text-align:center"><strong>PENGGUNA APOLLO</strong></p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
            </div>
          </div> -->
          <!-- ./col -->
          <!-- <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php foreach ($dashboard as $dt){
                  echo $dt['ASN'];
                }?></h3>
                <p><strong>PEGAWAI ASN</strong></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div> -->
          <!-- ./col -->
          <!-- <div class="col-lg-2 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php foreach ($dashboard as $dt){
                  echo $dt['ASN_APOLLO'];
                }?><span class="badge float-right font-badge" style="color:black"><?php echo round($dt['PROSEN_ASN_APOLLO'], 2); ?> %</span></h3>
                <p><strong>ASN APOLLO</strong></p>
              </div>
              <div class="icon">
                <i class="ion ion-location"></i>
              </div>
            </div>
          </div> -->
          <!-- ./col -->
          <!-- <div class="col-lg-4 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php foreach ($dashboard as $dt){
                  echo $dt['NONASN'];
                }?></h3>
                <p><strong>PEGAWAI NON ASN</strong></p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
            </div>
          </div> -->
          <!-- ./col -->
          <!-- <div class="col-lg-2 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php foreach ($dashboard as $dt){
                  echo $dt['NONASN_APOLLO'];
                }?><span class="badge float-right font-badge" style="color:black"><?php echo round($dt['PROSEN_NONASN_APOLLO'], 2); ?> %</span></h3>
                <p><strong>NON ASN APOLLO</strong></p>
              </div>
              <div class="icon">
                <i class="ion ion-location"></i>
              </div>
            </div>
          </div> -->
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
          </section>
          <!-- /.Left col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 <a href="http://rstugurejo.jatengprov.go.id" target=_blank>IPDE RSUD Tugurejo</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
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
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- InputMask -->
<script src="<?= base_url('assets/plugins/moment/moment.min.js');?>"></script>
<script src="<?= base_url('assets/plugins/inputmask/jquery.inputmask.min.js');?>"></script>
<!-- date-range-picker -->
<script src="<?= base_url('assets/plugins/daterangepicker/daterangepicker.js');?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js');?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.js');?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/dist/js/pages/dashboard.js');?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js');?>"></script>

<script>
$(function () {
  //Timepicker
  $('#jammasuk').datetimepicker({
    format: 'LT'
  })
  $('#jampulang').datetimepicker({
    format: 'LT'
  })
})
</script>

</body>
</html>