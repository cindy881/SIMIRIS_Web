<?php
class PengadaanDetail
{
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataPengadaanDetail()
    {
        $sql = "SELECT detail_masuk.*, pengadaan.*, data_barang.*
        FROM detail_masuk
        INNER JOIN pengadaan ON pengadaan.id_pengadaan = detail_masuk.fk_pengadaan_masuk
        INNER JOIN data_barang ON data_barang.id_barang = detail_masuk.fk_barang_masuk";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    // ====================== BANYAK DATA BY ==========================
    public function getPengadaanDetails($id)
    {
        $sql = "SELECT detail_masuk.*, pengadaan.*, data_barang.*
        FROM detail_masuk
        INNER JOIN pengadaan ON pengadaan.id_pengadaan = detail_masuk.fk_pengadaan_masuk
        INNER JOIN data_barang ON data_barang.id_barang = detail_masuk.fk_barang_masuk";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetchAll();
        return $rs;
    }

    // ======================== SIMPAN ==============================
    public function simpan($data)
    {
        $sql = "INSERT INTO detail_masuk (jumlah_masuk, fk_barang_masuk, fk_pengadaan_masuk) 
        VALUES (?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    // ============================= UBAH =============================
    public function ubah($data)
    {
        $sql = "UPDATE detail_masuk 
                SET jumlah_masuk = ?, fk_barang_masuk = ?, fk_pengadaan_masuk = ? 
                WHERE fk_pengadaan_masuk = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    // =========================== HAPUS =========================
    public function hapus($id)
    {
        $sql = "DELETE FROM detail_masuk WHERE id_detail_masuk = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }
}
