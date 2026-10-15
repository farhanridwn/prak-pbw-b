<?php
// Menghubungkan ke database
include 'koneksi.php';

// Memeriksa apakah formulir dikirim menggunakan POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Mengambil data dari formulir
    $nim = $_POST['nim'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $prodi = $_POST['prodi'];
    $angkatan = $_POST['angkatan'];
    $ipk = $_POST['ipk'];

    // Menyiapkan perintah SQL
    $query = mysqli_prepare(
        $koneksi,
        "INSERT INTO mahasiswa
        (nim, nama, email, prodi, angkatan, ipk)
        VALUES (?, ?, ?, ?, ?, ?)"
    );

    // Mengikat data ke perintah SQL
    mysqli_stmt_bind_param(
        $query,
        "ssssid",
        $nim,
        $nama,
        $email,
        $prodi,
        $angkatan,
        $ipk
    );

    // Menjalankan perintah SQL
    if (mysqli_stmt_execute($query)) {
        echo "<script>
            alert('Data mahasiswa berhasil ditambahkan!');
            window.location='index.php';
        </script>";
    } else {
        echo "Gagal menyimpan data: " .
             htmlspecialchars(mysqli_stmt_error($query));
    }

    mysqli_stmt_close($query);
}
?>