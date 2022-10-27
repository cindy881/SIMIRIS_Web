<?php
class Peminjaman
{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }
    public function dataPeminjaman()
    {
        $sql = "SELECT peminjaman.*,
        data_barang.*,
        data_pegawai.*,
        data_petugas.*
        FROM peminjaman
        INNER JOIN data_barang ON data_barang.id_barang = peminjaman.fk_barang_peminjaman
        INNER JOIN data_pegawai ON data_pegawai.id_pegawai = peminjaman.fk_pegawai_peminjaman
        INNER JOIN data_petugas ON data_petugas.id_petugas = peminjaman.fk_petugas_peminjaman";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function simpan($data)
    {
        $sql = "INSERT INTO peminjaman (fk_petugas_peminjaman, kode_peminjaman, tgl_peminjaman, jumlah_peminjaman, fk_barang_peminjaman, fk_pegawai_peminjaman, fk_barang_peminjaman) 
        VALUES (?,?,?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    public function getPeminjaman($id)
    {
        $sql = "SELECT peminjaman.*, data_petugas.*, data_pegawai.*
        FROM peminjaman
        INNER JOIN data_petugas ON data_petugas.id_petugas = peminjaman.fk_petugas_peminjaman
        INNER JOIN data_pegawai ON data_pegawai.id_pegawai = data_petugas.fk_pegawai_petugas
        WHERE peminjaman.id_peminjaman = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }
}
