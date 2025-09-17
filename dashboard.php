<?php 
require "function/database.php";

try {
    // Get siswa
    $getSiswa = "select count(1) as total_siswa from tb_siswa";
    $execSiswa = $connect->query($getSiswa);
    $siswa = $execSiswa->fetch_assoc();

    // Get Guru
    $getGuru = "select count(1) as total_guru from tb_guru";
    $execGuru = $connect->query($getGuru);
    $guru = $execGuru->fetch_assoc();

    // Get Rombel
    $getRombel = "select count(1) as total_rombel from tb_rombel";
    $execRombel = $connect->query($getRombel);
    $rombel = $execRombel->fetch_assoc();

    // Get Mapel
    $getMapel = "select count(1) as total_jadwal from tb_jadwal_mapel";
    $execMapel = $connect->query($getMapel);
    $mapel = $execMapel->fetch_assoc();

    // Get Profil
    $getProfil = "select * from tb_profil_lembaga";
    $execProfil = $connect->query($getProfil);
    $profil = $execProfil->fetch_assoc();


    echo json_encode([
        "status" => "success",
        "info" => "berhasil get informasi dashboard",
        "siswa" => $siswa["total_siswa"],
        "guru" => $guru["total_guru"],
        "rombel" => $rombel["total_rombel"],
        "jadwal" => $mapel["total_jadwal"],
        "profil" => $profil
    ]);

} catch (\Throwable $th) {
    echo json_encode([
        "status" => "error",
        "info" => "Message Error : ". $th->getMessage(),
        "siswa" => '#',
        "guru" => '#',
        "rombel" => '#',
        "jadwal" => '#',
        "profil" => []
    ]);
}

?>