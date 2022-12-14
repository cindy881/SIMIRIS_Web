<?php
include_once 'koneksi.php';
include_once 'models/Inventaris.php';
//step 1 tangkap request form
$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$stok_barang = $_POST['stok_barang'];
$fk_kategori_barang = $_POST['fk_kategori_barang'];
//step 2 simpan ke array
$data = [
    $kode_barang,
    $nama_barang,
    $fk_kategori_barang,
    $stok_barang
];
//step 3 eksekusi tombol dengan mekanisme PDO
$model = new Inventaris();
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
        header('Location:index.php?hal=dinv/dataInv');
        break;
}
//step 4 diarahkan ke suatu halaman, jika sudah selesai prosesnya
header('Location:index.php?hal=dinv/dataInv');
