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
                  <div class="col-sm-12" style="text-align:center;">
                      <div class="col-md-12 information" style="text-align: center;">
                          <div class=="">
                           
                            Nama : <label id="nama_lengkap"><?php echo $header['NAMA'] ?></label> <br>
                            Hasil : <label><?php echo $header['KETHASIL'] ?></label>
                            
                          </div>
                      </div>
                    <img style="width:100px;" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBpZD0iTGF5ZXJfMSIgZW5hYmxlLWJhY2tncm91bmQ9Im5ldyAwIDAgNTEyIDUxMiIgaGVpZ2h0PSI1MTJweCIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHdpZHRoPSI1MTJweCI+PGc+PHBhdGggZD0ibTMwNC4yIDUxMmgtMjg5LjJjLTguMjg0IDAtMTUtNi43MTYtMTUtMTV2LTQ4LjJjMC00My43MDggMzUuNTU5LTc5LjI2NyA3OS4yNjctNzkuMjY3aDE2MC42NjdjNDMuNzA4IDAgNzkuMjY3IDM1LjU1OSA3OS4yNjcgNzkuMjY3djQ4LjJjLS4wMDEgOC4yODQtNi43MTcgMTUtMTUuMDAxIDE1eiIgZmlsbD0iIzQxMjgzMCIvPjxwYXRoIGQ9Im0zMTkuMiA0OTd2LTQ4LjJjMC00My43MDgtMzUuNTU5LTc5LjI2Ny03OS4yNjctNzkuMjY3aC04MC4zMzV2MTQyLjQ2N2gxNDQuNjAyYzguMjg0IDAgMTUtNi43MTYgMTUtMTV6IiBmaWxsPSIjMDAxZTI4Ii8+PHBhdGggZD0ibTI3Mi4wNjYgMjIyLjhoLTIyNC45MzJjLTguMjg0IDAtMTUtNi43MTYtMTUtMTV2LTEyNi40YzAtOC4yODQgNi43MTYtMTUgMTUtMTVoMjI0LjkzM2M4LjI4NCAwIDE1IDYuNzE2IDE1IDE1djEyNi40Yy0uMDAxIDguMjg0LTYuNzE2IDE1LTE1LjAwMSAxNXoiIGZpbGw9IiNmZmRjZDIiLz48cGF0aCBkPSJtMjg3LjA2NiAyMDcuOHYtMTI2LjRjMC04LjI4NC02LjcxNi0xNS0xNS0xNWgtMTEyLjQ2OHYxNTYuNGgxMTIuNDY4YzguMjg1IDAgMTUtNi43MTYgMTUtMTV6IiBmaWxsPSIjZmZjMWM0Ii8+PGNpcmNsZSBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGN4PSIxMTEuNCIgY3k9IjE1OS42IiBmaWxsPSIjNDEyODMwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIHI9IjE1Ii8+PGNpcmNsZSBjbGlwLXJ1bGU9ImV2ZW5vZGQiIGN4PSIyMDcuOCIgY3k9IjE1OS42IiBmaWxsPSIjNDEyODMwIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiIHI9IjE1Ii8+PHBhdGggZD0ibTE1OS42IDQ2My44Yy0zLjgzOSAwLTcuNjc4LTEuNDY0LTEwLjYwNi00LjM5NGwtNjQuMjY3LTY0LjI2NmMtMi44MTMtMi44MTMtNC4zOTQtNi42MjgtNC4zOTQtMTAuNjA2di00OC4yYzAtOC4yODQgNi43MTYtMTUgMTUtMTVoMTI4LjUzM2M4LjI4NCAwIDE1IDYuNzE2IDE1IDE1djQ4LjJjMCAzLjk3OC0xLjU4IDcuNzkzLTQuMzk0IDEwLjYwNmwtNjQuMjY3IDY0LjI2N2MtMi45MjggMi45MjgtNi43NjcgNC4zOTMtMTAuNjA1IDQuMzkzeiIgZmlsbD0iI2ZmYzFjNCIvPjxwYXRoIGQ9Im00Ny4xMzQgMjM4Ljg2N2gtMTYuMDY4Yy04LjI4NCAwLTE1LTYuNzE2LTE1LTE1czYuNzE2LTE1IDE1LTE1aDE2LjA2N2M4LjI4NCAwIDE1IDYuNzE2IDE1IDE1cy02LjcxNSAxNS0xNC45OTkgMTV6IiBmaWxsPSIjZjNlOWUzIi8+PHBhdGggZD0ibTQ3LjEzNCAzMDMuMTMzaC0xNi4wNjhjLTguMjg0IDAtMTUtNi43MTYtMTUtMTVzNi43MTYtMTUgMTUtMTVoMTYuMDY3YzguMjg0IDAgMTUgNi43MTYgMTUgMTVzLTYuNzE1IDE1LTE0Ljk5OSAxNXoiIGZpbGw9IiNmM2U5ZTMiLz48cGF0aCBkPSJtMjg4LjEzNCAyMzguODY3aC0xNi4wNjdjLTguMjg0IDAtMTUtNi43MTYtMTUtMTVzNi43MTYtMTUgMTUtMTVoMTYuMDY3YzguMjg0IDAgMTUgNi43MTYgMTUgMTVzLTYuNzE2IDE1LTE1IDE1eiIgZmlsbD0iI2ViZGNkMiIvPjxwYXRoIGQ9Im0yODguMTM0IDMwMy4xMzNoLTE2LjA2N2MtOC4yODQgMC0xNS02LjcxNi0xNS0xNXM2LjcxNi0xNSAxNS0xNWgxNi4wNjdjOC4yODQgMCAxNSA2LjcxNiAxNSAxNXMtNi43MTYgMTUtMTUgMTV6IiBmaWxsPSIjZWJkY2QyIi8+PHBhdGggZD0ibTE3MC4yMDYgNDU5LjQwNiA2NC4yNjctNjQuMjY3YzIuODEzLTIuODEzIDQuMzk0LTYuNjI4IDQuMzk0LTEwLjYwNnYtNDguMmMwLTguMjg0LTYuNzE2LTE1LTE1LTE1aC02NC4yNjh2MTQyLjQ2N2guMDAxYzMuODM4IDAgNy42NzctMS40NjUgMTAuNjA2LTQuMzk0eiIgZmlsbD0iI2ZmYTViNiIvPjxwYXRoIGQ9Im0yMjMuODY2IDM1MS4zMzNoLTEyOC41MzNjLTM0Ljg0OSAwLTYzLjE5OS0yOC4zNTItNjMuMTk5LTYzLjJ2LTgwLjMzM2MwLTguMjg0IDYuNzE2LTE1IDE1LTE1aDIyNC45MzNjOC4yODQgMCAxNSA2LjcxNiAxNSAxNXY4MC4zMzNjLS4wMDEgMzQuODQ5LTI4LjM1MiA2My4yLTYzLjIwMSA2My4yeiIgZmlsbD0iI2ZhZjVmNSIvPjxwYXRoIGQ9Im0yODcuMDY2IDI4OC4xMzN2LTgwLjMzM2MwLTguMjg0LTYuNzE2LTE1LTE1LTE1aC0xMTIuNDY4djE1OC41MzRoNjQuMjY4YzM0Ljg0OS0uMDAxIDYzLjItMjguMzUyIDYzLjItNjMuMjAxeiIgZmlsbD0iI2YzZTllMyIvPjxwYXRoIGQ9Im0xOTEuNzQ2IDBoLTY0LjI5NmMtNjEuNDE3IDAtMTExLjM4NCA0OS45NjctMTExLjM4NCAxMTEuMzg0di4wMTZjMCA4LjI4NCA2LjcxNiAxNSAxNSAxNWgzMi4xNDljNDEuMTA4IDAgNzcuMDgzLTIyLjM4OCA5Ni4zODItNTUuNjEzIDE5LjI5OSAzMy4yMjYgNTUuMjc0IDU1LjYxMyA5Ni4zODIgNTUuNjEzaDMyLjE0OWM4LjI4NCAwIDE1LTYuNzE2IDE1LTE1di0uMDE2Yy4wMDItNjEuNDE3LTQ5Ljk2NS0xMTEuMzg0LTExMS4zODItMTExLjM4NHoiIGZpbGw9IiM4MjMyMzciLz48ZyBmaWxsPSIjMDBhMDhjIj48cGF0aCBkPSJtNDk3IDQ0Ny43MzNoLTE2LjA2N2MtOC4yODQgMC0xNS02LjcxNi0xNS0xNXM2LjcxNi0xNSAxNS0xNWgxNi4wNjdjOC4yODQgMCAxNSA2LjcxNiAxNSAxNXMtNi43MTYgMTUtMTUgMTV6Ii8+PHBhdGggZD0ibTM4NC41MzMgNDQ3LjczM2gtMTYuMDY2Yy04LjI4NCAwLTE1LTYuNzE2LTE1LTE1czYuNzE2LTE1IDE1LTE1aDE2LjA2NmM4LjI4NCAwIDE1IDYuNzE2IDE1IDE1cy02LjcxNiAxNS0xNSAxNXoiLz48cGF0aCBkPSJtNDMyLjczMyA1MTJjLTguMjg0IDAtMTUtNi43MTYtMTUtMTV2LTE2LjA2N2MwLTguMjg0IDYuNzE2LTE1IDE1LTE1czE1IDYuNzE2IDE1IDE1djE2LjA2N2MwIDguMjg0LTYuNzE1IDE1LTE1IDE1eiIvPjxwYXRoIGQ9Im00MzIuNzMzIDM5OS41MzNjLTguMjg0IDAtMTUtNi43MTYtMTUtMTV2LTE2LjA2NmMwLTguMjg0IDYuNzE2LTE1IDE1LTE1czE1IDYuNzE2IDE1IDE1djE2LjA2NmMwIDguMjg0LTYuNzE1IDE1LTE1IDE1eiIvPjxwYXRoIGQ9Im00MDkuMjczIDM4OC4wMzktMjIuMTcyLTIyLjE1MWMtNS44NjEtNS44NTUtMTUuMzU4LTUuODUtMjEuMjEzLjAxLTUuODU1IDUuODYxLTUuODUxIDE1LjM1OC4wMSAyMS4yMTNsMjIuMTcyIDIyLjE1MWM1Ljg2MSA1Ljg1NSAxNS4zNTggNS44NSAyMS4yMTMtLjAxIDUuODU2LTUuODYxIDUuODUxLTE1LjM1OC0uMDEtMjEuMjEzeiIvPjxwYXRoIGQ9Im00NTYuMTkzIDM4OC4wMzkgMjIuMTcyLTIyLjE1MWM1Ljg2MS01Ljg1NSAxNS4zNTgtNS44NSAyMS4yMTMuMDEgNS44NTUgNS44NjEgNS44NTEgMTUuMzU4LS4wMSAyMS4yMTNsLTIyLjE3MiAyMi4xNTFjLTUuODYxIDUuODU1LTE1LjM1OCA1Ljg1LTIxLjIxMy0uMDEtNS44NTUtNS44NjEtNS44NS0xNS4zNTguMDEtMjEuMjEzeiIvPjxwYXRoIGQ9Im00OTkuNTY4IDQ3OC4zNTUtMjIuMTcyLTIyLjE1MWMtNS44NjEtNS44NTUtMTUuMzU4LTUuODUtMjEuMjEzLjAxLTUuODU1IDUuODYxLTUuODUxIDE1LjM1OC4wMSAyMS4yMTNsMjIuMTcyIDIyLjE1MWM1Ljg2MSA1Ljg1NSAxNS4zNTggNS44NSAyMS4yMTMtLjAxIDUuODU2LTUuODYgNS44NTEtMTUuMzU4LS4wMS0yMS4yMTN6Ii8+PHBhdGggZD0ibTM2NS44OTkgNDc4LjM1NSAyMi4xNzItMjIuMTUxYzUuODYxLTUuODU1IDE1LjM1OC01Ljg1IDIxLjIxMy4wMSA1Ljg1NSA1Ljg2MSA1Ljg1MSAxNS4zNTgtLjAxIDIxLjIxM2wtMjIuMTcyIDIyLjE1MWMtNS44NjEgNS44NTUtMTUuMzU4IDUuODUtMjEuMjEzLS4wMXMtNS44NTEtMTUuMzU4LjAxLTIxLjIxM3oiLz48L2c+PGVsbGlwc2UgY3g9IjQzMi43MzMiIGN5PSI0MzIuNzMzIiBmaWxsPSIjZGZmNDczIiByeD0iNjMuMiIgcnk9IjYzLjIiIHRyYW5zZm9ybT0ibWF0cml4KC43MDcgLS43MDcgLjcwNyAuNzA3IC0xNzkuMjQ0IDQzMi43MzMpIi8+PHBhdGggZD0ibTQzMi43MzMgNDk1LjkzM3YtMTI2LjRjMzQuODQ5IDAgNjMuMiAyOC4zNTIgNjMuMiA2My4ycy0yOC4zNTEgNjMuMi02My4yIDYzLjJ6IiBmaWxsPSIjOGVlMjZiIi8+PHBhdGggZD0ibTE5MS43NDYgMGgtMzIuMTQ4djcwLjc4NmMxOS4yOTkgMzMuMjI2IDU1LjI3NCA1NS42MTMgOTYuMzgyIDU1LjYxM2gzMi4xNDljOC4yODQgMCAxNS02LjcxNiAxNS0xNXYtLjAxNmMuMDAxLTYxLjQxNi00OS45NjYtMTExLjM4My0xMTEuMzgzLTExMS4zODN6IiBmaWxsPSIjNDEyODMwIi8+PC9nPjwvc3ZnPgo=" />                      <div>Terimakasih telah membantu <a href="rstugurejo.jatengprov.go.id" title="srip">rstugurejo.jatengprov.go.id</a> untuk mendata</div>
                  </div>
                </div>
                <div style="overflow:auto;">
                  <div style="float:right; display:none;">
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
    <strong>Copyright &copy; 2020 <a href="https://rstugurejo.jatengprov.go.id/">RSUD Tugurejo</a>.</strong>
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
  var nama = $('#nama').val()
  var alamat = $('#alamat').val();
  $('#nama_lengkap').html(nama)
  $('#alamat_lengkap').html(alamat)
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
    // alert('ok')
    
    //return false;
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
   
    // if(!/^[0-9.]+$/.test(a.value))
    if(!/^\d+$/.test(a.value))
    {
    a.value = a.value.substring(0,a.value.length-1000);
    }
    //ambil data ktp
    var kode = $(this).event;
   
    var telp = $('#telp').val();
    $('#telp_lengkap').html(telp);
    
    var code = (event.which) ? event.which : event.keyCode;
    
    //if(code == 13){
      
    //} 
  }
</script>
</body>
</html>
