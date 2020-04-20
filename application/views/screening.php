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
              <u><h2>Data Diri</h2></u>
              <div class="row">
                <div class="col-sm-5">
                  <!-- select -->
                  <div class="form-group">
                    <label>No KTP : <code>(* Silahkan cari atau isi secara manual ) </code> </label>
                    <input type="hidden" id="private_key" name="private_key" value="<?php echo $token ?>" class="form-control validate">
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
                    <input type="text" placeholder="No. Telp" name="telp" id="telp" autocomplete="off" onkeyup="allowNumbersOnly(this, event)" maxlength="12" class="form-control reset validate">
                  </div>
                </div>
              </div>
              </div>
              <div class="tab">
              <u></u>
              <!-- <div class="card card-warning card-outline">
                <div class="card-header">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                      <label> Apakah anda sehat ?</label>
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input validate" type="radio" name="" id="" value="">
                            <label class="form-check-label" for="gridRadios1">
                             Ya
                            </label>
                          </div>
                        </div>
                        <div class="col-sm-10">
                          <div class="form-check">
                            <input class="form-check-input validate" type="radio" name="" id="" value="">
                            <label class="form-check-label" for="gridRadios1">
                             Tidak
                            </label>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div> -->
              <?php echo $soal; ?>
                <?php foreach ($js_soal as $js_soal1) { if($js_soal1['STATUS'] == 'A') {if($js_soal1['TIPE'] == 'YA_TIDAK'){?>
                <div class="col-md-12">
                  <div class="form-group">
                    <input type="hidden" placeholder="" name="<?php echo $js_soal1['IDSOAL']?>" id="<?php echo $js_soal1['IDSOAL']?>" autocomplete="off" class="form-control reset validate">
                  </div>
                </div>
                <?php } } }?>
              </div>
              <div class="tab">
                <div class="col-sm-12" style="text-align:center;">
                    <div class="col-md-12 information" style="text-align: center;">
                        <div class=="">
                          Nama : <label id="nama_lengkap">---</label> <br>
                          Alamat : <label id="alamat_lengkap">---</label> <br>
                          No. Telp : <label id="telp_lengkap">---</label>
                        </div>
                    </div>
                    <img style="width:100px;" src="data:image/svg+xml;utf8;base64,PD94bWwgdmVyc2lvbj0iMS4wIj8+CjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBoZWlnaHQ9IjUxMnB4IiB2aWV3Qm94PSIwIDAgNDk2IDQ5Ni4wMTQ2MSIgd2lkdGg9IjUxMnB4Ij48cGF0aCBkPSJtNDU1Ljg4MjgxMiAxMjguMDAzOTA2LTYwLjgwMDc4MS0yNy4wNDY4NzUtMjcuMDcwMzEyLTYwLjgyNDIxOS02Ni4xNjc5NjkgNi45MTAxNTctNTMuODMyMDMxLTM5LjAzOTA2My01My44NjMyODEgMzkuMDM5MDYzLTY2LjEzNjcxOS02LjkxMDE1Ny0yNy4wNTA3ODEgNjAuNzk2ODc2LTYwLjgyNDIxOSAyNy4wNzQyMTggNi45MTQwNjIgNjYuMTY3OTY5LTM5LjAzOTA2MiA1My44MzIwMzEgMzkuMDM5MDYyIDUzLjg2MzI4Mi02LjkxNDA2MiA2Ni4xMzY3MTggNjAuODAwNzgxIDI3LjA0Njg3NSAyNy4wNzQyMTkgNjAuODI0MjE5IDY2LjE2Nzk2OS02LjkxMDE1NiA1My44MzIwMzEgMzkuMDM5MDYyIDUzLjg2MzI4MS0zOS4wMzkwNjIgNjYuMTM2NzE5IDYuOTEwMTU2IDI3LjA0Njg3NS02MC44MDA3ODEgNjAuODI0MjE4LTI3LjA3MDMxMy02LjkxNDA2Mi02Ni4xNjc5NjggMzkuMDQyOTY5LTUzLjgzMjAzMi0zOS4wNDI5NjktNTMuODYzMjgxem0tMjU1Ljg3MTA5MyAyMTYtNjcuOTIxODc1LTY3LjkyMTg3NSAyMi42NDA2MjUtMjIuNTU4NTkzIDQ1LjI4MTI1IDQ1LjE5OTIxOCAxMzUuNzU3ODEyLTEzNS43NTc4MTIgMjIuNjQwNjI1IDIyLjYzNjcxOHptMCAwIiBmaWxsPSIjNTdhNGZmIi8+PGcgZmlsbD0iIzFlODFjZSI+PHBhdGggZD0ibTQ5NC40OTIxODggMjQzLjMwODU5NC0zNy4yNS01MS4zODY3MTkgNi42MDE1NjItNjMuMTA5Mzc1Yy4zNTkzNzUtMy40NDkyMTktMS41MzkwNjItNi43MzQzNzUtNC43MDcwMzEtOC4xNDQ1MzFsLTU3Ljk4MDQ2OS0yNS44MDA3ODEtMjUuODAwNzgxLTU3Ljk4NDM3NmMtMS40MTc5NjktMy4xNjAxNTYtNC42OTkyMTktNS4wNTQ2ODctOC4xNDQ1MzEtNC43MTA5MzdsLTYzLjEyMTA5NCA2LjU5NzY1Ni01MS4zODI4MTMtMzcuMjQ2MDkzYy0yLjgwMDc4MS0yLjAzMTI1LTYuNTg5ODQzLTIuMDMxMjUtOS4zOTA2MjUgMGwtNTEuMzg2NzE4IDM3LjI0NjA5My02My4xMTcxODgtNi41OTc2NTZjLTMuNDQxNDA2LS4zMjgxMjUtNi43MTA5MzggMS41NjI1LTguMTQ0NTMxIDQuNzAzMTI1bC0yNS44MDA3ODEgNTcuOTg0Mzc1LTU3Ljk4NDM3NiAyNS44MDg1OTRjLTMuMTY0MDYyIDEuNDA2MjUtNS4wNjI1IDQuNjkxNDA2LTQuNzAzMTI0IDguMTM2NzE5bDYuNTk3NjU2IDYzLjExNzE4Ny0zNy4yNDYwOTQgNTEuMzg2NzE5Yy0yLjAzMTI1IDIuODAwNzgxLTIuMDMxMjUgNi41ODk4NDQgMCA5LjM5MDYyNWwzNy4yNDYwOTQgNTEuMzgyODEyLTYuNTk3NjU2IDYzLjEyMTA5NGMtLjM2MzI4MiAzLjQ0NTMxMyAxLjUzNTE1NiA2LjczNDM3NSA0LjcwMzEyNCA4LjE0NDUzMWw1Ny45ODQzNzYgMjUuODAwNzgyIDI1LjgwMDc4MSA1Ny45ODQzNzRjMS40MjU3ODEgMy4xNDg0MzggNC42OTkyMTkgNS4wNDI5NjkgOC4xNDQ1MzEgNC43MTA5MzhsNjMuMTE3MTg4LTYuNjAxNTYyIDUxLjM4NjcxOCAzNy4yNWMyLjgwMDc4MiAyLjAzMTI1IDYuNTg5ODQ0IDIuMDMxMjUgOS4zOTA2MjUgMGw1MS4zODI4MTMtMzcuMjUgNjMuMTIxMDk0IDYuNjAxNTYyYzMuNDQ1MzEyLjM0NzY1NiA2LjcyMjY1Ni0xLjU0Njg3NSA4LjE0NDUzMS00LjcwMzEyNWwyNS44MDA3ODEtNTcuOTg0Mzc1IDU3Ljk4MDQ2OS0yNS44MDg1OTRjMy4xNjQwNjItMS40MTAxNTYgNS4wNjI1LTQuNjkxNDA2IDQuNzA3MDMxLTguMTM2NzE4bC02LjYwMTU2Mi02My4xMjEwOTQgMzcuMjUtNTEuMzgyODEzYzIuMDM1MTU2LTIuODAwNzgxIDIuMDM1MTU2LTYuNTk3NjU2IDAtOS4zOTg0Mzd6bS01MiA1My44NjMyODFjLTEuMTYwMTU3IDEuNTk3NjU2LTEuNjg3NSAzLjU2NjQwNi0xLjQ4MDQ2OSA1LjUyNzM0NGw2LjMwNDY4NyA2MC4zODI4MTItNTUuNDgwNDY4IDI0LjY5OTIxOWMtMS44MTI1Ljc5Njg3NS0zLjI2NTYyNiAyLjI0MjE4OC00LjA2NjQwNyA0LjA1NDY4OGwtMjQuNjc5Njg3IDU1LjQ4MDQ2OC02MC4zOTg0MzgtNi4zMTI1Yy0xLjk2MDkzNy0uMjAzMTI1LTMuOTI1NzgxLjMyODEyNS01LjUxOTUzMSAxLjQ4ODI4MmwtNDkuMTYwMTU2IDM1LjYzMjgxMi00OS4xNjc5NjktMzUuNjMyODEyYy0xLjM2MzI4MS0uOTk2MDk0LTMuMDAzOTA2LTEuNTMxMjUtNC42ODc1LTEuNTI3MzQ0LS4yODEyNSAwLS41NjI1IDAtLjgwMDc4MS4wMzkwNjJsLTYwLjQwMjM0NCA2LjMxMjUtMjQuNjc5Njg3LTU1LjQ4MDQ2OGMtLjgwNDY4OC0xLjgxMjUtMi4yNS0zLjI2MTcxOS00LjA2MjUtNC4wNjY0MDdsLTU1LjUxMTcxOS0yNC42ODc1IDYuMzA0Njg3LTYwLjM4MjgxMmMuMjAzMTI1LTEuOTYwOTM4LS4zMjQyMTgtMy45Mjk2ODgtMS40ODA0NjgtNS41MjczNDRsLTM1LjYzMjgxMy00OS4xNjc5NjkgMzUuNjMyODEzLTQ5LjE2Nzk2OGMxLjE1NjI1LTEuNTk3NjU3IDEuNjgzNTkzLTMuNTY2NDA3IDEuNDgwNDY4LTUuNTI3MzQ0bC02LjMwNDY4Ny02MC4zODY3MTkgNTUuNDgwNDY5LTI0LjY5NTMxM2MxLjgxMjUtLjc5Njg3NCAzLjI2MTcxOC0yLjI0MjE4NyA0LjA2MjUtNC4wNTQ2ODdsMjQuNjc5Njg3LTU1LjQ4MDQ2OSA2MC40MDIzNDQgNi4zMTI1YzEuOTU3MDMxLjE5NTMxMyAzLjkyMTg3NS0uMzM1OTM3IDUuNTE5NTMxLTEuNDg4MjgxbDQ5LjE2Nzk2OS0zNS42MzI4MTMgNDkuMTY3OTY5IDM1LjYzMjgxM2MxLjU5Mzc1IDEuMTU2MjUgMy41NTg1OTMgMS42ODM1OTQgNS41MTk1MzEgMS40ODgyODFsNjAuMzk4NDM3LTYuMzEyNSAyNC42Nzk2ODggNTUuNDgwNDY5Yy44MDQ2ODcgMS44MTI1IDIuMjUzOTA2IDMuMjU3ODEzIDQuMDY2NDA2IDQuMDYyNWw1NS40ODA0NjkgMjQuNjg3NS02LjMwNDY4OCA2MC4zODY3MTljLS4yMDcwMzEgMS45NjA5MzcuMzIwMzEzIDMuOTI5Njg3IDEuNDgwNDY5IDUuNTI3MzQ0bDM1LjYyODkwNiA0OS4xNjc5Njh6bTAgMCIvPjxwYXRoIGQ9Im0zNDEuNDI1NzgxIDE1Ny4zMDg1OTRjLTMuMTI1LTMuMTI1LTguMTg3NS0zLjEyNS0xMS4zMTI1IDBsLTEzMC4xMDE1NjIgMTMwLjEwMTU2Mi0zOS42MjUtMzkuNTUwNzgxYy0zLjEyMTA5NC0zLjExMzI4MS04LjE3NTc4MS0zLjExMzI4MS0xMS4yOTY4NzUgMGwtMjIuNjc5Njg4IDIyLjU0Mjk2OWMtMS41MDM5MDYgMS41LTIuMzUxNTYyIDMuNTM5MDYyLTIuMzUxNTYyIDUuNjY0MDYycy44NDc2NTYgNC4xNjQwNjMgMi4zNTE1NjIgNS42NjQwNjNsNjcuOTIxODc1IDY3LjkyMTg3NWMzLjEyMTA5NCAzLjEyMTA5NCA4LjE4NzUgMy4xMjEwOTQgMTEuMzEyNSAwbDE1OC4zOTg0MzgtMTU4LjQwMjM0NGMzLjEyMTA5My0zLjEyMTA5NCAzLjEyMTA5My04LjE4NzUgMC0xMS4zMTI1em0tMTQxLjQxNDA2MiAxNzUuMzgyODEyLTU2LjYwMTU2My01Ni42MDE1NjIgMTEuMzEyNS0xMS4yODUxNTYgMzkuNjQwNjI1IDM5LjU1ODU5M2MzLjEyMTA5NCAzLjExNzE4OCA4LjE3OTY4OCAzLjExNzE4OCAxMS4zMDQ2ODggMGwxMzAuMTAxNTYyLTEzMC4wODk4NDMgMTEuMzI4MTI1IDExLjMyODEyNHptMCAwIi8+PC9nPjwvc3ZnPgo=" />
                    <div>Terimakasih telah membantu <a href="https://rstugurejo.jatengprov.go.id" title="srip">rstugurejo.jatengprov.go.id</a> untuk mendata</div>
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
    <strong>Copyright &copy; 2020 <a href="https://rstugurejo.jatengprov.go.id">RSUD Tugurejo</a>.</strong>
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
        var analisa = '<?php echo base_url('screening_c/card_analisa')?>/'+response.ID
        window.location.replace(analisa);
        //window.location.reload()
        console.log(response.ID)
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
      $('.'+idku).css("background-color", "yellow");
      // and set the current valid status to false
      valid = false;
    } else {
      var idku = y[i].id
      $('.'+idku).css("background-color", "white");
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

    $('#nama').on('keyup', function(){
      var nama = $(this).val();
      $('#nama_lengkap').html(nama)
    })

    $('#alamat').on('keyup', function(){
      var alamat = $(this).val();
      $('#alamat_lengkap').html(alamat)
    })

    <?php foreach($js_soal as $js_soal){ if($js_soal['STATUS'] == 'A') { if($js_soal['TIPE'] == 'YA_TIDAK'){?>
      $('input:radio[name="<?php echo $js_soal['IDSOAL'] ?>-radio"]').change(function(){
        if($(this).val() == 'Ya'){
          $('#<?php echo $js_soal['IDSOAL'] ?>').val('Ya');
        } else {
          $('#<?php echo $js_soal['IDSOAL']?>').val('Tidak');
        }
      });
   
    <?php } } }?>
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
