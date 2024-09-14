<?php

    // Get database
    require "../../function/database.php";

    $action = $_POST["action"];

    if(isset($action)){
        switch($action){

            case "getDataMapel" :

                if (isset($_POST["getkelas"])) {

                    $getkelas = "select concat(kelas_siswa,'-',rombel_siswa) as id_kelas,rombel_siswa as kelas from sia_yaj.tb_siswa group by kelas_siswa ,rombel_siswa order by kelas_siswa asc";
                    $execKelas = mysqli_query($connect, $getkelas);
                    $kelas = [];
                    while($row = mysqli_fetch_assoc($execKelas)){
                        $kelas[] = $row;
                    }
                    
                    echo json_encode([
                        "datakelas" => $kelas
                    ]);
                }
                
                if(isset($_POST["datahari"])){
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
                }
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