<?php
require_once __DIR__ . "/../function/database.php";



$action = $_POST["action"];
$column = $_POST["column"];
if(isset($action)){
    
    $columnSet = "*";
    if(isset($column) && !empty($column)){
        $columnSet = explode(",", $column);
        count($columnSet) > 0 ? $columnSet = implode(",", $columnSet) : $columnSet = "*";
    }
    $column = isset($column) ? $column : "*";

    switch($action){
        case "getDataGuru" :
            $query = "select $columnSet from tb_guru";
            $exec = $connect->query($query);
            $dataGurumapel = [];
            
            try{
                while($row = $exec->fetch_assoc()){
                    $dataGurumapel[] = $row;
                }

                echo json_encode([
                    "status" => "success",
                    "message" => "Data Guru berhasil diambil",
                    "data" => $dataGurumapel
                ]);

            } catch (Exception $e) {
                echo json_encode([
                    "status" => "error",
                    "message" => $e->getMessage()
                ]);
            }
        break;
    }
}else{
    echo json_encode([
        "status" => "error",
        "message" => "Action not found"
    ]);
}