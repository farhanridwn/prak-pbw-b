<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Produk</title>
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

        /* Toast (pop up pesan) */
        .toast {
            position: fixed;
            top: 24px;
            right: 24px;
            z-index: 1000;
            padding: 14px 22px;
            background: #00A8C6;
            color: #fff;
            font-weight: 600;
            font-size: 14px;
            border-radius: 8px;
            box-shadow: 0 6px 20px rgba(0, 122, 145, 0.35);
            animation: toastMasuk 0.4s ease, toastKeluar 0.4s ease 2.6s forwards;
        }
        @keyframes toastMasuk {
            from { opacity: 0; transform: translateX(40px); }
            to   { opacity: 1; transform: translateX(0); }
        }
        @keyframes toastKeluar {
            from { opacity: 1; transform: translateX(0); }
            to   { opacity: 0; transform: translateX(40px); }
        }

        /* Kartu ringkasan */
        .ringkasan { display: flex; gap: 16px; margin-bottom: 20px; }
        .kartu {
            flex: 1;
            max-width: 220px;
            padding: 14px 18px;
            background: #fff;
            border-top: 4px solid #00A8C6;
            border-radius: 10px;
            box-shadow: 0 4px 14px rgba(0, 122, 145, 0.12);
        }
        .kartu small { color: #5F7F89; font-size: 13px; }
        .kartu strong { display: block; margin-top: 4px; font-size: 24px; color: #007A91; }

        /* Toolbar: tombol tambah + pencarian */
        .toolbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }
        .cari-form { display: flex; gap: 8px; align-items: center; }
        .cari-form input {
            width: 240px;
            padding: 10px 12px;
            font-size: 14px;
            font-family: inherit;
            border: 1px solid #B8E3EC;
            border-radius: 6px;
            outline: none;
        }
        .cari-form input:focus {
            border-color: #00A8C6;
            box-shadow: 0 0 0 3px rgba(0, 168, 198, 0.2);
        }
        .cari-form button {
            padding: 10px 16px;
            background: #00A8C6;
            color: #fff;
            border: none;
            border-radius: 6px;
            font-family: inherit;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
        }
        .cari-form button:hover { background: #007A91; }
        .reset { font-size: 13px; color: #007A91; text-decoration: none; }
        .reset:hover { text-decoration: underline; }

        a.btn {
            display: inline-block;
            padding: 10px 18px;
            background: #00A8C6;
            color: #fff;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 2px 6px rgba(0, 168, 198, 0.35);
            transition: background 0.2s, transform 0.2s;
        }
        a.btn:hover { background: #007A91; transform: translateY(-1px); }

        /* Tabel */
        table {
            width: 100%;
            margin-top: 20px;
            background: #fff;
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 14px rgba(0, 122, 145, 0.15);
        }
        th, td {
            padding: 12px 16px;
            text-align: left;
            border-bottom: 1px solid #D6EEF3;
        }
        th {
            background: #00A8C6;
            color: #fff;
            font-size: 14px;
            letter-spacing: 0.5px;
        }
        tr:nth-child(even) td { background: #F2FAFC; }
        tr:hover td { background: #E0F7FA; }
        tr:last-child td { border-bottom: none; }

        /* Tombol aksi di tabel */
        .aksi { display: flex; gap: 8px; align-items: center; }
        .aksi form { margin: 0; }
        .aksi a, .aksi button {
            display: inline-block;
            padding: 5px 14px;
            font-family: inherit;
            font-size: 13px;
            font-weight: 600;
            line-height: 18px;
            border-radius: 20px;
            text-decoration: none;
            cursor: pointer;
        }
        .aksi a {
            color: #007A91;
            background: #E0F7FA;
            border: 1px solid #00A8C6;
        }
        .aksi a:hover { background: #00A8C6; color: #fff; }
        .aksi button {
            color: #D32F2F;
            background: #FDECEA;
            border: 1px solid #E57373;
        }
        .aksi button:hover { background: #D32F2F; color: #fff; }

        /* Badge stok */
        .badge {
            display: inline-block;
            margin-left: 8px;
            padding: 2px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge.habis  { background: #FDECEA; color: #D32F2F; }
        .badge.hampir { background: #FFF4E0; color: #E08600; }
    </style>
</head>
<body>
    <h2>Daftar Produk</h2>

    <!-- Pesan sukses -->
    <?php
    $daftarPesan = [
        'tambah' => 'Data produk berhasil ditambahkan.',
        'ubah'   => 'Data produk berhasil diperbarui.',
        'hapus'  => 'Data produk berhasil dihapus.',
    ];
    if (isset($daftarPesan[$pesan])) : ?>
       <div class="toast"><?= $daftarPesan[$pesan] ?></div>
    <?php endif; ?>

    <!-- Ringkasan -->
    <div class="ringkasan">
        <div class="kartu">
            <small>Total Jenis Produk</small>
            <strong><?= $ringkasan['total_produk'] ?></strong>
        </div>
        <div class="kartu">
            <small>Total Semua Stok Produk</small>
            <strong><?= $ringkasan['total_stok'] ?></strong>
        </div>
    </div>

    <!-- Toolbar -->
    <div class="toolbar">
        <a class="btn" href="index.php?aksi=create">+ Tambah Produk</a>

        <form class="cari-form" method="GET" action="index.php">
            <input type="hidden" name="aksi" value="index">
            <input type="text" name="cari" placeholder="Cari nama produk..."
                   value="<?= htmlspecialchars($cari) ?>">
            <button type="submit">Cari</button>
            <?php if ($cari !== '') : ?>
                <a class="reset" href="index.php?aksi=index">Reset</a>
            <?php endif; ?>
        </form>
    </div>

    <!-- Tabel -->
    <table>
        <tr>
            <th>No</th>
            <th>Nama Produk</th>
            <th>Harga</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>
        <?php if (empty($produk)) : ?>
            <tr>
                <td colspan="5">
                    <?= $cari !== '' ? 'Produk tidak ditemukan.' : 'Belum ada data produk.' ?>
                </td>
            </tr>
        <?php else : ?>
            <?php $no = 1; foreach ($produk as $p) : ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= htmlspecialchars($p['nama_produk']) ?></td>
                <td>Rp <?= number_format($p['harga'], 0, ',', '.') ?></td>
                <td>
                    <?= $p['stok'] ?>
                    <?php if ($p['stok'] == 0) : ?>
                        <span class="badge habis">Habis</span>
                    <?php elseif ($p['stok'] <= 5) : ?>
                        <span class="badge hampir">Hampir habis</span>
                    <?php endif; ?>
                </td>
                <td>
                    <div class="aksi">
                        <a href="index.php?aksi=edit&id=<?= $p['id'] ?>">Edit</a>
                        <form method="POST" action="index.php?aksi=hapus"
                              onsubmit="return confirm('Yakin hapus produk ini?')">
                            <input type="hidden" name="id" value="<?= $p['id'] ?>">
                            <button type="submit">Hapus</button>
                        </form>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </table>
    <script>
    if (window.location.search.includes('pesan=')) {
        const url = new URL(window.location);
        url.searchParams.delete('pesan');
        window.history.replaceState({}, '', url);
    }
</script>
</body>
</body>
</html>