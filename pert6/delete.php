<?php
include 'koneksi.php';

// Mengambil NIM dari URL
$nim = $_GET['nim'] ?? '';

// Menyiapkan perintah penghapusan
$query = mysqli_prepare(
    $koneksi,
    "DELETE FROM mahasiswa WHERE nim = ?"
);

// Mengikat NIM
mysqli_stmt_bind_param($query, "s", $nim);

// Menjalankan perintah
if (mysqli_stmt_execute($query)) {

    echo "<script>
        alert('Data mahasiswa berhasil dihapus!');
        window.location='index.php';
    </script>";

} else {

    echo "Gagal menghapus data: " .
         htmlspecialchars(mysqli_stmt_error($query));
}

mysqli_stmt_close($query);
?>