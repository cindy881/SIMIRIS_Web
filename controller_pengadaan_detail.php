<?php
include_once 'koneksi.php';
include_once 'models/PengadaanDetail.php';
//step 1 tangkap request form
$jumlah_masuk = $_POST['jumlah_masuk'];
$fk_barang_masuk = $_POST['fk_barang_masuk'];
$fk_pengadaan_masuk = $_POST['fk_pengadaan_masuk'];
//step 2 simpan ke array
$data = [
    $jumlah_masuk,
    $fk_barang_masuk,
    $fk_pengadaan_masuk,
];
//step 3 eksekusi tombol dengan mekanisme PDO
$model = new PengadaanDetail();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;

    default:
        header('Location:index.php?hal=datas/pengadaan/dataPengadaan');
        break;
}
//step 4 diarahkan ke suatu halaman, jika sudah selesai prosesnya
header('Location:index.php?hal=datas/pengadaan/dataPengadaan');
