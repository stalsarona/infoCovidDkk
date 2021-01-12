
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
                  <div class="col-sm-8">
                    <div class="form-group" >
                      <!-- <label>Awal</label> -->
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text">
                            <i class="far fa-calendar-alt"></i>
                          </span>
                        </div>
                        <input type="text" class="form-control float-right" id="reservation">
                      </div>
                      <!-- <select class="form-control select2" id="tgl" name="tgl" style="width: 100%;" data-placeholder="Pilih Tanggal">
                        <option value="">Pilih Tanggal</option> -->
                        <?php
                          // for($x=1; $x<=31; $x++){
                          //   echo "<option value='".$x."'>".$x."</option>";
                          // }
                        ?>
                      <!-- </select>
                      <input type="hidden" name="hidden_tgl" id="hidden_tgl"> -->
                    </div>
                  </div>
                  <!-- <div class="col-sm-3">
                    <div class="form-group" >
                      <label>Akhir</label>
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
                  </div> -->
                  <div class="col-sm-3">
                    <div class="form-group" >
                      <!-- <label>Tahun</label>
                      <select class="form-control select2" id="thn" name="thn" style="width: 100%;" data-placeholder="Pilih tahun">
                        <option value="">Pilih Tahun</option> -->
                        <?php
                          // for($x=2020; $x<=date("Y"); $x++){
                          //   echo "<option value='".$x."'>".$x."</option>";
                          // }
                        ?>
                      <!-- </select>
                      <input type="hidden" name="hidden_thn" id="hidden_thn"> -->
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <label>List Pasien Covid 19 yang Rawat Inap</label>
                      <div class="table-wrapper-scroll-y my-custom-scrollbar-nonshift">
                        <table id="tb-pasien" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th><input type="checkbox" class="" id="exampleCheck1"></th>
                                    <th>No</th>
                                    <th>No. Rm</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>NIK</th>
                                    <th>No Reg</th>
                                    <th>Kode Bagian</th>
                                    <th>Nama Bagian</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <th>No</th>
                                    <th>No. Rm</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>NIK</th>
                                    <th>No Reg</th>
                                    <th>Kode Bagian</th>
                                    <th>Nama Bagian</th>
                                    <th>Tanggal</th>
                                </tr>
                            </tfoot>
                        </table>
                      </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                    <div class="form-group btn-cari">
                      <button id="btnsimpan1" class="btn btn-info float-right ">Masukkan Data</button>
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
  $.widget.bridge('uibutton', $.ui.button);
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
<!-- daterange picker -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.css')?>">
<!-- date-range-picker -->
<script src="<?php echo base_url('assets/plugins/moment/moment.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/daterangepicker/daterangepicker.js')?>"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
  $(document).ready(function(){
    const showTable = (url) => {
      tabel_pasien = $('#tb-pasien').DataTable({
        "destroy": true,
        "bProcessing": true,
				"bAutoWidth": true,
        "bSort": true,
        "sAjaxSource": url,
        "aoColumns": [
          {
            "mData": "inputcheck",
            orderable: false
          },
          {
						"mData": "no"	
					},
					{
						"mData": "nopasien"
					},
					{
						"mData": "namapasien"
					},
					{
						"mData": "alamat"
					},
					{
            "mData": "tgllahir"  
					},
					{
						"mData": "jnskelamin"
					},
					{
						"mData": "nik"
					},
					{
						"mData": "noreg"						
          },
          {
            "mData": "kodebagian"
          },
          {
            "mData": "namabagian"						
          },
          {
            "mData": "tanggal"					
          }
				],
				"fixedColumns": true
      });
    }
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
    //Datemask dd/mm/yyyy
    $('#reservation').daterangepicker({
      locale: {
        format: 'DD/MMM/YYYY'
      }
    }, function(start, end){
        const status = $('#status').val();
        const awal = start.format('YYYYMMDD');
        const akhir = end.format('YYYYMMDD');
        let url = '';
        if(status === 'ri_plg'){
          url = `<?php echo base_url('Dashboard/get_pasien')?>?status=${status}&awal=${awal}&akhir=${akhir}`;
          showTable(url);
        } else if(status === 'rj') {
          url = `<?php echo base_url('Dashboard/get_pasien')?>?status=${status}&awal=${awal}&akhir=${akhir}`;
          showTable(url);
        }
        //showTable(status, awal, akhir);
    })

    // $("#checkAll").click(function () {
    //  $('input:checkbox').not(this).prop('checked', this.checked);
    // });
    const listDataTmp = () => {
      const dataTmp = localStorage.getItem('dataPasien');
      if("dataPasien" in localStorage){
        JSON.parse(dataTmp).map((data, key) => {
         $(`#${data.nopas}`).prop('checked', true);
        })
      }
    }
   
    $('#status').change(function(){
      console.log($("#status option:selected").val());
      const status = $(this).val();
      if ($("#status option:selected").val() == 'ri'){ 
        $('#ri_plg').prop('hidden', true);
        const url = `<?php echo base_url('Dashboard/get_pasien')?>?status=${status}&awal=&akhir=`
        showTable(url);  
      }else if($("#status option:selected").val() == 'ri_plg'){
        $('#ri_plg').prop('hidden', false);  
      }  else if($("#status option:selected").val() == 'rj'){
        $('#ri_plg').prop('hidden', false); 
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
    $("#tbpasien").on('change', '.cek', function() {
      const nama = $(this).data('nama');
      const nik = $(this).data('nik');
      const alamat = $(this).data('alamat');
      const tgl_lahir = $(this).data('tgllahir');
      const jk = $(this).data('jk');
      const nopas = $(this).data('nopas');

      let dataPasien = [];
      if($(this).is(':checked')){
        $.ajax({
          type: "POST",
          url: "<?php echo base_url('dashboard/parsingDkk')?>",
          data: {
            nama: nama,
            nik: nik,
            alamat: alamat,
            tgl_lahir: tgl_lahir,
            jk: jk
          },
          dataType: "JSON",
          success: function (response) {
           
             const obj = {
                nama: nama,
                nik: nik,
                alamat: alamat,
                tgl_lahir: tgl_lahir,
                jk: jk,
                nopas: nopas
              };
              if("dataPasien" in localStorage){
                  let dataPasienNew = JSON.parse(localStorage.getItem('dataPasien'));
                  dataPasienNew.push(obj);
                  localStorage.setItem('dataPasien', JSON.stringify(dataPasienNew));
              } else {
                localStorage.setItem('dataPasien', JSON.stringify([obj]));
              }
          }
        });
      } else {
        let dataPasienNew = JSON.parse(localStorage.getItem('dataPasien'));
        const filter = dataPasienNew.filter((data) => {
          return data.nopas != nopas;
        })
        localStorage.setItem("dataPasien", JSON.stringify(filter));
      }
    });

   $('#tbpasien').on('change', '#checkAll', function(){
     if($('#checkAll').is(':checked')){
        $('.cek').prop('checked', true);
     } else {
        $('.cek').prop('checked', false);
     }
   });
 

    $('#btnsimpan1').on('click', function(e) {
        e.preventDefault();
        var nik = $('.cek').val();
        if($('.cek:checked').length > 0){
          // $.ajax({
          //   type: "POST",
          //   url: "<?php echo base_url('Dashboard/post_pasien')?>",
          //   data: $('#FormTambahPasien').serialize(),
          //   success: function (data) {
          //   console.log(data);
          //   }
          // });    
        } 
        const data = JSON.parse(localStorage.getItem('dataPasien'));
        data.map((data, key)=>{
          console.log(data);
        })
    });
});
</script>
</body>
</html>