<?php
require_once __DIR__ . '/../models/ProdukModel.php';

class ProdukController
{
    private $model;

    public function __construct($koneksi)
    {
        $this->model = new ProdukModel($koneksi);
    }

    // Halaman daftar produk (+ pencarian, ringkasan, pesan)
    public function index()
    {
        $cari      = trim($_GET['cari'] ?? '');
        $pesan     = $_GET['pesan'] ?? '';
        $produk    = $this->model->getAll($cari);
        $ringkasan = $this->model->getRingkasan();
        require __DIR__ . '/../views/produk/index.php';
    }

    // Form tambah (GET) dan simpan data (POST)
    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->insert($_POST['nama_produk'], $_POST['harga'], $_POST['stok']);
            header("Location: index.php?aksi=index&pesan=tambah");
            exit;
        }
        require __DIR__ . '/../views/produk/create.php';
    }

    // Form edit (GET) dan simpan perubahan (POST)
    public function edit()
    {
        $id = $_GET['id'] ?? 0;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->update($id, $_POST['nama_produk'], $_POST['harga'], $_POST['stok']);
            header("Location: index.php?aksi=index&pesan=ubah");
            exit;
        }

        $produk = $this->model->getById($id);
        require __DIR__ . '/../views/produk/edit.php';
    }

    // Hapus produk (hanya lewat POST)
    public function hapus()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $this->model->delete($_POST['id'] ?? 0);
            header("Location: index.php?aksi=index&pesan=hapus");
            exit;
        }
        header("Location: index.php?aksi=index");
        exit;
    }
}