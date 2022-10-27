<?php
class Petugas
{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor untuk koneksi database
    public function __construct()
    {
        global $dbh; //panggil instance object di koneksi.php 
        $this->koneksi = $dbh;
    }
    //member3 method2 CRUD
    public function dataPet()
    {
        $sql = "SELECT data_petugas.*, data_pegawai.*
                FROM data_pegawai
                INNER JOIN data_petugas ON data_petugas.fk_pegawai_petugas = data_pegawai.id_pegawai";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function dataPetPeminjaman()
    {
        $sql = "SELECT data_petugas.*, data_pegawai.*, peminjaman.*
                FROM data_pegawai
                INNER JOIN data_petugas ON data_petugas.fk_pegawai_petugas = data_pegawai.id_pegawai
                INNER JOIN peminjaman ON peminjaman.fk_petugas_peminjaman = data_petugas.id_petugas";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }
}
