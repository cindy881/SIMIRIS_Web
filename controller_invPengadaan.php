<?php
// $id = $_REQUEST['id'];

include_once 'koneksi.php';
include_once 'models/Pengadaan.php';
include_once 'models/Inventaris.php';

$obj_inv = new Inventaris();
$pda_id = $obj_inv->getPengadaanInvDetail($_REQUEST['id']);

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
$model = new Pengadaan();
$tombol = $_REQUEST['proses'];
switch ($tombol) {
    case 'simpan':
        $model->simpan($data);
        break;

    default:
        header('Location:index.php?hal=dinv/dataInv_detail&id=' . $pda_id);
        break;
}
//step 4 diarahkan ke suatu halaman, jika sudah selesai prosesnya
header('Location:index.php?hal=dinv/dataInv_detail&id=' . $pda_id);
