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
// $pda_id = $model->getPengadaanDetails($_REQUEST['id']);
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;

    case 'ubah':
        $data[] = $_POST['idx'];
        $model->ubah($data);
        break;

    case 'hapus':
        unset($data);
        $model->hapus($_POST['idx']);
        break;

    default:
        header('Location:index.php?hal=dpengadaan/dataPengadaan');
        break;
}
header('Location:index.php?hal=dpengadaan/dataPengadaan');
