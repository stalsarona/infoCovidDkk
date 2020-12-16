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
              <li class="breadcrumb-item"><a href="#">Home <?php echo $data;?></a></li>
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
                <tr><td>Yang Belum Apollo</td><td>:</td><td><a href="javascript:void(0)"><span class="badge badge-danger rincianNonApollo" style="font-color:white; font-weight:bold; font-size:15px" data-toggle="modal" data-target="#datarincian" data-status="ASN"><i class="fas fa-exclamation-circle text-sm"></i><?php foreach ($dashboard as $dt){echo ' '.$dt['ASN_BLM_APOLLO'];}?></span></a></td></tr>
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
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <div class="modal fade" id="dataBelumApollo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <?php echo form_open('Dashboard/simpanExcelDaftarPegawai') ?>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" >Pegawai yang Belum Apollo</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h5 id="status" name="status"></h5>
          <div class="table-wrapper-scroll-y my-custom-scrollbar">
            <table class="table table-bordered table-responsive" id="tabelNonApollo">
            </table>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary btnsimpan">Simpan Excel</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        </div>
      </div>
    </div>
    <?php echo form_close() ?>
  </div>
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
<!-- Toastr -->
<script src="<?php echo base_url('assets/plugins/toastr/toastr.min.js');?>"></script>
<script>
 $(document).ready(function(){
    toastr.info('Versi Apollo : <?php foreach ($dashboard as $dt){
                  echo ' '.$dt['APOLLO'];
                }?>');
    $('.rincianNonApollo').on('click',function(){
      var status =  $(this).data('status');
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Dashboard/dashboard_peg_non_apollo')?>",
          data: {status:status}, 
          dataType: "json",
          success: function (response) {
            $('#dataBelumApollo').modal('show');
            $('#tabelNonApollo').show();
            
            var txt = '';
            txt += "<input type='hidden' id='status' value='"+ status +"' name='status'>";
            $("#status").html(txt);
            var len = response.length;
            var html = '';
            html += "<thead><tr><th>No</th><th>NIP</th><th>Pegawai</th></tr></thead>";
            if(len > 0){
              html += "<tbody>";
              for(var i = 0; i < len; i++){
                html += "<tr><td>" + (i+1) + "</td><td>" + response[i].NIP2 + "</td><td>" + response[i].NAMA + "</td>";
                html += "</tr>";
                html += "</tbody>";
                
                if(html != ""){
                    $("#tabelNonApollo").html(html).removeClass("hidden");
                }
              }
            }
            
          }
        })
    });
    $('.btnsimpan').on('click',function(){
      $('#dataBelumApollo').modal('hide');
    });
    $('#jammasuk').datetimepicker({
      format: 'LT'
    })
    $('#jampulang').datetimepicker({
      format: 'LT'
    })
 });
</script>
</body>
</html>