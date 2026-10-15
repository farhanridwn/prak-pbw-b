<?php
// Menghubungkan ke database
include 'koneksi.php';

// Mengambil seluruh data mahasiswa
$query = mysqli_query(
    $koneksi,
    "SELECT * FROM mahasiswa"
);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>

    <style>
        /* Tampilan dasar halaman */
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f1f5f9;
            color: #1e293b;
            padding: 30px;
            margin: 0;
        }

        /* Kotak utama */
        .container {
            max-width: 1100px;
            margin: auto;
            background: white;
            padding: 25px;
            border-radius: 12px;
            overflow-x: auto;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        /* Header aplikasi */
        .header-aplikasi {
            display: flex;
            align-items: center;
            gap: 14px;
            padding: 16px 18px;
            margin-bottom: 20px;
            background: #eff6ff;
            border-left: 5px solid #2563eb;
            border-radius: 10px;
        }

        .ikon-aplikasi {
            background: #2563eb;
            color: white;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 24px;
            flex-shrink: 0;
        }

        .header-aplikasi h2 {
            margin: 0 0 5px;
            color: #1e293b;
            font-size: 24px;
        }

        .header-aplikasi p {
            margin: 0;
            color: #64748b;
            font-size: 13px;
            line-height: 1.5;
        }

        /* Kartu jumlah mahasiswa */
        .kartu-statistik {
            margin-bottom: 22px;
            padding: 18px;
            border: 1px solid #dbeafe;
            border-radius: 10px;
            background: #ffffff;
        }

        .kartu-statistik p {
            margin: 0 0 8px;
            color: #64748b;
            font-size: 14px;
        }

        .kartu-statistik strong {
            color: #2563eb;
            font-size: 28px;
        }

        /* Tombol tambah */
        .tambah {
            display: inline-block;
            background: #2563eb;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 7px;
            font-size: 14px;
            font-weight: bold;
            transition: 0.2s;
        }

        .tambah:hover {
            background: #1d4ed8;
            transform: translateY(-1px);
        }

        /* Tabel mahasiswa */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 22px;
            font-size: 14px;
        }

        th, td {
            border-bottom: 1px solid #e2e8f0;
            padding: 13px 12px;
            text-align: left;
        }

        th {
            background: #eff4fa;
            color: #334155;
            font-weight: bold;
        }

        td {
            color: #475569;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        /* Tombol edit */
        .edit {
            display: inline-block;
            color: #1d4ed8;
            background: #dbeafe;
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s;
        }

        .edit:hover {
            background: #bfdbfe;
        }

        /* Tombol hapus */
        .hapus {
            display: inline-block;
            color: #b91c1c;
            background: #fee2e2;
            padding: 6px 10px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s;
        }

        .hapus:hover {
            background: #fecaca;
        }

        /* Tampilan layar HP */
        @media (max-width: 600px) {
            body {
                padding: 15px;
            }

            .container {
                padding: 18px;
            }

            .header-aplikasi h2 {
                font-size: 21px;
            }

            table {
                font-size: 13px;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- Header aplikasi -->
    <div class="header-aplikasi">
        <div class="ikon-aplikasi">🎓</div>
        <div>
            <h2>Data Mahasiswa</h2>
            <p>Sistem Informasi Akademik | Pengelolaan Data Mahasiswa</p>
        </div>
    </div>

    <!-- Statistik jumlah mahasiswa -->
    <div class="kartu-statistik">
        <p>Total Mahasiswa Terdaftar</p>
        <strong><?= mysqli_num_rows($query) ?></strong>
    </div>

    <!-- Tombol tambah mahasiswa -->
    <a href="create.php" class="tambah">
        + Tambah Mahasiswa
    </a>

    <!-- Tabel data mahasiswa -->
    <table>
        <thead>
            <tr>
                <th>NIM</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Prodi</th>
                <th>Angkatan</th>
                <th>IPK</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

        <?php while ($mahasiswa = mysqli_fetch_assoc($query)) : ?>

            <tr>
                <td>
                    <?= htmlspecialchars($mahasiswa['nim']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($mahasiswa['nama']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($mahasiswa['email']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($mahasiswa['prodi']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($mahasiswa['angkatan']) ?>
                </td>

                <td>
                    <?= htmlspecialchars($mahasiswa['ipk']) ?>
                </td>

                <td>
                    <a class="edit"
                       href="edit.php?nim=<?= urlencode($mahasiswa['nim']) ?>">
                        Edit
                    </a>

                    |

                    <a class="hapus"
                       href="delete.php?nim=<?= urlencode($mahasiswa['nim']) ?>"
                       onclick="return confirm('Yakin ingin menghapus data ini?')">
                        Hapus
                    </a>
                </td>
            </tr>

        <?php endwhile; ?>

        </tbody>
    </table>

</div>

</body>
</html>