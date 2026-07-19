<?php
session_start();
require_once __DIR__ . '/../function/database.php';

function normalizeStudentBirthDate(string $raw): ?string
{
    $clean = preg_replace('/\D+/', '', trim($raw));
    if ($clean === '') {
        return null;
    }

    if (strlen($clean) === 8) {
        $date = DateTime::createFromFormat('dmY', $clean);
    } elseif (strlen($clean) === 6) {
        $date = DateTime::createFromFormat('dmy', $clean);
    } else {
        $date = null;
    }

    if (!$date || $date->format('Y-m-d') === '1970-01-01') {
        return null;
    }

    return $date->format('Y-m-d');
}

if (!isset($_POST['login_siswa'])) {
    header('Location: index.php');
    exit;
}

$nis = trim($_POST['nis'] ?? '');
$birthDate = normalizeStudentBirthDate((string) ($_POST['tanggal_lahir'] ?? ''));

if ($nis === '' || $birthDate === null) {
    $_SESSION['siswa_login_error'] = 'NIS dan tanggal lahir tidak valid.';
    header('Location: index.php');
    exit;
}

$conn = mysqli_connect($host, $user, $pass, $database);
if (!$conn) {
    $_SESSION['siswa_login_error'] = 'Koneksi database gagal.';
    header('Location: index.php');
    exit;
}

$stmt = $conn->prepare(
    'SELECT s.id_siswa, s.nis_siswa, s.nama_siswa, s.tgl_lahir, s.kelas_siswa, r.id as id_rombel, r.ket_rombel
     FROM tb_siswa s
     LEFT JOIN tb_rombel_set rs ON rs.id_siswa = s.id_siswa
     LEFT JOIN tb_rombel r ON r.id = rs.id_rombel
     WHERE s.nis_siswa = ? AND s.tgl_lahir = ?
     LIMIT 1'
);
$stmt->bind_param('ss', $nis, $birthDate);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $row = $result->fetch_assoc();

    $_SESSION['siswa_login'] = true;
    $_SESSION['siswa_id'] = (int) $row['id_siswa'];
    $_SESSION['siswa_nis'] = $row['nis_siswa'];
    $_SESSION['siswa_nama'] = $row['nama_siswa'];
    $_SESSION['siswa_tgl_lahir'] = $row['tgl_lahir'];
    $_SESSION['siswa_kelas'] = $row['kelas_siswa'];
    $_SESSION['siswa_rombel_id'] = $row['id_rombel'];
    $_SESSION['siswa_rombel'] = $row['ket_rombel'] ?: '-';

    header('Location: dashboard.php');
    exit;
}

$_SESSION['siswa_login_error'] = 'NIS atau tanggal lahir tidak cocok.';
header('Location: index.php');
exit;
