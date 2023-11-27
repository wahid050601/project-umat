<?php

require "../../function/database.php";


$action = $_POST["action"];

if(isset($action)){

    switch($action){

        case "addguru" :

            $idguru = $_POST["idguru"];
            $namaguru = $_POST["namaguru"];
            $nuptk = $_POST["nuptk"];
            $mapel = $_POST["mapel"];

            $query = "INSERT INTO tb_guru VALUES ($idguru, '$namaguru', '$nuptk', '$mapel')";

            if(mysqli_query($connect, $query)){
                echo json_encode(["status" => "success", "info" => "berhasil tambah data"]);
            }else{
                echo json_encode(["status" => "error", "info" => "gagal tambah data"]);
            }
        break;

        case "editguru" :

            $idguru = $_POST["idguru"];
            $namaguru = $_POST["namaguru"];
            $nuptk = $_POST["nuptk"];
            $mapel = $_POST["mapel"];

            $query = "UPDATE tb_guru SET nama_guru = '$namaguru', nuptk = '$nuptk', mapel_guru = '$mapel' WHERE id_guru = $idguru";

            if(mysqli_query($connect, $query)){
                echo json_encode(["status" => "success", "info" => "berhasil tambah data"]);
            }else{
                echo json_encode(["status" => "error", "info" => "gagal tambah data"]);
            }
        break;

    }
}




?>