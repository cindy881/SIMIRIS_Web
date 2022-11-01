<?php
include_once 'koneksi.php';
include_once 'models/Pegawai.php';

$nip_pegawai = $_POST['nip_pegawai'];
$nama_pegawai = $_POST['nama_pegawai'];
$fk_departemen_pegawai = $_POST['fk_departemen_pegawai'];

$data = [
    $nip_pegawai,
    $nama_pegawai,
    $fk_departemen_pegawai
];

$model = new Pegawai();
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
        header('Location:index.php?hal=dpegawai/dataPegawai');
        break;
}

header('Location:index.php?hal=dpegawai/dataPegawai');
