<?php

require "../../function/database.php";


$action = $_POST["action"];

if(isset($action)){

    switch($action){

        case "addsiswa" :

            // $idsiswa = $_POST["id_siswa"];
            $nissiswa = $_POST["nis_siswa"];
            $namasiswa = $_POST["nama_siswa"];
            $jksiswa = $_POST["jenis_kelamin"];
            $tplahir_siswa = $_POST["tplahir_siswa"];
            $ayahsiswa = $_POST["ayah_siswa"];
            $kelassiswa = $_POST["kelas_siswa"];
            $nisnsiswa = $_POST["nisn"];
            $niksiswa = $_POST["nik_siswa"];
            $telpsiswa = $_POST["tlp_siswa"];
            $tgllahir_siswa = $_POST["tgllahir_siswa"];
            $ibusiswa = $_POST["ibu_siswa"];
            $rombelsiswa = $_POST["rombel_siswa"];

            $query = "INSERT INTO tb_siswa VALUES ('', '$nissiswa', '$nisnsiswa', 
            '$niksiswa', '$namasiswa', '$jksiswa', '$tplahir_siswa', '$tgllahir_siswa', '$ayahsiswa', 
            '$ibusiswa', '$kelassiswa', '$rombelsiswa', '$telpsiswa')";

            if(mysqli_query($connect, $query)){
                echo json_encode(["status" => "sukses", "info" => "berhasil tambah data"]);
            }else{
                echo json_encode(["status" => "gagal", "info" => "gagal tambah data"]);
            }
        break;

        case "editsiswa" :

            $idsiswa = $_POST["id_siswa"];
            $nissiswa = $_POST["nis_siswa"];
            $namasiswa = $_POST["nama_siswa"];
            $jksiswa = $_POST["jenis_kelamin"];
            $tplahir_siswa = $_POST["tp_siswa"];
            $ayahsiswa = $_POST["ayah_siswa"];
            $kelassiswa = $_POST["kls_siswa"];
            $nisnsiswa = $_POST["nisn"];
            $niksiswa = $_POST["nik_siswa"];
            $telpsiswa = $_POST["telp_siswa"];
            $tgllahir_siswa = $_POST["tgl_lahir"];
            $ibusiswa = $_POST["ibu_siswa"];
            $rombelsiswa = $_POST["rombel_siswa"];

            $query = "UPDATE tb_siswa SET nis_siswa = '$nissiswa', 
            nisn_siswa = '$nisnsiswa', 
            nik_siswa = '$niksiswa', 
            nama_siswa = '$namasiswa', 
            jk_siswa = '$jksiswa', 
            tplahir_siswa = '$tplahir_siswa', 
            tgl_lahir = '$tgllahir_siswa', 
            ayah_siswa = '$ayahsiswa', 
            ibu_siswa = '$ibusiswa', 
            kelas_siswa = '$kelassiswa', 
            rombel_siswa = '$rombelsiswa', 
            telp_siswa = '$telpsiswa'  
            WHERE id_siswa = $idsiswa";

            if(mysqli_query($connect, $query)){
                echo json_encode(["status" => "sukses", "info" => "berhasil ubah data"]);
            }else{
                echo json_encode(["status" => "gagal", "info" => "gagal ubah data"]);
            }
        break;

    }
}




?>