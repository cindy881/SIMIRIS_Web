<?php
class Kategori
{
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataKategori()
    {
        $sql = "SELECT * FROM kategori_barang";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO kategori_barang (nama_kategori) 
                VALUES (?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
}
