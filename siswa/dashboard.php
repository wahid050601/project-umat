<?php
session_start();
if (!(isset($_SESSION['siswa_login']) && $_SESSION['siswa_login'] === true)) {
    header('Location: index.php');
    exit;
}

require_once __DIR__ . '/../function/database.php';
$conn = mysqli_connect($host, $user, $pass, $database);

if (!$conn) {
    die('Koneksi database gagal.');
}

$siswaId = (int) $_SESSION['siswa_id'];

$profileSql = "
    SELECT s.id_siswa, s.nis_siswa, s.nisn_siswa, s.nik_siswa, s.nama_siswa, s.jk_siswa,
           s.tplahir_siswa, s.tgl_lahir, s.ayah_siswa, s.ibu_siswa, s.kelas_siswa,
           COALESCE(r.ket_rombel, '-') as rombel_siswa, s.telp_siswa
    FROM tb_siswa s
    LEFT JOIN tb_rombel_set rs ON rs.id_siswa = s.id_siswa
    LEFT JOIN tb_rombel r ON r.id = rs.id_rombel
    WHERE s.id_siswa = ?
    LIMIT 1";

$profileStmt = $conn->prepare($profileSql);
$profileStmt->bind_param('i', $siswaId);
$profileStmt->execute();
$profileResult = $profileStmt->get_result();
$profile = $profileResult->fetch_assoc();

$nilaiSql = "
    SELECT n.id, m.mata_pelajaran, r.ket_rombel, n.nilai_harian, n.nilai_smts, n.semester, n.tp_nilai
    FROM tb_nilai_siswa n
    LEFT JOIN tb_mata_pelajaran m ON m.id = n.id_mapel
    LEFT JOIN tb_rombel r ON r.id = n.id_kelas
    WHERE n.id_siswa = ?
    ORDER BY m.mata_pelajaran ASC";

$nilaiStmt = $conn->prepare($nilaiSql);
$nilaiStmt->bind_param('i', $siswaId);
$nilaiStmt->execute();
$nilaiResult = $nilaiStmt->get_result();
$nilaiRows = [];
while ($row = $nilaiResult->fetch_assoc()) {
    $nilaiRows[] = $row;
}

$rombelId = $_SESSION['siswa_rombel_id'] ?? 0;
$jadwalSql = "
    SELECT j.id_jadwal, LOWER(j.hari) as hari, j.id_waktu, w.label, w.jam_mulai, w.jam_selesai,
           COALESCE(w.istirahat, 0) as istirahat, COALESCE(m.mata_pelajaran, '-') as mata_pelajaran,
           COALESCE(g.nama_guru, '-') as nama_guru
    FROM tb_jadwal_mapel j
    LEFT JOIN tb_jam_belajar w ON w.id = j.id_waktu
    LEFT JOIN tb_mata_pelajaran m ON m.id = j.id_mapel
    LEFT JOIN tb_guru g ON g.id_guru = j.id_guru
    WHERE j.id_kelas = ?
    ORDER BY FIELD(j.hari, 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'), j.id_waktu ASC";

$jadwalStmt = $conn->prepare($jadwalSql);
$jadwalStmt->bind_param('i', $rombelId);
$jadwalStmt->execute();
$jadwalResult = $jadwalStmt->get_result();
$jadwalRows = [];
while ($row = $jadwalResult->fetch_assoc()) {
    $jadwalRows[] = $row;
}

$hariList = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
$jadwalByDay = [];
foreach ($hariList as $hari) {
    $jadwalByDay[$hari] = [];
}
foreach ($jadwalRows as $row) {
    $jadwalByDay[strtolower($row['hari'])][] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Dashboard Siswa</title>
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
  <div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <div>
        <h3 class="mb-0">Portal Siswa</h3>
        <small class="text-muted">Halo, <?= htmlspecialchars($_SESSION['siswa_nama']) ?></small>
      </div>
      <a href="logout.php" class="btn btn-outline-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin logout?');">Logout</a>
    </div>

    <div class="row g-4">
      <div class="col-lg-4">
        <div class="card shadow-sm">
          <div class="card-header bg-primary text-white">Data Siswa</div>
          <div class="card-body">
            <table class="table table-sm table-borderless mb-0">
              <tr><th width="40%">NIS</th><td><?= htmlspecialchars($profile['nis_siswa'] ?? '-') ?></td></tr>
              <tr><th>NISN</th><td><?= htmlspecialchars($profile['nisn_siswa'] ?? '-') ?></td></tr>
              <tr><th>Nama</th><td><?= htmlspecialchars($profile['nama_siswa'] ?? '-') ?></td></tr>
              <tr><th>Jenis Kelamin</th><td><?= htmlspecialchars($profile['jk_siswa'] ?? '-') ?></td></tr>
              <tr><th>Tempat Lahir</th><td><?= htmlspecialchars($profile['tplahir_siswa'] ?? '-') ?></td></tr>
              <tr><th>Tanggal Lahir</th><td><?= htmlspecialchars($profile['tgl_lahir'] ?? '-') ?></td></tr>
              <tr><th>Ayah</th><td><?= htmlspecialchars($profile['ayah_siswa'] ?? '-') ?></td></tr>
              <tr><th>Ibu</th><td><?= htmlspecialchars($profile['ibu_siswa'] ?? '-') ?></td></tr>
              <tr><th>Kelas</th><td><?= htmlspecialchars($profile['kelas_siswa'] ?? '-') ?></td></tr>
              <tr><th>Rombel</th><td><?= htmlspecialchars($profile['rombel_siswa'] ?? '-') ?></td></tr>
              <tr><th>No. Telp</th><td><?= htmlspecialchars($profile['telp_siswa'] ?? '-') ?></td></tr>
            </table>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="card shadow-sm mb-4">
          <div class="card-header bg-success text-white">Jadwal Pelajaran</div>
          <div class="card-body">
            <?php foreach ($hariList as $hari): ?>
              <div class="mb-3">
                <h6 class="text-uppercase mb-2"><?= htmlspecialchars(ucwords($hari)) ?></h6>
                <?php if (empty($jadwalByDay[$hari])): ?>
                  <div class="text-muted">Belum ada jadwal.</div>
                <?php else: ?>
                  <div class="list-group">
                    <?php foreach ($jadwalByDay[$hari] as $jadwal): ?>
                      <div class="list-group-item">
                        <div class="d-flex justify-content-between align-items-center">
                          <strong><?= htmlspecialchars($jadwal['mata_pelajaran']) ?></strong>
                          <span class="badge bg-secondary"><?= htmlspecialchars($jadwal['label']) ?> (<?= htmlspecialchars($jadwal['jam_mulai']) ?> - <?= htmlspecialchars($jadwal['jam_selesai']) ?>)</span>
                        </div>
                        <small class="text-muted">Guru: <?= htmlspecialchars($jadwal['nama_guru']) ?></small>
                      </div>
                    <?php endforeach; ?>
                  </div>
                <?php endif; ?>
              </div>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="card shadow-sm">
          <div class="card-header bg-warning text-dark">Nilai Siswa</div>
          <div class="card-body">
            <?php if (empty($nilaiRows)): ?>
              <div class="alert alert-light mb-0">Belum ada data nilai.</div>
            <?php else: ?>
              <div class="table-responsive">
                <table class="table table-sm table-bordered align-middle">
                  <thead>
                    <tr>
                      <th>Mata Pelajaran</th>
                      <th>Rombel</th>
                      <th>Nilai Harian</th>
                      <th>Nilai SMT</th>
                      <th>Semester</th>
                      <th>Tahun Pelajaran</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php foreach ($nilaiRows as $nilai): ?>
                      <tr>
                        <td><?= htmlspecialchars($nilai['mata_pelajaran'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($nilai['ket_rombel'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($nilai['nilai_harian'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($nilai['nilai_smts'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($nilai['semester'] ?? '-') ?></td>
                        <td><?= htmlspecialchars($nilai['tp_nilai'] ?? '-') ?></td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
