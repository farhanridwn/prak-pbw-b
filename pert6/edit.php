<?php
include 'koneksi.php';

// Mengambil NIM dari URL
$nim = $_GET['nim'] ?? '';

// Mencari mahasiswa berdasarkan NIM
$query = mysqli_prepare(
    $koneksi,
    "SELECT * FROM mahasiswa WHERE nim = ?"
);

mysqli_stmt_bind_param($query, "s", $nim);
mysqli_stmt_execute($query);

$hasil = mysqli_stmt_get_result($query);
$mahasiswa = mysqli_fetch_assoc($hasil);

// Memeriksa apakah data ditemukan
if (!$mahasiswa) {
    die("Data mahasiswa tidak ditemukan.");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
            padding: 30px 15px;
            margin: 0;
        }

        form {
            max-width: 500px;
            margin: 20px auto;
            background: white;
            padding: 28px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        /* Header form */
        .header-form {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 20px;
            margin-bottom: 22px;
            border-bottom: 1px solid #e2e8f0;
        }

        .ikon-form {
            width: 45px;
            height: 45px;
            background: #2563eb;
            color: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            flex-shrink: 0;
        }

        h2 {
            margin: 0 0 5px;
            font-size: 23px;
            color: #1e293b;
        }

        .deskripsi {
            margin: 0;
            color: #64748b;
            font-size: 13px;
            line-height: 1.5;
        }

        /* Input form */
        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            color: #334155;
            margin-bottom: 7px;
        }

        input {
            width: 100%;
            padding: 11px 12px;
            margin: 0 0 17px;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            font-size: 14px;
            outline: none;
            transition: 0.2s;
        }

        input:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
        }

        /* NIM tidak dapat diubah */
        input[readonly] {
            background: #f1f5f9;
            color: #64748b;
            cursor: not-allowed;
        }

        /* Tombol */
        .aksi-form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 5px;
        }

        button, .kembali {
            display: inline-block;
            padding: 11px 16px;
            text-decoration: none;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s;
        }

        button {
            background: #2563eb;
            color: white;
        }

        button:hover {
            background: #1d4ed8;
        }

        .kembali {
            background: #e2e8f0;
            color: #334155;
        }

        .kembali:hover {
            background: #cbd5e1;
        }

        @media (max-width: 500px) {
            form {
                padding: 22px;
            }

            h2 {
                font-size: 21px;
            }
        }
    </style>
</head>

<body>

<form action="update.php" method="POST">

    <!-- Header form -->
    <div class="header-form">
        <div class="ikon-form">✏️</div>
        <div>
            <h2>Edit Mahasiswa</h2>
            <p class="deskripsi">
                Perbarui informasi mahasiswa yang dipilih.
            </p>
        </div>
    </div>

    <label>NIM</label>
    <input type="text" name="nim"
           value="<?= htmlspecialchars($mahasiswa['nim']) ?>"
           readonly>

    <label>Nama</label>
    <input type="text" name="nama"
           value="<?= htmlspecialchars($mahasiswa['nama']) ?>"
           required>

    <label>Email</label>
    <input type="email" name="email"
           value="<?= htmlspecialchars($mahasiswa['email']) ?>"
           required>

    <label>Prodi</label>
    <input type="text" name="prodi"
           value="<?= htmlspecialchars($mahasiswa['prodi']) ?>"
           required>

    <label>Angkatan</label>
    <input type="number" name="angkatan"
           value="<?= htmlspecialchars($mahasiswa['angkatan']) ?>"
           required>

    <label>IPK</label>
    <input type="number" name="ipk"
           min="0" max="4" step="0.01"
           value="<?= htmlspecialchars($mahasiswa['ipk']) ?>"
           required>

    <div class="aksi-form">
        <button type="submit">Simpan Perubahan</button>
        <a href="index.php" class="kembali">Kembali</a>
    </div>

</form>

</body>
</html>
```