<?php
require_once __DIR__ . "/../../function/database.php";

$action = $_POST["action"] ?? null;
if(isset($action)){
    switch($action){

        case "loadJamPembelajaran":
            try {
                // load data jam pembelajaran
                $getjamBelajar = "select * from tb_jam_belajar order by id asc";
                $execJam = $connect->query($getjamBelajar);
                $jamBelajar = [];
                while($row = $execJam->fetch_assoc()){
                    $jamBelajar[] = $row;
                }

                // for stack data jam pembelajaran
                $stackJamBelajar = [];
                foreach($jamBelajar as $jam){
                    $stackJamBelajar[] = $jam["label"];
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "Data jam pembelajaran berhasil di ambil",
                    "jamBelajar" => $jamBelajar,
                    "stackJamBelajar" => $stackJamBelajar
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error : ". $th->getMessage(),
                    "jamBelajar" => []
                ]);
            }
        break;

    }
}
