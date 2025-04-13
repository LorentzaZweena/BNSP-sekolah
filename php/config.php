<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bnsp-sekolah";

    $koneksi = new mysqli($servername, $username, $password, $dbname);
    if ($koneksi->connect_error) {
        die("Gagal terkoneksi: " . $koneksi->connect_error);
    }
?>