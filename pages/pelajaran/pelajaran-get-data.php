<?php

    // Get database
    require "../../function/database.php";

    $action = $_POST["action"];

    if(isset($action)){
        switch($action){

            case "getDataMapel" :
                $namahari = $_POST["datahari"];
                $query = "select * from tb_jadwal_mapel where hari = '$namahari'";
                $execQuery = mysqli_query($connect, $query);
                $dataJadwal = [];
                while($rowsjadwal = mysqli_fetch_assoc($execQuery)){
                    $dataJadwal[] = $rowsjadwal;
                }

                // Display data by Json
                echo json_encode([
                    "datamapel" => $dataJadwal
                ]);
                break;
            
            case "getDataGuruMapel" :
                $query = "select * from tb_guru";
                $execQueryguru = mysqli_query($connect, $query);
                $dataGurumapel = [];
                while($row = mysqli_fetch_assoc($execQueryguru)){
                    $dataGurumapel[] = $row;
                }

                // Display data by Json
                echo json_encode([
                    "datagurumapel" => $dataGurumapel
                ]);
                break;
        }
    }


?>