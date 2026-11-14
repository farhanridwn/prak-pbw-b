
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa | Akademik</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #EAF4F4;
            color: #263B3D;
            padding: 40px 20px;
        }

        .container {
            max-width: 700px;
            margin: auto;
        }

        .header {
            margin-bottom: 25px;
        }

        .header h1 {
            font-size: 27px;
            margin-bottom: 8px;
        }

        .header p {
            color: #718687;
            font-size: 14px;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(38, 59, 61, 0.05);
        }

        .form-card h2 {
            font-size: 19px;
            margin-bottom: 22px;
        }

        .error-box {
            background: #FCEAEA;
            color: #B94B4B;
            padding: 13px 18px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #DCE8E8;
            border-radius: 8px;
            font-size: 14px;
            outline: none;
            color: #263B3D;
        }

        input:focus {
            border-color: #91C4C6;
            box-shadow: 0 0 0 3px rgba(176, 215, 216, 0.2);
        }

        .form-actions {
            display: flex;
            gap: 10px;
            margin-top: 25px;
        }

        .btn-update {
            background: #B0D7D8;
            color: #263B3D;
            border: none;
            padding: 12px 20px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-update:hover {
            background: #91C4C6;
        }

        .btn-back {
            background: #F0F5F5;
            color: #52696A;
            padding: 12px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px 12px;
            }

            .form-card {
                padding: 20px;
            }

            .header h1 {
                font-size: 23px;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <div class="header">
        <h1>Edit Mahasiswa</h1>
        <p>Perbarui informasi data mahasiswa.</p>
    </div>

    <div class="form-card">

        <h2>Formulir Edit Data</h2>

        <?php if (isset($validation)): ?>
            <div class="error-box">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>

        <form action="/mahasiswa/update/<?= $mahasiswa['id']; ?>" method="post" novalidate>

            <div class="form-group">
                <label>NIM</label>
                <input type="text" name="nim" value="<?= esc($mahasiswa['nim']); ?>" required>
            </div>

            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" value="<?= esc($mahasiswa['nama']); ?>" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" value="<?= esc($mahasiswa['email']); ?>" required>
            </div>

            <div class="form-group">
                <label>Program Studi</label>
                <input type="text" name="prodi" value="<?= esc($mahasiswa['prodi']); ?>" required>
            </div>

            <div class="form-group">
                <label>Angkatan</label>
                <input type="number" name="angkatan" value="<?= esc($mahasiswa['angkatan']); ?>" required>
            </div>

            <div class="form-group">
                <label>IPK</label>
                <input type="number" name="ipk" step="0.01" min="0" max="4" value="<?= esc($mahasiswa['ipk']); ?>" required>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-update">Simpan Perubahan</button>
                <a href="/mahasiswa" class="btn-back">Kembali</a>
            </div>

        </form>

    </div>

</div>

</body>
</html>
