<?php
class Pengadaan
{
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataPengadaan()
    {
        $sql = "SELECT pengadaan.*, 
        asal_pengadaan.nama_asal
        FROM pengadaan
        INNER JOIN asal_pengadaan ON asal_pengadaan.id_asal = pengadaan.fk_asal_pengadaan
        ORDER BY pengadaan.id_pengadaan ASC";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function dataPengadaanDetail()
    {
        $sql = "SELECT pengadaan.*, data_barang.*, detail_masuk.*,
                asal_pengadaan.nama_asal
                FROM detail_masuk
                INNER JOIN pengadaan ON pengadaan.id_pengadaan = detail_masuk.fk_pengadaan_masuk
                INNER JOIN asal_pengadaan ON asal_pengadaan.id_asal = pengadaan.fk_asal_pengadaan
                INNER JOIN data_barang ON data_barang.id_barang = detail_masuk.fk_barang_masuk";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    // ======================== BANYAK DATA ========================
    public function getPengadaans($id)
    {
        $sql = "SELECT pengadaan.*,
                asal_pengadaan.nama_asal
                FROM pengadaan
                INNER JOIN asal_pengadaan ON asal_pengadaan.id_asal = pengadaan.fk_asal_pengadaan
                WHERE pengadaan.id_pengadaan = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function getPengadaanOnInvDetails($id)
    {
        $sql = "SELECT pengadaan.*, detail_masuk.*,
                asal_pengadaan.nama_asal
                FROM detail_masuk
                INNER JOIN pengadaan ON pengadaan.id_pengadaan = detail_masuk.fk_pengadaan_masuk
                INNER JOIN asal_pengadaan ON asal_pengadaan.id_asal = pengadaan.fk_asal_pengadaan
                WHERE detail_masuk.fk_barang_masuk = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetchAll();
        return $rs;
    }

    // ======================== 1 DATA ========================
    public function getPengadaan($id)
    {
        $sql = "SELECT pengadaan.*,
                asal_pengadaan.nama_asal
                FROM pengadaan
                INNER JOIN asal_pengadaan ON asal_pengadaan.id_asal = pengadaan.fk_asal_pengadaan
                WHERE pengadaan.id_pengadaan = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function getPengadaanOnInvDetail($id)
    {
        $sql = "SELECT data_barang.*, kategori_barang.nama_kategori,
                detail_masuk.*
                FROM detail_masuk
                INNER JOIN data_barang ON data_barang.id_barang = detail_masuk.fk_barang_masuk
                INNER JOIN kategori_barang ON kategori_barang.id_kategori = data_barang.fk_kategori_barang
                WHERE detail_masuk.fk_barang_masuk = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO pengadaan (kode_pengadaan, tgl_pengadaan, fk_asal_pengadaan) 
        VALUES (?,?,?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    // ============================= UBAH =============================
    public function ubah($data)
    {
        $sql = "UPDATE pengadaan 
                SET kode_pengadaan = ?, tgl_pengadaan = ?, fk_asal_pengadaan = ?
                WHERE id_pengadaan = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    // =========================== HAPUS =========================
    public function hapus($id)
    {
        $sql = "DELETE FROM pengadaan WHERE id_pengadaan = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }
}
