<?php
session_start();
header('Content-Type: application/json');

require "../../function/database.php";

if (!isset($_SESSION['berhasil_login']) || empty($_SESSION['id'])) {
    echo json_encode([
        'status' => 'error',
        'info' => 'Session user tidak valid.'
    ]);
    exit;
}

$userId = (int) $_SESSION['id'];

function profileResponse($status, $info, $data = []): void
{
    echo json_encode([
        'status' => $status,
        'info' => $info,
        'data' => $data
    ]);
}

if (!$connect) {
    profileResponse('error', 'Koneksi database gagal.');
    exit;
}

$columnCheck = mysqli_query($connect, "SHOW COLUMNS FROM tb_user LIKE 'image'");
if ($columnCheck && mysqli_num_rows($columnCheck) === 0) {
    mysqli_query($connect, "ALTER TABLE tb_user ADD COLUMN image VARCHAR(255) NULL AFTER password");
}

if (!isset($_POST['action'])) {
    profileResponse('error', 'Aksi tidak ditemukan.');
    exit;
}

$action = $_POST['action'];

switch ($action) {
    case 'loadprofile':
        $sql = "SELECT id, username, password, nama, email, alamat, no_telp, level, image FROM tb_user WHERE id = $userId";
        $result = mysqli_query($connect, $sql);

        if ($result && mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            unset($row['password']);
            profileResponse('success', 'Data profil berhasil dimuat.', $row);
        } else {
            profileResponse('error', 'Data profil tidak ditemukan.', []);
        }
        break;

    case 'updateprofile':
        $username = trim($_POST['username'] ?? '');
        $nama = trim($_POST['nama'] ?? '');
        $alamat = trim($_POST['alamat'] ?? '');
        $telp = trim($_POST['telp'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $password = trim($_POST['password'] ?? '');
        $gambarNama = null;

        if ($username === '' || $nama === '' || $alamat === '' || $telp === '' || $email === '') {
            profileResponse('error', 'Semua kolom wajib diisi.');
            exit;
        }

        if (isset($_FILES['image']) && in_array($_FILES['image']['error'], [UPLOAD_ERR_INI_SIZE, UPLOAD_ERR_FORM_SIZE], true)) {
            profileResponse('error', 'Ukuran foto terlalu besar. Silakan pilih foto yang lebih kecil dari 8 MB.');
            exit;
        }

        $uploadDir = __DIR__ . '/../../assets/img/profile';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
            $file = $_FILES['image'];
            $allowed = ['jpg', 'jpeg', 'png', 'gif'];
            $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

            if (!in_array($ext, $allowed, true)) {
                profileResponse('error', 'Format foto tidak didukung. Gunakan jpg, jpeg, png, atau gif.');
                exit;
            }

            $gambarNama = 'user-' . $userId . '-' . time() . '.' . $ext;
            $targetFile = $uploadDir . '/' . $gambarNama;

            if (!move_uploaded_file($file['tmp_name'], $targetFile)) {
                profileResponse('error', 'Gagal mengunggah foto profil.');
                exit;
            }
        }

        $sql = "UPDATE tb_user SET username = '$username', nama = '" . str_replace("'", "''", $nama) . "', email = '$email', alamat = '" . str_replace("'", "''", $alamat) . "', no_telp = '$telp'";

        if ($password !== '') {
            $sql .= ", password = '" . md5($password) . "'";
        }

        if ($gambarNama !== null) {
            $sql .= ", image = '$gambarNama'";
        }

        $sql .= " WHERE id = $userId";
        $exec = mysqli_query($connect, $sql);

        if ($exec) {
            $_SESSION['username'] = $username;
            $_SESSION['nama'] = $nama;
            profileResponse('success', 'Data profil berhasil diupdate.', []);
        } else {
            profileResponse('error', 'Data profil gagal diupdate.');
        }
        break;

    default:
        profileResponse('error', 'Aksi tidak dikenal.');
        break;
}
