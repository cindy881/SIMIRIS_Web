<?php
include_once 'koneksi.php';
include_once 'models/Kategori.php';

$nama_kategori = $_POST['nama_kategori'];

$data = [
    $nama_kategori
];

$model = new Kategori();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;

    default:
        header('Location:index.php?hal=datas/dataKat');
        break;
}

header('Location:index.php?hal=datas/dataKat');
