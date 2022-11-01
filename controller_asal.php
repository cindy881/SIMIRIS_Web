<?php
include_once 'koneksi.php';
include_once 'models/Asal.php';

$nama_asal = $_POST['nama_asal'];

$data = [
    $nama_asal
];

$model = new Asal();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;

    default:
        header('Location:index.php?hal=datas/dataAsal');
        break;
}

header('Location:index.php?hal=datas/dataAsal');
