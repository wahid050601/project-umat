<?php
require_once __DIR__ . "/../../function/database.php";

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
                select a.id as id_nilai,
                a.id_ekskul,
                b.ekskul,
                a.id_kelas,
                c.ket_rombel,
                a.id_siswa,
                d.nis_siswa,
                d.nama_siswa,
                d.jk_siswa,
                a.nilai 
                from tb_ekskul_nilai a
                left join tb_ekskul b on a.id_ekskul = b.id
                left join tb_rombel c on a.id_kelas = c.id
                left join tb_siswa d on a.id_siswa = d.id_siswa
                where b.id = $idekskul -- ID EKSKUL
                and c.id = $idrombel; -- ID ROMBEL";
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
                $idekskul = $_POST["idekskul"];
                $getSiswa = "
                select s.id_siswa, s.nama_siswa, s.nis_siswa, r.id as id_rombel, r.ket_rombel 
                from tb_rombel_set rs 
                join tb_siswa s on rs.id_siswa = s.id_siswa 
                join tb_rombel r on rs.id_rombel = r.id 
                where rs.id_rombel = $idrombel 
                and s.id_siswa not in (select id_siswa from tb_ekskul_nilai where id_ekskul = $idekskul)
                order by s.nama_siswa asc";
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

        case "addsiswaekskul":
            try {
                $idrombel = $_POST["idrombel"];
                $id_siswa = $_POST["id_siswa"];
                $id_ekskul = $_POST["id_ekskul"];

                // input nilai ekskul dengan nilai default 0
                $insNilaiEkskul = "insert into tb_ekskul_nilai (id_ekskul, id_kelas, id_siswa) values ($id_ekskul, $idrombel, $id_siswa)";
                error_log($insNilaiEkskul);
                $exec = $connect->query($insNilaiEkskul);

                if(!$exec){
                    echo json_encode([
                        "status" => "error",
                        "info" => "Gagal Tambah Siswa Ekskul"
                    ]);
                    return;
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "Siswa Berhasil di Tambah ke Ekskul"
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error: ". $th->getMessage()
                ]);
            }
        break;
        // proses input nilai ekskul
        case "inputnilaiekskul":
            try {
                $idnilai = $_POST["idnilai"];
                $nilai = $_POST["nilai"];

                // update nilai ekskul
                $updateNilai = "update tb_ekskul_nilai set nilai = $nilai where id = $idnilai";
                error_log($updateNilai);
                $exec = $connect->query($updateNilai);

                if(!$exec){
                    echo json_encode([
                        "status" => "error",
                        "info" => "Gagal Input Nilai Ekskul"
                    ]);
                    return;
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "Nilai Ekskul Berhasil di Input"
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