<?php
$host = '127.0.0.1';
$user = 'root';
$password = '';
$dbname = 'akademik'; // Pastikan nama database terisi
$port = 3306;

// Masukkan $dbname ke urutan parameter ke-4
$koneksi = mysqli_connect($host, $user, $password, $dbname, $port);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>