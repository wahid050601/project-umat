<?php
require_once __DIR__ . "/../function/database.php";

$action = $_POST["action"] ?? null;
$column = $_POST["column"] ?? null;

if (isset($action)) {
    $columnSet = "*";
    if (!empty($column)) {
        $columnSet = explode(",", $column);
        $columnSet = count($columnSet) > 0 ? implode(",", $columnSet) : "*";
    }

    switch ($action) {
        case "getDataMapel" :
            try {
                $idkelas = $_POST["idkelas"] ?? null;
                $query = "select id, mata_pelajaran, kelas from tb_mata_pelajaran";

                if (!empty($idkelas)) {
                    $query .= " where kelas = '$idkelas'";
                }

                $query .= " order by mata_pelajaran asc";
                $exec = $connect->query($query);
                $dataMapel = [];

                while ($row = $exec->fetch_assoc()) {
                    $dataMapel[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "message" => "Data Mata Pelajaran berhasil diambil",
                    "data" => $dataMapel
                ]);
            } catch (Throwable $e) {
                echo json_encode([
                    "status" => "error",
                    "message" => $e->getMessage(),
                    "data" => []
                ]);
            }
            break;

        case "getDataJamBelajar" :
            try {
                $query = "select id, label, jam_mulai, jam_selesai, istirahat from tb_jam_belajar order by id asc";
                $exec = $connect->query($query);
                $dataJam = [];

                while ($row = $exec->fetch_assoc()) {
                    $dataJam[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "message" => "Data Jam Belajar berhasil diambil",
                    "data" => $dataJam
                ]);
            } catch (Throwable $e) {
                echo json_encode([
                    "status" => "error",
                    "message" => $e->getMessage(),
                    "data" => []
                ]);
            }
            break;

        case "getDataGuru" :
            try {
                $query = "select $columnSet from tb_guru order by id_guru asc";
                $exec = $connect->query($query);
                $dataGuru = [];

                while ($row = $exec->fetch_assoc()) {
                    $dataGuru[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "message" => "Data Guru berhasil diambil",
                    "data" => $dataGuru
                ]);
            } catch (Throwable $e) {
                echo json_encode([
                    "status" => "error",
                    "message" => $e->getMessage(),
                    "data" => []
                ]);
            }
            break;

        default:
            echo json_encode([
                "status" => "error",
                "message" => "Action not found"
            ]);
            break;
    }
} else {
    echo json_encode([
        "status" => "error",
        "message" => "Action not found"
    ]);
}