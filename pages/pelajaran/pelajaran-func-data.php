<?php
require_once  __DIR__ . "/../../function/database.php";

$action = $_POST["action"] ?? null;

if (isset($action)) {
    switch ($action) {
        case "saveJadwalMapel" :
            $idJadwal = $_POST["id_jadwal"] ?? null;
            $hari = strtolower(trim($_POST["hari"] ?? ""));
            $idKelas = $_POST["id_kelas"] ?? null;
            $idMapel = $_POST["id_mapel"] ?? null;
            $idWaktu = $_POST["id_waktu"] ?? null;
            $idGuru = $_POST["id_guru"] ?? null;

            if (empty($hari) || empty($idKelas) || empty($idMapel) || empty($idWaktu) || empty($idGuru)) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Semua field jadwal harus diisi"
                ]);
                return;
            }

            $hari = ucfirst($hari);

            $checkQuery = "
                select id_jadwal
                from tb_jadwal_mapel
                where hari = ?
                  and id_kelas = ?
                  and id_waktu = ?
            ";

            $stmtCheck = $connect->prepare($checkQuery);
            $stmtCheck->bind_param("sii", $hari, $idKelas, $idWaktu);
            $stmtCheck->execute();
            $stmtCheck->store_result();

            $hasConflict = $stmtCheck->num_rows > 0;
            $stmtCheck->close();

            if ($hasConflict && empty($idJadwal)) {
                echo json_encode([
                    "status" => "warning",
                    "info" => "Jadwal pada hari dan jam yang sama sudah terisi"
                ]);
                return;
            }

            try {
                if (!empty($idJadwal)) {
                    $query = "
                        update tb_jadwal_mapel
                        set hari = ?, id_kelas = ?, id_mapel = ?, id_waktu = ?, id_guru = ?
                        where id_jadwal = ?
                    ";
                    $stmt = $connect->prepare($query);
                    $stmt->bind_param("siiiii", $hari, $idKelas, $idMapel, $idWaktu, $idGuru, $idJadwal);
                } else {
                    $query = "
                        insert into tb_jadwal_mapel (hari, id_kelas, id_mapel, id_waktu, id_guru)
                        values (?, ?, ?, ?, ?)
                    ";
                    $stmt = $connect->prepare($query);
                    $stmt->bind_param("siiii", $hari, $idKelas, $idMapel, $idWaktu, $idGuru);
                }

                $exec = $stmt->execute();

                if ($exec) {
                    echo json_encode([
                        "status" => "success",
                        "info" => empty($idJadwal) ? "Jadwal berhasil ditambahkan" : "Jadwal berhasil diubah"
                    ]);
                } else {
                    echo json_encode([
                        "status" => "error",
                        "info" => "Gagal menyimpan jadwal: " . $stmt->error
                    ]);
                }

                $stmt->close();
            } catch (Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error: " . $th->getMessage()
                ]);
            }
            break;

        case "addMapelAkademik" :
            $mapel = $_POST["mapel"] ?? null;
            $kelas = $_POST["kelas"] ?? null;

            if (empty($mapel) || empty($kelas)) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Mata pelajaran dan kelas harus diisi"
                ]);
                break;
            }

            $query = "insert into tb_mata_pelajaran (mata_pelajaran, kelas) values (?, ?)";
            $stmt = $connect->prepare($query);
            $stmt->bind_param("ss", $mapel, $kelas);
            $exec = $stmt->execute();

            if ($exec) {
                echo json_encode([
                    "status" => "success",
                    "info" => "Mata pelajaran akademik berhasil ditambahkan"
                ]);
            } else {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error : " . $stmt->error
                ]);
            }
            $stmt->close();
            break;

        case "deleteMapelAkademik" :
            $idmapel = $_POST["idmapel"] ?? null;
            if (empty($idmapel)) {
                echo json_encode([
                    "status" => "error",
                    "info" => "ID mata pelajaran tidak valid"
                ]);
                break;
            }

            $query = "delete from tb_mata_pelajaran where id = ?";
            $stmt = $connect->prepare($query);
            $stmt->bind_param("i", $idmapel);
            $exec = $stmt->execute();

            if ($exec) {
                echo json_encode([
                    "status" => "success",
                    "info" => "Mata pelajaran akademik berhasil dihapus"
                ]);
            } else {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error : " . $stmt->error
                ]);
            }
            $stmt->close();
            break;

        default:
            echo json_encode([
                "status" => "error",
                "info" => "Action tidak valid"
            ]);
            break;
    }
} else {
    echo json_encode([
        "status" => "error",
        "info" => "Action tidak valid"
    ]);
}
?>