<?php
class Inventaris
{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    public function dataInv()
    {
        $sql = "SELECT data_barang.*,
                kategori_barang.nama_kategori
                FROM data_barang
                INNER JOIN kategori_barang ON kategori_barang.id_kategori = data_barang.fk_kategori_barang
                GROUP BY data_barang.kode_barang";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    // ============================= INFO DETAIL BANYAK DATA BY ===========================

    public function getInvs($id)
    {
        $sql = "SELECT data_barang.*,
                kategori_barang.nama_kategori
                FROM data_barang
                INNER JOIN kategori_barang ON kategori_barang.id_kategori = data_barang.fk_kategori_barang
                WHERE data_barang.id_barang = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetchAll();
        return $rs;
    }

    // ============ INV ON PROSES =============
    public function getInvOnPengadaan($id)
    {
        $sql = "SELECT data_barang.*, kategori_barang.nama_kategori,
                detail_masuk.*
                FROM detail_masuk
                INNER JOIN data_barang ON data_barang.id_barang = detail_masuk.fk_barang_masuk
                INNER JOIN kategori_barang ON kategori_barang.id_kategori = data_barang.fk_kategori_barang
                WHERE detail_masuk.fk_pengadaan_masuk = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function getInvOnPeminjaman($id)
    {
        $sql = "SELECT data_barang.*, kategori_barang.nama_kategori, 
                detail_pinjam.*
                FROM detail_pinjam
                INNER JOIN data_barang ON data_barang.id_barang = detail_pinjam.fk_barang_pinjam
                INNER JOIN kategori_barang ON kategori_barang.id_kategori = data_barang.fk_kategori_barang
                WHERE detail_pinjam.fk_peminjaman_pinjam = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetchAll();
        return $rs;
    }

    // ========================== INFO DETAIL 1 DATA BY ============================
    public function getInv($id)
    {
        $sql = "SELECT data_barang.*, 
                kategori_barang.nama_kategori
                FROM data_barang
                INNER JOIN kategori_barang ON kategori_barang.id_kategori = data_barang.fk_kategori_barang
                WHERE data_barang.id_barang = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    // ==================================== SIMPAN ================================
    public function simpan($data)
    {
        $sql = "INSERT INTO data_barang (kode_barang, nama_barang, fk_kategori_barang, stok_barang) 
        VALUES (?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    // ============================= UBAH =============================
    public function ubah($data)
    {
        $sql = "UPDATE data_barang 
                SET kode_barang = ?, nama_barang = ?, fk_kategori_barang = ?, stok_barang = ?
                WHERE id_barang = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }

    // =========================== HAPUS =========================
    public function hapus($id)
    {
        $sql = "DELETE FROM data_barang WHERE id_barang = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
    }
}
