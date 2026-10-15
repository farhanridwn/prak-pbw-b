<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mahasiswa</title>

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

<form action="store.php" method="POST">

    <!-- Header form -->
    <div class="header-form">
        <div class="ikon-form">🎓</div>
        <div>
            <h2>Tambah Mahasiswa</h2>
            <p class="deskripsi">
                Masukkan informasi mahasiswa baru.
            </p>
        </div>
    </div>

    <label>NIM</label>
    <input type="text" name="nim" required>

    <label>Nama</label>
    <input type="text" name="nama" required>

    <label>Email</label>
    <input type="email" name="email" required>

    <label>Prodi</label>
    <input type="text" name="prodi" required>

    <label>Angkatan</label>
    <input type="number" name="angkatan" required>

    <label>IPK</label>
    <input type="number" name="ipk"
           min="0" max="4" step="0.01" required>

    <div class="aksi-form">
        <button type="submit">Simpan Mahasiswa</button>
        <a href="index.php" class="kembali">Kembali</a>
    </div>

</form>

</body>
</html>
```