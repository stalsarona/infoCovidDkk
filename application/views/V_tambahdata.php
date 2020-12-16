
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">TAMBAH DATA PASIEN COVID 19</h1>
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
                <h3 class="card-title">Tambah Data Pasien Covid 19</h3>
              </div>
              <div class="card-body">
                <!-- Minimal style -->
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <label>Status Pasien</label>
                      <select class="form-control select2" id="status" name="status" style="width: 100%;">
                        <option value="">Pilih Status Pasien</option>
                        <option value="ri">Rawat Inap</option>
                        <option value="ri_plg">Rawat Inap Sudah Pulang</option>
                        <option value="rj">Rawat Jalan</option>
                      </select>
                      <input type="hidden" name="hidden_status" id="hidden_status">
                    </div>
                  </div>
                </div>
                
                <h5>Rentang Tanggal Pulang</h5>
                <div class="row" id="ri_plg" hidden>
                  <div class="col-sm-3">
                    <div class="form-group" >
                      <label>Tanggal</label>
                      <select class="form-control select2" id="tgl" name="tgl" style="width: 100%;" data-placeholder="Pilih Tanggal">
                        <option value="">Pilih Tanggal</option>
                        <?php
                          for($x=1; $x<=31; $x++){
                            echo "<option value='".$x."'>".$x."</option>";
                          }
                        ?>
                      </select>
                      <input type="hidden" name="hidden_tgl" id="hidden_tgl">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group" >
                      <label>Bulan</label>
                      <select class="select2" id="bln" name="bln" style="width: 100%;" data-placeholder="Pilih bulan">
                        <option value="">Pilih Blan</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                      </select>
                      <input type="hidden" name="hidden_bln" id="hidden_bln">
                    </div>
                  </div>
                  <div class="col-sm-3">
                    <div class="form-group" >
                      <label>Tahun</label>
                      <select class="form-control select2" id="thn" name="thn" style="width: 100%;" data-placeholder="Pilih tahun">
                        <option value="">Pilih Tahun</option>
                        <?php
                          for($x=2020; $x<=date("Y"); $x++){
                            echo "<option value='".$x."'>".$x."</option>";
                          }
                        ?>
                      </select>
                      <input type="hidden" name="hidden_thn" id="hidden_thn">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>List Pasien Covid 19 yang Rawat Inap</label>
                    <div class="table-wrapper-scroll-y my-custom-scrollbar-nonshift">
                      <form name="FormTambahPasien" role="form" id="FormTambahPasien">
                        <table class="table table-striped table-bordered nowrap" id="tbpasien">
                        </table>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group btn-cari">
                      <button type="submit" id="btnsimpan1" class="btn btn-info float-right ">Masukkan Data</button>
                    </div>
                  </div>
                </div>
                </form>
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
    function load_data(status=''){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Dashboard/get_pasien')?>",
        data: {status:status}, 
        dataType: "json",
        success: function (response) {
          var html = '';
          html += "<thead><tr><th><input type='checkbox' id='checkAll'>Check All</th></th><th>NO</th><th>NO RM</th><th>NAMA</th><th>ALAMAT</th><th>TGL LAHIR</th><th>JK</th><th>NIK</th><th>TGL MASUK</th></tr></thead>";
          if(response.code=='200'){
            html += "<tbody>";
            for(var i = 0; i < response.data.length; i++){
              html += "<tr><td><div class='custom-control custom-checkbox'><input class='form-check-input formChecked cek' type='checkbox' data-nik='"+ response.data[i].NIK +"' data-nopas='"+ response.data[i].NOPASIEN +"' data-nama='"+ response.data[i].NAMAPASIEN +"' data-alamat='"+ response.data[i].ALAMAT +"' data-tgllahir='"+ response.data[i].TGLLAHIR +"' data-jk='"+ response.data[i].JNSKELAMIN +"' data-tglmasuk='"+ response.data[i].TGLMASUK +"' data-noreg='"+ response.data[i].NOREG +"' data-kodebag='"+ response.data[i].KODEBAGIAN +"' value='"+ response.data[i].NIK +"'></div></td><td><input type='hidden'  value='"+(i+1)+"'>" + (i+1) + "</td><td><input type='hidden'  value='"+response.data[i].NOPASIEN+"'>" + response.data[i].NOPASIEN + "</td><td><input type='hidden' value='"+response.data[i].NAMAPASIEN+"'>" + response.data[i].NAMAPASIEN + "</td><td><input type='hidden'   value='"+response.data[i].ALAMAT+"'>" + response.data[i].ALAMAT + "</td><td><input type='hidden'  value='"+response.data[i].TGLLAHIR+"'>" + response.data[i].TGLLAHIR + "</td><td><input type='hidden'  value='"+response.data[i].JNSKELAMIN+"'>" + response.data[i].JNSKELAMIN + "</td><td><input type='hidden'  value='"+response.data[i].NIK+"'>" + response.data[i].NIK + "</td><td><input type='hidden'  value='"+response.data[i].TGLMASUK+"'><input type='hidden'  value='"+response.data[i].NOREG+"'><input type='hidden' value='"+response.data[i].KODEBAGIAN+"'>" + response.data[i].TGLMASUK + "</td>";      
              html += "</tr>";
              html += "</tbody>";
              
             
              if(html != ""){
                  $("#tbpasien").html(html).removeClass("hidden");
              }
            }
          }else if(response.code=='404'){
            html += "<tbody>";
            html += "<tr><td>-</td><td>-</td><td>Data tidak ditemukan</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>";      
            html += "</tr>";
            html += "</tbody>";
            if(html != ""){
              $("#tbpasien").html(html).removeClass("hidden");
            }
          }
        }
      });
    }


   
    
    /*load_data_tgl();
    function load_data_tgl(status=''){
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Dashboard/get_pasien')?>",
        data: {status:status}, 
        dataType: "json",
        success: function (response) {
          var html = '';
          html += "<thead><tr><th><input type='checkbox' id='checkAll'>Check All</th><th>NO RM</th><th>NAMA</th><th>ALAMAT</th><th>TGL LAHIR</th><th>JK</th><th>NIK</th><th>TGL MASUK</th></tr></thead>";
          if(response.code=='200'){
            html += "<tbody>";
            for(var i = 0; i < response.data.length; i++){
              html += "<tr><td><div class='custom-control custom-checkbox'><input class='form-check-input formChecked' type='checkbox' value='"+ response.data[i].NIK +"' data-role='"+ response.data[i].NIK +"' data-menu='"+ response.data[i].NIK +"'"+ (response.data[i].NIK==response.data[i].NIK ? 'checked' : '') +"></div></td><td><input type='hidden' name='nopas' id='nopas' value='"+response.data[i].NOPASIEN+"'>" + response.data[i].NOPASIEN + "</td><td><input type='hidden' name='pasien' id='pasien' value='"+response.data[i].NAMAPASIEN+"'>" + response.data[i].NAMAPASIEN + "</td><td><input type='hidden' name='alamat' id='alamat' value='"+response.data[i].ALAMAT+"'>" + response.data[i].ALAMAT + "</td><td><input type='hidden' name='tgllhr' id='tgllhr' value='"+response.data[i].TGLLAHIR+"'>" + response.data[i].TGLLAHIR + "</td><td><input type='hidden' name='jk' id='jk' value='"+response.data[i].JNSKELAMIN+"'>" + response.data[i].JNSKELAMIN + "</td><td><input type='hidden' name='nik' id='nik' value='"+response.data[i].NIK+"'>" + response.data[i].NIK + "</td><td><input type='hidden' name='masuk' id='masuk' value='"+response.data[i].TGLMASUK+"'><input type='hidden' name='noreg' id='noreg' value='"+response.data[i].NOREG+"'><input type='hidden' name='kodebag' id='kodebag' value='"+response.data[i].KODEBAGIAN+"'>" + response.data[i].TGLMASUK + "</td>";      
              html += "</tr>";
              html += "</tbody>";
              if(html != ""){
                  $("#tbpasien").html(html).removeClass("hidden");
              }
            }
          }else if(response.code=='404'){
            html += "<tbody>";
            html += "<tr><td>-</td><td>Data tidak ditemukan</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>";      
            html += "</tr>";
            html += "</tbody>";
            if(html != ""){
              $("#tbpasien").html(html).removeClass("hidden");
            }
          }
        }
      });
    }*/

    $("#checkAll").click(function () {
     $('input:checkbox').not(this).prop('checked', this.checked);
    });

    $('#status').change(function(){
      console.log($("#status option:selected").val());
      if ($("#status option:selected").val() == 'ri'){
        
        $('#ri_plg').prop('hidden', 'true');
        $('#hidden_status').val($('#status').val());
        var status = $('#hidden_status').val();
        load_data(status);
        $('.cek').on('click', function(){
               
          alert('checked');
        });
      }else if($("#status option:selected").val() == 'ri_plg'){
        $('#ri_plg').prop('hidden', false);
        $('#hidden_status').val($('#status').val());
        var status = $('#hidden_status').val();
        $('#hidden_tgl').val($('#tgl').val());
        var tgl = $('#hidden_tgl').val();
        $('#hidden_bln').val($('#bln').val());
        var bln = $('#hidden_bln').val();
        $('#hidden_thn').val($('#thn').val());
        var thn = $('#hidden_thn').val();
        load_data_tgl(status,tgl,bln,thn);
        /*$('#hidden_status').val($('#status').val());
        var status = $('#hidden_status').val();
        load_data(status);*/
        // $('#linkubah').prop('hidden', 'true');
        // $('#uploadubah').prop('hidden', 'true');
      }  else if($("#status option:selected").val() == 'rj'){
        $('#linkcari').prop('hidden', 'false');
        // $('#linkubah').prop('hidden', 'true');
        // $('#uploadubah').prop('hidden', 'true');
      } 
    });

    // $('#btnsimpan').on('click',function(){
    //   var id = $('#NIK').val();
    //   if(id == ""){
    //     swal('Data tidak ditemukan','','info');
    //   } else {
    //     var obj = document.forms.namedItem("FormTambahPasien")
    //     $.ajax({
    //       type: "POST",
    //       url: "<?php echo base_url('Dashboard/post_pasien')?>",
    //       processData:false,
    //       contentType:false,
    //       cache:false,
    //       async:true,
    //       crossOrigin : true,
    //       data: new FormData(obj), 
    //       dataType: "json",
    //       beforeSend: function() {
    //         $('.overlay').css('display', 'block');
    //       },
    //       success: function (response) {
    //         // if(response[0]['CODE'] == '515'){
    //         //   alert("Nilai NULL tidak diperbolehkan");
    //         //   var exp = '<?php echo base_url('Dashboard/error')?>';
    //         //   window.location.replace(exp);
    //         // } else if(response[0]['CODE'] == '2627'){
    //         //   alert("ID Waktu Kerja yang Anda masukkan sudah Ada, silahkan masukkan ID yang lain.");
    //         //   var orpeg = '<?php echo base_url('Dashboard/view_jadwal')?>';
    //         //   window.location.replace(orpeg);
    //         // }else if(response[0]['CODE'] == '200'){     
    //         //   alert("Berhasil Simpan");
    //         //   var orpeg = '<?php echo base_url('Dashboard/view_jadwal')?>';
    //         //   window.location.replace(orpeg);
    //         // }
    //       }
    //     });
    //     return false;
    //   }
    // });

    

    // $('#btnsimpan').on('click',function(){
    //   var languages = [];
    //   //var obj = document.forms.namedItem("FormTambahPasien")
    //   $('.cek').each(function(){
    //     if($(this).is(":checked"))  
    //       {  
    //         languages.push($(this).val());  
    //         // var cek= $(this).attr('data-role');
    //         //   alert(cek);
    //       }  
    //   });
    //     $.ajax({
    //       type: "POST",
    //       url: "<?php echo base_url('Dashboard/post_pasien')?>",
    //       processData:false,
    //       contentType:false,
    //       cache:false,
    //       async:true,
    //       crossOrigin : true,
    //       data: new FormData(obj), 
    //       dataType: "json",
    //       beforeSend: function() {
    //         $('.overlay').css('display', 'block');
    //       },
    //       success: function (response) {
    //         // if(response[0]['CODE'] == '515'){
    //         //   alert("Nilai NULL tidak diperbolehkan");
    //         //   var exp = '<?php echo base_url('Dashboard/error')?>';
    //         //   window.location.replace(exp);
    //         // } else if(response[0]['CODE'] == '2627'){
    //         //   alert("ID Waktu Kerja yang Anda masukkan sudah Ada, silahkan masukkan ID yang lain.");
    //         //   var orpeg = '<?php echo base_url('Dashboard/view_jadwal')?>';
    //         //   window.location.replace(orpeg);
    //         // }else if(response[0]['CODE'] == '200'){     
    //         //   alert("Berhasil Simpan");
    //         //   var orpeg = '<?php echo base_url('Dashboard/view_jadwal')?>';
    //         //   window.location.replace(orpeg);
    //         // }
    //       }
    //     });
    //     return false;
    // });

    //load_data();
    $("#tbpasien").on('click', '.cek', function() {
      // alert('cek');
     //$(".cek").prop("checked", true);
      var html = '';
          
      if($('.cek:checked').length > 0)
      {
       console.log("checked");
        html += "<tbody>";
        html += "<tr><td><div class='custom-control custom-checkbox'><input class='form-check-input formChecked cek' type='checkbox' name='no[]'  data-nik='"+ $(this).data('nik') +"' data-nopas='"+ $(this).data('nopas') +"' data-nama='"+ $(this).data('nama') +"' data-alamat='"+ $(this).data('alamat') +"' data-tgllahir='"+ $(this).data('tgllahir') +"' data-jk='"+ $(this).data('jk') +"' data-tglmasuk='"+ $(this).data('tglmasuk') +"' data-noreg='"+ $(this).data('noreg') +"' data-kodebag='"+ $(this).data('kodebag') +"' value='"+$(this).data('nik')+"' checked ></div></td>";
        // html += "<td><input type='hidden'  value='"+(i+1)+"'>" + (i+1) + "</td>";
        html += "<td><input type='hidden' name='nopas[]' value='"+$(this).data("nopas")+"'>" + $(this).data("nopas") + "</td>";
        html += "<td><input type='hidden' name='pasien[]' value='"+$(this).data("nama")+"'>" + $(this).data("nama") + "</td>";
        html += "<td><input type='hidden' name='alamat[]'  value='"+$(this).data("alamat")+"'>" + $(this).data("alamat") + "</td>";
        html += "<td><input type='hidden' name='tgllhr[]' value='"+$(this).data("tgllahir")+"'>" + $(this).data("tgllahir") + "</td>";
        html += "<td><input type='hidden' name='jk[]' value='"+$(this).data("jk")+"'>" + $(this).data("jk") + "</td>";
        html += "<td><input type='hidden' name='nik[]' value='"+$(this).data("nik")+"'>" + $(this).data("nik") + "</td>";
        html += "<td><input type='hidden' name='masuk[]' value='"+$(this).data("tglmasuk")+"'><input type='hidden' name='noreg[]' value='"+$(this).data("noreg")+"'><input type='hidden' name='kodebag[]' value='"+$(this).data("kodebag")+"'>" + $(this).data("tglmasuk") + "</td>"; 
        html += "</tr>";
         html += "</tbody>";

         $("#tbpasien").html(html);
        //  if(html != ""){
        //           $("#tbpasien").html(html);
        //           // alert(html);
        //       }
      }
      else
     {
      html += "<td><div class='custom-control custom-checkbox'><input class='form-check-input formChecked cek' type='checkbox' name='no' value='"+$(this).data('nik')+"'  ></div></td>";
      if(html != ""){
                  $("#tbpasien").html(html);
              }
     }

    

      });

   
 

  // $('#btnsimpan1').on('click', function(e) {
  //     e.preventDefault();
  //     var nik = $('.cek').val();
  //     if($('.cek:checked').length > 0){
  //       $.ajax({
  //         type: "POST",
  //         url: "<?php echo base_url('Dashboard/post_pasien')?>",
  //         data: $('#FormTambahPasien').serialize(),
  //         success: function (data) {
  //          // alert(data);
  //          console.log(data);
  //         }
  //     });    
  // }
  //   });

    

  });


     

  
</script>
</body>
</html>