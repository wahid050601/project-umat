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

  <!-- CUSTOM MODAL -->
  <link rel="stylesheet" href="assets/my-modal/custom-modal.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin - v2.5.0
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>


<style>
  /* Dashboard Cards */
  .dashboard .info-card {
    padding-bottom: 10px;
  }

  .dashboard .info-card h6 {
    font-size: 28px;
    color: #012970;
    font-weight: 700;
    margin: 0;
    padding: 0;
  }

  .dashboard .card-icon {
    font-size: 32px;
    line-height: 0;
    width: 64px;
    height: 64px;
    flex-shrink: 0;
    flex-grow: 0;
  }

  .dashboard .sales-card .card-icon {
    color: #4154f1;
    background: #f6f6fe;
  }

  .dashboard .revenue-card .card-icon {
    color: #2eca6a;
    background: #e0f8e9;
  }

  .dashboard .customers-card .card-icon {
    color: #ff771d;
    background: #ffecdf;
  }

  .dashboard .schedule-card .card-icon {
    color: #9333ea;
    background: #f3e8ff;
  }

  /* Institution Info */
  .institution-info {
    padding: 20px;
  }

  .institution-info h4 {
    color: #012970;
    font-weight: 700;
    margin-bottom: 20px;
  }

  .institution-info p {
    margin-bottom: 10px;
    color: #666;
  }

  .institution-info i {
    margin-right: 10px;
    color: #4154f1;
  }

  .institution-stats {
    padding: 20px;
    background: #f6f9ff;
    border-radius: 10px;
  }

  .stat-item {
    display: flex;
    justify-content: space-between;
    padding: 10px 0;
    border-bottom: 1px solid #e0e0e0;
  }

  .stat-item:last-child {
    border-bottom: none;
  }

  .stat-item .label {
    color: #666;
    font-weight: 600;
  }

  .stat-item .value {
    color: #012970;
    font-weight: 700;
  }
</style>

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

      <li class="nav-item"><a class="nav-link collapsed" href="index.php"><i class="bi bi-house-door-fill"></i><span>HOME</span></a></li>

      <li class="nav-item"><a class="nav-link collapsed" href="#" onclick="HtmlLoad('pages/kelembagaan/profil-lembaga.php')"><i class="bi bi-person-fill"></i><span>PROFIL LEMBAGA</span></a></li>

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#"><i class="bi bi-book-fill"></i><span>AKADEMIK</span><i class="bi bi-chevron-down ms-auto"></i></a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li><a href="#" onclick="HtmlLoad('pages/pelajaran/pelajaran.php')"><i class="bi bi-calendar-minus-fill"></i><span>JADWAL PELAJARAN</span></a></li>

          <li><a href="#" onclick="HtmlLoad('pages/rombel/rombel.php')"><i class="bi bi-person-vcard"></i><span>ROMBONGAN BELAJAR</span></a></li>

          <li><a href="#" onclick="HtmlLoad('pages/siswa/siswa.php')" ><i class="bi bi-person-lines-fill"></i><span>DATA SISWA</span></a></li>

          <li><a href="#" onclick="HtmlLoad('pages/guru/guru.php')" ><i class="bi bi-circle"></i><span>DATA GURU</span></a></li>
        </ul>
      </li>

      <li class="nav-item"><a class="nav-link collapsed" href="#" onclick="HtmlLoad('pages/administrasi/pengumuman.php')"><i class="bi bi-person-fill"></i><span>EKSTRAKURIKULER</span></a></li>

      <li class="nav-item"><a class="nav-link collapsed" href="#" onclick="HtmlLoad('pages/profile/profile.php')"><i class="bi bi-person"></i><span>DATA PRIBADI</span></a></li>

      <li class="nav-item"><a class="nav-link collapsed" href="logout.php"><i class="bi bi-power"></i><span>LOGOUT</span></a></li>
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">
    <div class="tampil">
    <!-- MAIN PAGES -->
      <div class="pagetitle">
        <h1>Selamat Datang</h1>
      </div>
      <section class="section dashboard">
        <!-- Info Cards -->
        <div class="row">
          <!-- Student Card -->
          <div class="col-xxl-3 col-md-6">
            <div class="card info-card sales-card">
              <div class="card-body">
                <h5 class="card-title">Total Siswa</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-people"></i>
                  </div>
                  <div class="ps-3">
                    <h6>250</h6>
                    <span class="text-muted small pt-2">Siswa Aktif</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Teacher Card -->
          <div class="col-xxl-3 col-md-6">
            <div class="card info-card revenue-card">
              <div class="card-body">
                <h5 class="card-title">Total Guru</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-person-workspace"></i>
                  </div>
                  <div class="ps-3">
                    <h6>25</h6>
                    <span class="text-muted small pt-2">Guru Aktif</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Classes Card -->
          <div class="col-xxl-3 col-md-6">
            <div class="card info-card customers-card">
              <div class="card-body">
                <h5 class="card-title">Total Kelas</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-building"></i>
                  </div>
                  <div class="ps-3">
                    <h6>12</h6>
                    <span class="text-muted small pt-2">Kelas Aktif</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Schedule Card -->
          <div class="col-xxl-3 col-md-6">
            <div class="card info-card schedule-card">
              <div class="card-body">
                <h5 class="card-title">Jadwal Pelajaran</h5>
                <div class="d-flex align-items-center">
                  <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                    <i class="bi bi-calendar3"></i>
                  </div>
                  <div class="ps-3">
                    <h6>48</h6>
                    <span class="text-muted small pt-2">Jadwal Aktif</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Institution Info -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Informasi Lembaga</h5>
                <div class="row">
                  <div class="col-md-6">
                    <div class="institution-info">
                      <h4>MI Yayasan Al-Jihad</h4>
                      <p><i class="bi bi-geo-alt"></i> Jl. Terusan Jend. Sudirman No.12, Malang</p>
                      <p><i class="bi bi-envelope"></i> info@miyaj.sch.id</p>
                      <p><i class="bi bi-telephone"></i> (0341) 123456</p>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="institution-stats">
                      <div class="stat-item">
                        <span class="label">Akreditasi</span>
                        <span class="value">A</span>
                      </div>
                      <div class="stat-item">
                        <span class="label">Tahun Berdiri</span>
                        <span class="value">1985</span>
                      </div>
                      <div class="stat-item">
                        <span class="label">NPSN</span>
                        <span class="value">20123456</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- <section class="section">
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
      </section> -->

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

  <!-- Custom Modal -->
  <script src="assets/my-modal/custom-modal.js"></script>

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