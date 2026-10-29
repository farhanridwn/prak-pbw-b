<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Produk</title>
    <style>
        <style>
    * { box-sizing: border-box; }
    body {
        font-family: 'Segoe UI', Arial, sans-serif;
        margin: 0;
        padding: 40px;
        background: #F2FAFC;
        color: #1F3A44;
    }
    h2 {
        margin: 0 0 18px;
        color: #007A91;
        font-size: 28px;
        border-left: 6px solid #00A8C6;
        padding-left: 12px;
    }
    form {
        max-width: 420px;
        background: #fff;
        padding: 26px 28px 30px;
        border-top: 5px solid #00A8C6;
        border-radius: 10px;
        box-shadow: 0 4px 14px rgba(0, 122, 145, 0.15);
    }
    label {
        display: block;
        margin-top: 14px;
        font-size: 14px;
        font-weight: 600;
        color: #007A91;
    }
    input {
        width: 100%;
        margin-top: 6px;
        padding: 10px 12px;
        font-size: 14px;
        font-family: inherit;
        border: 1px solid #B8E3EC;
        border-radius: 6px;
        outline: none;
        transition: border 0.2s, box-shadow 0.2s;
    }
    input:focus {
        border-color: #00A8C6;
        box-shadow: 0 0 0 3px rgba(0, 168, 198, 0.2);
    }
    button, a.btn {
        display: inline-block;
        margin-top: 22px;
        padding: 10px 18px;
        font-family: inherit;
        font-size: 14px;
        font-weight: 600;
        line-height: 20px;
        text-decoration: none;
        border: 1px solid #00A8C6;
        border-radius: 6px;
        cursor: pointer;
        transition: background 0.2s, color 0.2s;
    }
    button {
        background: #00A8C6;
        color: #fff;
        margin-right: 6px;
    }
    button:hover { background: #007A91; border-color: #007A91; }
    a.btn {
        background: #fff;
        color: #007A91;
    }
    a.btn:hover { background: #E0F7FA; }
</style>
    
</head>
<body>
    <h2>Edit Produk</h2>
    <form method="POST" action="index.php?aksi=edit&id=<?= $produk['id'] ?>">
        <label>Nama Produk</label>
        <input type="text" name="nama_produk" value="<?= htmlspecialchars($produk['nama_produk']) ?>" required>

        <label>Harga</label>
        <input type="number" name="harga" value="<?= $produk['harga'] ?>" required>

        <label>Stok</label>
        <input type="number" name="stok" value="<?= $produk['stok'] ?>" required>

        <button type="submit">Update</button>
        <a class="btn" href="index.php?aksi=index">Kembali</a>
    </form>
</body>
</html>