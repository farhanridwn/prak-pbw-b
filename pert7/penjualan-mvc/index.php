<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'koneksi.php';
require_once 'controllers/ProdukController.php';

$controller = new ProdukController($koneksi);

$aksi = $_GET['aksi'] ?? 'index';

switch ($aksi) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $controller->edit();
        break;
    case 'hapus':
        $controller->hapus();
        break;
    default:
        echo "Halaman tidak ditemukan.";
        break;
}