<?php
require "../../function/database.php";

if(isset($_POST["action"])){
    $action = $_POST["action"];
    switch($action){

        case "loadekskul":
            try {
                $getEkskul = "select * from tb_ekskul order by ekskul asc";
                $exec = $connect->query($getEkskul);

                $dataekskul = [];
                while($row = $exec->fetch_assoc()){
                    $dataekskul[] = $row;
                }

                // load data rombel
                $getRombel = "select * from tb_rombel order by ket_rombel asc";
                $execRom = $connect->query($getRombel);
                $rombel = [];
                while($row = $execRom->fetch_assoc()){
                    $rombel[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "Data ekskul berhasil di ambil",
                    "ekskul" => $dataekskul,
                    "rombel" => $rombel
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error : ". $th->getMessage(),
                    "ekskul" => []
                ]);
            }
        break;

        case "loadnilaiekssiswa" :
            try {
                $idekskul = $_POST["idekskul"];
                $idrombel = $_POST["idrombel"];

                $getNilaiEkskul = "
                SELECT
                    e.id as id_ekskul,
                    r.id as id_rombel,
                    s.id_siswa,
                    s.nama_siswa,
                    s.nis_siswa,
                    s.jk_siswa,
                    ne.nilai
                FROM tb_rombel_set rs
                JOIN tb_rombel r 
                    ON rs.id_rombel = r.id
                JOIN tb_siswa s 
                    ON rs.id_siswa = s.id_siswa
                CROSS JOIN tb_ekskul e
                LEFT JOIN tb_ekskul_nilai ne 
                    ON ne.id_siswa = s.id_siswa
                    AND ne.id_ekskul = e.id
                WHERE r.id = $idrombel
                AND e.id = $idekskul";
                $exec = $connect->query($getNilaiEkskul);
                $listdatanilai = [];
                while($row = $exec->fetch_assoc()){
                    $listdatanilai[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "berhasil ambil data list nilai ekskul",
                    "listnilai" => $listdatanilai
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error : ". $th->getMessage(),
                    "listnilai" => []
                ]);
            }
        break;

        case "loadDataSiswa":
            try {
                $idrombel = $_POST["idrombel"];
                $getSiswa = "select s.id_siswa, s.nama_siswa, s.nis_siswa, r.id as id_rombel, r.ket_rombel from tb_rombel_set rs join tb_siswa s on rs.id_siswa = s.id_siswa join tb_rombel r on rs.id_rombel = r.id where rs.id_rombel = $idrombel order by s.nama_siswa asc";
                $exec = $connect->query($getSiswa);
                $listsiswa = [];
                while($row = $exec->fetch_assoc()){
                    $listsiswa[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "berhasil ambil data siswa",
                    "listsiswa" => $listsiswa
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error : ". $th->getMessage(),
                    "listsiswa" => []
                ]);
            }
        break;

        case "addekskul":
            $ekskul = $_POST["ekskul"];
            $pelatih = $_POST["pelatih"];

            try {
                $insEskul = "insert into tb_ekskul (id,ekskul,pelatih) values (null, '$ekskul','$pelatih')";
                $exec = $connect->query($insEskul);

                $status = "success";
                $info = "Eksktrakurikuler Berhasil di Tambah";

                if(!$exec){
                    $status = "error";
                    $info = "Eksktrakurikuler Gagal di Tambah";
                }

                echo json_encode([
                    "status" => $status,
                    "info" => $info
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error: ". $th->getMessage()
                ]);
            }
        break;

        case "deleteekskul":

            try {
                
                $ideks = $_POST["idekskul"];

                $delEkskul = "delete from tb_ekskul where id = $ideks";
                $exec = $connect->query($delEkskul);

                $status = "success";
                $info = "Data Ekstrakurikuler Berhasil di Hapus";

                if(!$exec){
                    $status = "error";
                    $info = "Data Ekstrakurikuler Gagal di Hapus";
                }

                echo json_encode([
                    "status" => $status,
                    "info" => $info
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error: ". $th->getMessage()
                ]);
            }

        break;

    }
}