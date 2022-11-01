<?php
include_once 'koneksi.php';
include_once 'models/PeminjamanDetail.php';

$jumlah_pinjam = $_POST['jumlah_pinjam'];
$fk_barang_pinjam = $_POST['fk_barang_pinjam'];
$fk_peminjaman_pinjam = $_POST['fk_peminjaman_pinjam'];
$data = [
    $jumlah_pinjam,
    $fk_barang_pinjam,
    $fk_peminjaman_pinjam,
];
$model = new PeminjamanDetail();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;

    default:
        header('Location:index.php?hal=dinv/dataInv_invdetail&id=' . $fk_barang_pinjam);
        break;
}
header('Location:index.php?hal=dinv/dataInv_invdetail&id=' . $fk_barang_pinjam);
