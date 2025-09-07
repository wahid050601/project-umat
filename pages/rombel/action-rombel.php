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
    } 
}else{
    echo json_encode([
        "status" => "error",
        "info" => "Method not set ...!"
    ]);
}