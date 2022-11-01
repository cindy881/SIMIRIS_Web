<?php
$id = $_REQUEST['id'];

$obj_peg = new Pegawai();
$pegawai = $obj_peg->getPegawai($id);

$obj_pmj = new Peminjaman();
$peminjaman = $obj_pmj->getPeminjamanOnPegawaiDetails($id);
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
                    <div class="col-5 p-0">
                        <img src="assets/img/team/team-1.jpg" class="img-fluid m-2" style="height: 12rem; width:auto;" alt="">
                    </div>
                    <div class="col">
                        <table class="table table-sm mt-4">
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
                        <?php
                        if ($sesi['role'] == 'Admin') { //---------hanya untuk admin----------
                        ?>
                            <form action="controller_pegawai.php" method="POST" class="row">
                                <a href="index.php?hal=forms/updatePegawai&idedit=<?= $pegawai['id_pegawai'] ?>">
                                    <button type="button" class="btn btn-sm col-12 text-light" style="background-color: #5cb874;" title="Ubah Pegawai">
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

        <div class="container">
            <h4 class="mt-4 mb-2 fw-bold">Riwayat Peminjaman</h3>
                <!-- <a class="btn btn-sm text-light mb-2" style="background-color: #5cb874;" href="index.php?hal=forms/peminjaman&id=<?= $id ?>">
                    Tambah <i class="bi bi-plus-lg fs-7"></i>
                </a> -->
                <table class="table table-sm table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th rowspan="2">NO</th>
                            <th colspan="2">Peminjaman</th>
                            <th rowspan="2">AKSI</th>
                        </tr>
                        <tr>
                            <th>Kode</th>
                            <th>Tanggal</th>
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
                                <td>
                                    <form action="controller_peminjaman.php" method="POST">
                                        <a href="index.php?hal=dpeminjaman/datapeminjaman_detail&id=<?= $row['id_peminjaman'] ?>">
                                            <button type="button" class="btn btn-info btn-sm" title="Detail Pegawai">
                                                <i class="bi bi-eye-fill text-light"></i>
                                            </button>
                                        </a>
                                        <?php
                                        if ($sesi['role'] == 'Admin') { //---------hanya untuk admin----------
                                        ?>
                                            <button type="submit" class="btn btn-danger btn-sm" name="proses" value="hapus" onclick="return confirm('Anda yakin data akan dihapus?')" title="Hapus data pengadaan">
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
</section>