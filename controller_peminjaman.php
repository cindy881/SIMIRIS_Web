<?php
include_once 'koneksi.php';
include_once 'models/Peminjaman.php';
//step 1 tangkap request form
$fk_petugas_peminjaman = $_POST['fk_petugas_peminjaman'];
$kode_peminjaman = $_POST['kode_peminjaman'];
$tgl_peminjaman = $_POST['tgl_peminjaman'];
$jumlah_peminjaman = $_POST['jumlah_peminjaman'];
$fk_barang_peminjaman = $_POST['fk_barang_peminjaman'];
$fk_pegawai_peminjaman = $_POST['fk_pegawai_peminjaman'];
//step 2 simpan ke array
$data = [
    $fk_petugas_peminjaman,
    $kode_peminjaman,
    $tgl_peminjaman,
    $fk_barang_peminjaman,
    $fk_pegawai_peminjaman,
];
//step 3 eksekusi tombol dengan mekanisme PDO
$model = new Peminjaman();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;

    default:
        header('Location:index.php?hal=datas/peminjaman/dataPeminjaman');
        break;
}
//step 4 diarahkan ke suatu halaman, jika sudah selesai prosesnya
header('Location:index.php?hal=datas/peminjaman/dataPeminjaman');
