<?php

$host = "localhost";
$username = "root";
$password = "@Gusoce0310";
$database = "bioskop";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

mysqli_set_charset($koneksi, "utf8mb4");

?>