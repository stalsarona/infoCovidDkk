
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">ADM AKSES MENU</h1>
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
                <h3 class="card-title">Akses Menu</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <br>
                <table class="table table-bordered table-striped" id="tabelRole">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>TIPE USER</th>
                      <th>AKSES</th>
                      <th>AKSI</th>
                    </tr>
                  </thead>
                  <tbody>
                    <form >
                    <?php $no_urut = 0;
                      //for ($a = 0; $a < count($data); $a++) {
                        foreach ($role as $dt){
                        $no_urut++;
                        echo "
                        <tr>
                          <td>".$no_urut."</td>
                          <td>".$dt['ID']."</td>
                          <td>".$dt['ROLE']."</td>
                          <td><button  data-id_role='" . $dt['ID'] . "' data-toggle='modal' data-target='#ubah-data' class='btn btn-warning btnedit'>Atur Akses</button>
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
            <div class="card card-default tabelakses">
              <div class="card-header">
                <h3 class="card-title">Form Ubah Akses Menu </h3>
                  <input type="hidden" name="roleid" id="roleid" autocomplete="off" readonly />
                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <!-- /.card-header -->
                <div class="card-body ">
                  <div class="row">
                    <input type="hidden" class="form-control" name="private_token" id="private_token" value="<?php echo $token; ?>">
                    <form name="formUbahRole" id="formUbahRole">
                      <table class="table table-bordered table-striped" id="tabelakses">
                        <input type="hidden" class="form-control" name="private_token" id="private_token" value="<?php echo $token; ?>">
                        <!-- <thead>
                          <tr>
                            <th style="width: 10px">#</th>
                            <th>ID</th>
                            <th>JUDUL MENU</th>
                            <th>AKSI</th>
                          </tr>
                        </thead> -->
                      </table>
                    </form>
                <!-- /.card-footer -->
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
    $('.status').select2({
      theme: 'bootstrap4'
    })
    $('.jammasukubah').select2({
      theme: 'bootstrap4'
    })
    $("#tabelRole").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $("#tabelakses2").DataTable({
      "responsive": true,
      "autoWidth": false,
    });      
    
    $('.tabelakses').hide();

    $('#btn_simpanubah').on('click',function(){
      var obj = document.forms.namedItem("editForm")
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Menu/ubah_jadwal')?>",
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
            var orpeg = '<?php echo base_url('Menu/view_jadwal')?>';
            swal("Berhasil Simpan",'','info');
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
      var id =  $(this).data('id_role');
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('Menu/get_akses_menu_by_role')?>",
        data: {id:id}, 
        dataType: "json",
        success: function (response) {
          $('#tabelakses').show();
          $('.tabelakses').show();
          var len = response.data.length;
          var html = '';
          $('#roleid').val(id);
          html += "<thead><tr><th>ID</th><th>JUDUL MENU</th><th>BERI AKSES</th></tr></thead>";
          if(len > 0){
            html += "<tbody>";
            for(var i = 0; i < len; i++){
              //html += "<tr><td>" + response.data[i].ID + "</td><td>" + response.data[i].TITLE + "</td><td><div class='custom-control custom-checkbox'><input class='form-check-input' type='checkbox' id='customCheckbox1' "+ check_access(id,response.data[i].ID) +"></div></td></tr>";
              html += "<tr><td>" + response.data[i].ID + "</td><td>" + response.data[i].TITLE + "</td>";
              
              // if(response.data[i].ID == response.data[i].MENU){
              //   html += "<td><div class='custom-control custom-checkbox'><input class='form-check-input  formChecked' type='checkbox' value='"+ response.data[i].ID +"' data-role='"+ id +"' data-menu='"+ response.data[i].ID +" 'checked'></div></td>";
              // }else{
              //   html += "<td><div class='custom-control custom-checkbox'><input class='form-check-input  formChecked' type='checkbox' value='"+ response.data[i].ID +"' data-role='"+ id +"' data-menu='"+ response.data[i].ID +"></div></td>";
              // }
                html += "<td><div class='custom-control custom-checkbox'><input class='form-check-input  formChecked' type='checkbox' value='"+ response.data[i].ID +"' data-role='"+ id +"' data-menu='"+ response.data[i].ID +"'"+ (response.data[i].MENU==response.data[i].ID ? 'checked' : '') +"></div></td>";
                
             
              html += "</tr>";
              html += "</tbody>";
              if(html != ""){
                  $("#tabelakses").html(html).removeClass("hidden");
              }
            }
          }
        }
      });
      return false;
    });

    // $("#tabelakses").on('change', 'input[type=checkbox]',function(){
    //   // var id =  $(this).data('id_role');
    //   var checked = $(this).attr('checked');
    //   // if(checked){
    //   if($(this).is(':checked')){
    //     var menuId = $(this).val();
    //     var token  = $('#private_token').val();
    //     var roleId = $(this).data('role');
        
    //     $.ajax({
    //       type: "POST",
    //       url: "<?php echo base_url('Menu/ubah_akses_menu')?>",
    //       data: {
    //         menuId : menuId,
    //         roleId : roleId,
    //         token  : token
    //       }, 
    //       dataType: "json",
    //       success: function (response) {
    //         if(response[0]['CODE'] == '515'){
    //           alert("Nilai NULL tidak diperbolehkan");
    //           var exp = '<?php echo base_url('Menu/akses_menu')?>';
    //           window.location.replace(exp);
    //         } else if(response[0]['CODE'] == '2627'){
    //           alert("ID Waktu Kerja yang Anda masukkan sudah Ada, silahkan masukkan ID yang lain.");
    //           var orpeg = '<?php echo base_url('Menu/akses_menu')?>';
    //           window.location.replace(orpeg);
    //         }else if(response[0]['CODE'] == '200'){     
    //           var orpeg = '<?php echo base_url('Menu/akses_menu')?>';
    //           swal("Berhasil Simpan",'','info');
    //           window.location.replace(orpeg);
    //         }
    //       }
    //     });
    //     return false;
    //   }
    // });

    $("#tabelakses").on('click','input[type=checkbox]',function(){
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