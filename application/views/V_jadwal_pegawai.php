
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">SET JADWAL PEGAWAI</h1>
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
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Pembuatan Jadwal Pegawai Bulanan (Non Shift)</h3>
              </div>
              <div class="card-body">
                <!-- Minimal style -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Tahun</label>
                      <select class="form-control select2" id="tahun" name="tahun" style="width: 100%;">
                        <?php 
                          $thnskg=date("Y");
                          $thndpn=$thnskg+1;
                          for($thn=$thnskg; $thn<=$thndpn; $thn++){
                            echo "<option value=$thn>$thn</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                    <label>Pilih Bulan</label><br>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Jan"  value="1">
                        <label for="Jan">
                          Jan &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Feb"  value="2">
                        <label for="Feb">
                          Feb &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Mar" value="3">
                        <label for="Mar">
                          Mar &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Apr" value="4">
                        <label for="Apr">
                          Apr &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Mei" value="5">
                        <label for="Mei">
                          Mei &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Jun" value="6">
                        <label for="Jun">
                          Jun 
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                    <label>Pilih Hari</label><br>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Sen"  value="1">
                        <label for="Sen">
                          Sen &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Sel"  value="2">
                        <label for="Sel">
                          Sel &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Rab" value="3">
                        <label for="Rab">
                          Rab &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Kam" value="4">
                        <label for="Kam">
                          Kam &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Jum" value="5">
                        <label for="Jum">
                          Jum &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Sab" value="6">
                        <label for="Sab">
                          Sab &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Ming" value="7">
                        <label for="Ming">
                          Ming 
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Jul"  value="7">
                        <label for="Jul">
                          Jul &nbsp &nbsp  
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Agt"  value="8">
                        <label for="Agt">
                          Agt &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Sep" value="9">
                        <label for="Sep">
                          Sep &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Okt" value="10">
                        <label for="Okt">
                          Okt &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Nov" value="11">
                        <label for="Nov">
                          Nov &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Des" value="12">
                        <label for="Des">
                          Des 
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Pilih Waktu Kerja</label>
                      <select class="form-control select2" id="wktkerja" name="wktkerja" style="width: 100%;">
                        <?php
                        $no_urut=0;
                          foreach ($jadwal as $dt){
                            $no_urut++;
                            echo "<option value='".$dt['IDWKTKERJA']."'>".$dt['KETJNSWKTKERJA']." (".substr($dt['CHECKIN'],11,8)." - ".substr($dt['CHECKOUT'],11,8).")</option>";
                          }
                        ?>
                      </select>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Pilih Unit/Bagian Kerja</label>
                        <select class="form-control select2bs4" multiple="multiple" data-placeholder="Pilih Unit/Bagian Kerja" name="bagian[]" id="bagian" style="width: 100%;">
                          <?php
                            $no_urut=0;
                            foreach ($bagian as $dt){
                              $no_urut++;
                              echo "<option value='".$dt['KODEBAGIAN']."'>".$dt['NAMABAGIAN']."</option>";
                            }
                          ?>
                        </select>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                Many more skins available.
              </div>
            </div>
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
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
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
    
    $("#tabelakses").on('click','option',function(){
      // var id =  $(this).data('id_role');
      var checked = $(this).attr('checked');
      // if(checked){
      //if($(this).is(':checked')){
        var menuId = $(this).data('menu');
        var token  = $('#private_token').val();
        var roleId = $(this).data('role');
        
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Menu/ubah_akses_menu')?>",
          data: {
            menuId : menuId,
            roleId : roleId,
            token  : token
          }, 
          dataType: "json",
          success: function (response) {
            if(response[0]['CODE'] == '515'){
              alert("Nilai NULL tidak diperbolehkan");
              var exp = '<?php echo base_url('Menu/akses_menu')?>';
              window.location.replace(exp);
            } else if(response[0]['CODE'] == '2627'){
              alert("Data Sudah Ada");
              var orpeg = '<?php echo base_url('Menu/akses_menu')?>';
              window.location.replace(orpeg);
            }else if(response[0]['CODE'] == '200'){     
              var orpeg = '<?php echo base_url('Menu/akses_menu')?>';
              swal("Berhasil Ubah Akses",'','info');
              window.location.replace(orpeg);
            }
          }
        });
        return false;
      //}
    });

  });
</script>
</body>
</html>