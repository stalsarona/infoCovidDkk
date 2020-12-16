
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">KONFIGURASI MENU</h1>
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
                <div class="col-md-2">
                  <button type="button" class="btn btn-block btn-info btntambah">Tambah Menu</button>
                </div>
                <br>
                <table class="table table-bordered table-striped" id="tabelMenu">
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
                </table>
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
    <div id="modalubahdata" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal bg-color-1" style="padding-top: 10px; padding-right: 50px; padding-bottom: 10px; padding-left: 50px;">
                <h4 class="modal-title">Ubah Konfigurasi Menu</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body" style="padding-top: 15px; padding-right: 30px; padding-bottom: 0px; padding-left: 30px;">
                <form method="POST" name="editForm" id="editForm">
                  <input type="hidden" class="form-control" name="tokenubah" id="tokenubah" value="<?php echo $token; ?>">
                    <div class="form-group">
                    <input type="hidden" name="id" class="form-control" id="id" autocomplete="off" required readonly/>
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="login2 pull-left pull-left-pro">JUDUL MENU</label>
                                <input type="text" name="judulubah" class="form-control" id="judulubah" autocomplete="off" required/>
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
    $('.status').select2({
      theme: 'bootstrap4'
    })
    $('.jammasukubah').select2({
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

    $('#btnsimpan').on('click',function(){
      var obj = document.forms.namedItem("FormSimpanMenu")
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Menu/simpan_menu')?>",
        processData:false,
        contentType:false,
        cache:false,
        async:true,
        crossOrigin : true,
        data: new FormData(obj), 
        dataType: "json",
        beforeSend: function() {
          $('.overlay').css('display', 'block');
        },
        success: function (response) {
          if(response[0]['CODE'] == '515'){
            swal("Nilai NULL tidak diperbolehkan ",'','info');
            var exp = '<?php echo base_url('Menu')?>';
            window.location.replace(exp);
          } else if(response[0]['CODE'] == '2627'){
            swal("ID Sudah ada ",'','info');
            var orpeg = '<?php echo base_url('Menu')?>';
            window.location.replace(orpeg);
          }else if(response[0]['CODE'] == '200'){     
            swal("Berhasil Simpan",'','info');
            var orpeg = '<?php echo base_url('Menu')?>';
            window.location.replace(orpeg);
          }
        }
      });
      return false;
    });

    $('#btn_simpanubah').on('click',function(){
      var obj = document.forms.namedItem("editForm")
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Menu/ubah_menu')?>",
        processData:false,
        contentType:false,
        cache:false,
        async:true,
        crossOrigin : true,
        data: new FormData(obj), 
        dataType: "json",
        beforeSend: function() {
          $('.overlay').css('display', 'block');
        },
        success: function (response) {
          if(response[0]['CODE'] == '515'){
            alert("Nilai NULL tidak diperbolehkan");
            var exp = '<?php echo base_url('Menu/error')?>';
            window.location.replace(exp);
          } else if(response[0]['CODE'] == '2627'){
            alert("ID Waktu Kerja yang Anda masukkan sudah Ada, silahkan masukkan ID yang lain.");
            var orpeg = '<?php echo base_url('Menu/view_jadwal')?>';
            window.location.replace(orpeg);
          }else if(response[0]['CODE'] == '200'){     
            //alert("Berhasil Simpan");
            var orpeg = '<?php echo base_url('Menu/view_jadwal')?>';s
            window.location.replace(orpeg);
          }
        }
      });
      return false;
    });
    
    $('#tabelMenu').on('click', '.btnedit', function(){
      var id =  $(this).data('id');
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Menu/get_menu_by_id')?>",
        data: {id:id}, 
        dataType: "json",
        success: function (response) {
          $('#modalubahdata').modal('show');
          $('#id').val(response[0]['ID'])
          $('#judulubah').val(response[0]['TITLE'])
          $('#contubah').val(response[0]['CONTROLLER'])
          $('#urlubah').val(response[0]['URL'])
          $('#iconubah').val(response[0]['ICON'])
        }
      })
    });

    
  });
</script>
</body>
</html>