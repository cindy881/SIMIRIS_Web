<?php
$id = $_REQUEST['id'];

$obj_inv = new Inventaris();
$data_inv = $obj_inv->getInvOnPengadaan($id);
$pda_id = $obj_inv->getPengadaanDetail($id);
?>
<section id="detailInv" class="detailInv" style="background-color: #f8f9fa;">
    <div class="container shadow p-5" style="background-color: #fff; border-radius: 10px;">

        <a href="index.php?hal=dinv/dataInv_detail&id=<?= $pda_id['fk_barang_masuk'] ?>">
            <i class="bi bi-arrow-left fs-3" style="color: #5cb874;"></i>
        </a>
        <div class="section-title">
            <h2>Detail Pengadaan</h2>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-8 pt-4">
                        <table class="table table-sm">
                            <tr>
                                <th scope="col">Kode</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $pda_id['kode_pengadaan'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Tanggal</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $pda_id['tgl_pengadaan'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Asal</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $pda_id['nama_asal'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <h4 class="mt-3 mb-2 fw-bold">Daftar Inventaris</h4>
        <div class=" row justify-content-center">
            <div class="col">
                <a class="btn btn-sm text-white mb-3" style="background-color: #5cb874;" href="index.php?hal=dinv/pengadaan/formInvPengadaan_detail&id=<?= $pda_id['id_pengadaan'] ?>">
                    Tambah <i class="bi bi-plus-lg fs-7"></i>
                </a>
                <table class="table table-sm table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">NO</th>
                            <th colspan="3">Inventaris</th>
                            <th colspan="2">Jumlah</th>
                            <th rowspan="2">AKSI</th>
                        </tr>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Masuk</th>
                            <th scope="col">Akhir</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_inv as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['kode_barang'] ?></td>
                                <td><?= $row['nama_barang'] ?></td>
                                <td><?= $row['nama_kategori'] ?></td>
                                <td><?= $row['jumlah_masuk'] ?></td>
                                <td><?= $row['stok_barang'] ?></td>
                                <td>
                                    <a href="index.php?hal=dinv/dataInv_detail&id=<?= $row['id_barang'] ?>">
                                        <button type="button" class="btn btn-info btn-sm" title="Detail Inventaris">
                                            <i class="bi bi-eye-fill text-light"></i>
                                        </button>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>