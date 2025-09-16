<?php
require "../../function/database.php";

if(isset($_POST["action"])){
    $action = $_POST["action"];
    switch($action){

        case "loadrombel":
            try {
                $getRombel = "
                select a.id,
                a.jenjang_rombel,
                CONCAT('KELAS ', a.ket_rombel) as kelas,
                b.nama_guru,
                a.tp_rombel,
                (select count(1) from tb_rombel_set where id_rombel = a.id) as total_siswa,
                a.max_siswa
                from tb_rombel a
                left join tb_guru b on a.walkel_rombel = b.id_guru
                order by a.ket_rombel asc";
                $exec = $connect->query($getRombel);
                $rombel = [];
                while($row = $exec->fetch_assoc()){
                    $rombel[] = $row;
                }

                if($exec){
                    echo json_encode([
                        "status" => "success",
                        "info" => "Berhasil Ambil Data Rombel",
                        "rombel" => $rombel
                    ]);
                }else{
                    echo json_encode([
                        "status" => "error",
                        "info" => "Gagal Ambil Data Rombel",
                        "rombel" => []
                    ]);
                }

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Errror Message: ". $th->getMessage(),
                    "rombel" => []
                ]);
            }
        break;

        case "loadattr":
            try {
                // get detail rombel (if exist)
                $rombeldetail = [];
                if(isset($_POST["idrbl"])){
                    $getRblDetail = "select * from tb_rombel where id = ". $_POST["idrbl"];
                    $exec = $connect->query($getRblDetail);
                    while($row = $exec->fetch_assoc()){
                        $rombeldetail[] = $row;
                    }
                }

                // get rombel
                $getRbl = "select * from tb_rombel";
                $execRombel = $connect->query($getRbl);
                $rombel = [];
                while($row = $execRombel->fetch_assoc()){
                    $rombel[] = $row;
                }

                // get jenjang
                $getJenjang = "select * from tb_jenjang";
                $execJenjang = $connect->query($getJenjang);
                $jenjang = [];
                while($row = $execJenjang->fetch_assoc()){
                    $jenjang[] = $row;
                }

                // get guru
                $getGuru = "select * from tb_guru";
                $execGuru = $connect->query($getGuru);
                $guru = [];
                while($row = $execGuru->fetch_assoc()){
                    $guru[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "Data Select Berhasil Diambil",
                    "rombeldetail" => $rombeldetail,
                    "rombel" => $rombel,
                    "jenjang" => $jenjang,
                    "guru" => $guru
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error Message : ". $th->getMessage()
                ]);
            }
        break;

        case "loadsiswarombel":
            $id = $_POST["id"];
            $kelas = $_POST["kelas"];

            try{
                // Get siswa exists rombel
                $getSiswaExist = "
                select a.id_siswa,
                c.id as id_rombel,
                b.id as id_rombel_set,
                a.nis_siswa,
                a.nisn_siswa,
                a.nik_siswa,
                a.nama_siswa,
                a.jk_siswa,
                a.kelas_siswa,
                CONCAT('Kelas ', c.ket_rombel) as rombel_siswa 
                from tb_siswa a
                left join tb_rombel_set b on a.id_siswa = b.id_siswa
                left join tb_rombel c on b.id_rombel = c.id
                where c.id = $id";
                $execSiswa = $connect->query($getSiswaExist);
                $siswa = [];
                while($row = $execSiswa->fetch_assoc()){
                    $siswa[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "Berhasil Ambil Data Siswa Rombel",
                    "siswa" => $siswa
                ]);

            }catch(Exception $th){
                echo json_encode([
                    "status" => "error",
                    "info" => "Error Message : ". $th->getMessage()
                ]);
            }
        break;

        case "loadlistsiswa":
            $kelas = $_POST["kelas"];

            try{
                // Get daftar siswa
                $getDaftarSsiwa = "
                select a.id_siswa,
                c.id as id_rombel,
                b.id as id_rombel_set,
                a.nis_siswa,
                a.nisn_siswa,
                a.nik_siswa,
                a.nama_siswa,
                a.jk_siswa,
                a.kelas_siswa,
                CONCAT('Kelas ', c.ket_rombel) as rombel_siswa 
                from tb_siswa a
                left join tb_rombel_set b on a.id_siswa = b.id_siswa
                left join tb_rombel c on b.id_rombel = c.id
                where COALESCE(CONCAT('Kelas ', c.ket_rombel), '') = '' and a.kelas_siswa = '$kelas'";
                $execDafSiswa = $connect->query($getDaftarSsiwa);
                $daftar_siswa = [];
                while($row = $execDafSiswa->fetch_assoc()){
                    $daftar_siswa[] = $row;
                }


                echo json_encode([
                    "status" => "success",
                    "info" => "Berhasil Ambil Data Siswa",
                    "daftar_siswa" => $daftar_siswa
                ]);

            }catch(Exception $th){
                echo json_encode([
                    "status" => "error",
                    "info" => "Error Message : ". $th->getMessage()
                ]);
            }
        break;


        // ======= CRUD FUNCTION
        case "add":
            $jenjang = $_POST["jenjang"];
            $kelas = $_POST["kelas"];
            $wakel = $_POST["walkel"];
            $max = $_POST["max"] == '' ? 0 : $_POST["max"];
            $tp = $_POST["tp"];

            try{
                $insertRombel = "insert into tb_rombel (jenjang_rombel,ket_rombel,tp_rombel,walkel_rombel,max_siswa) 
                values ('$jenjang','$kelas','$tp',$wakel,$max)";
                error_log("=== QUERY INSERT ROMBEL : $insertRombel");
                $exec = $connect->query($insertRombel);

                $status = "success";
                $info = "Data Rombel Berhasil di Tambah";
                if(!$exec){
                    $status = "error";
                    $info = "Data Rombel Gagal di Tambah";
                }

                echo json_encode([
                    "status" => $status,
                    "info" => $info
                ]);

            }catch(\Throwable $th){
                echo json_encode([
                    "status" => "error",
                    "info" => "Error Message : ". $th->getMessage()
                ]);
            }  
        break;

        case "edit":
            $id = $_POST["id"];
            $walkel = $_POST["walkel"];
            $max = $_POST["max"];

            try {
                $updateRombel = "update tb_rombel set 
                walkel_rombel = $walkel, max_siswa = $max where id = $id";
                $exec = $connect->query($updateRombel);

                $status = "success";
                $info = "Data Rombel Berhasil di Update";
                if(!$exec){
                    $status = "error";
                    $info = "Data Rombel Gagal di Update";
                }
                
                echo json_encode([
                    "status" => $status,
                    "info" => $info
                ]);
                
            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error Message : ". $th->getMessage()
                ]);
            }
        break;

        case "delete":
            $id = $_POST["id"];
            $rombel = $_POST["rombel"];

            try {
                $deleteRombel = "delete from tb_rombel where id=$id";
                $exec = $connect->query($deleteRombel);

                $status = "success";
                $info = "Rombel $rombel Berhasil di Hapus";
                if(!$exec){
                    $status = "error";
                    $info = "Rombel $rombel Gagal di Hapus";
                }

                echo json_encode([
                    "status" => $status,
                    "info" => $info
                ]);
                
            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error Message: ". $th->getMessage()
                ]);
            }
        break;

        case "config":
            $idrombel = $_POST["id"];
            $datasiswa = json_decode($_POST["siswa"], true);

            $countInsert = 0;
            foreach($datasiswa as $ds){
                $insertQ = "insert into tb_rombel_set (id_rombel, id_siswa) values (". $idrombel .", ". $ds["id"] .")";
                $exec = $connect->query($insertQ);
                if($exec){$countInsert++;}
            }

            $status = "success";
            $info = "Data Siswa Berhasil di Tambah Pada Rombel : $countInsert Siswa";
            if($countInsert == 0){
                $status = "error";
                $info = "Data Siswa Gagal di Konfigurasi";
            }

            echo json_encode([
                "status" => $status,
                "info" => $info
            ]);
        break;

    } 
}else{
    echo json_encode([
        "status" => "error",
        "info" => "Method not set ...!"
    ]);
}