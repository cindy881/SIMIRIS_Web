<?php
$model = new Peminjaman();
$data_pmj = $model->dataPeminjaman();
?>
<!-- ======= Inv Section ======= -->
<section id="pmj" class="pmj" style="background-color: #f8f9fa;">
    <div class="container shadow p-5" style="background-color: #fff; border-radius: 10px;">

        <div class="section-title">
            <h2>Data Peminjaman</h2>
        </div>

        <div class="row">

            <div class="col-12">
                <a class="btn btn-sm text-light mb-3" style="background-color: #5cb874;" href="index.php?hal=forms/peminjaman">
                    Tambah <i class="bi bi-plus-lg fs-7"></i>
                </a>
                <table class="table table-sm table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">NO</th>
                            <th colspan="3">Peminjaman</th>
                            <th rowspan="2">Kode Barang</th>
                            <th rowspan="2">AKSI</th>
                        </tr>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_pmj as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['kode_peminjaman'] ?></td>
                                <td><?= $row['tgl_peminjaman'] ?></td>
                                <td><?= $row['jumlah_peminjaman'] ?></td>
                                <td><?= $row['kode_barang'] ?></td>
                                <td>
                                    <a href="index.php?hal=dinv/peminjaman/dataInvPeminjaman_detail&id=<?= $row['id_peminjaman'] ?>">
                                        <i class="bi bi-eye-fill"></i>
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