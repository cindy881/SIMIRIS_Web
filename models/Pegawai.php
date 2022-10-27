<?php
class Pegawai
{
    //member1 variabel
    private $koneksi;
    //member2 konstruktor untuk koneksi database
    public function __construct()
    {
        global $dbh; //panggil instance object di koneksi.php 
        $this->koneksi = $dbh;
    }

    //======================= JUST DATA ====================
    public function dataPegawai()
    {
        $sql = "SELECT p.*, d.nama_departemen 
                FROM data_pegawai p
                INNER JOIN departemen d ON d.id_departemen = p.fk_departemen_pegawai";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function dataPegawaiPeminjaman()
    {
        $sql = "SELECT p.*, d.nama_departemen, pm.* 
                FROM data_pegawai p
                INNER JOIN departemen d ON d.id_departemen = p.fk_departemen_pegawai
                INNER JOIN peminjaman pm ON pm.fk_pegawai_peminjaman = p.id_pegawai";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function dataPetugas()
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

    // ============================== DETAIL 1 DATA BY ============================
    public function getPegawai($id)
    {
        $sql = "SELECT p.*, d.nama_departemen 
                FROM data_pegawai p
                INNER JOIN departemen d ON d.id_departemen = p.fk_departemen_pegawai
                WHERE p.id_pegawai = ?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    // ===========================DETAIL BANYAK DATA BY ================================
    public function getPeminjamanPegawai($id)
    {
        $sql = "SELECT data_pegawai.*,
                peminjaman.kode_peminjaman, peminjaman.tgl_peminjaman, peminjaman.jumlah_peminjaman,
                data_barang.kode_barang, data_barang.nama_barang
                FROM data_pegawai
                INNER JOIN peminjaman ON peminjaman.fk_pegawai_peminjaman = data_pegawai.id_pegawai
                INNER JOIN data_barang ON data_barang.id_barang = peminjaman.fk_barang_peminjaman
                WHERE data_pegawai.id_pegawai = ?";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetchAll();
        return $rs;
    }


    // =============================== SIMPAN =====================================
    public function simpan($data)
    {
        $sql = "INSERT INTO data_pegawai (nip_pegawai, nama_pegawai,fk_departemen_pegawai) 
                VALUES (?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
}
