<?php
include_once 'koneksi.php';
include_once 'models/Departemen.php';

$nama_departemen = $_POST['nama_departemen'];

$data = [
    $nama_departemen
];

$model = new Departemen();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;

    default:
        header('Location:index.php?hal=datas/dataDept');
        break;
}

header('Location:index.php?hal=datas/dataDept');
