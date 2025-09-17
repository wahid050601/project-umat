<?php
require "../../function/database.php";


if(isset($_POST["action"])){
    $action = $_POST["action"];
    switch($action){

        case "loadprofillembaga":
            try {
                $getDetailProfil = "select * from tb_profil_lembaga";
                $getProf = mysqli_query($connect, $getDetailProfil);
        
                if($getProf){
                    $dataset = mysqli_fetch_assoc($getProf);
                    
                    echo json_encode([
                        "status" => "success",
                        "info" => "Get informasi detail lembaga berhasil",
                        "data" => $dataset,
                        "count" => mysqli_affected_rows($connect)
                    ]);
                }else{
                    echo json_encode([
                        "status" => "failed",
                        "info" => "Get informasi detail lembaga gagal",
                        "data" => null
                    ]);
                }
                
        
            } catch (\Throwable $th) {
                
                echo json_encode([
                    "status" => "error",
                    "info" => "Message : ". $th->getMessage()
                ]);
            }
        break;

        case "updateprofillembaga" :
            try {
                // delete old profil lembaga
                $delProfil = "delete from tb_profil_lembaga";
                $exec = $connect->query($delProfil);

                $result = false;
                if($exec){
                    $insertNewProfil = "insert into tb_profil_lembaga (nama_sekolah,jenjang_sekolah,nsm,npsn,status_sekolah,status_akreditasi,nilai_akreditasi,tgl_akreditasi,berlaku_akreditasi,no_akreditasi,npwp,tahun_berdiri,no_telp,email_sekolah)
                    values (
                    '". str_replace("'", "''", $_POST["nama_sekolah"]) ."',
                    '". $_POST["jenjang_sekolah"] ."',
                    '". $_POST["nsm"] ."',
                    '". $_POST["npsn"] ."',
                    '". $_POST["status_sekolah"] ."',
                    '". $_POST["status_akreditasi"] ."',
                    ". ($_POST["nilai_akreditasi"] == '' ? 'null' : $_POST["nilai_akreditasi"]) .",
                    ". ($_POST["tgl_akreditasi"] == "" ? "null" : "'".$_POST["tgl_akreditasi"]."'") .",
                    ". ($_POST["berlaku_akreditasi"] == "" ? "null" : "'".$_POST["berlaku_akreditasi"]."'") .",
                    '". $_POST["no_akreditasi"] ."',
                    '". $_POST["npwp"] ."',
                    '". $_POST["tahun_berdiri"] ."',
                    '". $_POST["no_telp"] ."',
                    '". $_POST["email_sekolah"] ."'
                    )";
                    $insrun = $connect->query($insertNewProfil);

                    if($insrun){
                        $result = true;
                    }
                }

                if($result){
                    echo json_encode([
                        "status" => "success",
                        "info" => "Data lembaga berhasil diupdate"
                    ]);
                }else{
                    echo json_encode([
                        "status" => "failed",
                        "info" => "Data lembaga gagal diupdate: ". mysqli_error($connect)
                    ]);
                }
                
            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Message : ". $th->getMessage()
                ]);
            }
        break;

    }
}
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
    
}elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
    
}