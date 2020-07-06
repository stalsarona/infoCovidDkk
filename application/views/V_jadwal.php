
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Jadwal Shift Pegawai</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard v1</li>
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
                <h3 class="card-title">Jadwal Shift Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="col-md-2">
                  <button type="button" class="btn btn-block btn-info btntambah">Tambah Jadwal</button>
                </div>
                <br>
                <table class="table table-bordered table-striped" id="tabelJadwal">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>ID WAKTU KERJA</th>
                      <th>KET WAKTU KERJA</th>
                      <th>JAM MASUK</th>
                      <th>JAM PULANG</th>
                      <th>DURASI</th>
                      <th>STATUS</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <form >
                    <?php $no_urut = 0;
                      //for ($a = 0; $a < count($data); $a++) {
                        foreach ($data as $dt){
                        $no_urut++;
                        echo "
                        <tr>
                          <td>".$no_urut."</td>
                          <td><input type='hidden' name='id' id='id' value='".$dt['IDWKTKERJA']."'>".$dt['IDWKTKERJA']."</td>
                          <td>".$dt['KETJNSWKTKERJA']."</td>
                          <td>".substr($dt['CHECKIN'],11,8)."</td>
                          <td>".substr($dt['CHECKOUT'],11,8)."</td>
                          <td>".$dt['DURASI']."</td>
                          <td>".$dt['STATUS']."</td>
                          <td><button  data-id_waktu='" . $dt['IDWKTKERJA'] . "' data-toggle='modal' data-target='#ubah-data' class='btn btn-warning btnedit'>Ubah</button>
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
                <h3 class="card-title">Form Tambah Jadwal</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
              <form name="FormSimpanJadwal" role="form" id="FormSimpanJadwal">
                <div class="card-body">
                  <div class="row">
                  <input type="hidden" class="form-control" placeholder="Username" name="private_token" id="private_token" value="<?php echo $token; ?>">
                    <div class="col-sm-6">
                      <!-- text input -->
                      <div class="form-group">
                        <label>ID WAKTU KERJA</label>
                        <input type="text" class="form-control" name="idwktkerja" id="idwktkerja" placeholder="REG, REGP, REGM, dll" maxlength="5" required autofocus>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-6">
                            <label>JAM MASUK</label>
                          </div>
                          <div class="col-6">
                            <label>MENIT MASUK</label>
                          </div>
                        </div>
                          <div class="row">
                            <div class="col-6">
                              <select class="form-control jammasuk" name="jammasuk" id="jammasuk" style="width: 100%; ">
                                <?php for($a=0; $a<=23; $a++){
                                  echo "<option value='".sprintf("%02d", $a)."'>".sprintf("%02d", $a)."</option>";
                                }?>                            
                              </select>
                            </div>
                            <div class="col-6">
                              <select class="form-control menitmasuk" name="menitmasuk" id="menitmasuk" style="width: 100%;">
                                <?php for($a=0; $a<=59; $a++){
                                  echo "<option value='".sprintf("%02d", $a)."'>".sprintf("%02d", $a)."</option>";
                                }?>                            
                              </select>
                            </div>
                          </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <!-- textarea -->
                      <div class="form-group">
                        <label>KETERANGAN WAKTU KERJA</label>
                        <textarea class="form-control" rows="3" name="ketwktkerja" id="ketwktkerja" placeholder="Reguler Pagi, Reguler Sabtu, dll" required></textarea>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="form-group">
                        <div class="row">
                          <div class="col-6">
                            <label>JAM PULANG</label>
                          </div>
                          <div class="col-6">
                            <label>MENIT PULANG</label>
                          </div>
                        </div>
                          <div class="row">
                            <div class="col-6">
                              <select class="form-control jampulang" name="jampulang" id="jampulang" style="width: 100%;">
                                <?php for($a=0; $a<=23; $a++){
                                  echo "<option value='".sprintf("%02d", $a)."'>".sprintf("%02d", $a)."</option>";
                                }?>                            
                              </select>
                            </div>
                            <div class="col-6">
                              <select class="form-control menitpulang" name="menitpulang" id="menitpulang" style="width: 100%;">
                                <?php for($a=0; $a<=59; $a++){
                                  echo "<option value='".sprintf("%02d", $a)."'>".sprintf("%02d", $a)."</option>";
                                }?>                            
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
                  <input type="hidden" class="form-control" placeholder="Username" name="private_token" id="private_token" value="<?php echo $token; ?>">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="login2 pull-left pull-left-pro">ID Waktu Kerja</label>
                                <input type="text" name="id_waktu" class="form-control" id="id_waktu" autocomplete="off" required readonly/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-12">
                                <label class="login2 pull-left pull-left-pro">Jenis Waktu Kerja</label>
                                <input type="text" name="jenis" id="jenis" class="form-control" autocomplete="off" required />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="login2 pull-left pull-left-pro">Jam Masuk</label>
                                <select class="form-control jammasukubah" name="jammasukubah" id="jammasukubah" style="width: 100%; ">
                                     
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="login2 pull-left pull-left-pro">Menit Masuk</label>
                                <select class="form-control menitmasukubah" name="menitmasukubah" id="menitmasukubah" style="width: 100%; ">
                                  
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label class="login2 pull-left pull-left-pro">Jam Keluar</label>
                                <select class="form-control jamkeluarubah" name="jamkeluarubah" id="jamkeluarubah" style="width: 100%; ">
                                  
                                </select>
                            </div>
                            <div class="col-lg-6">
                                <label class="login2 pull-left pull-left-pro">Menit Keluar</label>
                                <select class="form-control menitkeluarubah" name="menitkeluarubah" id="menitkeluarubah" style="width: 100%; ">
                                  
                                </select>
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
<script>
  $(document).ready(function(){
    $('.jammasuk').select2({
      theme: 'bootstrap4'
    })
    $('.menitmasuk').select2({
      theme: 'bootstrap4'
    })
    $('.jampulang').select2({
      theme: 'bootstrap4'
    })
    $('.menitpulang').select2({
      theme: 'bootstrap4'
    })
    $('.jammasukubah').select2({
      theme: 'bootstrap4'
    })
    $('.menitmasukubah').select2({
      theme: 'bootstrap4'
    })
    $('.jamkeluarubah').select2({
      theme: 'bootstrap4'
    })
    $('.menitkeluarubah').select2({
      theme: 'bootstrap4'
    })
    $("#tabelJadwal").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('.formTambah').hide();        

    $('.btntambah').click(function(){
        $('.formTambah').show();
    });

    $('#btnsimpan').on('click',function(){
      var id = $('#idwktkerja').val();
      if(id == ""){
        swal('ID Waktu Kerja','harus di isi','info');
      } else {
        var obj = document.forms.namedItem("FormSimpanJadwal")
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('Dashboard/simpan_jadwal')?>",
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
              var exp = '<?php echo base_url('Dashboard/error')?>';
              window.location.replace(exp);
            } else if(response[0]['CODE'] == '2627'){
              alert("ID Waktu Kerja yang Anda masukkan sudah Ada, silahkan masukkan ID yang lain.");
              var orpeg = '<?php echo base_url('Dashboard/view_jadwal')?>';
              window.location.replace(orpeg);
            }else if(response[0]['CODE'] == '200'){     
              alert("Berhasil Simpan");
              var orpeg = '<?php echo base_url('Dashboard/view_jadwal')?>';
              window.location.replace(orpeg);
            }
          }
        });
        return false;
      }
    });

    $('#btn_simpanubah').on('click',function(){
      var obj = document.forms.namedItem("editForm")
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Dashboard/ubah_jadwal')?>",
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
            var exp = '<?php echo base_url('Dashboard/error')?>';
            window.location.replace(exp);
          } else if(response[0]['CODE'] == '2627'){
            alert("ID Waktu Kerja yang Anda masukkan sudah Ada, silahkan masukkan ID yang lain.");
            var orpeg = '<?php echo base_url('Dashboard/view_jadwal')?>';
            window.location.replace(orpeg);
          }else if(response[0]['CODE'] == '200'){     
            //alert("Berhasil Simpan");
            var orpeg = '<?php echo base_url('Dashboard/view_jadwal')?>';
            // let timerInterval
            // Swal.fire({
            //   title: 'Berhasil Simpan',
            //   html: '',
            //   timer: 500,
            //   timerProgressBar: true,
            //   onBeforeOpen: () => {
            //     Swal.showLoading()
            //     timerInterval = setInterval(() => {
            //       const content = Swal.getContent()
            //       if (content) {
            //         const b = content.querySelector('b')
            //         if (b) {
            //           b.textContent = Swal.getTimerLeft()
            //         }
            //       }
            //     }, 100)
            //   },
            //   onClose: () => {
            //     clearInterval(timerInterval)
            //   }
            // }).then((result) => {
            //   /* Read more about handling dismissals below */
            //   if (result.dismiss === Swal.DismissReason.timer) {
            //     console.log('I was closed by the timer')
            //   }
            // })
            window.location.replace(orpeg);
          }
        }
      });
      return false;
    });
    
    $('.btnedit').on('click',function(){
      var id =  $(this).data('id_waktu');
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Dashboard/get_jadwal_by_id')?>",
        data: {id:id}, 
        dataType: "json",
        success: function (response) {
          $('#btnedit').modal('show');
          $('#id_waktu').val(response['IDWKTKERJA'])
          $('#jenis').val(response['KETJNSWKTKERJA'])

          var html = '';
          var i;
          for (i = 0; i <= 23; i++) {
            if(i== response['CHECKIN'].substr(11,2)){
              html += '<option value=' + response['CHECKIN'].substr(11,2) + ' selected>' +  i  + '</option>';
            }else{
              html += '<option value=' + i + ' >' +  i  + '</option>';
            }
          }
          $("#jammasukubah").html(html);
          
          var html = '';
          var i;
          for (i = 0; i <= 59; i++) {
            if(i== response['CHECKIN'].substr(14,2)){
              html += '<option value=' + response['CHECKIN'].substr(14,2) + ' selected>' +  i  + '</option>';
            }else{
              html += '<option value=' + i + ' >' +  i  + '</option>';
            }
          }
          $("#menitmasukubah").html(html);

          var html = '';
          var i;
          for (i = 0; i <= 23; i++) {
            if(i== response['CHECKOUT'].substr(11,2)){
              html += '<option value=' + response['CHECKOUT'].substr(11,2) + ' selected>' +  i  + '</option>';
            }else{
              html += '<option value=' + i + ' >' +  i  + '</option>';
            }
          }
          $("#jamkeluarubah").html(html);

          var html = '';
          var i;
          for (i = 0; i <= 59; i++) {
            if(i== response['CHECKOUT'].substr(14,2)){
              html += '<option value=' + response['CHECKOUT'].substr(14,2) + ' selected>' +  i  + '</option>';
            }else{
              html += '<option value=' + i + ' >' +  i  + '</option>';
            }
          }
          $("#menitkeluarubah").html(html);
        }
      })
    });

  });
</script>
</body>
</html>