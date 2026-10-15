<?php
include "koneksi.php";

$kode_buku    = $_POST['kode_buku'];
$judul        = $_POST['judul'];
$penulis      = $_POST['penulis'];
$kategori     = $_POST['kategori'];
$tahun_terbit = $_POST['tahun_terbit'];
$stok         = $_POST['stok'];

$query = mysqli_query(
    $koneksi,
    "INSERT INTO buku (kode_buku, judul, penulis, kategori, tahun_terbit, stok)
     VALUES ('$kode_buku', '$judul', '$penulis', '$kategori', '$tahun_terbit', '$stok')"
);

if ($query) {
    echo "Data buku berhasil disimpan! <a href='data.php'>Lihat Data</a>";
} else {
    echo "Data gagal disimpan: " . mysqli_error($koneksi);
}
?>