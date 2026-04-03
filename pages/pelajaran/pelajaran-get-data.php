<?php

    // Get database
    require "../../function/database.php";

    $action = $_POST["action"];

    if(isset($action)){
        switch($action){

            case "getDataMapel" :

                if (isset($_POST["getkelas"])) {

                    $getkelas = "select * from tb_rombel order by ket_rombel asc";
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
                    
                    $query = "select 
                    a.id,
                    a.hari,
                    a.jam_ke,
                    a.waktu_mulai,
                    a.waktu_selesai,
                    a.mapel,
                    b.nama_guru as guru_mapel
                    from tb_jadwal_mapel a
                    left join tb_guru b on a.guru_mapel = b.id_guru where a.hari = '$namahari'";
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
        
            case "getMapelAkademik" :
                $query = "select id,mata_pelajaran,kelas from tb_mata_pelajaran";
                $execQuerymapel = mysqli_query($connect, $query);
                $dataMapelAkademik = [];
                while($row = mysqli_fetch_assoc($execQuerymapel)){
                    $dataMapelAkademik[] = $row;
                }

                // Display data by Json
                echo json_encode([
                    "datamapelakademik" => $dataMapelAkademik
                ]);
                break;




        }
    }


?>