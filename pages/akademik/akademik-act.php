<?php
require_once __DIR__ . "/../../function/database.php";

$action = $_POST["action"] ?? null;
if(isset($action)){
    switch($action){

        case "addJamPembelajaran":
            try {
                $label = $_POST["label"];
                $jamMulai = $_POST["mulai"];
                $jamSelesai = $_POST["selesai"];
                $istirahat = $_POST["istirahat"];

                $insertJamBelajar = "insert into tb_jam_belajar (label,jam_mulai,jam_selesai,istirahat) values ('$label', '$jamMulai', '$jamSelesai', $istirahat)";
                $execInsert = $connect->query($insertJamBelajar);

                echo json_encode([
                    "status" => "success",
                    "info" => "Data jam pembelajaran berhasil di tambahkan"
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error : ". $th->getMessage()
                ]);
            }
        break;

        case "delJamPembelajaran":
            try {
                $idJam = $_POST["idjam"];
                $delJamBelajar = "delete from tb_jam_belajar where id = $idJam";
                $execDel = $connect->query($delJamBelajar);

                echo json_encode([
                    "status" => "success",
                    "info" => "Data jam pembelajaran berhasil di hapus"
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error : ". $th->getMessage()
                ]);
            }
        break;

    }
}else{
    echo json_encode([
        "status" => "error",
        "info" => "Action tidak ditemukan"
    ]);
}