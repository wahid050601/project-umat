<?php

require "../../function/database.php";

    $idsiswa = $_POST["idsiswa"];

    $query = "DELETE FROM tb_siswa WHERE id_siswa=$idsiswa";
    $result = mysqli_query($connect, $query);

    echo json_encode(["status" => "SUCCESS"]);

?>
