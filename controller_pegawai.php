<?php
include_once 'koneksi.php';
include_once 'models/Pegawai.php';
//step 1 tangkap request form
$nip_pegawai = $_POST['nip_pegawai'];
$nama_pegawai = $_POST['nama_pegawai'];
$fk_departemen_pegawai = $_POST['fk_departemen_pegawai'];
//step 2 simpan ke array
$data = [
    $nip_pegawai, // ? 1
    $nama_pegawai, // ? 2
    $fk_departemen_pegawai
];
//step 3 eksekusi tombol dengan mekanisme PDO
$model = new Pegawai();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;

    default:
        header('Location:index.php?hal=datas/pegawai/dataPegawai');
        break;
}
//step 4 diarahkan ke suatu halaman, jika sudah selesai prosesnya
header('Location:index.php?hal=datas/pegawai/dataPegawai');
