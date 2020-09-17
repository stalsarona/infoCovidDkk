
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
                        <input type="checkbox" id="Sen"  value="1" checked>
                        <label for="Sen">
                          Sen &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Sel"  value="2" checked>
                        <label for="Sel">
                          Sel &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Rab" value="3" checked>
                        <label for="Rab">
                          Rab &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Kam" value="4" checked>
                        <label for="Kam">
                          Kam &nbsp &nbsp
                        </label>
                      </div>
                      <div class="icheck-primary d-inline">
                        <input type="checkbox" id="Jum" value="5" checked>
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
                        <select class="form-control select2bs4" multiple="multiple" data-placeholder="Pilih Unit/Bagian Kerja" name="bagian" id="bagian" style="width: 100%;" required>
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
                  <div class="col-md-6">
                    <div class="form-group btn-cari">
                      <button type="button" class="btn btn-success float-right btnproses">PROSES</button>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <label>List Pegawai yang diproses</label>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar">
                      <table class="table table-striped table-bordered nowrap" id="tbpegawai">
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
    function load_data(bagian=''){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Dashboard/get_list_pegawai')?>",
        data: {bagian:bagian}, 
        dataType: "json",
        success: function (response) {
          // $('tbody').html(data);
          
          // var len = response.data.length;
          var html = '';
          html += "<thead><tr><th>PILIH</th><th>NIP</th><th>NAMA</th><th>BAGIAN</th></tr></thead>";
          if(response.code=='200'){
            html += "<tbody>";
            for(var i = 0; i < response.data.length; i++){
              html += "<tr><td><div class='custom-control custom-checkbox'><input class='form-check-input  formChecked' type='checkbox' value='"+ response.data[i].NIP +"' data-role='"+ response.data[i].NIP +"' data-menu='"+ response.data[i].NIP +"'"+ (response.data[i].NIP==response.data[i].NIP ? 'checked' : '') +"></div></td><td>" + response.data[i].NIP + "</td><td>" + response.data[i].NAMA + "</td><td>" + response.data[i].BAG + "</td>";      
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
    //$('#bagian').on('change',function(){
      $('#hidden_bagian').val($('#bagian').val());
      var bagian = $('#hidden_bagian').val();
      load_data(bagian);
      // var tabel_riwayat = $('#tbpegawai').DataTable({
      //   "responsive" : true,
      //   "autoWidth": false,
      //   "sAjaxSource": "<?php echo base_url()?>dashboard/get_list_pegawai/"+bagian,
      //   "aoColumns": [
      //       {
      //           "mData": "nip",					
      //       },
      //       {
      //           "mData": "nama",					
      //       }
      //   ]
      // });
    });

  });
</script>
</body>
</html>