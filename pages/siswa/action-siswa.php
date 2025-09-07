<?php

require "../../function/database.php";

// Buat koneksi database
$conn = mysqli_connect($host, $user, $pass, $database);

if(isset($_POST["action"])){
    $action = $_POST["action"];
    switch($action){

        case "getdatasiswa" :
            try {
                $getSiswa = "select * from tb_siswa";
                $exec = $conn->query($getSiswa);
                $data_siswa = [];
                while($row = $exec->fetch_assoc()){
                    $data_siswa[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "datasiswa" => $data_siswa,
                    "info" => "Data Siswa Berhasil di Load"
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "datasiswa" => [],
                    "info" => "Error: ". $th->getMessage()
                ]);
            }
        break;

        case "addsiswa" :

            $nissiswa = $_POST["nis"];
            $nisnsiswa = $_POST["nisn"];
            $niksiswa = $_POST["nik"];
            $namasiswa = $_POST["nama"];
            $jksiswa = $_POST["jk"];
            $telpsiswa = $_POST["telp"];
            $tplahir_siswa = $_POST["tplahir"];
            $tglahir_siswa = $_POST["tglahir"];
            $ibusiswa = $_POST["ibu"];
            $ayahsiswa = $_POST["ayah"];
            $kelassiswa = $_POST["kelas"];

            $query = "INSERT INTO tb_siswa (id_siswa,nis_siswa,nisn_siswa,nik_siswa,nama_siswa,jk_siswa,tplahir_siswa,tgl_lahir,ayah_siswa,ibu_siswa,kelas_siswa,telp_siswa) 
            VALUES (null,'$nissiswa','$nisnsiswa','$niksiswa','$namasiswa','$jksiswa','$tplahir_siswa','$tglahir_siswa','$ayahsiswa','$ibusiswa','$kelassiswa','$telpsiswa')";

            try {
                if(mysqli_query($conn, $query)){
                    echo json_encode(["status" => "success", "info" => "berhasil tambah data"]);
                }else{
                    echo json_encode(["status" => "error", "info" => "gagal tambah data"]);
                }
            } catch (\Throwable $th) {
                echo json_encode(["status" => "error", "info" => "error: ". $th->getMessage()]);
            }
            
        break;

        case "editsiswa" :

            $idsiswa = $_POST["id"];
            $nissiswa = $_POST["nis"];
            $nisnsiswa = $_POST["nisn"];
            $niksiswa = $_POST["nik"];
            $namasiswa = $_POST["nama"];
            $jksiswa = $_POST["jk"];
            $telpsiswa = $_POST["telp"];
            $tplahir_siswa = $_POST["tplahir"];
            $tglahir_siswa = $_POST["tglahir"];
            $ibusiswa = $_POST["ibu"];
            $ayahsiswa = $_POST["ayah"];
            $kelassiswa = $_POST["kelas"];
    
            $query = "UPDATE tb_siswa SET nis_siswa = '$nissiswa', 
            nisn_siswa = '$nisnsiswa', 
            nik_siswa = '$niksiswa', 
            nama_siswa = '$namasiswa', 
            jk_siswa = '$jksiswa', 
            tplahir_siswa = '$tplahir_siswa', 
            tgl_lahir = '$tglahir_siswa', 
            ayah_siswa = '$ayahsiswa', 
            ibu_siswa = '$ibusiswa', 
            kelas_siswa = '$kelassiswa', 
            telp_siswa = '$telpsiswa'  
            WHERE id_siswa = $idsiswa";
    
            try {
                if(mysqli_query($conn, $query)){
                    echo json_encode(["status" => "success", "info" => "Data Siswa Berhasil di Update"]);
                }else{
                    echo json_encode(["status" => "error", "info" => "Data Siswa Gagal di Update"]);
                }
            } catch (\Throwable $th) {
                echo json_encode(["status" => "error", "info" => "Error: ". $th->getMessage()]);
            }
            
        break;
        
        case "getsiswa" :
            $nis_siswa = $_POST["nis_siswa"];
            
            $query = "SELECT * FROM tb_siswa WHERE nis_siswa = '$nis_siswa' LIMIT 1";
            $result = mysqli_query($conn, $query);
            
            if($result && mysqli_num_rows($result) > 0){
                $siswa = mysqli_fetch_assoc($result);
                echo json_encode(["status" => "sukses", "data" => $siswa]);
            } else {
                echo json_encode(["status" => "gagal", "info" => "Data siswa tidak ditemukan"]);
            }
        break;

        case "deletesiswa" :
            $idsiswa = $_POST["id"];
            $query = "DELETE FROM tb_siswa WHERE id_siswa = $idsiswa";
            
            try {
                if(mysqli_query($conn, $query)){
                    echo json_encode(["status" => "success", "info" => "Data Siswa Berhasil di Hapus"]);
                } else{
                    echo json_encode(["status" => "error", "info" => "Data Siswa Gagal di Hapus"]);
                }
            } catch (\Throwable $th) {
                echo json_encode(["status" => "error", "info" => "Erro: ". $th->getMessage()]);
            }
            
        break;
    }
}

?>