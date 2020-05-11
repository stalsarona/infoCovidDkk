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
  <link rel="shortcut icon" type="ico" href="<?php echo base_url()?>assets/images/logo.ico">
  <title>Deteksi Awal Covid 19</title>

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

.cardku {
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

.batas{
    border-bottom: 1px solid rgba(0,0,0,.125);
    margin-bottom: 10px;
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
/* Back to top button */
.back-to-top {
  position: fixed;
  display: none;
  background: #18d26e;
  color: #fff;
  display: inline-block;
  width: 44px;
  height: 44px;
  text-align: center;
  line-height: 1;
  font-size: 16px;
  border-radius: 50%;
  right: 15px;
  bottom: 15px;
  transition: background 0.5s;
  z-index: 11;
}

.back-to-top i {
  padding-top: 12px;
  color: #fff;
}

@media (max-width: 768px) {
  .back-to-top {
    bottom: 15px;
  }
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
        <span class="brand-text font-weight-light"><strong>Dewoc19</strong> RSUD Tugurejo</span>
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
            <!-- <h1 class="m-0 text-dark"> Form <small>Deteksi Awal</small></h1> -->
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <!-- <li class="breadcrumb-item"><a href="#">Home</a></li> -->
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
          <marquee onmouseout="this.start()" onmouseover="this.stop()"><h5><i class="icon fas fa-exclamation-triangle"></i> Deteksi awal Covid-19 RSUD Tugurejo, ketahuilah status covid anda saat ini !!!</h5></marquee>
				       Dengan BERANI & JUJUR anda telah menyelamatkan tenaga kesehatan dan keluarga kami di rumah, serta penduduk Indonesia.
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
              <div class="card-header" style="text-align: center;align-items: center;display: grid;font-family: fantasy;">
                <h1 class="card-title m-0" style="text-align: center;font-size: 34px;">" Bersama Lawan Corona "</h1>
              </div>
            <div class="card-body">
              <form id="regForm">
              <!-- One "tab" for each step in the form: -->
              <div class="tab">
                <u><h2>Form Pendataan</h2></u>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-danger card-outline">
                            <div class="card-header" style="text-align: center;align-items: center;display: grid;font-family: fantasy;">
                                <h1 class="card-title m-0" style="text-align: center;font-size: 20px;">Positif Covid-19 </h1>
                            </div>
                            <div class="card-body">
                            <!-- One "tab" for each step in the form: -->
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card card-success">
                                                    <div class="card-header" style="background:#dc3545; color:white; font-size:45px;">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                Dewasa
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-9">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <!-- select -->
                                                        <div class="form-group">
                                                            <label>Sembuh :</label>
                                                            <input type="text" placeholder="Sembuh" name="cov_dws_sembuh" id="cov_dws_sembuh" autocomplete="off" class="form-control reset validate">
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-4">
                                                        <!-- select -->
                                                        <div class="form-group">
                                                            <label>Dirawat :</label>
                                                            <input type="text" placeholder="Di Rawat" name="cov_dws_dirawat" id="cov_dws_dirawat" autocomplete="off" class="form-control reset validate">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <!-- select -->
                                                        <div class="form-group">
                                                            <label>Meninggal :</label>
                                                            <input type="text" placeholder="Meninggal" name="cov_dws_meninggal" id="cov_dws_meninggal" autocomplete="off" class="form-control reset validate">
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 batas"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card card-success">
                                                    <div class="card-header" style="background:#dc3545; color:white; font-size:45px;">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                Anak
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <!-- select -->
                                                    <div class="form-group">
                                                        <label>Sembuh :</label>
                                                        <input type="text" placeholder="Sembuh" name="cov_ank_sembuh" id="cov_ank_sembuh" autocomplete="off" class="form-control reset validate">
                                                    </div>
                                                </div>  
                                                <div class="col-md-4">
                                                    <!-- select -->
                                                    <div class="form-group">
                                                        <label>Dirawat :</label>
                                                        <input type="text" placeholder="Di Rawat" name="cov_ank_dirawat" id="cov_ank_dirawat" autocomplete="off" class="form-control reset validate">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <!-- select -->
                                                    <div class="form-group">
                                                        <label>Meninggal :</label>
                                                        <input type="text" placeholder="Meninggal" name="cov_ank_meninggal" id="cov_ank_meninggal" autocomplete="off" class="form-control reset validate">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                       
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-warning card-outline">
                            <div class="card-header" style="text-align: center;align-items: center;display: grid;font-family: fantasy;">
                                <h1 class="card-title m-0" style="text-align: center;font-size: 20px;">Pasien Dalam Pengawasan (PDP)</h1>
                            </div>
                            <div class="card-body">
                            <!-- One "tab" for each step in the form: -->
                                <div class="">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card card-success">
                                                    <div class="card-header" style="background:orange; color:white; font-size:45px;">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12 text-center">
                                                                Dewasa
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <!-- select -->
                                                    <div class="form-group">
                                                        <label>Sembuh :</label>
                                                        <input type="text" placeholder="Sembuh" name="pdp_dws_sembuh" id="pdp_dws_sembuh" autocomplete="off" class="form-control reset validate">
                                                    </div>
                                                </div>  
                                                <div class="col-md-4">
                                                    <!-- select -->
                                                    <div class="form-group">
                                                        <label>Dirawat :</label>
                                                        <input type="text" placeholder="Di Rawat" name="pdp_dws_dirawat" id="pdp_dws_dirawat" autocomplete="off" class="form-control reset validate">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <!-- select -->
                                                    <div class="form-group">
                                                        <label>Meninggal :</label>
                                                        <input type="text" placeholder="Meninggal" name="pdp_dws_meninggal" id="pdp_dws_meninggal" autocomplete="off" class="form-control reset validate">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12 batas"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="card card-success">
                                                <div class="card-header" style="background:orange; color:white; font-size:45px;">
                                                    <div class="card-body">
                                                        <div class="row">
                                                            <div class="col-md-12 text-center">
                                                            Anak
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <!-- select -->
                                                    <div class="form-group">
                                                        <label>Sembuh :</label>
                                                        <input type="text" placeholder="Sembuh" name="pdp_ank_sembuh" id="pdp_ank_sembuh" autocomplete="off" class="form-control reset validate">
                                                    </div>
                                                </div>  
                                                <div class="col-md-4">
                                                    <!-- select -->
                                                    <div class="form-group">
                                                        <label>Dirawat :</label>
                                                        <input type="text" placeholder="Di Rawat" name="pdp_ank_dirawat" id="pdp_ank_dirawat" autocomplete="off" class="form-control reset validate">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <!-- select -->
                                                    <div class="form-group">
                                                        <label>Meninggal :</label>
                                                        <input type="text" placeholder="Meninggal" name="pdp_ank_meninggal" id="pdp_ank_meninggal" autocomplete="off" class="form-control reset validate">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>                       
                            </div>
                        </div>
                    </div>     
                </div>
              </div>
            
              <div style="overflow:auto; display:block;">
                <div style="float:right;">
                  <button type="button" class="btn btn-warning" id="prevBtn" onclick="nextPrev(-1)">Sebelumnya</button>
                  <button type="button" class="btn btn-primary" id="nextBtn" onclick="nextPrev(1)">Selanjutnya</button>
                </div>
              </div>
              <!-- Circles which indicates the steps of the form: -->
              <div style="text-align:center;margin-top:40px; display:none;">
                <span class="step"></span>
                <span class="step"></span>
                <span class="step"></span>
              </div>
            </form>
              </div>
            </div>
          </div>
          <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
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
    <strong>Copyright &copy; 2020 <a href="https://rstugurejo.jatengprov.go.id">RSUD Tugurejo Provinsi Jawa Tengah</a>.</strong>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
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
  //$('html, body').animate({scrollTop : 0},900);
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
    // alert('ok')
    var obj = document.forms.namedItem("regForm")
    $.ajax({
    type: "POST",
    url: "<?php echo base_url('Screening_c/simpan') ?>",
    //url: "http://api.rstugurejo.jatengprov.go.id:8000/wsrstugu/rstugu/covid/test",
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
      if(response.status == false){
        var exp = '<?php echo base_url('404_override')?>';
        window.location.replace(exp);
      }else {     
        var analisa = '<?php echo base_url('analisa')?>/'+response.ID
        window.location.replace(analisa);
        //window.location.reload()
        console.log(response.ID)
      }
    }
    });
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}

function validateForm() {
  // This function deals with validation of the form fields
  var x, y, i, a, valid = true;
  x = document.getElementsByClassName("tab");
  z = x[currentTab].getElementsByClassName("validate-card");
  y = x[currentTab].getElementsByClassName("validate");
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
      var idku = y[i].id
      console.log(idku)
      
      $('html, body').animate({scrollTop : 0},600);
      swal('Informasi','Ada form yang belum di isi.','info')
      // and set the current valid status to false
      valid = false;
    } else {
      var idku = y[i].id
     
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
   
    // if(!/^[0-9.]+$/.test(a.value))
    if(!/^\d+$/.test(a.value))
    {
    a.value = a.value.substring(0,a.value.length-1000);
    }
    //ambil data ktp
    var kode = $(this).event;
    // var telp = $('#telp').val();
    // $('#telp_lengkap').html(telp);
    var code = (event.which) ? event.which : event.keyCode;
    
    //if(code == 13){
      
    //} 
  }

  $(function () {
    $(window).scroll(function() {
      if ($(this).scrollTop() > 100) {
        $('.back-to-top').fadeIn('slow');
      } else {
        $('.back-to-top').fadeOut('slow');
      }
    });
    $('.back-to-top').click(function(){
      $('html, body').animate({scrollTop : 0},1500);
      return false;
    });
  });
</script>
</body>
</html>
