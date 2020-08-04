
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
                <h3 class="card-title">Konfigurasi Menu</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form class="wizard-form" id="formPeg" name="formPeg" >
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
                </form>
                <br>
                <!-- <table class="table table-bordered table-striped" id="tabelMenu">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>JUDUL MENU</th>
                      <th>CONTROLLER</th>
                      <th>URL</th>
                      <th>ICON</th>
                      <th>STATUS</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <form >
                    <?php $no_urut = 0;
                      //for ($a = 0; $a < count($data); $a++) {
                        foreach ($menu as $dt){
                          if($dt['IS_ACTIVE']==1){
                            $aktif='AKTIF';
                          }else{
                            $aktif='TIDAK AKTIF';
                          }
                        $no_urut++;
                        echo "
                        <tr>
                          <td>".$no_urut."</td>
                          <td>".$dt['TITLE']."</td>
                          <td>".$dt['CONTROLLER']."</td>
                          <td>".$dt['URL']."</td>
                          <td>".$dt['ICON']."</td>
                          <td>".$aktif."</td>
                          <td><button  data-id='" . $dt['ID'] . "' data-toggle='modal' data-target='#ubah-data' class='btn btn-warning btnedit'>Ubah</button>
                          </td>
                          </tr>
                        ";
                      }
                    ?>
                    </form>
                  </tbody>
                </table> -->
              </div>
            </div>
            <!-- /.card -->

            <!-- /.card -->
            <div class="card card-default formTambah">
              <div class="card-header">
                <h3 class="card-title">Form Tambah Menu</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <form name="FormSimpanMenu" role="form" id="FormSimpanMenu">
                <div class="card-body">
                  <div class="row">
                    <input type="hidden" class="form-control" name="private_token" id="private_token" value="<?php echo $token; ?>">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>JUDUL MENU</label>
                        <input type="text" class="form-control" name="judul" id="judul" placeholder="Monitoring Presensi, Konfigurasi Menu, dll" required autofocus>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>CONTROLLER</label>
                        <input type="text" class="form-control" name="controller" id="controller" placeholder="Dashboard, Menu, User, dll" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>URL</label>
                        <input type="text" class="form-control" name="url" id="url" placeholder="Nama Functionnya" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <label>ICON</label>
                        <input type="text" class="form-control" name="icon" id="icon" placeholder="fa-calendar, fa-user, dll (Lihat di font awesome)" required>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-6">
                            <label>STATUS MENU</label>
                          </div>
                        </div>
                          <div class="row">
                            <div class="col-6">
                              <select class="form-control status" name="status" id="status" style="width: 100%;">
                                <option value='1'>AKTIF</option>                           
                                <option value='0'>TIDAK AKTIF</option>                           
                              </select>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <!-- /.row -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer btnsimpan">
                  <button type="submit" id="btnsimpan" class="btn btn-info float-right ">SIMPAN</button>
                  <button type="reset" class="btn btn-default">KEMBALI</button>
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!--#####Modal Ubah Data Mulai#####-->
    <div id="btnedit" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1" style="padding-top: 10px; padding-right: 50px; padding-bottom: 10px; padding-left: 50px;">
                <h4 class="modal-title">Ubah Data Jadwal Shift</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body" style="padding-top: 15px; padding-right: 30px; padding-bottom: 0px; padding-left: 30px;">
                <form method="POST" name="editForm" id="editForm">
                  <input type="hidden" class="form-control" name="private_token" id="private_token" value="<?php echo $token; ?>">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="login2 pull-left pull-left-pro">JUDUL MENU</label>
                                <input type="text" name="judulubah" class="form-control" id="judulubah" autocomplete="off" required readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="login2 pull-left pull-left-pro">CONTROLLER</label>
                                <input type="text" name="contubah" id="contubah" class="form-control" autocomplete="off" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                              <label class="login2 pull-left pull-left-pro">URL</label>
                              <input type="text" name="urlubah" id="urlubah" class="form-control" autocomplete="off" required />
                            </div>
                            <div class="col-lg-6">
                                <label class="login2 pull-left pull-left-pro">ICON</label>
                                <input type="text" name="iconubah" id="iconubah" class="form-control" autocomplete="off" required />
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer" style="padding-left:0px; padding-right:0px; ">
                        <button class="btn btn-large btn-danger" data-dismiss="modal" type="button">Kembali</button>
                        <button class="btn btn-large btn-primary" type="submit" id="btn_simpanubah">Simpan Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!--#####Modal Ubah Data Berakhir#####-->
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

    $('.btncari').on('click',function(){
      var kdbag = $('#bagian').val().substr(0,4);
      var bag = $('#bagian').val().substr(5,30);
      var tahun = $('#tahun').val();
      var bulan = $('#bulan').val().substr(0,2);
      var namabulan = $('#bulan').val().substr(3,4);
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Dashboard/buatExcel')?>",
        data: {kdbag:kdbag,bag:bag,tahun:tahun,bulan:bulan,namabulan:namabulan}, 
        dataType: "json",
        success: function (response) {
          
          if(response['code'] == '200'){
            //alert('Data ditemukan');
          }else{
            //alert('Data tidak ditemukan');
          }
        }
      });
      return false;
    });

  });
</script>
</body>
</html>