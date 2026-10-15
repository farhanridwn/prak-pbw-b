<?php
include "koneksi.php";

$query = mysqli_query($koneksi, "SELECT * FROM buku ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Koleksi Buku</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; padding: 30px; }
        .container { max-width: 900px; margin: auto; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); }
        h2 { margin-top: 0; color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { padding: 12px; text-align: left; border-bottom: 1px solid #eef2f5; }
        th { background-color: #3498db; color: white; }
        tr:hover { background-color: #f8f9fa; }
        .badge { padding: 5px 10px; border-radius: 20px; font-size: 0.85em; font-weight: bold; color: white; }
        .badge-success { background-color: #2ecc71; }
        .badge-danger { background-color: #e74c3c; }
        .btn-add { display: inline-block; margin-bottom: 15px; padding: 8px 15px; background: #2ecc71; color: white; text-decoration: none; border-radius: 5px; font-weight: bold; }
    </style>
</head>
<body>

<div class="container">
    <h2>📚 Daftar Koleksi Buku Perpustakaan</h2>
    <a href="form.php" class="btn-add">+ Tambah Buku Baru</a>

    <table>
        <thead>
            <tr>
                <th>Kode</th>
                <th>Judul Buku</th>
                <th>Penulis</th>
                <th>Kategori</th>
                <th>Tahun</th>
                <th>Stok</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = mysqli_fetch_assoc($query)): ?>
                <tr>
                    <td><b><?= htmlspecialchars($data['kode_buku']) ?></b></td>
                    <td><?= htmlspecialchars($data['judul']) ?></td>
                    <td><?= htmlspecialchars($data['penulis']) ?></td>
                    <td><?= htmlspecialchars($data['kategori']) ?></td>
                    <td><?= htmlspecialchars($data['tahun_terbit']) ?></td>
                    <td><?= htmlspecialchars($data['stok']) ?></td>
                    <td>
                        <!-- Modifikasi Logika Status Stok -->
                        <?php if ($data['stok'] > 0): ?>
                            <span class="badge badge-success">Tersedia</span>
                        <?php else: ?>
                            <span class="badge badge-danger">Habis</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>