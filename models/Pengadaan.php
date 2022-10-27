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

    public function getInvPengadaan($id)
    {
        $sql = "SELECT data_barang.*, 
                detail_masuk.*, kategori_barang.*
                FROM detail_masuk
                INNER JOIN data_barang ON data_barang.id_barang = detail_masuk.fk_barang_masuk
                INNER JOIN kategori_barang ON kategori_barang.id_kategori = data_barang.fk_kategori_barang
                WHERE detail_masuk.fk_pengadaan_masuk = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO pengadaan (kode_pengadaan, tgl_pengadaan, fk_asal_pengadaan, fk_petugas_pengadaan) 
        VALUES (?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
}
