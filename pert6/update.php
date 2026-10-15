<?php
include 'koneksi.php';

// Mengambil data dari formulir
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$prodi = $_POST['prodi'];
$angkatan = $_POST['angkatan'];
$ipk = $_POST['ipk'];

// Menyiapkan perintah untuk memperbarui data
$query = mysqli_prepare(
    $koneksi,
    "UPDATE mahasiswa
     SET nama = ?, email = ?, prodi = ?,
         angkatan = ?, ipk = ?
     WHERE nim = ?"
);

// Mengikat data
mysqli_stmt_bind_param(
    $query,
    "sssids",
    $nama,
    $email,
    $prodi,
    $angkatan,
    $ipk,
    $nim
);

// Menjalankan perintah
if (mysqli_stmt_execute($query)) {

    echo "<script>
        alert('Data mahasiswa berhasil diubah!');
        window.location='index.php';
    </script>";

} else {

    echo "Gagal mengubah data: " .
         htmlspecialchars(mysqli_stmt_error($query));
}

mysqli_stmt_close($query);
?>