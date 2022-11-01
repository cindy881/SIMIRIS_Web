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
        $sql = "SELECT peminjaman.*, data_pegawai.*
                FROM peminjaman
                INNER JOIN data_pegawai ON data_pegawai.id_pegawai = peminjaman.fk_pegawai_peminjaman";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function dataPeminjamanDetail()
    {
        $sql = "SELECT peminjaman.*, data_barang.*, detail_pinjam.*
                FROM detail_pinjam
                INNER JOIN peminjaman ON peminjaman.id_peminjaman = detail_pinjam.fk_peminjaman_pinjam
                INNER JOIN data_barang ON data_barang.id_barang = detail_pinjam.fk_barang_pinjam";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    // ======================== BANYAK DATA ========================
    public function getPeminjamans($id)
    {
        $sql = "SELECT peminjaman.*, data_pegawai.*, 
                departemen.nama_departemen
                FROM peminjaman
                INNER JOIN data_pegawai ON data_pegawai.id_pegawai = peminjaman.fk_pegawai_peminjaman
                INNER JOIN departemen ON departemen.id_departemen = data_pegawai.fk_departemen_pegawai
                WHERE peminjaman.id_peminjaman = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function getPeminjamanOnInvDetails($id)
    {
        $sql = "SELECT peminjaman.*, detail_pinjam.*, data_pegawai.*, 
                departemen.nama_departemen
                FROM detail_pinjam
                INNER JOIN peminjaman ON peminjaman.id_peminjaman = detail_pinjam.fk_peminjaman_pinjam
                INNER JOIN data_pegawai ON data_pegawai.id_pegawai = peminjaman.fk_pegawai_peminjaman
                INNER JOIN departemen ON departemen.id_departemen = data_pegawai.fk_departemen_pegawai
                WHERE detail_pinjam.fk_barang_pinjam = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function getPeminjamanOnPegawaiDetails($id)
    {
        $sql = "SELECT peminjaman.*, data_pegawai.*, 
                departemen.nama_departemen
                FROM peminjaman
                INNER JOIN data_pegawai ON data_pegawai.id_pegawai = peminjaman.fk_pegawai_peminjaman
                INNER JOIN departemen ON departemen.id_departemen = data_pegawai.fk_departemen_pegawai
                WHERE peminjaman.fk_pegawai_peminjaman = ?
                GROUP BY peminjaman.kode_peminjaman";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetchAll();
        return $rs;
    }
    // ========================== 1 DATA ==========================
    public function getPeminjaman($id)
    {
        $sql = "SELECT peminjaman.*,
                data_pegawai.*, departemen.nama_departemen
                FROM peminjaman
                INNER JOIN data_pegawai ON data_pegawai.id_pegawai = peminjaman.fk_pegawai_peminjaman
                INNER JOIN departemen ON departemen.id_departemen = data_pegawai.fk_departemen_pegawai
                WHERE peminjaman.id_peminjaman = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function getPeminjamanOnInvDetail($id)
    {
        $sql = "SELECT data_barang.*, kategori_barang.nama_kategori, 
                detail_pinjam.*
                FROM detail_pinjam
                INNER JOIN data_barang ON data_barang.id_barang = detail_pinjam.fk_barang_pinjam
                INNER JOIN kategori_barang ON kategori_barang.id_kategori = data_barang.fk_kategori_barang
                WHERE detail_pinjam.fk_barang_pinjam = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    // ======================= SIMPAN =============================
    public function simpan($data)
    {
        $sql = "INSERT INTO peminjaman (kode_peminjaman, tgl_peminjaman, fk_pegawai_peminjaman) 
        VALUES (?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    // ============================= UBAH =============================
    public function ubah($data)
    {
        $sql = "UPDATE peminjaman 
                SET kode_peminjaman = ?, tgl_peminjaman = ?, fk_pegawai_peminjaman = ? 
                WHERE id_peminjaman = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    // =========================== HAPUS =========================
    public function hapus($id)
    {
        $sql = "DELETE FROM peminjaman WHERE id_peminjaman = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }
}
