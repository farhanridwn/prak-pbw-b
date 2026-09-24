<?php
interface Identitas
{
    public function ringkasan(): string;
}

class Mahasiswa implements Identitas
{
    private string $nim;
    private string $nama;
    protected float $ipk;
    private string $prodi;

    public function __construct(string $nim, string $nama, float $ipk, string $prodi = 'Teknik Informatika')
    {
        $this->nim = $nim;
        $this->nama = $nama;
        $this->setIpk($ipk);
        $this->prodi = $prodi;
    }

    public function setIpk(float $ipk): void
    {
        if ($ipk < 0 || $ipk > 4) {
            throw new InvalidArgumentException('IPK harus 0 sampai 4.');
        }
        $this->ipk = $ipk;
    }

    public function getIpk(): float
    {
        return $this->ipk;
    }

    public function getPredikat(): string
    {
        if ($this->ipk >= 3.50) return 'Cumlaude';
        if ($this->ipk >= 3.00) return 'Memuaskan';
        return 'Sangat Cukup';
    }

    public function ringkasan(): string
    {
        return $this->nim . ' - ' . $this->nama . ' (' . $this->prodi . ') - IPK: ' . $this->ipk . ' [' . $this->getPredikat() . ']';
    }
}

$mhs = new Mahasiswa('4524210037', 'Farhan Ridwan', 3.75, 'Teknik Informatika');
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Identitas Mahasiswa</title>
    <style>
        body { 
            font-family: sans-serif; 
            padding: 20px; 
            color: #333;
        }
        .card {
            display: flex;
            flex-direction: column;
            gap: 8px;
            max-width: 500px;
            padding: 16px 20px;
            border-left: 4px solid #007bff;
            background-color: #f8f9fa;
            border-radius: 0 6px 6px 0;
        }
        .title {
            color: #007bff;
            font-weight: bold;
            font-size: 1.1em;
        }
        .content {
            margin: 0;
            font-size: 0.95em;
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="title">Ringkasan Identitas</div>
        <p class="content"><?= htmlspecialchars($mhs->ringkasan()) ?></p>
    </div>

</body>
</html>