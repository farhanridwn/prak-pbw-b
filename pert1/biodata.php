<?php
function statusKelulusan(float $ipk): string
{
    if ($ipk >= 3.50) return 'Sangat Memuaskan';
    if ($ipk >= 3.00) return 'Memuaskan';
    return 'Perlu Peningkatan';
}

$mahasiswa = [
    'NIM'       => '4524210037',
    'Nama'      => 'Farhan Ridwan Badhawi',
    'Prodi'     => 'Teknik Informatika',
    'Semester'  => 5,
    'IPK'       => 3.80,
    'Predikat'  => statusKelulusan(3.80)
];
?>

<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Biodata Mahasiswa</title>
    <style>
        body { font-family: sans-serif; background: #f4f4f9; padding: 40px; }
        .card { background: #fff; max-width: 400px; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h2 { margin-top: 0; color: #333; border-bottom: 2px solid #eee; padding-bottom: 10px; }
        .item { display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 1px solid #f0f0f0; }
        .label { font-weight: bold; color: #555; }
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