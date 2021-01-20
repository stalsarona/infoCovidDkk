
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
        <div class="overlay">
          <div class="overlay-content">
            <div class="loader"></div>
          </div>
        </div>
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
                <!-- modal flag pasien -->
                <div class="modal fade show" id="modal-flag" aria-modal="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title">Form Perubahan Status Pasien</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-header">
                              <h3 class="card-title">
                                <i class="fas fa-text-width"></i>
                                <div id="description-nama" class="d-inline">Muhammad Fathony</div>
                                <input type="hidden" id="nik" name="nik">
                              </h3>
                              <div class="d-inline">
                                <div class="img"></div>
                              </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <blockquote>
                                <p id="description-pasien">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                                <small id="description-periksa">Someone famous in <cite title="Source Title">Source Title</cite></small>
                              </blockquote>
                            </div>
                            <!-- /.card-body -->
                          </div>
                          <!-- /.card -->
                        </div>
                        <div class="row">
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Provinsi</label>
                              <select class="form-control select2" id="provinsi" name="provinsi" style="width: 100%;">
                                <option value="">Pilih Provinsi</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Kota / Kabupaten</label>
                              <select class="form-control select2" id="kota" name="kota" style="width: 100%;">
                                <option value="">Pilih Kota / Kabupaten</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-sm-6">
                            <div class="form-group">
                              <label>Kecamatan</label>
                              <select class="form-control select2" id="kecamatan" name="kecamatan" style="width: 100%;">
                                <option value="">Pilih Kecamatan</option>
                              </select>
                            </div>
                            <div class="form-group">
                              <label>Kelurahan</label>
                              <select class="form-control select2" id="kelurahan" name="kelurahan" style="width: 100%;">
                                <option value="">Pilih Kelurahan</option>
                              </select>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div class="form-group">
                            <label>Status Pasien:</label>
                            <select class="form-control select2" id="flag" name="flag" style="width: 100%;">
                              <option value="">Pilih Status Pasien</option>
                              <?php foreach ($flag as $key => $value) {?>
                                <option value="<?php echo $value->kode ?>"><?php echo $value->arti ?></option>
                              <?php } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Tanggal Penetapan:</label>
                              <div class="input-group date" id="tanggal_penetapan" data-target-input="nearest">
                                  <input type="text" id="tgl_penetapan" class="form-control datetimepicker-input" data-target="#tanggal_penetapan"/>
                                  <div class="input-group-append" data-target="#tanggal_penetapan" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                  </div>
                              </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="btn-flag">Save changes</button>
                      </div>
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- end of modal flag -->
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
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?php echo base_url()?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
  $(document).ready(function(){

    $('#tanggal_penetapan').datetimepicker({
      'format' : 'DD/MM/YYYY'
    });
    
    const getProvinsi = () => {
      fetch("<?php echo base_url('dashboard/dataRegional/get_provinsi')?>")
        .then(response => {
          return response.json()
        })
        .then(responseJSON => {
          var listOpsi = "";
          const result = responseJSON.provinsi.filter(data => {
            listOpsi += `<option value="${data.ID}">${data.provinsi}</option>`
          })
          $('#provinsi').html(listOpsi);
        })
        .catch(error => alert(error));
    }

    const getKota = () => {
      fetch("<?php echo base_url('dashboard/dataRegional/get_kota')?>")
        .then(response => {
          return response.json()
        })
        .then(responseJSON => {
          $('#provinsi').change(function(){
            var id = $('#provinsi').val();
            var listOpsi = "";
            const result = responseJSON.kota.filter(data => {
              return data.provinsi_id === id;
            })
            result.map(data => {
              listOpsi += `<option value="${data.ID}">${data.kota}</option>`
            })
            $('#kota').html(listOpsi);
          })
        })
        .catch(error => alert(error));
    }

    const getKecamatan = () => {
      fetch("<?php echo base_url('dashboard/dataRegional/get_kecamatan')?>")
        .then(response => {
          return response.json()
        })
        .then(responseJSON => {
            var listOpsi = "";
            const result = responseJSON.kecamatan.filter(data => {
              listOpsi += `<option value="${data.kode_kecamatan}">${data.kecamatan}</option>`
            })
            $('#kecamatan').html(listOpsi);
        })
        .catch(error => alert(error));
    }

    const getKelurahan = () => {
      fetch("<?php echo base_url('dashboard/dataRegional/get_kelurahan')?>")
        .then(response => {
          return response.json()
        })
        .then(responseJSON => {
          $('#kecamatan').change(function(){
            var id = $('#kecamatan').val();
            var listOpsi = "";
            const result = responseJSON.kelurahan.filter(data => {
              return data.kode_kecamatan === id;
            })
            result.map(data => {
              listOpsi += `<option value="${data.kode_kelurahan}">${data.kelurahan}</option>`
            })
            $('#kelurahan').html(listOpsi);
          })
        })
        .catch(error => alert(error));
    }

    getKelurahan();
    getKecamatan();
    getKota();
    getProvinsi();
    
    let tabel_pasien = $('#tb-pasien').DataTable({
        "destroy": true,
        "bProcessing": true,
				"bAutoWidth": true,
        "bSort": true,
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

    const showTable = (url) => {
      tabel_pasien = $('#tb-pasien').DataTable({
        "destroy": true,
        "bProcessing": false,
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

    $('#btn-flag').click(function(){
      const flag = $('#flag').val();
      const nik = $('#nik').val();
      const tgl_penetapan = $('#tgl_penetapan').val()
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Dashboard/flag')?>",
        data: {flag:flag, tgl_penetapan:tgl_penetapan, nik:nik},
        dataType: "JSON",
        success: function (response) {
          if(response.status === true){
            swal('Berhasil', '', 'success');
            $('#modal-flag').modal('hide');
          } else {
            swal('Upss ...', 'something wrong', 'error');
          }
        }
      });
    })
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
    
    $("#tb-pasien").on('change', '.cek', function() {
      const nama = $(this).data('nama');
      const nik = $(this).data('nik');
      const alamat = $(this).data('alamat');
      const tgl_lahir = $(this).data('tgllahir');
      const jk = $(this).data('jk');
      const nopas = $(this).data('nopas');
      let gender;
      jk === 'L' ? gender = 'Pria' : gender = 'Wanita';
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
          beforeSend: function() {
            $('.overlay').css('display', 'block');
          },
          success: function (response) {
            $('.overlay').css('display', 'none');
            $('#modal-flag').modal('show');
            $('#nik').val(nik);
            $('#description-nama').html(nama);
            const desc = `Nik: ${nik} / Jenis Kelamin: ${gender} / No. Pasien:  ${nopas}  / Alamat: ${alamat}`;
            $('#description-pasien').html(desc);
            $('#description-periksa').html(`Tanggal Lahir ${tgl_lahir}`)
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
          }, error : function(){
            $('.overlay').css('display', 'none');
            swal('error','','error')
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