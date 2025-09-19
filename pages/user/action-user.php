

<?php
require "../../function/database.php";


if(isset($_POST["action"])){
    $action = $_POST["action"];
    switch($action){

        case "loaddatauser":
            try {
                $getUser = "select * from tb_user";
                $exec = $connect->query($getUser);
                $datauser = [];
                while($row = $exec->fetch_assoc()){
                    $datauser[] = $row;
                }

                if($exec){
                    echo json_encode([
                        "status" => "success",
                        "info" => "Data berhasil di ambil",
                        "data" => $datauser
                    ]);
                }else{
                    echo json_encode([
                        "status" => "error",
                        "info" => "Data gagal di ambil",
                        "data" => []
                    ]);
                }
                

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error Message : ". $th->getMessage(),
                    "data" => []
                ]);
            }
        break;

        case "adduser":
            $username = $_POST["username"];
            $password = $_POST["password"];
            $nama = $_POST["nama"];
            $alamat = $_POST["alamat"];
            $telp = $_POST["telp"];
            $email = $_POST["email"];
            $role = $_POST["role"];

            try {
                $insertUser = "insert into tb_user (username,password,nama,alamat,no_telp,email,level)
                values ('$username','$password','$nama','$alamat','$telp','$email','$role')";
                $execIns = $connect->query($insertUser);

                $status = "success";
                $info = "Akses User Berhasil di Tambah";
                if(!$execIns){
                    $status = "error";
                    $info = "Akses User Gagal di Tambah";
                }

                echo json_encode([
                    "status" => $status,
                    "info" => $info
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error Message : ". $th->getMessage()
                ]);
            }
        break;

        case "edituser":
            $id = $_POST["id"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $nama = $_POST["nama"];
            $alamat = $_POST["alamat"];
            $telp = $_POST["telp"];
            $email = $_POST["email"];
            $role = $_POST["role"];

            try {
                
                $editUser = "update tb_user set
                username = '$username',
                password = '$password',
                nama = '". str_replace("'", "''", $nama) ."',
                alamat = '". str_replace("'", "''", $alamat) ."',
                no_telp = '$telp',
                email = '$email',
                level = '$role'
                where id = $id";
                error_log("EDIT USER ==== ". $editUser);
                $execEdit = $connect->query($editUser);

                $status = "success";
                $info = "Data User Berhasil di Update";
                if(!$execEdit){
                    $status = "error";
                    $info = "Data User Gagal di Update";
                }

                echo json_encode([
                    "status" => $status,
                    "info" => $info
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => "error",
                    "info" => "Error Message : ". $th->getMessage()
                ]);
            }
        break;

        case "deleteuser":
            try {
                
                $id = $_POST["id"];
                $delUser = "delete from tb_user where id = $id";
                $execDel = $connect->query($delUser);

                $status = "success";
                $info = "Data User Berhasil di Hapus";
                if(!$execDel){
                    $status = "error";
                    $info = "Data User Gagal di Hapus";
                }

                echo json_encode([
                    "status" => $status,
                    "info" => $info
                ]);

            } catch (\Throwable $th) {
                echo json_encode([
                    "status" => 'error',
                    "info" => 'Error Message : '. $th->getMessage()
                ]);
            }
        break;

    }
}




?>