
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">SET JADWAL PEGAWAI</h1>
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
                <h3 class="card-title">Pembuatan Jadwal Pegawai Bulanan (Shift)</h3>
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
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Pilih Unit/Bagian Kerja</label>
                        <select class="form-control select2bs4" data-placeholder="Pilih Unit/Bagian Kerja" name="bagian" id="bagian" style="width: 100%;" required>
                          <?php
                            $no_urut=0;
                            foreach ($bagian as $dt){
                              $no_urut++;
                              echo "<option value='".$dt['KODEBAGIAN']."'>".$dt['KODEBAGIAN']." - ".$dt['NAMABAGIAN']."</option>";
                            }
                          ?>
                        </select>
                        <input type="hidden" name="hidden_bagian" id="hidden_bagian">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group btn-cari">
                      <button type="button" class="btn btn-success float-right btnproses">PROSES JADWAL</button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>List Pegawai yang diproses</label>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar-shift">
                      <table class="table table-striped table-bordered fulltable fulltable-editable nowrap" id="tbpegawai">
                      </table>
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
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>

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

    load_data();
    load_waktukerja();
    function load_waktukerja(){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Dashboard/get_waktu_kerja')?>",
        dataType: "json",
        success: function (response) {
          var html = '';
        }
      })
    }

    function load_data(bagian=''){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Dashboard/get_list_pegawai')?>",
        data: {bagian:bagian}, 
        dataType: "json",
        success: function (response) {
          var html = '';
          html += "<thead><tr><th>PILIH</th><th>NIP</th><th>NAMA</th><th>BAGIAN</th><th>01</th><th>02</th><th>03</th><th>04</th><th>05</th><th>06</th><th>07</th><th>08</th><th>09</th><th>10</th><th>11</th><th>12</th><th>13</th><th>14</th><th>15</th><th>16</th><th>17</th><th>18</th><th>19</th><th>20</th><th>21</th><th>22</th><th>23</th><th>24</th><th>25</th><th>26</th><th>27</th><th>28</th><th>29</th><th>30</th><th>31</th></tr></thead>";
          if(response.code=='200'){
            var html = '';
              var i;
              //foreach ($jadwal as $jadwal){
                for(var k in jadwal){
                $no_urut++;
                  html += "<td><option value='" + jadwal[k]['IDWKTKERJA'] + "'>" +  jadwal[k]['KETJNSWKTKERJA'] + "</option></td>";
              }
              $("#menitmasukubah").html(html);
            html += "<tbody>";
            for(var i = 0; i < response.data.length; i++){
              html += "<tr><td><div class='custom-control custom-checkbox'><input class='form-check-input  formChecked' type='checkbox' value='"+ response.data[i].NIP +"' data-role='"+ response.data[i].NIP +"' data-menu='"+ response.data[i].NIP +"'"+ (response.data[i].NIP==response.data[i].NIP ? 'checked' : '') +"></div></td><td>" + response.data[i].NIP + "</td><td>" + response.data[i].NAMA + "</td><td>" + response.data[i].BAG + "</td>";  
              html += "<td><select class='form-control' name='menitmasukubah' id='menitmasukubah' style='width: 100%; '><option value=''>xx</option></select></td>" 
              
              

              /*html += "<td><div class='custom-control custom-checkbox'><input class='form-control select2' "+ $no_urut=0;
                          foreach ($jadwal as $dt){
                            $no_urut++;
                            echo "<option value='".$dt['IDWKTKERJA']."'>".$dt['KETJNSWKTKERJA']." (".substr($dt['CHECKIN'],11,8)." - ".substr($dt['CHECKOUT'],11,8).")</option>";
                          } +"></div></td>";   */
              html += "</tr>";
              html += "</tbody>";
              if(html != ""){
                  $("#tbpegawai").html(html).removeClass("hidden");
              }
            }
          }else if(response.code=='404'){
            html += "<tbody>";
            html += "<tr><td>-</td><td>Data tidak ditemukan</td><td>-</td><td>-</td>";      
            html += "</tr>";
            html += "</tbody>";
            if(html != ""){
              $("#tbpegawai").html(html).removeClass("hidden");
            }
          }
        }
      });
    }

    $('#bagian').change(function(){
      $('#hidden_bagian').val($('#bagian').val());
      var bagian = $('#hidden_bagian').val();
      load_data(bagian);
      load_waktukerja();
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

  });
</script>
</body>
</html>