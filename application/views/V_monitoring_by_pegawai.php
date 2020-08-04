  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0 text-dark"> Form <small>Deteksi Awal</small></h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">

		  <!-- /.col-md-12 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header" style="text-align: center;align-items: center;display: grid;font-family: fantasy;">
                <h1 class="card-title m-0" style="text-align: center;font-size: 34px;">Papan Monitoring Presensi</h1>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-lg-6 col-6">
                    <!-- small card -->
                    <div class="small-box bg-warning">
                      <div class="inner">
                        <h3>Absensi</h3>
                        <p>Bulanan</p>
                      </div>
                      <div class="icon">
                        <i class="far fa-address-card"></i>
                      </div>
                      <a href="#" class="btnbulanan small-box-footer">
                        Detail <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>
                  <!-- ./col -->
                  <div class="col-lg-6 col-6">
                    <!-- small card -->
                    <div class="small-box bg-success">
                      <div class="inner">
                        <h3>Cek</h3>

                        <p>Kehadiran</p>
                      </div>
                      <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                      </div>
                      <a href="#" class="btncek small-box-footer">
                        Detail <i class="fas fa-arrow-circle-right"></i>
                      </a>
                    </div>
                  </div>
                  <!-- ./col -->
                </div>
                <!-- Memunculkan tab absensi bulanan -->
                <div class="absensibulanan">
                  <div class="card card-outline card-warning">
                    <div class="card-header">
                      <h3 class="card-title">Absensi Bulanan</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                      </div>
                      <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <form class="wizard-form" id="formPeg" name="formPeg" >
                    <div class="card-body">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Pilih Pegawai</label>
                          <select class="form-control select2" id="pegawai" name="pegawai" style="width: 100%;">
                            <?php
                            $no_urut=0;
                              foreach ($pegawai as $dt){
                                $no_urut++;
                                echo "<option value='".$dt['NIP2']."-".$dt['NAMA']."'>".$dt['NIP2']." - ".$dt['NAMA']."</option>";
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Tahun</label>
                          <select class="form-control select2" id="tahun" name="tahun" style="width: 100%;">
                            <?php 
                              for($thn=2020; $thn<=date("Y"); $thn++){
                                echo "<option value=$thn>$thn</option>";
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label>Bulan</label>
                          <select class="form-control select2" id="bulan" name="bulan" style="width: 100%;">
                            <?php
                              $current = date('M');
                              for ($i = 1; $i <= 12; $i++)
                              {
                                $month = date("M",mktime(0,0,0,$i,1,date("Y")));
                                $bln = ($i < 10) ? '0'.$i : $i;
                                  echo '<option value="'.$bln.'-'.$month.'"';
                                  if ($i == date("n")) echo ' selected="selected"';
                                  echo '>'.$month.'</option>';
                              }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group btn-cari">
                          <button type="submit" class="btn btn-info float-right btncari">CARI</button>
                        </div>
                      </div>
                    </div>
                    </form>
                    <!-- /.card-body -->
                    
                    <!-- <div class="card-body" id="tabelabsensi"> -->
                      <!-- <h2 style="text-align:center">Riwayat Presensi</h2> -->
                    <div class="card-body tabelshow" id="absensi">
                      <!-- <table id="tabelabsensi"  class="table table-responsive table-bordered table-striped">  -->
                        <!-- <thead><tr><th>TANGGAL</th><th>JAM KERJA</th><th>KEGIATAN</th><th>MASUK</th><th>PULANG</th><th>TERLAMBAT (Menit)</th><th>CEPAT PLG (Menit)</th><th>TOTAL  (Menit)</th><th>LEMBUR (Menit)</th><th>KETERANGAN</th></tr></thead> -->
                        <!-- <tbody id="absensi">
                        </tbody> -->
                      <!-- </table>  -->
                        
                    </div>
                  </div>
                  
                </div>
                <!-- ./Memunculkan tab absensi bulanan -->

                <!-- Memunculkan tab cek kehadiran -->
                <div class="cekkehadiran">
                  <div class="card card-outline card-success">
                      <div class="card-header">
                        <h3 class="card-title">Cek Kehadiran</h3>

                        <div class="card-tools">
                          <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                          </button>
                        </div>
                        <!-- /.card-tools -->
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">
                        The body of the card
                      </div>
                      <!-- /.card-body -->
                  </div>
                </div>
                <!-- ./Memunculkan tab cek kehadiran -->
              </div>
              </div>
            </div>
          </div>
          <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <div class="text-center">
      <strong>Copyright &copy; 2020 <a href="https://rstugurejo.jatengprov.go.id">RSUD Tugurejo Provinsi Jawa Tengah</a>.</strong>
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?= base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/plugins/jquery-ui/jquery-ui.min.js');?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>

<!-- Select2 -->
<script src="<?= base_url('assets/plugins/select2/js/select2.full.min.js');?>"></script>

<!-- overlayScrollbars -->
<script src="<?= base_url('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js');?>"></script>

<!-- AdminLTE App -->
<script src="<?= base_url('assets/dist/js/adminlte.js');?>"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('assets/dist/js/demo.js');?>"></script>

<!-- DataTables -->
<!-- <script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script> -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
<script>
     $(document).ready(function(){        
        $('.absensibulanan').hide(); 
        $('.cekkehadiran').hide();     
        $('.tabelshow').hide();   

        $('.btnbulanan').click(function(){
            $('.absensibulanan').show();
            $('.cekkehadiran').hide(); 
            $('.tabelshow').hide();
        });
        $('.btncek').click(function(){
            $('.cekkehadiran').show();
            $('.absensibulanan').hide(); 
            $('.tabelshow').hide();
        });

        $('.select2').select2({
          theme: 'bootstrap4'
        });

        // $('.btncari').on('click', function(){
        //   var nip = $('#pegawai').val().substr(0,18);
        //   var nama = $('#pegawai').val().substr(21,20);
        //   var tahun = $('#tahun').val();
        //   var bulan = $('#bulan').val().substr(0,2);
        //   var namabulan = $('#bulan').val().substr(3,4);
        //   $.ajax({
        //       type: "POST",
        //       url: "<?php echo base_url('Dashboard/get_absen_by_bulannip')?>",
        //       data: {nip:nip,nama:nama,tahun:tahun,bulan:bulan,namabulan:namabulan}, 
        //       dataType: "json",
        //       success: function (response) {
        //         var len = response.data.length;
        //         if(response['code'] == '200'){
        //           for(var i = 0; i < len; i++){
        //             var tgl=response.data[i].TANGGAL.substr(8,2);
        //             var bln=response.data[i].TANGGAL.substr(5,2);
        //             var thn=response.data[i].TANGGAL.substr(0,4);
        //             var tglabsen = tgl + '-' + bln + '-' + thn;
        //             var checkin = response.data[0].CHECKIN;
        //           }
                  
        //           $('#tabelabsensi').DataTable({
        //             // for(var i = 0; i < len; i++){
        //             //   var tgl=response.data[i].TANGGAL.substr(8,2);
        //             //   var bln=response.data[i].TANGGAL.substr(5,2);
        //             //   var thn=response.data[i].TANGGAL.substr(0,4);
                      
        //             // }
        //             "responsive": true,
        //             "autoWidth": false,
        //             // "response" : "data",
        //             "destroy": true,
        //             "bPaginate": false,
        //             "bLengthChange": false,
        //             "bFilter": false,
        //             "bSort": false,
        //             "bInfo": false,
        //             "bDeferRender": false,
        //             "fixedColumns": true,
        //             "aoColumns":[
        //               {'mData': 'TANGGAL'},
        //               {'mData': 'CHECKIN'},
        //             ]
        //           })
        //         }else{
        //           alert('Data tidak ditemukan');
        //         }
        //       }
        //   });
        //   return false;
        // });

        $('.btncari').on('click',function(){
          var nip = $('#pegawai').val().substr(0,18);
          var nama = $('#pegawai').val().substr(21,25);
          var tahun = $('#tahun').val();
          var bulan = $('#bulan').val().substr(0,2);
          var namabulan = $('#bulan').val().substr(3,4);
          $.ajax({
            type: "POST",
            url: "<?php echo base_url('Dashboard/get_absen_by_bulannip')?>",
            data: {nip:nip,nama:nama,tahun:tahun,bulan:bulan,namabulan:namabulan}, 
            dataType: "json",
            success: function (response) {
              
              if(response['code'] == '200'){
                // $("#tabelabsensi").DataTable({
                //   "responsive": true,
                //   "autoWidth": false,
                // });
                $('.tabelshow').show();
                $('#absensi').show();
                var len           = response.data.length;
                var totterlambat  = (response.data[0].TOTTERLAMBAT/60).toFixed(2);
                var totplgcpt     = (response.data[0].TOTPULANGCEPAT/60).toFixed(2);
                var totdurasi     = (response.data[0].TOTDURASI/60).toFixed(2);
                var totlembur     = (response.data[0].TOTLEMBUR/60).toFixed(2);
                var html = '';
                if(len > 0){
                  html += "<h2 style='text-align:center;'>Laporan Detail Harian</h2><hr>";
                  html += "<table><tr><td><h4>NIP / NIK</td><td><h4>:</td><td><h4>" + nip + "</h4></td></tr>";
                  html += "<tr><td><h4>NAMA</td><td><h4>:</td><td><h4>" + nama + "</h4></td></tr>";
                  html += "<tr><td><h4>PERIODE WAKTU</td><td><h4>:</td><td><h4>" + namabulan + " " + tahun + "</h4></td></tr></table>";
                  html += "<table id='tabelabsensi' class='table table-responsive table-bordered table-striped'>";
                  html += "<thead><tr><th>TANGGAL</th><th>JAM KERJA</th><th>KEGIATAN</th><th>MASUK</th><th>PULANG</th><th>TERLAMBAT (Menit)</th><th>CEPAT PLG (Menit)</th><th>TOTAL  (Menit)</th><th>LEMBUR (Menit)</th><th>KETERANGAN</th></tr></thead>";
                  html += "<tbody>";
                  for(var i = 0; i < len; i++){
                    var tgl=response.data[i].TANGGAL.substr(8,2);
                    var bln=response.data[i].TANGGAL.substr(5,2);
                    var thn=response.data[i].TANGGAL.substr(0,4);
                    var tglabsen = tgl + '-' + bln + '-' + thn;
                    //masuk
                    if(response.data[i].MASUK==null){
                      var masuk = '-';
                    }else{
                      var masuk = response.data[i].MASUK;
                    }
                    //pulang
                    if(response.data[i].PULANG==null){
                      var pulang = '-';
                    }else{
                      var pulang = response.data[i].PULANG;
                    }
                    //terlambat
                    if(response.data[i].TERLAMBAT==null){
                      var terlambat = '-';
                    }else{
                      var terlambat = response.data[i].TERLAMBAT;
                    }
                    //pulangcepat
                    if(response.data[i].PULANGCEPAT==null){
                      var plgcepat = '-';
                    }else{
                      var plgcepat = response.data[i].PULANGCEPAT;
                    }
                    //durasi
                    if(response.data[i].DURASI==null){
                      var durasi = '-';
                    }else{
                      var durasi = response.data[i].DURASI;
                    }
                    //lembur
                    if(response.data[i].LEMBUR==null){
                      var lembur = '-';
                    }else{
                      var lembur = response.data[i].LEMBUR;
                    }
                    html += "<tr><td>" + tglabsen + "</td><td>"+ response.data[i].CHECKIN + "-" + response.data[i].CHECKOUT + "</td><td>"+response.data[i].KEGIATAN + "</td><td>"+ masuk + "</td><td>"+ pulang + "</td><td>"+ terlambat + "</td><td>"+ plgcepat + "</td><td>"+ durasi + "</td><td>"+ lembur + "</td><td>"+response.data[i].KET + "</td></tr>";
                  }
                  html += "</tbody></table>";
                  html += "<table><tr><td><h4>JML TERLAMBAT</td><td><h4>:</td><td><h4>" + totterlambat + "</h4></td><td> &nbsp &nbsp &nbsp </td><td><h4>JML JAM KERJA</td><td><h4>:</td><td><h4>" + totdurasi + "</h4></td></tr>";
                  html += "<tr><td><h4>JML PLG CEPAT</td><td><h4>:</td><td><h4>" + totplgcpt + "</h4></td><td> &nbsp &nbsp &nbsp </td><td><h4>JML LEMBUR</td><td><h4>:</td><td><h4>" + totlembur + "</h4></td></tr>";
                  // html += "<tr><td><h4>JML JAM KERJA</td><td><h4>:</td><td><h4>" + totdurasi + "</h4></td></tr>";
                  // html += "<tr><td><h4>JML LEMBUR</td><td><h4>:</td><td><h4>" + totlembur + "</h4></td></tr></table>";
                  if(html != ""){
                      $("#absensi").html(html).removeClass("hidden");
                  }
                }
              }else{
                alert('Data tidak ditemukan');
              }
            }
          });
          return false;
        });

    });
</script>

</body>
</html>
