<?php
class Asal
{
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataAsal()
    {
        $sql = "SELECT * FROM asal_pengadaan";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO asal_pengadaan (nama_asal) 
                VALUES (?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
}
