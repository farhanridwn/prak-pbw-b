<?php
// Fungsi logika penentuan status kelulusan
function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat Memuaskan (Cumlaude)';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

// Modifikasi 1: Penambahan field baru (Email & Status) pada array data mahasiswa
$mahasiswa = [
    'NIM'       => '4524210037',
    'Nama'      => 'Farhan Ridwan Badhawi',
    'Prodi'     => 'Teknik Informatika',
    'Semester'  => 5,
    'IPK'       => 3.80,
    'Email'     => 'farhan@example.com',
    'Status'    => 'Aktif'
];

// Memasukkan hasil logika fungsi ke dalam array
$mahasiswa['Predikat'] = statusKelulusan($mahasiswa['IPK']);
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Biodata Mahasiswa</title>
    <!-- Modifikasi 2: Penambahan CSS styling sederhana untuk mempercantik tampilan -->
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f9; padding: 20px; }
        .card { background: #fff; max-width: 400px; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h2 { border-bottom: 2px solid #eee; padding-bottom: 10px; margin-top: 0; }
        .item { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #eee; }
        .label { font-weight: bold; color: #333; }
    </style>
</head>
<body>

<div class="card">
    <h2>Biodata Mahasiswa</h2>
    <?php foreach ($mahasiswa as $label => $nilai): ?>
        <div class="item">
            <span class="label"><?= $label ?>:</span>
            <span><?= htmlspecialchars((string)$nilai) ?></span>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>