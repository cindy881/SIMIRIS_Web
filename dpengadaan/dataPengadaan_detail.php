<?php
$id = $_REQUEST['id'];

$obj_pda = new Pengadaan();
$data_pda = $obj_pda->getPengadaans($id);
$pda_id = $obj_pda->getPengadaan($id);

$obj_inv = new Inventaris();
$data_inv = $obj_inv->getInvOnPengadaan($id);
?>
<section id="detailInv" class="detailInv" style="background-color: #f8f9fa;">
    <div class="container shadow p-5" style="background-color: #fff; border-radius: 10px;">

        <a href="index.php?hal=dpengadaan/dataPengadaan">
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
                        <?php
                        if ($sesi['role'] == 'Admin') { //---------hanya untuk admin----------
                        ?>
                            <form action="controller_pengadaan.php" method="POST">
                                <a href="index.php?hal=forms/updatePengadaan&idedit=<?= $pda_id['id_pengadaan'] ?>">
                                    <button type="button" class="btn btn-warning btn-sm text-light col-12" title="Ubah Pengadaan">
                                        Edit <i class="bi bi-pencil-square" aria-hidden="true"></i>
                                    </button>
                                </a>
                            </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
        <hr>

        <h4 class="mt-4 mb-2 fw-bold">Daftar Inventaris</h4>
        <div class=" row justify-content-center">
            <div class="col">
                <?php
                if ($sesi['role'] == 'Admin') { //---------hanya untuk admin----------
                ?>
                    <a class="btn btn-sm text-light mb-2" style="background-color: #5cb874;" href="index.php?hal=forms/pengadaanDetail&id=<?= $pda_id['id_pengadaan'] ?>">
                        Tambah <i class="bi bi-plus-lg fs-7"></i>
                    </a>
                <?php } ?>
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
                                    <form action="controller_pengadaan_detail.php" method="POST">
                                        <a href="index.php?hal=dinv/dataInv_detail&id=<?= $row['id_barang'] ?>">
                                            <button type="button" class="btn btn-info btn-sm" title="Detail Inventaris">
                                                <i class="bi bi-eye-fill text-light"></i>
                                            </button>
                                        </a>
                                        <?php
                                        if ($sesi['role'] == 'Admin') { //---------hanya untuk admin----------
                                        ?>
                                            <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Anda yakin data akan dihapus?')" title="Hapus data pengadaan">
                                                <i class="bi bi-trash text-light" aria-hidden="true"></i>
                                            </button>
                                            <input type="hidden" name="idx" value="<?= $row['id_detail_masuk'] ?>">
                                        <?php } ?>
                                    </form>
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