<?php

require "../../function/database.php";

    $idguru = $_POST["idguru"];

    $query = "DELETE FROM tb_guru WHERE id_guru=$idguru";
    $result = mysqli_query($connect, $query);

    echo json_encode(["status" => "SUCCESS"]);

?>