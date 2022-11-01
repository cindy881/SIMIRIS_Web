<?php
include_once 'koneksi.php';
include_once 'models/Peminjaman.php';

$kode_peminjaman = $_POST['kode_peminjaman'];
$tgl_peminjaman = $_POST['tgl_peminjaman'];
$fk_pegawai_peminjaman = $_POST['fk_pegawai_peminjaman'];

$data = [
    $kode_peminjaman,
    $tgl_peminjaman,
    $fk_pegawai_peminjaman,
];

$model = new Peminjaman();
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
        header('Location:index.php?hal=dpeminjaman/dataPeminjaman');
        break;
}
//step 4 diarahkan ke suatu halaman, jika sudah selesai prosesnya
header('Location:index.php?hal=dpeminjaman/dataPeminjaman');
