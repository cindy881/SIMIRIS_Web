<?php
include_once 'koneksi.php';
include_once 'models/Pengadaan.php';
//step 1 tangkap request form
$kode_pengadaan = $_POST['kode_pengadaan'];
$tgl_pengadaan = $_POST['tgl_pengadaan'];
$fk_petugas_pengadaan = $_POST['fk_petugas_pengadaan'];
$fk_asal_pengadaan = $_POST['fk_asal_pengadaan'];
//step 2 simpan ke array
$data = [
    $kode_pengadaan,
    $tgl_pengadaan,
    $fk_petugas_pengadaan,
    $fk_asal_pengadaan,
];
//step 3 eksekusi tombol dengan mekanisme PDO
$model = new Pengadaan();
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
