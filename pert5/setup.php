<?php
require_once 'koneksi.php';

// 1. Buat Database jika belum ada
$sqlCreateDB = "CREATE DATABASE IF NOT EXISTS akademik";

if (mysqli_query($koneksi, $sqlCreateDB)) {
    echo "Database berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Error membuat database: " . mysqli_error($koneksi) . "<br>";
}

mysqli_set_charset($koneksi, "utf8mb4");
mysqli_select_db($koneksi, "akademik");

// 2. Buat Tabel Buku (Studi Kasus Perpustakaan)
$sqlCreateTable = "CREATE TABLE IF NOT EXISTS buku (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    kode_buku VARCHAR(20) NOT NULL UNIQUE,
    judul VARCHAR(150) NOT NULL,
    penulis VARCHAR(100) NOT NULL,
    kategori VARCHAR(50) NOT NULL,
    tahun_terbit YEAR NOT NULL,
    stok INT UNSIGNED DEFAULT 0
) ENGINE=InnoDB";

if (mysqli_query($koneksi, $sqlCreateTable)) {
    echo "Tabel 'buku' berhasil dibuat atau sudah ada.<br>";
} else {
    echo "Gagal membuat tabel buku: " . mysqli_error($koneksi) . "<br>";
}

mysqli_close($koneksi);
?>