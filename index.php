<?php
  session_start();
  if (!isset($_SESSION["berhasil_login"])) {
    header ("Location: login.php");
    exit;
  }

require "function/database.php" ;

$koneksi = mysqli_connect ($host, $user, $pass, $database) ;

$data_siswa = mysqli_query ($koneksi, "select * from tb_siswa") ;
?>







<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo_yaj.jpg" rel="icon">
  <link href="assets/img/logo_yaj.jpg" rel="logo_yaj">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="assets/sweetalert/sweetalert2.min.css" rel="stylesheet">
  <link href="assets/fontawesome/css/all.css" rel="stylesheet">

  <!-- DATA TABLE -->
  <link rel="stylesheet" href="assets/datatable-pack/datables/dataTables.min.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo_yaj.jpg" alt="">
        <span class="d-none d-lg-block">AD-DA'WAH</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/Rivansyah (1).jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Rivansyah</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Rivansyah</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.php">
          <i class="bi bi-home"></i>
          <span>HOME</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#kelembagaan-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>KELEMBAGAAN</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="kelembagaan-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#" onclick="HtmlLoad('pages/kelembagaan/profil-lembaga.php')">
              <i class="bi bi-circle"></i><span>PROFIL LEMBAGA</span>
            </a>
          </li>
          <li>
            <a href="#" onclick="HtmlLoad('pages/kelembagaan/alamat-lembaga.php')">
              <i class="bi bi-circle"></i><span>ALAMAT LEMBAGA</span>
            </a>
          </li>
          <li>
            <a href="components-kartu-ujian.html">
              <i class="bi bi-circle"></i><span>PIMPINAN LEMBAGA</span>
            </a>
          </li>
          <li>
            <a href="components-kartu-ujian.html">
              <i class="bi bi-circle"></i><span>DATA YAYASAN</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>AKADEMIK</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#" onclick="HtmlLoad('pages/pelajaran/pelajaran.php')">
              <i class="bi bi-circle"></i><span>JADWAL PELAJARAN</span>
            </a>
          </li>
          <li>
            <a href="components-kartu-ujian.html">
              <i class="bi bi-circle"></i><span>KARTU UJIAN</span>
            </a>
          </li>
          <li>
            <a href="components-legger-nilai.html">
              <i class="bi bi-circle"></i><span>LEGGER NILAI</span>
            </a>
          </li>
          <li>
            <a href="#" onclick="HtmlLoad('pages/siswa/siswa.php')" >
              <i class="bi bi-circle"></i><span>DATA SISWA</span>
            </a>
          </li>
          <li>
            <a href="#" onclick="HtmlLoad('pages/guru/guru.php')" >
              <i class="bi bi-circle"></i><span>DATA GURU</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#administrasi-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>ADMINISTRASI</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="administrasi-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="#" onclick="HtmlLoad('pages/administrasi/persuratan.php')">
              <i class="bi bi-circle"></i><span>PERSURATAN</span>
            </a>
          </li>
          <li>
          <a href="#" onclick="HtmlLoad('pages/administrasi/pengumuman.php')">
              <i class="bi bi-circle"></i><span>PENGUMUMAN</span>
            </a>
          </li>
        </ul>
      </li><!-- End Components Nav -->

      <!-- <li class="nav-heading">#</li> -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" onclick="HtmlLoad('pages/profile/profile.php')">
          <i class="bi bi-person"></i>
          <span>DATA PRIBADI</span>
        </a>
      </li><!-- End Profile Page Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" href="logout.php">
          <i class="bi bi-power"></i>
          <span>LOGOUT</span>
        </a>
      </li><!-- End Profile Page Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="tampil">
    <!-- MAIN PAGES -->
      <div class="pagetitle">
        <h1>Selamat Datang</h1>
      </div>
      <section class="section">
        <div class="row">
          <div class="col-xl-4">
            <div class="card">
              <div class="card-body mt-4">
                <h3>15</h3>
                <h5>Guru</h5>
                <h5>2023/2024</h5>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="card">
              <div class="card-body mt-4">
                <h3>15</h3>
                <h5>Guru</h5>
                <h5>2023/2024</h5>
              </div>
            </div>
          </div>
          <div class="col-xl-4">
            <div class="card">
              <div class="card-body mt-4">
                <h3>15</h3>
                <h5>Guru</h5>
                <h5>2023/2024</h5>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="section">
        <div class="row">
          <div class="col-xl-15">
            <div class="card">
              <div class="card-body mt-4">
                <h3>STATISTIK SISWA</h3>
                <h5>Statistik Data Siswa Per Tahun Pelajaran</h5>
              </div>
            </div>
          </div>
        </div>
      </section>

    <!-- END MAIN PAGES -->
    </div>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <!-- <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      <!-- Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer>End Footer --> -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <!-- Bootstrap -->

  <script src="assets/js/jquery.min.js"></script>
  <!-- <script src="assets/js/jquery.slim.min.js"></script> -->
  <script src="assets/js/jquery-ui.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/vendor/bootstrap/bootstrap.min.js"></script>


  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/sweetalert/sweetalert2.all.min.js"></script>
  <script src="assets/fontawesome/css/all.js"></script>

  <!-- Data Table -->
  <script src="assets/datatable-pack/datables/dataTables.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- Utility JS -->
  <script>
    function HtmlLoad(url) {
      $('.tampil').empty();
      $('.tampil').load(url);
    }
  </script>

</body>

</html>