<?php
$id = $_REQUEST['id'];

$model = new Pegawai();
$pegawai = $model->getPegawai($id);
$peminjaman = $model->getPeminjamanPegawai($id);
?>
<section id="pegDetail" class="pegDetail" style="background-color: #f8f9fa;">
    <div class="container shadow p-5" style="background-color: #fff; border-radius: 10px;">

        <a href="index.php?hal=dpegawai/dataPegawai">
            <i class="bi bi-arrow-left fs-3" style="color: #5cb874;"></i>
        </a>
        <div class="section-title">
            <h2>Detail Pegawai</h2>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-3 p-0">
                        <img src="assets/img/team/team-1.jpg" class="img-fluid m-2" style="height: 8rem; width:auto;" alt="">
                    </div>
                    <div class="col pt-4">
                        <table class="table table-sm">
                            <tr>
                                <th scope="col">NIP</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $pegawai['nip_pegawai'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Nama</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $pegawai['nama_pegawai'] ?></td>
                            </tr>
                            <tr>
                                <th scope="col">Departemen</th>
                                <td scope="col">:</td>
                                <td scope="col"><?= $pegawai['nama_departemen'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <h4 class="mt-3 mb-2 fw-bold">Riwayat Peminjaman</h3>
                <a class="btn btn-sm text-light mb-3" style="background-color: #5cb874;" href="index.php?hal=di">
                    Tambah <i class="bi bi-plus-lg fs-7"></i>
                </a>
                <table class="table table-sm table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">NO</th>
                            <th colspan="3">Peminjaman</th>
                            <th colspan="2">Barang</th>
                        </tr>
                        <tr>
                            <th>Kode</th>
                            <th>Tanggal</th>
                            <th>Jumlah</th>
                            <th>Kode</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($peminjaman as $row) {
                        ?>
                            <tr>
                                <th scope="row"><?= $no ?></th>
                                <td><?= $row['kode_peminjaman'] ?></td>
                                <td><?= $row['tgl_peminjaman'] ?></td>
                                <td><?= $row['jumlah_peminjaman'] ?></td>
                                <td><?= $row['kode_barang'] ?></td>
                                <td><?= $row['nama_barang'] ?></td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
        </div>


    </div>
</section>