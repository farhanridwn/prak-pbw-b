<?php $jumlahMahasiswa = mysqli_num_rows($dataMahasiswa); ?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistem Informasi Akademik | Data Mahasiswa</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/mahasiswa.css">
</head>
<body>
    <header class="topbar">
        <div class="brand">
            <span class="brand-mark">
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M22 10v6M2 10l10-5 10 5-10 5z"/>
                    <path d="M6 12v5c3 3 9 3 12 0v-5"/>
                </svg>
            </span>
            <div class="brand-meta">
                <span class="brand-title">SIAKAD</span>
                <span class="brand-sub">Portal Akademik</span>
            </div>
        </div>
        <div class="topbar-actions">
            <span class="academic-badge">Praktikum PBW</span>
        </div>
    </header>

    <main>
        <section class="page-heading" aria-labelledby="page-title">
            <div class="heading-content">
                <div class="badge-tag">Database Mahasiswa</div>
                <h1 id="page-title">Data Mahasiswa</h1>
                <p class="intro">Kelola dan pantau seluruh data informasi akademik mahasiswa aktif.</p>
            </div>
            <div class="record-summary" aria-label="Jumlah mahasiswa terdaftar">
                <div class="summary-icon">
                    <svg width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                        <circle cx="9" cy="7" r="4"></circle>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                    </svg>
                </div>
                <div class="summary-info">
                    <strong><?php echo number_format($jumlahMahasiswa); ?></strong>
                    <span>Mahasiswa Terdaftar</span>
                </div>
            </div>
        </section>

        <section class="directory" aria-labelledby="directory-title">
            <div class="directory-toolbar">
                <div class="toolbar-title-group">
                    <h2 class="directory-title" id="directory-title">Daftar Mahasiswa</h2>
                    <p class="directory-caption">Menampilkan ringkasan profil akademik dan kontak mahasiswa</p>
                </div>
                <div class="search-wrapper">
                    <svg class="search-icon" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                    <input class="search" id="student-search" type="search" placeholder="Cari nama, NIM, atau prodi..." aria-label="Cari mahasiswa">
                </div>
            </div>

            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th>Email</th>
                            <th>Program Studi</th>
                            <th>Angkatan</th>
                            <th>IPK</th>
                        </tr>
                    </thead>
                    <tbody id="student-list">
                        <?php if ($jumlahMahasiswa > 0) { ?>
                            <?php while ($mhs = mysqli_fetch_assoc($dataMahasiswa)) { ?>
                                <tr>
                                    <td>
                                        <span class="student-id"><?php echo htmlspecialchars($mhs['nim'], ENT_QUOTES, 'UTF-8'); ?></span>
                                    </td>
                                    <td>
                                        <div class="student-profile">
                                            <span class="avatar-badge"><?php echo strtoupper(mb_substr($mhs['nama'], 0, 1, 'UTF-8')); ?></span>
                                            <span class="student-name"><?php echo htmlspecialchars($mhs['nama'], ENT_QUOTES, 'UTF-8'); ?></span>
                                        </div>
                                    </td>
                                    <td class="student-email"><?php echo htmlspecialchars($mhs['email'], ENT_QUOTES, 'UTF-8'); ?></td>
                                    <td><span class="program"><?php echo htmlspecialchars($mhs['prodi'], ENT_QUOTES, 'UTF-8'); ?></span></td>
                                    <td><span class="batch"><?php echo htmlspecialchars($mhs['angkatan'], ENT_QUOTES, 'UTF-8'); ?></span></td>
                                    <td><span class="gpa"><?php echo htmlspecialchars($mhs['ipk'], ENT_QUOTES, 'UTF-8'); ?></span></td>
                                </tr>
                            <?php } ?>
                            <tr id="no-results" hidden>
                                <td class="empty-state" colspan="6">
                                    <div class="empty-box">
                                        <div class="empty-icon">
                                            <svg width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg>
                                        </div>
                                        <strong>Mahasiswa Tidak Ditemukan</strong>
                                        <p>Silakan coba dengan kata kunci pencarian yang lain.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td class="empty-state" colspan="6">
                                    <div class="empty-box">
                                        <strong>Belum Ada Data Mahasiswa</strong>
                                        <p>Data mahasiswa akan ditampilkan setelah ditambahkan ke database.</p>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <script>
        const searchInput = document.getElementById('student-search');
        const studentRows = Array.from(document.querySelectorAll('#student-list tr:not(#no-results)'));
        const noResults = document.getElementById('no-results');

        searchInput.addEventListener('input', function () {
            const query = this.value.trim().toLocaleLowerCase('id');
            let visibleCount = 0;

            studentRows.forEach(function (row) {
                const matches = row.textContent.toLocaleLowerCase('id').includes(query);
                row.hidden = !matches;
                if (matches) visibleCount++;
            });

            if (noResults) noResults.hidden = visibleCount > 0;
        });
    </script>
</body>
</html>
