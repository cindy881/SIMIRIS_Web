<?php
$model = new Inventaris();
$data_pda = $model->dataPengadaan();
?>
<!-- ======= Inv Section ======= -->
<section id="pda" class="pda" style="background-color: #f8f9fa;">
    <div class="container shadow p-5" style="background-color: #fff; border-radius: 10px;">

        <div class="section-title">
            <h2>Data Pengadaan</h2>
        </div>
        <a class="btn btn-sm text-white mb-3" style="background-color: #5cb874;" href="index.php?hal=forms/pengadaan">
            Tambah <i class="bi bi-plus-lg fs-7"></i>
        </a>
        <div class="row">
            <div class="col-12">
                <table class="table table-sm table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2" scope="col">No</th>
                            <th colspan="3" scope="col">Pengadaan</th>
                            <th rowspan="2" scope="col">Aksi</th>
                        </tr>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Asal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($data_pda as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['kode_pengadaan'] ?></td>
                                <td><?= $row['tgl_pengadaan'] ?></td>
                                <td><?= $row['nama_asal'] ?></td>
                                <td>
                                    <a href="index.php?hal=dpengadaan/dataPengadaan_detail&id=<?= $row['id_pengadaan'] ?>">
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