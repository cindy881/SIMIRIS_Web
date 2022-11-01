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

        <div class="row justify-content-center">

            <div class="col-9">
                <?php
                if ($sesi['role'] == 'Admin') { //---------hanya untuk admin----------
                ?>
                    <a class="btn btn-md text-light mb-2" style="background-color: #5cb874;" href="index.php?hal=forms/peminjaman">
                        Tambah <i class="bi bi-plus-lg fs-7"></i>
                    </a>
                <?php } ?>
                <table class="table table-sm table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">NO</th>
                            <th colspan="2">Peminjaman</th>
                            <th colspan="2">Peminjam</th>
                            <th rowspan="2">AKSI</th>
                        </tr>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">NIP</th>
                            <th scope="col">Nama</th>
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
                                <td><?= $row['nip_pegawai'] ?></td>
                                <td><?= $row['nama_pegawai'] ?></td>
                                <td>
                                    <form action="controller_peminjaman.php" method="POST">
                                        <a href="index.php?hal=dpeminjaman/dataPeminjaman_detail&id=<?= $row['id_peminjaman'] ?>">
                                            <button type="button" class="btn btn-info btn-sm" title="Detail Peminjaman">
                                                <i class="bi bi-eye-fill text-light"></i>
                                            </button>
                                        </a>
                                        <?php
                                        if ($sesi['role'] == 'Admin') { //---------hanya untuk admin----------
                                        ?>
                                            <a href="index.php?hal=forms/updatePeminjaman&idedit=<?= $row['id_peminjaman'] ?>">
                                                <button type="button" class="btn btn-warning btn-sm" title="Ubah Peminjaman">
                                                    <i class="bi bi-pencil-square text-light" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                            <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Anda yakin data akan dihapus?')" title="Hapus data peminjaman">
                                                <i class="bi bi-trash text-light" aria-hidden="true"></i>
                                            </button>
                                            <input type="hidden" name="idx" value="<?= $row['id_peminjaman'] ?>">
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