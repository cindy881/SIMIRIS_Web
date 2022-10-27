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

    public function simpan($data)
    {
        $sql = "INSERT INTO detail_masuk (jumlah_masuk, fk_barang_masuk, fk_pengadaan_masuk) 
        VALUES (?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
}
