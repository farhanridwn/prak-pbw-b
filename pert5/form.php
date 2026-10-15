<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Input Buku</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; background: #f4f6f9; padding: 30px; }
        .card { max-width: 500px; margin: auto; background: #fff; padding: 25px; border-radius: 10px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); }
        h2 { margin-top: 0; color: #2c3e50; border-bottom: 2px solid #3498db; padding-bottom: 10px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; font-weight: bold; margin-bottom: 5px; color: #333; }
        input[type="text"], input[type="number"] { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 5px; box-sizing: border-box; }
        button { width: 100%; padding: 12px; background: #3498db; border: none; color: white; font-size: 16px; font-weight: bold; border-radius: 5px; cursor: pointer; }
        button:hover { background: #2980b9; }
    </style>
</head>
<body>

<div class="card">
    <h2>📖 Input Data Buku Baru</h2>
    <form action="simpan.php" method="post">
        <div class="form-group">
            <label>Kode Buku:</label>
            <input type="text" name="kode_buku" placeholder="Contoh: BK-001" required>
        </div>
        <div class="form-group">
            <label>Judul Buku:</label>
            <input type="text" name="judul" placeholder="Masukkan judul buku" required>
        </div>
        <div class="form-group">
            <label>Penulis / Pengarang:</label>
            <input type="text" name="penulis" placeholder="Nama penulis" required>
        </div>
        <div class="form-group">
            <label>Kategori:</label>
            <input type="text" name="kategori" placeholder="Contoh:Novel" required>
        </div>
        <div class="form-group">
            <label>Tahun Terbit:</label>
            <input type="number" name="tahun_terbit" min="1900" max="2099" placeholder="2024" required>
        </div>
        <div class="form-group">
            <label>Jumlah Stok:</label>
            <input type="number" name="stok" min="0" placeholder="0" required>
        </div>
        <button type="submit">Simpan Data Buku</button>
    </form>
</div>

</body>
</html>