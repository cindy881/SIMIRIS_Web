<?php
class Inventaris
{
    private $koneksi;
    public function __construct()
    {
        global $dbh;
        $this->koneksi = $dbh;
    }

    // =============================== JUST DATA ====================================
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

    public function dataPeminjaman()
    {
        $sql = "SELECT peminjaman.*, data_barang.*
                FROM peminjaman
                INNER JOIN data_barang ON data_barang.id_barang = peminjaman.fk_barang_peminjaman";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
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

    public function dataPengadaanDetail()
    {
        $sql = "SELECT pengadaan.*, data_barang.*, detail_masuk.*
        FROM detail_masuk
        INNER JOIN pengadaan ON pengadaan.id_pengadaan = detail_masuk.fk_pengadaan_masuk
        INNER JOIN data_barang ON data_barang.id_barang = detail_masuk.fk_barang_masuk";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    public function dataAsal()
    {
        $sql = "SELECT * FROM asal_pengadaan";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute();
        $rs = $ps->fetchAll();
        return $rs;
    }

    // ============================= INFO DETAIL BANYAK DATA BY ===========================

    public function getPengadaan($id)
    {
        $sql = "SELECT pengadaan.*, 
                detail_masuk.*,
                asal_pengadaan.nama_asal
                FROM detail_masuk
                INNER JOIN data_barang ON data_barang.id_barang = detail_masuk.fk_barang_masuk
                INNER JOIN pengadaan ON pengadaan.id_pengadaan = detail_masuk.fk_pengadaan_masuk
                INNER JOIN asal_pengadaan ON asal_pengadaan.id_asal = pengadaan.fk_asal_pengadaan
                WHERE detail_masuk.fk_pengadaan_masuk = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetchAll();
        return $rs;
    }

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

    public function getPeminjaman($id)
    {
        $sql = "SELECT peminjaman.*,
                data_pegawai.*, departemen.nama_departemen,
                data_barang.*
                FROM peminjaman
                INNER JOIN data_barang ON data_barang.id_barang = peminjaman.fk_barang_peminjaman
                INNER JOIN data_pegawai ON data_pegawai.id_pegawai = peminjaman.fk_pegawai_peminjaman
                INNER JOIN departemen ON departemen.id_departemen = data_pegawai.fk_departemen_pegawai
                WHERE peminjaman.fk_barang_peminjaman = ?";
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
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function getPeminjamanInvDetail($id)
    {
        $sql = "SELECT peminjaman.*,
                data_pegawai.*, departemen.nama_departemen,
                data_barang.*
                FROM peminjaman
                INNER JOIN data_barang ON data_barang.id_barang = peminjaman.fk_barang_peminjaman
                INNER JOIN data_pegawai ON data_pegawai.id_pegawai = peminjaman.fk_pegawai_peminjaman
                INNER JOIN departemen ON departemen.id_departemen = data_pegawai.fk_departemen_pegawai
                WHERE peminjaman.fk_barang_peminjaman = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function getPeminjamanDetail($id)
    {
        $sql = "SELECT peminjaman.*,
                data_pegawai.*, departemen.nama_departemen,
                data_barang.*
                FROM peminjaman
                INNER JOIN data_barang ON data_barang.id_barang = peminjaman.fk_barang_peminjaman
                INNER JOIN data_pegawai ON data_pegawai.id_pegawai = peminjaman.fk_pegawai_peminjaman
                INNER JOIN departemen ON departemen.id_departemen = data_pegawai.fk_departemen_pegawai
                WHERE peminjaman.id_peminjaman = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function getPengadaanInvDetail($id)
    {
        $sql = "SELECT pengadaan.*, 
                detail_masuk.*,
                asal_pengadaan.nama_asal
                FROM detail_masuk
                INNER JOIN data_barang ON data_barang.id_barang = detail_masuk.fk_barang_masuk
                INNER JOIN pengadaan ON pengadaan.id_pengadaan = detail_masuk.fk_pengadaan_masuk
                INNER JOIN asal_pengadaan ON asal_pengadaan.id_asal = pengadaan.fk_asal_pengadaan
                WHERE detail_masuk.fk_barang_masuk = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    public function getPengadaanDetail($id)
    {
        $sql = "SELECT pengadaan.*,
                asal_pengadaan.nama_asal
                FROM detail_masuk
                INNER JOIN pengadaan ON pengadaan.id_pengadaan = detail_masuk.fk_pengadaan_masuk
                INNER JOIN asal_pengadaan ON asal_pengadaan.id_asal = pengadaan.fk_asal_pengadaan
                WHERE detail_masuk.fk_pengadaan_masuk = ?";
        $ps = $this->koneksi->prepare($sql);
        $ps->execute([$id]);
        $rs = $ps->fetch();
        return $rs;
    }

    // ====================== SIMPAN =======================
    public function simpan($data)
    {
        $sql = "INSERT INTO data_barang (kode_barang, nama_barang, stok_barang, fk_kategori_barang) 
        VALUES (?,?,?,?)";
        //menggunakan mekanisme prepare statement PDO
        $ps = $this->koneksi->prepare($sql);
        $ps->execute($data);
    }
}
