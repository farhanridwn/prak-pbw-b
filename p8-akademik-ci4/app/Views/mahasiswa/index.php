
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa | Akademik</title>

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
            max-width: 1150px;
            margin: auto;
        }

        .header {
            margin-bottom: 30px;
        }

        .header h1 {
            font-size: 28px;
            margin-bottom: 8px;
        }

        .header p {
            color: #718687;
            font-size: 14px;
        }

        .content {
            background: #FFFFFF;
            padding: 28px;
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(38, 59, 61, 0.05);
        }

        .content-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
            gap: 15px;
        }

        .content-header h2 {
            font-size: 19px;
        }

        .btn-add {
            background: #B0D7D8;
            color: #263B3D;
            padding: 11px 17px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 13px;
            font-weight: bold;
            transition: 0.2s;
        }

        .btn-add:hover {
            background: #91C4C6;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 750px;
        }

        th {
            background: #F0F7F7;
            color: #52696A;
            text-align: left;
            padding: 15px 12px;
            font-size: 12px;
        }

        td {
            padding: 15px 12px;
            border-bottom: 1px solid #EDF2F2;
            font-size: 13px;
        }

        tr:hover td {
            background: #FAFCFC;
        }

        .btn-edit, .btn-delete {
            display: inline-block;
            text-decoration: none;
            padding: 7px 11px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: bold;
        }

        .btn-edit {
            background: #E4F1F1;
            color: #315C60;
        }

        .btn-delete {
            background: #FCEAEA;
            color: #C45B5B;
            margin-left: 4px;
        }

        .btn-edit:hover {
            background: #CFE5E5;
        }

        .btn-delete:hover {
            background: #F6D5D5;
        }

        .empty {
            text-align: center;
            padding: 25px;
            color: #718687;
        }

        @media (max-width: 600px) {
            body {
                padding: 20px 12px;
            }

            .content {
                padding: 18px;
            }

            .content-header {
                align-items: flex-start;
                flex-direction: column;
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
        <h1>Data Mahasiswa</h1>
        <p>Kelola dan pantau informasi data mahasiswa.</p>
    </div>

    <div class="content">

        <div class="content-header">
            <h2>Daftar Mahasiswa</h2>

            <a href="/mahasiswa/tambah" class="btn-add">
                + Tambah Mahasiswa
            </a>
        </div>

        <div class="table-wrapper">
            <table>
                <tr>
                    <th>ID</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Prodi</th>
                    <th>Angkatan</th>
                    <th>IPK</th>
                    <th>Aksi</th>
                </tr>

                <?php if (!empty($mahasiswa)): ?>
                    <?php foreach ($mahasiswa as $mhs): ?>
                    <tr>
                        <td><?= esc($mhs['id']); ?></td>
                        <td><?= esc($mhs['nim']); ?></td>
                        <td><?= esc($mhs['nama']); ?></td>
                        <td><?= esc($mhs['email']); ?></td>
                        <td><?= esc($mhs['prodi']); ?></td>
                        <td><?= esc($mhs['angkatan']); ?></td>
                        <td><?= esc($mhs['ipk']); ?></td>
                        <td>
                            <a href="/mahasiswa/edit/<?= $mhs['id']; ?>"
                               class="btn-edit">Edit</a>

                            <a href="/mahasiswa/hapus/<?= $mhs['id']; ?>"
                               class="btn-delete"
                               onclick="return confirm('Yakin ingin menghapus data ini?')">
                               Hapus
                            </a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="empty">
                            Belum ada data mahasiswa.
                        </td>
                    </tr>
                <?php endif; ?>

            </table>
        </div>

    </div>

</div>

</body>
</html>
