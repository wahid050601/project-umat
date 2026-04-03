<?php
    // get koneksi
    require "../../function/database.php";

    $action = $_POST["action"];
    if(isset($action)){
        switch($action){

            case "addJadwalMapel" :
                if(isset($_POST["triger"])){
                    $hari = $_POST["hari"];
                    $jamke = $_POST["jamke"];
                    $waktumulai = $_POST["waktumulai"];
                    $waktuselesai = $_POST["waktuselesai"];
                    $mapel = $_POST["mapel"];
                    $guru = $_POST["guru"];

                    $querycheck = "select * from tb_jadwal_mapel where jam_ke = $jamke and hari = '$hari'";
                    $execquery = mysqli_query($connect, $querycheck);
                    $valueCheck = mysqli_fetch_row($execquery) > 0 ? "true" : "false";

                    if($valueCheck == 'true'){
                        echo json_encode([
                            "note" => 'notadd',
                            "text" => "Pelajaran pada jam ke-". $jamke ."sudah terisi"
                        ]);

                    }else{
                        $queryInsert = "insert into tb_jadwal_mapel values (null, '$hari', $jamke, '$waktumulai', '$waktuselesai', '$mapel', '$guru')";
                        $execQueryAdd = mysqli_query($connect, $queryInsert);
                        $status = mysqli_affected_rows($connect) > 0 ? 'success' : 'error';

                        echo json_encode([
                            "status" => $status
                        ]);
                    }
                }
                break;


            case "addMapelAkademik" :
                $mapel = $_POST["mapel"];
                $kelas = $_POST["kelas"];

                $query = "insert into tb_mata_pelajaran (mata_pelajaran,kelas) values ('$mapel','$kelas')";
                $execQuery = mysqli_query($connect, $query);

                if($execQuery){
                    echo json_encode([
                        "status" => "success",
                        "info" => "Mata pelajaran akademik berhasil di tambahkan"
                    ]);
                } else {
                    echo json_encode([
                        "status" => "error",
                        "info" => "Error : ". mysqli_error($connect)
                    ]);
                }
                break;

            case "deleteMapelAkademik" :
                $idmapel = $_POST["idmapel"];
                $query = "delete from tb_mata_pelajaran where id = $idmapel";
                $execQuery = mysqli_query($connect, $query);
                if($execQuery){
                    echo json_encode([
                        "status" => "success",
                        "info" => "Mata pelajaran akademik berhasil di hapus"
                    ]);
                } else {
                    echo json_encode([
                        "status" => "error",
                        "info" => "Error : ". mysqli_error($connect)
                    ]);
                }
                break;
                


        }
    }





?>