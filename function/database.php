<?php

$host = getenv("DB_HOST");
$user = getenv("DB_USER");
$pass = getenv("DB_PASSWORD");
$database = getenv("DB_DATABASE2");
$charset = 'utf8mb4';

// DB_HOST: host.docker.internal
// DB_USER: root
// DB_PASSWORD: wahid561
// DB_DATABASE1: fa_addawah
// DB_DATABASE2: sia_yaj

$connect = mysqli_connect($host, $user, $pass, $database);

if (!$connect) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
?>