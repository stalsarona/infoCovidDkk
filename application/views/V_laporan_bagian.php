
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">LAPORAN PRESENSI PER BAGIAN PER BULAN</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- Left col -->
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Laporan Presensi Per Bagian (format Excel)</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <!-- <form class="wizard-form" id="formPeg" name="formPeg" action="" > -->
                <?php echo form_open('Dashboard/buatExcel') ?>
                  <div class="card-body">
                    <div class="col-md-6">
                      <div class="form-group">
                        <label>Bagian</label>
                        <select class="form-control select2" id="bagian" name="bagian" style="width: 100%;">
                          <?php
                            $no_urut=0;
                            foreach ($bagian as $dt){
                              $no_urut++;
                              echo "<option value='".$dt['KODEBAGIAN']."-".$dt['NAMABAGIAN']."'>".$dt['KODEBAGIAN']." - ".$dt['NAMABAGIAN']."</option>";
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
                        <button type="submit" class="btn btn-info float-right btncari">LAPORAN EXCEL</button>
                      </div>
                    </div>
                  </div>
                <!-- </form> -->
                <?php echo form_close() ?>
                <br>
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- right col -->
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

<!-- jquery-validation -->
<script src="<?= base_url('assets/plugins/jquery-validation/jquery.validate.min.js');?>"></script>
<script src="<?= base_url('assets/plugins/jquery-validation/additional-methods.min.js');?>"></script>

<!-- DataTables -->
<script src="<?= base_url('assets/plugins/datatables/jquery.dataTables.min.js');?>"></script>
<script src="<?= base_url('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js');?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js');?>"></script>
<script src="<?= base_url('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js');?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
  $(document).ready(function(){
    $('.select2').select2({
          theme: 'bootstrap4'
    });

    $("#tabelMenu").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('.formTambah').hide();        

    $('.btntambah').click(function(){
        $('.formTambah').show();
    });

    // $('.btncari').on('click',function(){
    //   var kdbag = $('#bagian').val().substr(0,4);
    //   var bag = $('#bagian').val().substr(5,30);
    //   var tahun = $('#tahun').val();
    //   var bulan = $('#bulan').val().substr(0,2);
    //   var namabulan = $('#bulan').val().substr(3,4);
    //   $.ajax({
    //     type: "POST",
    //     url: "<?php echo base_url('Dashboard/buatExcel')?>",
    //     data: {kdbag:kdbag,bag:bag,tahun:tahun,bulan:bulan,namabulan:namabulan}, 
    //     dataType: "json",
    //     success: function (response) {
          
    //       if(response['code'] == '200'){
    //         //alert('Data ditemukan');
    //       }else{
    //         //alert('Data tidak ditemukan');
    //       }
    //     }
    //   });
    //   return false;
    // });

  });
</script>
</body>
</html>