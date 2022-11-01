<?php
class Petugas
{
    private $koneksi;

    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataPetugas()
    {
        $sql = "SELECT data_petugas.*, data_pegawai.*
                FROM data_petugas
                INNER JOIN data_pegawai ON data_pegawai.id_pegawai = data_petugas.fk_pegawai_petugas";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO data_petugas (fk_pegawai_petugas) 
        VALUES (?)";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
}
