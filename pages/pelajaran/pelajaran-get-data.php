<?php

// Get database
require "../../function/database.php";

$action = $_POST["action"];

if(isset($action)){
    switch($action){

        // Old Method
        // case "getDataMapel" :

        //     if (isset($_POST["getkelas"])) {

        //         $getkelas = "select * from tb_rombel order by ket_rombel asc";
        //         $execKelas = mysqli_query($connect, $getkelas);
        //         $kelas = [];
        //         while($row = mysqli_fetch_assoc($execKelas)){
        //             $kelas[] = $row;
        //         }
                
        //         echo json_encode([
        //             "datakelas" => $kelas
        //         ]);
        //     }
            
        //     if(isset($_POST["datahari"])){
        //         $namahari = $_POST["datahari"];
                
        //         $query = "select 
        //         a.id,
        //         a.hari,
        //         a.jam_ke,
        //         a.waktu_mulai,
        //         a.waktu_selesai,
        //         a.mapel,
        //         b.nama_guru as guru_mapel
        //         from tb_jadwal_mapel a
        //         left join tb_guru b on a.guru_mapel = b.id_guru where a.hari = '$namahari'";
        //         $execQuery = mysqli_query($connect, $query);
        //         $dataJadwal = [];
        //         while($rowsjadwal = mysqli_fetch_assoc($execQuery)){
        //             $dataJadwal[] = $rowsjadwal;
        //         }

        //         // Display data by Json
        //         echo json_encode([
        //             "datamapel" => $dataJadwal
        //         ]);
        //     }
        // break;
        
        // case "getDataGuruMapel" :
        //     $query = "select * from tb_guru";
        //     $execQueryguru = mysqli_query($connect, $query);
        //     $dataGurumapel = [];
        //     while($row = mysqli_fetch_assoc($execQueryguru)){
        //         $dataGurumapel[] = $row;
        //     }

        //     // Display data by Json
        //     echo json_encode([
        //         "datagurumapel" => $dataGurumapel
        //     ]);
        // break;
    
        // case "getMapelAkademik" :
        //     $query = "
        //     select a.id, a.mata_pelajaran, b.id as kelas_id, b.ket_rombel as kelas
        //     from tb_mata_pelajaran a
        //     left join tb_rombel b on a.kelas = cast(b.id as char)";
        //     $execQuerymapel = mysqli_query($connect, $query);
        //     $dataMapelAkademik = [];
        //     while($row = mysqli_fetch_assoc($execQuerymapel)){
        //         $dataMapelAkademik[] = $row;
        //     }

        //     // get list rombel
        //     $queryRombel = "select id,ket_rombel from tb_rombel";
        //     $execQueryRombel = mysqli_query($connect, $queryRombel);
        //     $dataRombel = [];
        //     while($row = mysqli_fetch_assoc($execQueryRombel)){
        //         $dataRombel[] = $row;
        //     }

        //     // Display data by Json
        //     echo json_encode([
        //         "datamapelakademik" => $dataMapelAkademik,
        //         "datarombel" => $dataRombel
        //     ]);
        // break;


        // New Method
        case "getJadwalByKelas" :
            $idkelas = $_POST["idkelas"];
            $query = "
            select
            jadwal.hari,
            kelas.ket_rombel,
            mapel.mata_pelajaran,
            waktu.label as jam,
            waktu.jam_mulai,
            waktu.jam_selesai,
            COALESCE(waktu.istirahat, 0) as istirahat,
            guru.nama_guru
            from tb_jadwal_mapel jadwal
            left join tb_rombel kelas on kelas.id = jadwal.id_kelas
            left join tb_mata_pelajaran mapel on mapel.id = jadwal.id_mapel
            left join tb_jam_belajar waktu on waktu.id = jadwal.id_waktu
            left join tb_guru guru on guru.id_guru = jadwal.id_guru
            where jadwal.id_kelas = '$idkelas'";

            try {
                $exec = $connect->query($query);
                $dataJadwal = [];

                $hari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu'];
                foreach ($hari as $h) {
                    $dataJadwal[$h] = [];
                    while ($row = $exec->fetch_assoc()) {
                        if ($row['hari'] === $h) {
                            $dataJadwal[$h][] = $row;
                        }
                    }
                }
                
                
                echo json_encode([
                    "status" => "success",
                    "info" => "Data Jadwal Berhasil di Load",
                    "datajadwal" => $dataJadwal
                ]);
            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error: ". $th->getMessage(),
                    "datajadwal" => []
                ]);
            }
        break;

        default:
            echo json_encode([
                "status" => "error",
                "info" => "Action tidak valid"
            ]);
        break;
    }
}

?>