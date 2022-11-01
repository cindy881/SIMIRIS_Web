<?php
include_once 'koneksi.php';
include_once 'models/PengadaanDetail.php';

$jumlah_masuk = $_POST['jumlah_masuk'];
$fk_barang_masuk = $_POST['fk_barang_masuk'];
$fk_pengadaan_masuk = $_POST['fk_pengadaan_masuk'];
$data = [
    $jumlah_masuk,
    $fk_barang_masuk,
    $fk_pengadaan_masuk,
];
$model = new PengadaanDetail();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;

    default:
        header('Location:index.php?hal=dinv/dataInv_invdetail&id=' . $fk_barang_masuk);
        break;
}
header('Location:index.php?hal=dinv/dataInv_invdetail&id=' . $fk_barang_masuk);
