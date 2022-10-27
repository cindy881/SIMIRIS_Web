<?php
//tangkap request id dari klik tombol detail
$id = $_REQUEST['id'];
//ciptakan object dari class Pegawai
$model = new Peminjaman();
//panggil fungsi untuk menampilkan data pegawai
$pmj = $model->getPeminjaman($id);
// $inv = $model->getInvPeminjaman($id);

$obj_inv = new Inventaris();
$data_inv = $obj_inv->dataInv();
$obj_pda = new Pengadaan();
$data_pda = $obj_pda->dataPengadaan();
?>
<section id="detailInv" class="detailInv" style="background-color: #f8f9fa;">
    <div class="container shadow p-5" style="background-color: #fff; border-radius: 10px;">

        <a href="index.php?hal=dpeminjaman/dataPeminjaman">
            <i class="bi bi-arrow-left fs-3" style="color: #5cb874;"></i>
        </a>
        <div class="section-title">
            <h2>Detail Peminjaman</h2>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-8 pt-4">
                        <table class="table table-sm">
                            <tr>
                                <th scope="col">Kode</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $pmj['kode_peminjaman'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $pmj['tgl_peminjaman'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">NIP</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $pmj['nip_pegawai'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Nama</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $pmj['nama_pegawai'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>

    </div>
</section>