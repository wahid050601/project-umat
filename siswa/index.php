<?php
session_start();
if (isset($_SESSION['siswa_login']) && $_SESSION['siswa_login'] === true) {
    header('Location: dashboard.php');
    exit;
}
$loginError = $_SESSION['siswa_login_error'] ?? '';
unset($_SESSION['siswa_login_error']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Siswa</title>
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
  <link href="../assets/sweetalert/sweetalert2.min.css" rel="stylesheet">
</head>
<body style="background-image: url('../assets/img/yaj.jpg'); background-size: cover; background-repeat: no-repeat;">
  <main>
    <div class="container">
      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-7 col-sm-10">
              <div class="card mb-3 shadow-sm">
                <div class="card-body p-4">
                  <div class="text-center py-3">
                    <img src="../assets/img/logo_yaj.jpg" alt="logo" style="width: 70px; margin: 0 auto; display: block;">
                    <h5 class="card-title text-center pb-2 fs-4 mt-3">Portal Siswa</h5>
                    <p class="text-center small mb-0">Masukkan NIS dan tanggal lahir untuk login</p>
                  </div>

                  <?php if ($loginError !== ''): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                      <?= htmlspecialchars($loginError) ?>
                    </div>
                  <?php endif; ?>

                  <form class="row g-3" method="POST" action="auth.php">
                    <div class="col-12">
                      <label for="nis" class="form-label">NIS</label>
                      <input type="text" name="nis" id="nis" class="form-control" placeholder="Contoh: 11.001" required>
                    </div>
                    <div class="col-12">
                      <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                      <input type="text" name="tanggal_lahir" id="tanggal_lahir" class="form-control" placeholder="ddmmyyyy" required>
                      <small class="text-muted">Format: ddmmyyyy, contoh 01022015</small>
                    </div>
                    <div class="col-12 mt-3">
                      <button type="submit" name="login_siswa" class="btn btn-primary w-100">LOGIN SISWA</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </main>
</body>
</html>
