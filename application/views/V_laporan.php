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
                <h1 class="card-title m-0" style="text-align: center;font-size: 34px;">Presensi Bulanan</h1>
              </div>
              <div class="card-body">
                <!-- Memunculkan tab absensi bulanan -->
                    <!-- /.card-header -->
                    <form class="wizard-form" id="formPeg" name="formPeg" >
                    <input type="hidden" value="<?php echo $this->session->userdata('nip');?>" name="nip" id="nip">
                    <div class="card-body">
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
                          <button type="button" class="btn btn-info float-right btncari">CARI</button>
                        </div>
                      </div>
                    </div>
                    </form>
                    <!-- /.card-body -->
                    
                    <!-- <div class="card-body" id="tabelabsensi"> -->
                      <!-- <h2 style="text-align:center">Riwayat Presensi</h2> -->
                    <div class="card-body tabelshow" id="absensi">
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered nowrap" id="tbriwayat">
                            <thead>
                                <tr class="table-primary">
                                    <th>TANGGAL</th>
                                    <th>MASUK</th>
                                    <th>PULANG</th>
                                    <th>DURASI (menit)</th>
                                    <th>TERLAMBAT (menit)</th>
                                    <th>PLG CEPAT (menit)</th>
                                    <th>LEMBUR (menit)</th>
                                    <th>KET</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>

<script>
     $(document).ready(function(){ 
        $('.select2').select2({
          theme: 'bootstrap4'
        });

        $('.btncari').on('click',function(){
          var tahun = $('#tahun').val();
          var nip = $('#nip').val();
          var bulan = $('#bulan').val().substr(0,2);
          var namabulan = $('#bulan').val().substr(3,4);
          var periode = tahun + '' + bulan;
          var recordsTotal;
          var tabel_riwayat = $('#tbriwayat').DataTable({
            "dom": '<"toolbar">frtip',
            // "destroy": true,
            // "bPaginate": true,
            // "bLengthChange": true,
            // "bFilter": true,
            // "bSort": false,
            // "bInfo": true,
            // "bDeferRender": true,
            // "fixedColumns": true,
            "responsive" : true,
            "autoWidth": false,
            "sAjaxSource": "<?php echo base_url()?>dashboard/get_riwayat_presensi_tabel/"+nip+"/"+periode,
            "aoColumns": [
                {
                    "mData": "tanggal",
                },
                {
                    "mData": "masuk",					
                },
                {
                    "mData": "pulang",					
                },
                {
                    "mData": "durasi",					
                },
                {
                    "mData": "terlambat",					
                },
                {
                    "mData": "pulangcepat",					
                },
                {
                    "mData": "lembur",					
                },
                {
                    "mData": "ket",					
                }
            ]
            // ,
            // "drawCallback" : function( settings ) {
            //     var api = this.api();
        
            //     $( api.column( 1 ).footer() ).html(
            //       "mData": "totdurasi"
            //         );
            //     };
         });
         
         $("div.toolbar").html('<table><tr><td><b>NIP</td><td> : </td><td>' + nip + '</td></tr><tr><td><b>Periode</td><td> : </td><td>' + namabulan + ' ' + tahun + '</td></tr></b></table>');
        });
    });
</script>

</body>
</html>
