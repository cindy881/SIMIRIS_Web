-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Nov 2022 pada 16.38
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbinv_kantor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `asal_pengadaan`
--

CREATE TABLE `asal_pengadaan` (
  `id_asal` int(11) NOT NULL,
  `nama_asal` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `asal_pengadaan`
--

INSERT INTO `asal_pengadaan` (`id_asal`, `nama_asal`) VALUES
(1, 'Anggaran'),
(2, 'Bantuan'),
(3, 'Hibah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` char(8) NOT NULL,
  `nama_barang` varchar(45) NOT NULL,
  `stok_barang` int(11) DEFAULT NULL,
  `fk_kategori_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id_barang`, `kode_barang`, `nama_barang`, `stok_barang`, `fk_kategori_barang`) VALUES
(1, 'INV-001', 'LENOVO-L01', 2, 1),
(2, 'INV-002', 'IKEA-K01', 0, 2),
(3, 'INV-003', 'EPSON-P01', 0, 3),
(4, 'INV-004', 'LENOVO-L02', 2, 1),
(5, 'INV-005', 'HP-L01', 3, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_pegawai`
--

CREATE TABLE `data_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(45) NOT NULL,
  `nip_pegawai` int(11) NOT NULL,
  `fk_departemen_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_pegawai`
--

INSERT INTO `data_pegawai` (`id_pegawai`, `nama_pegawai`, `nip_pegawai`, `fk_departemen_pegawai`) VALUES
(1, 'Arafah Rianti', 19001, 1),
(4, 'Rigen Rakelna', 19002, 3),
(5, 'Indra Frimawan', 19003, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` int(11) NOT NULL,
  `nama_departemen` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `nama_departemen`) VALUES
(1, 'Administrasi'),
(2, 'HRD'),
(3, 'Keuangan'),
(4, 'Marketing');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_masuk`
--

CREATE TABLE `detail_masuk` (
  `id_detail_masuk` int(11) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `fk_barang_masuk` int(11) NOT NULL,
  `fk_pengadaan_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_masuk`
--

INSERT INTO `detail_masuk` (`id_detail_masuk`, `jumlah_masuk`, `fk_barang_masuk`, `fk_pengadaan_masuk`) VALUES
(4, 2, 1, 1),
(5, 3, 5, 1),
(6, 5, 4, 1);

--
-- Trigger `detail_masuk`
--
DELIMITER $$
CREATE TRIGGER `pengadaanDeleteStok` AFTER DELETE ON `detail_masuk` FOR EACH ROW BEGIN
UPDATE data_barang SET stok_barang = stok_barang - OLD.jumlah_masuk
WHERE id_barang = OLD.fk_barang_masuk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pengadaanStok` AFTER INSERT ON `detail_masuk` FOR EACH ROW BEGIN
UPDATE data_barang SET stok_barang = stok_barang + NEW.jumlah_masuk
WHERE id_barang = NEW.fk_barang_masuk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pengadaanUpdateStok` AFTER UPDATE ON `detail_masuk` FOR EACH ROW BEGIN
UPDATE data_barang SET stok_barang = (stok_barang - OLD.jumlah_masuk) + NEW.jumlah_masuk
WHERE id_barang = NEW.fk_barang_masuk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pinjam`
--

CREATE TABLE `detail_pinjam` (
  `id_detail_pinjam` int(11) NOT NULL,
  `jumlah_pinjam` int(11) NOT NULL,
  `fk_peminjaman_pinjam` int(11) NOT NULL,
  `fk_barang_pinjam` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_pinjam`
--

INSERT INTO `detail_pinjam` (`id_detail_pinjam`, `jumlah_pinjam`, `fk_peminjaman_pinjam`, `fk_barang_pinjam`) VALUES
(1, 1, 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_barang`
--

CREATE TABLE `kategori_barang` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori_barang`
--

INSERT INTO `kategori_barang` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Kursi'),
(1, 'Laptop'),
(5, 'Lemari'),
(4, 'Meja'),
(3, 'Printer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `kode_peminjaman` char(8) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `fk_pegawai_peminjaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `kode_peminjaman`, `tgl_peminjaman`, `fk_pegawai_peminjaman`) VALUES
(1, 'PM-001', '2022-10-13', 4),
(2, 'PM-002', '2022-10-21', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengadaan`
--

CREATE TABLE `pengadaan` (
  `id_pengadaan` int(11) NOT NULL,
  `kode_pengadaan` char(8) NOT NULL,
  `tgl_pengadaan` date NOT NULL,
  `fk_asal_pengadaan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengadaan`
--

INSERT INTO `pengadaan` (`id_pengadaan`, `kode_pengadaan`, `tgl_pengadaan`, `fk_asal_pengadaan`) VALUES
(1, 'PD-001', '2022-10-04', 1),
(2, 'PD-002', '2022-10-12', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` enum('Admin','User') NOT NULL,
  `foto` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`, `foto`) VALUES
(1, 'Admin', 'admin@yahoo.id', '0eb4e14e3a0af58fa4769fdad43ec79f52abfcdb', 'Admin', 'assets\\img\\team\\team-1.jpg'),
(2, 'User', 'user@yahoo.id', '0eb4e14e3a0af58fa4769fdad43ec79f52abfcdb', 'User', 'assets\\img\\team\\team-2.jpg'),
(3, 'Cindy', 'cindy@yahoo.id', '0eb4e14e3a0af58fa4769fdad43ec79f52abfcdb', 'User', 'assets\\img\\team\\team-3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `asal_pengadaan`
--
ALTER TABLE `asal_pengadaan`
  ADD PRIMARY KEY (`id_asal`),
  ADD UNIQUE KEY `nama_jenis_UNIQUE` (`nama_asal`);

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `kode_barang_UNIQUE` (`kode_barang`),
  ADD KEY `fk_data_barang_kategori_barang_idx` (`fk_kategori_barang`);

--
-- Indeks untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD UNIQUE KEY `username_UNIQUE` (`nip_pegawai`),
  ADD KEY `fk_user_departemen1_idx` (`fk_departemen_pegawai`);

--
-- Indeks untuk tabel `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`),
  ADD UNIQUE KEY `nama_departemen_UNIQUE` (`nama_departemen`);

--
-- Indeks untuk tabel `detail_masuk`
--
ALTER TABLE `detail_masuk`
  ADD PRIMARY KEY (`id_detail_masuk`),
  ADD KEY `fk_data_barang_has_pengadaan_pengadaan1_idx` (`fk_pengadaan_masuk`),
  ADD KEY `fk_data_barang_has_pengadaan_data_barang1_idx` (`fk_barang_masuk`);

--
-- Indeks untuk tabel `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD PRIMARY KEY (`id_detail_pinjam`),
  ADD KEY `fk_peminjaman_has_data_barang_data_barang1_idx` (`fk_barang_pinjam`),
  ADD KEY `fk_peminjaman_has_data_barang_peminjaman1_idx` (`fk_peminjaman_pinjam`);

--
-- Indeks untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  ADD PRIMARY KEY (`id_kategori`),
  ADD UNIQUE KEY `nama_kategori_UNIQUE` (`nama_kategori`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD UNIQUE KEY `kode_penempatan_UNIQUE` (`kode_peminjaman`),
  ADD KEY `fk_peminjaman_pegawai1_idx` (`fk_pegawai_peminjaman`);

--
-- Indeks untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD PRIMARY KEY (`id_pengadaan`),
  ADD UNIQUE KEY `kode_pengadaan_UNIQUE` (`kode_pengadaan`),
  ADD KEY `fk_pengadaan_asal_pengadaan1_idx` (`fk_asal_pengadaan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `asal_pengadaan`
--
ALTER TABLE `asal_pengadaan`
  MODIFY `id_asal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_masuk`
--
ALTER TABLE `detail_masuk`
  MODIFY `id_detail_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  MODIFY `id_detail_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `kategori_barang`
--
ALTER TABLE `kategori_barang`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  MODIFY `id_pengadaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD CONSTRAINT `fk_data_barang_kategori_barang` FOREIGN KEY (`fk_kategori_barang`) REFERENCES `kategori_barang` (`id_kategori`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `data_pegawai`
--
ALTER TABLE `data_pegawai`
  ADD CONSTRAINT `fk_user_departemen1` FOREIGN KEY (`fk_departemen_pegawai`) REFERENCES `departemen` (`id_departemen`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detail_masuk`
--
ALTER TABLE `detail_masuk`
  ADD CONSTRAINT `fk_data_barang_has_pengadaan_data_barang1` FOREIGN KEY (`fk_barang_masuk`) REFERENCES `data_barang` (`id_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_data_barang_has_pengadaan_pengadaan1` FOREIGN KEY (`fk_pengadaan_masuk`) REFERENCES `pengadaan` (`id_pengadaan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `detail_pinjam`
--
ALTER TABLE `detail_pinjam`
  ADD CONSTRAINT `fk_peminjaman_has_data_barang_data_barang1` FOREIGN KEY (`fk_barang_pinjam`) REFERENCES `data_barang` (`id_barang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_peminjaman_has_data_barang_peminjaman1` FOREIGN KEY (`fk_peminjaman_pinjam`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `fk_peminjaman_pegawai1` FOREIGN KEY (`fk_pegawai_peminjaman`) REFERENCES `data_pegawai` (`id_pegawai`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pengadaan`
--
ALTER TABLE `pengadaan`
  ADD CONSTRAINT `fk_pengadaan_asal_pengadaan1` FOREIGN KEY (`fk_asal_pengadaan`) REFERENCES `asal_pengadaan` (`id_asal`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
