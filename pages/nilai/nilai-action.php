<?php
require "../../function/database.php";

if(isset($_POST["action"])){
    $action = $_POST["action"];
    switch($action){

        case "loadlistselectkelas":
            try {
                // load data rombel
                $getRombel = "select id, concat('Kelas ', ket_rombel) as ket_rombel, tp_rombel from tb_rombel tr order by ket_rombel asc";
                $execRom = $connect->query($getRombel);
                $rombel = [];
                while($row = $execRom->fetch_assoc()){
                    $rombel[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "Data kelas berhasil di ambil",
                    "rombel" => $rombel
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error : ". $th->getMessage(),
                    "rombel" => []
                ]);
            }
        break;

        case "loadlistselectmapel" :
            try {
                $idkelas = $_POST["idkelas"];
                $getListMapel = "select id,mata_pelajaran,kelas as id_rombel from tb_mata_pelajaran where kelas = '$idkelas' order by mata_pelajaran asc";
                $exec = $connect->query($getListMapel);

                $datamapel = [];
                while($row = $exec->fetch_assoc()){
                    $datamapel[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "Data mapel berhasil di ambil",
                    "mapel" => $datamapel
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error : ". $th->getMessage(),
                    "mapel" => []
                ]);
            }
        break;

        case "loaddatanilaisiswa" :
            try{
                $idrombel = $_POST["idrombel"];
                $idmapel = $_POST["idmapel"];
                $tprombel = $_POST["tprombel"];

                $getlistnilaisiswa = "
                select a.id as id_nilai,
                a.id_mapel,
                b.mata_pelajaran,
                a.id_kelas,
                c.ket_rombel,
                a.id_siswa,
                d.nis_siswa,
                d.nama_siswa,
                d.jk_siswa,
                a.nilai_harian,
                a.nilai_smts
                from tb_nilai_siswa a
                left join tb_mata_pelajaran b on a.id_mapel = b.id
                left join tb_rombel c on a.id_kelas = c.id
                left join tb_siswa d on a.id_siswa = d.id_siswa
                where c.id = $idrombel and b.id = $idmapel and a.tp_nilai = '$tprombel'";
                $exec = $connect->query($getlistnilaisiswa);

                $datanilai = [];
                while($row = $exec->fetch_assoc()){
                    $datanilai[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "Data nilai berhasil di ambil",
                    "nilai" => $datanilai
                ]);

            }catch(Exception $e){
                echo json_encode([
                    "status" => "error",
                    "info" => "Error : ". $e->getMessage(),
                    "nilai" => []
                ]);
            }
        break;

        case "syncdatasiswa" :
            try {
                $idrombel = $_POST["idrombel"];
                $idmapel = $_POST["idmapel"];
                $tprombel = $_POST["tprombel"];

                // get data siswa not in table nilai mapel
                $getSiswaNotInNilai = "
                select
                d.id_siswa as id_nilai_siswa,
                a.id_siswa,
                a.nama_siswa,
                b.id_rombel,
                e.ket_rombel,
                c.id as id_mapel,
                c.mata_pelajaran,
                e.tp_rombel
                from tb_siswa a
                join tb_rombel_set b on a.id_siswa = b.id_siswa
                join tb_rombel e on b.id_rombel = e.id
                join tb_mata_pelajaran c on cast(b.id_rombel as char) = c.kelas
                left join tb_nilai_siswa d on (
                    d.id_mapel = c.id
                    and d.id_kelas = b.id_rombel
                    and d.id_siswa = a.id_siswa
                ) where b.id_rombel = $idrombel and c.id = $idmapel and e.tp_rombel = '$tprombel' and d.id_siswa is null";
                $execSiswa = $connect->query($getSiswaNotInNilai);

                $countInserted = 0;
                while($row = $execSiswa->fetch_assoc()){
                    $id_siswa = $row["id_siswa"];
                    $id_kelas = $row["id_rombel"];
                    $id_mapel = $row["id_mapel"];
                    $tp_nilai = $row["tp_rombel"];

                    // insert data nilai siswa
                    $queryInsertNilai = "
                    insert into tb_nilai_siswa (id_mapel, id_kelas, id_siswa, tp_nilai) 
                    values ($id_mapel, $id_kelas, $id_siswa, '$tp_nilai')";
                    $execInsertNilai = $connect->query($queryInsertNilai);
                    if($execInsertNilai){
                        $countInserted++;
                    }
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "Sinkronisasi data siswa berhasil, $countInserted data siswa berhasil di tambahkan ke dalam data nilai"

                ]);

            }catch(Exception $e){
                echo json_encode([
                    "status" => "error",
                    "info" => "Error : ". $e->getMessage()
                ]);
            }
        break;

        case "updatenilaisiswa" :
            try {
                $idnilai = $_POST["idnilai"];
                $nilaiharian = $_POST["nilaiharian"];
                $nilaismts = $_POST["nilaismts"];

                $queryUpdateNilai = "
                update tb_nilai_siswa set nilai_harian = $nilaiharian, nilai_smts = $nilaismts where id = $idnilai
                ";
                $execUpdateNilai = $connect->query($queryUpdateNilai);
                if($execUpdateNilai){
                    echo json_encode([
                        "status" => "success",
                        "info" => "Data nilai siswa berhasil di update"
                    ]);
                } else {
                    echo json_encode([
                        "status" => "error",
                        "info" => "Error : ". mysqli_error($connect)
                    ]);
                }
            } catch(Exception $e) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error : ". $e->getMessage()
                ]);
            }
        break;
    }
}