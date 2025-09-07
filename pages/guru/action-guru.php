<?php

require "../../function/database.php";

if(isset($_POST["action"])){
    $action = $_POST["action"];
    switch($action){
        
        case "loadguru" :
            try {
                $getGuru = "select * from tb_guru";
                $exec = $connect->query($getGuru);
                $dataguru = [];
                while($row = $exec->fetch_assoc()){
                    $dataguru[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "info" => "Data Guru Berhasil di Load",
                    "dataguru" => $dataguru
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error: ". $th->getMessage(),
                    "dataguru" => []
                ]);
            }
        break;

        case "addguru" :

            $idguru = $_POST["noguru"];
            $namaguru = $_POST["nama"];
            $nuptk = $_POST["nuptk"];
            $alamat = $_POST["alamat"];
            $telp = $_POST["telp"];
            $email = $_POST["email"];
            $jabatan = $_POST["jabatan"];

            $query = "INSERT INTO tb_guru (no_guru,nama_guru,nuptk,jabatan,alamat_guru,tlp_guru,email_guru) 
            VALUES ('$idguru', '$namaguru', '$nuptk', '$jabatan', '$alamat', '$telp', '$email')";

            try {
                if(mysqli_query($connect, $query)){
                    echo json_encode(["status" => "success", "info" => "Data Guru Berhasil di Tambah"]);
                }else{
                    echo json_encode(["status" => "error", "info" => "Data Guru Gagal di Tambah"]);
                }
            } catch (\Throwable $th) {
                echo json_encode(["status" => "error", "info" => "Error: ". $th->getMessage()]);
            }
            
        break;

        case "editguru" :

            $id = $_POST["id"];
            $idguru = $_POST["noguru"];
            $namaguru = $_POST["nama"];
            $nuptk = $_POST["nuptk"];
            $alamat = $_POST["alamat"];
            $telp = $_POST["telp"];
            $email = $_POST["email"];
            $jabatan = $_POST["jabatan"];

            $query = "UPDATE tb_guru 
            SET nama_guru = '$namaguru', 
            nuptk = '$nuptk',
            alamat_guru = '$alamat',
            tlp_guru = '$telp',
            email_guru = '$email',
            jabatan = '$jabatan' WHERE id_guru = $id";

            try {
                if(mysqli_query($connect, $query)){
                    echo json_encode(["status" => "success", "info" => "Data Guru Berhasil di Update"]);
                }else{
                    echo json_encode(["status" => "error", "info" => "Data Guru Gagal di Update"]);
                }
            } catch (\Throwable $th) {
                echo json_encode(["status" => "error", "info" => "Error: ". $th->getMessage()]);
            }
            
        break;

        case "deleteguru" :
            try {
                $id = $_POST["id"];
                $delGuru = "delete from tb_guru where id_guru = $id";
                
                if(mysqli_query($connect, $delGuru)){
                    echo json_encode([
                        "status" => "success",
                        "info" => "Data Guru Berhasil di Hapus"
                    ]);
                }else{
                    echo json_encode([
                        "status" => "error",
                        "info" => "Data Guru Gagal di Hapus"
                    ]);
                }
            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error: ". $th->getMessage()
                ]);
            }
        break;

    }
}




?>