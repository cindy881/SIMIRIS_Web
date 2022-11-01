<?php
$model = new Inventaris();
$data_inv = $model->dataInv();
?>
<!-- ======= Inv Section ======= -->
<section id="inv" class="inv" style="background-color: #f8f9fa;">
    <div class="container shadow p-5" style="background-color: #fff; border-radius: 10px;">

        <div class="section-title">
            <h2>Data Inventaris</h2>
        </div>

        <div class="row justify-content-center">
            <div class="col-9">
                <?php
                if ($sesi['role'] == 'Admin') { //---------hanya untuk admin----------
                ?>
                    <a class="btn btn-md text-white mb-2" style="background-color: #5cb874;" href="index.php?hal=forms/inv">
                        Tambah <i class="bi bi-plus-lg fs-7"></i>
                    </a>
                <?php } ?>
                <table class="table table-sm table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">NO</th>
                            <th colspan="4">Inventaris</th>
                            <th rowspan="2">AKSI</th>
                        </tr>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Stok</th>
                            <th scope="col">Kategori</th>
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
                                <td><?= $row['stok_barang'] ?></td>
                                <td><?= $row['nama_kategori'] ?></td>
                                <td>
                                    <form action="controller_inv.php" method="POST">
                                        <a href="index.php?hal=dinv/dataInv_detail&id=<?= $row['id_barang'] ?>">
                                            <button type="button" class="btn btn-info btn-sm" title="Detail Inventaris">
                                                <i class="bi bi-eye-fill text-light"></i>
                                            </button>
                                        </a>
                                        <?php
                                        if ($sesi['role'] == 'Admin') { //---------hanya untuk admin----------
                                        ?>
                                            <a href="index.php?hal=forms/updateInv&idedit=<?= $row['id_barang'] ?>">
                                                <button type="button" class="btn btn-warning btn-sm" title="Ubah Inventaris">
                                                    <i class="bi bi-pencil-square text-light" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Anda yakin data akan dihapus?')" title="Hapus data inventaris">
                                                <i class="bi bi-trash text-light" aria-hidden="true"></i>
                                            </button>
                                            <input type="hidden" name="idx" value="<?= $row['id_barang'] ?>">
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