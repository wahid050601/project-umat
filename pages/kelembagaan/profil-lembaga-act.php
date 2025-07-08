<?php
require "../../function/database.php";

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    
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
}elseif($_SERVER['REQUEST_METHOD'] == 'POST'){
    try {
        // Get POST data
        $data = json_decode(file_get_contents('php://input'), true);
        
        // Prepare the update query
        $query = "UPDATE tb_profil_lembaga SET 
            nama_sekolah = '".mysqli_real_escape_string($connect, $data['nama_sekolah'])."',
            jenjang_sekolah = '".mysqli_real_escape_string($connect, $data['jenjang_sekolah'])."',
            nsm = '".mysqli_real_escape_string($connect, $data['nsm'])."',
            npsn = '".mysqli_real_escape_string($connect, $data['npsn'])."',
            status_sekolah = '".mysqli_real_escape_string($connect, $data['status_sekolah'])."',
            npwp = '".mysqli_real_escape_string($connect, $data['npwp'])."',
            status_akreditasi = '".mysqli_real_escape_string($connect, $data['status_akreditasi'])."',
            nilai_akreditasi = '".mysqli_real_escape_string($connect, $data['nilai_akreditasi'])."',
            tgl_akreditasi = '".mysqli_real_escape_string($connect, $data['tgl_akreditasi'])."',
            berlaku_akreditasi = '".mysqli_real_escape_string($connect, $data['berlaku_akreditasi'])."',
            tahun_berdiri = '".mysqli_real_escape_string($connect, $data['tahun_berdiri'])."'
            WHERE id_lembaga = '".mysqli_real_escape_string($connect, $data['id'])."'";
            
        $result = mysqli_query($connect, $query);
        
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
}