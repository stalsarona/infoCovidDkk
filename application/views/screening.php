<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Screening Mandiri Covid 19</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/fontawesome-free/css/all.min.css');?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/adminlte.min.css');?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
  /* Style the form */
#regForm {
  background-color: #ffffff;
  margin: 0px auto;
  padding: 0px;
  width: 100%;
  min-width: 300px;
}

/* Style the input fields */
/* input {
  padding: 10px;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
} */

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

/* Mark the active step: */
.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #4CAF50;
}

.btn-cari{
  padding-top: 30px;
}

@media(max-width: 599px){
  	.btn-cari {
	    padding-top: 0px;
	  }
}
.overlay {
  height: 100%;
  width: 100%;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: rgb(0,0,0);
  background-color: rgba(0,0,0, 0.9);
  overflow-y: hidden;
  transition: 0.5s;
  display: none;
}

.overlay-content {
  position: relative;
  top: 25%;
  width: 100%;
  text-align: center;
  margin-top: 30px;
  
}
.loader {
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #dc3545;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;
  position: fixed;
  z-index: 100;
  right: 50%;
  left: 45%;
  top: 50%;
  bottom: 0px;
  display: block;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
  </style>
</head>
<body class="hold-transition layout-top-nav">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="<?php echo base_url('#');?>" class="navbar-brand">
        <img src="<?php echo base_url('assets/dist/img/logo.png');?>" alt="RSUD TUGUREJO" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light"><strong>Screening</strong> Covid_19 RSUD Tugurejo</span>
      </a>
      
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </nav>
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"> Form <small>Screening Mandiri</small></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	<div class="content">
      <div class="container">
      <div class="overlay">
				<div class="overlay-content">
					<div class="loader"></div>
				</div>
			</div>
	        <div class="alert alert-danger alert-dismissible">
              <h5><i class="icon fas fa-exclamation-triangle"></i> Perhatian</h5>
				       Identitas pengisi akan dirahasiakan. Silahkan menjawab Screening Covid_19 ini dengan sebenar-benarnya.
          </div>
				</div>
		</div>
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">

		  <!-- /.col-md-12 -->
          <div class="col-lg-12">
            <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="card-title m-0">Form Screening Mandiri</h5>
              </div>
            <div class="card-body">
  <form id="regForm">
  <!-- One "tab" for each step in the form: -->
  <div class="tab">
  <u><h2>Data Diri</h2></u>
  <div class="row">
    <div class="col-sm-5">
      <!-- select -->
      <div class="form-group">
        <label>No KTP : <code>(* Silahkan cari atau isi secara manual ) </code> </label>
        <input type="text" placeholder="No. KTP" name="ktp" id="ktp" autocomplete="off" onkeyup="allowNumbersOnly(this, event)" maxlength="16" class="form-control validate" required autofocus>
      </div>
    </div>
    <div class="col-sm-1">
      <div class="form-group btn-cari">
        <a href="javaScript:void(0)" class="btn btn-primary" id="btncari">Cari</a>
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
        <label>Nama :</label>
        <input type="text" placeholder="Nama" name="nama" id="nama" class="form-control reset validate">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <!-- select -->
      <div class="form-group">
        <label>Provinsi :</label>
        <input type="text" placeholder="Provinsi" name="prov" id="prov" autocomplete="off" class="form-control reset validate">
        <input type="hidden" placeholder="Provinsi" name="id_prov" id="id_prov" autocomplete="off" class="form-control reset">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
      <label>Kota :</label>
        <input type="text" placeholder="Kota" name="kota" id="kota" autocomplete="off" class="form-control reset validate">
        <input type="hidden" placeholder="Kota" name="id_kota" id="id_kota" autocomplete="off" class="form-control reset">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <!-- select -->
      <div class="form-group">
        <label>Kecamatan :</label>
        <input type="text" placeholder="Kecamatan" name="kec" id="kec" autocomplete="off" class="form-control reset validate">
        <input type="hidden" placeholder="Kecamatan" name="id_kec" id="id_kec" autocomplete="off" class="form-control reset">
      </div>
    </div>
    <div class="col-sm-6">
      <div class="form-group">
      <label>Kelurahan :</label>
        <input type="text" placeholder="Kelurahan" name="kel" id="kel" autocomplete="off" class="form-control reset validate">
        <input type="hidden" placeholder="Kelurahan" name="id_kel" id="id_kel" autocomplete="off" class="form-control reset">
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <!-- select -->
      <div class="form-group">
        <label>Alamat :</label>
        <input type="text" placeholder="Alamat" name="alamat" id="alamat" autocomplete="off" class="form-control reset validate">
      </div>
    </div>
    <div class="col-sm-3">
      <!-- select -->
      <div class="form-group">
        <label>RT :</label>
        <input type="text" placeholder="RT" name="rt" id="rt" autocomplete="off" class="form-control reset validate">
      </div>
    </div>
    <div class="col-sm-3">
      <!-- select -->
      <div class="form-group">
        <label>RW :</label>
        <input type="text" placeholder="RW" name="rw" id="rw" autocomplete="off" class="form-control reset validate">
      </div>
    </div>
  </div>	
  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
        <label>No Telp :</label>
        <input type="text" placeholder="No. Telp" name="telp" autocomplete="off" onkeyup="allowContactNumberOnly(this)" maxlength="12" class="form-control reset validate">
      </div>
    </div>
  </div>
  </div>
  <div class="tab">
  <u><h2>Data Screening</h2></u>
    <?php foreach($pandemi as $key) { ?>
      <?php if($key->TIPE == 'YA_TIDAK'){ ?>
        <label><?php echo $key->SOAL ?></label>
        <?php $data = $this->db->where('IDSOAL', $key->IDSOAL)->get('CORONA_SOALH')->result();
          foreach($data as $soal_cek){?>
            <div class="col-sm-10">
              <div class="form-check">
                <input class="form-check-input" type="radio" name="jawaban-ya" id="gridRadios1" value="option1">
                <label class="form-check-label" for="gridRadios1">
                  Ya
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input " type="radio" name="jawaban-tidak" id="gridRadios2" value="option2">
                <label class="form-check-label" for="gridRadios2">
                  Tidak
                </label>
              </div>
            </div>
          <?php } ?>
      <?php } else{ ?>
        <label><?php echo $key->SOAL ?></label>
        <?php $data = $this->db->where('IDSOAL', $key->IDSOAL)->get('CORONA_SOALD')->result();
          foreach($data as $soal_cekbox){?>
          <div class="form-check">
            <input class="form-check-input " type="checkbox" name="<?php echo $soal_cekbox->IDSOALDTL ?>" id="gridRadios2" value="option2">
            <label class="form-check-label" for="gridRadios2">
              <?php echo $soal_cekbox->DESCR ?>
            </label>
          </div>
          <?php } ?>
    <?php } } ?>
    <br>  
    <!-- <div class="col-md-12">
      <div class="form-group">
        <input type="text" placeholder="Nama Daerah : " name="" id="" autocomplete="off" class="form-control reset">
      </div>
      <div class="form-group">
        <input type="text" placeholder="Kota Lainnya" name="" id="" autocomplete="off" class="form-control reset">
      </div>
    </div> -->
  </div>
  <div class="tab">
  <u><h2>Hasil Screening</h2></u>
    Hasil nyaaaa
    <div class="col-sm-10">
        <div class="form-check">
          <input class="form-check-input" type="radio" name="p1" id="gridRadios1" value="option1">
          <label class="form-check-label" for="gridRadios1">
            Ya
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="p1" id="gridRadios2" value="option2">
          <label class="form-check-label" for="gridRadios2">
            Tidak
          </label>
        </div>
      </div>
  </div>
  <div style="overflow:auto;">
    <div style="float:right;">
      <button type="button" class="btn btn-warning" id="prevBtn" onclick="nextPrev(-1)">Sebelumnya</button>
      <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Selanjutnya</button>
    </div>
  </div>
  <!-- Circles which indicates the steps of the form: -->
  <div style="text-align:center;margin-top:40px;">
    <span class="step"></span>
    <span class="step"></span>
    <span class="step"></span>
  </div>
</form>
              </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- Default to the left -->
    <strong>Copyright &copy; 2019 <a href="https://rstugurejo.jatengprov.go.id">RSUD Tugurejo</a>.</strong>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url('assets/plugins/jquery/jquery.min.js');?>"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url('assets/plugins/bootstrap/js/bootstrap.bundle.min.js');?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js');?>"></script>
<!-- bs-custom-file-input -->
<script src="<?php echo base_url('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js');?>"></script>
<script>
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the current tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";
  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}

function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    //document.getElementById("regForm").submit();
    alert('ok')
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByClassName("validate");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      // and set the current valid status to false
      valid = false;
    }
  }
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}

function fixStepIndicator(n) {
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}

function allowContactNumberOnly(a){
  if(!/^[0-9.]+$/.test(a.value)){
    a.value = a.value.substring(0,a.value.length-1000);
  }
}

function allowNumbersOnly(a, event) {
   
    if(!/^[0-9.]+$/.test(a.value))
    {
    a.value = a.value.substring(0,a.value.length-1000);
    }
    //ambil data ktp
    var kode = $(this).event;
    var ktp = $('#ktp').val();

    var code = (event.which) ? event.which : event.keyCode;
    
    //if(code == 13){
      
    //} 
  }

  $(function () {
    $('#btncari').on('click',function(){
      var ktp = $('#ktp').val();
      var obj = document.forms.namedItem("regForm")
      $.ajax({
        type: "POST",
        url: "<?php echo base_url('screening_c/get_js')?>",
        //data : {ktp : ktp},
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
          $('.overlay').css('display', 'none');
          if(response == null || response == ""){
            $('.reset').val('')
            //alert(response.content.RESPON)
          } else if(response.content.RESPON) {
            $('.reset').val('')
          } else {
            $('#nama').val(response.content[0].NAMA_LGKP)
            $('#prov').val(response.content[0].NAMA_PROP)
            $('#id_prov').val(response.content[0].NO_PROP)
            $('#kota').val(response.content[0].NAMA_KAB)
            $('#id_kota').val(response.content[0].NO_KAB)
            $('#kec').val(response.content[0].NAMA_KEC)
            $('#id_kec').val(response.content[0].NO_KEC)
            $('#kel').val(response.content[0].NAMA_KEL)
            $('#id_kel').val(response.content[0].NO_KEL)
            $('#alamat').val(response.content[0].ALAMAT)
            $('#rt').val(response.content[0].NO_RT)
            $('#rw').val(response.content[0].NO_RW)
          }
        }
      });
    })
  });
</script>
</body>
</html>