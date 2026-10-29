<?php
class ProdukModel
{
    private $koneksi;

    public function __construct($koneksi)
    {
        $this->koneksi = $koneksi;
    }

    // Ambil semua produk (bisa difilter dengan kata kunci)
    public function getAll($cari = '')
    {
        $sql = "SELECT * FROM produk";
        if ($cari !== '') {
            $cari = mysqli_real_escape_string($this->koneksi, $cari);
            $sql .= " WHERE nama_produk LIKE '%$cari%'";
        }
        $sql .= " ORDER BY id DESC";

        $result = mysqli_query($this->koneksi, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
        return $data;
    }

    // Ambil satu produk berdasarkan id
    public function getById($id)
    {
        $id = (int) $id;
        $result = mysqli_query($this->koneksi, "SELECT * FROM produk WHERE id = $id");
        return mysqli_fetch_assoc($result);
    }

    // Tambah produk
    public function insert($nama, $harga, $stok)
    {
        $nama  = mysqli_real_escape_string($this->koneksi, $nama);
        $harga = (int) $harga;
        $stok  = (int) $stok;

        return mysqli_query(
            $this->koneksi,
            "INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', $harga, $stok)"
        );
    }

    // Update produk
    public function update($id, $nama, $harga, $stok)
    {
        $id    = (int) $id;
        $nama  = mysqli_real_escape_string($this->koneksi, $nama);
        $harga = (int) $harga;
        $stok  = (int) $stok;

        return mysqli_query(
            $this->koneksi,
            "UPDATE produk SET nama_produk='$nama', harga=$harga, stok=$stok WHERE id=$id"
        );
    }

    // Hapus produk
    public function delete($id)
    {
        $id = (int) $id;
        return mysqli_query($this->koneksi, "DELETE FROM produk WHERE id = $id");
    }

    // Ringkasan: total jenis produk dan total stok
    public function getRingkasan()
    {
        $result = mysqli_query(
            $this->koneksi,
            "SELECT COUNT(*) AS total_produk, COALESCE(SUM(stok), 0) AS total_stok FROM produk"
        );
        return mysqli_fetch_assoc($result);
    }
}