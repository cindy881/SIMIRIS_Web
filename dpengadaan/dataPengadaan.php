<?php
$model = new Pengadaan();
$data_pda = $model->dataPengadaan();
?>
<!-- ======= Inv Section ======= -->
<section id="pda" class="pda" style="background-color: #f8f9fa;">
    <div class="container shadow p-5" style="background-color: #fff; border-radius: 10px;">

        <div class="section-title">
            <h2>Data Pengadaan</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-10">
                <?php
                if ($sesi['role'] == 'Admin') { //---------hanya untuk admin----------
                ?>
                    <a class="btn btn-md text-white mb-2" style="background-color: #5cb874;" href="index.php?hal=forms/pengadaan">
                        Tambah <i class="bi bi-plus-lg fs-7"></i>
                    </a>
                <?php } ?>
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
                                    <form action="controller_pengadaan.php" method="POST">
                                        <a href="index.php?hal=dpengadaan/dataPengadaan_detail&id=<?= $row['id_pengadaan'] ?>">
                                            <button type="button" class="btn btn-info btn-sm" title="Detail Pengadaan">
                                                <i class="bi bi-eye-fill text-light"></i>
                                            </button>
                                        </a>
                                        <?php
                                        if ($sesi['role'] == 'Admin') { //---------hanya untuk admin----------
                                        ?>
                                            <a href="index.php?hal=forms/updatePengadaan&idedit=<?= $row['id_pengadaan'] ?>">
                                                <button type="button" class="btn btn-warning btn-sm" title="Ubah Pengadaan">
                                                    <i class="bi bi-pencil-square text-light" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Anda yakin data akan dihapus?')" title="Hapus data pengadaan">
                                                <i class="bi bi-trash text-light" aria-hidden="true"></i>
                                            </button>
                                            <input type="hidden" name="idx" value="<?= $row['id_pengadaan'] ?>">
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